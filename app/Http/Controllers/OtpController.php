<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class OtpController extends Controller
{
    public function showOtpForm()
    {
        $user = Auth::user();
        $timezone = $user->timezone;
        $currentTime = now($timezone);
        $resendExpire = Carbon::createFromFormat('Y-m-d H:i:s', $user->resend_time, $timezone);
        if ($currentTime > $resendExpire) {          
            $remainingTime = 0;
        } else {           
            $timeDifference = $resendExpire->diffInSeconds($currentTime);            
            $remainingTime = $timeDifference;
                }   
           
        $otpExpiryTime = Carbon::createFromFormat('Y-m-d H:i:s', $user->otp_expiry, $timezone);
        
        if ($currentTime > $otpExpiryTime) {
            $remainingTime_expire = true;
        } else {
            $remainingTime_expire = false;
        }
            return view('auth.verify', [
            'remainingTime' => $remainingTime,
            'remainingTime_expire' => $remainingTime_expire,
        ]);
       
    }

    public function sendOtp(Request $request)
    {
        
        $user = Auth::user();
        $otp = rand(1000, 9999);
        $timezone =  $user->timezone;           
        $nowInUserTimezone = Carbon::now($timezone);
        $otpExpiryTime = Carbon::createFromFormat('Y-m-d H:i:s', $user->otp_expiry, $timezone);

        if ($nowInUserTimezone < $otpExpiryTime) {   
            $expiryTimeWithThirtySeconds =(Carbon::now($timezone))->addSeconds(35);
            $expiryTime = $user->otp_expiry;       
        } else {                  
                   $expiryTime = $nowInUserTimezone->addMinutes(5); 
                   $expiryTimeWithThirtySeconds =(Carbon::now($timezone))->addSeconds(35);              
           
                }          
         $user->update([
            'otp' => $otp,
            'otp_expiry' => $expiryTime,
            'resend_time' => $expiryTimeWithThirtySeconds,
        ]);        
        $currentTime = now($timezone);
        $resendExpire = Carbon::createFromFormat('Y-m-d H:i:s', $user->resend_time, $timezone);       
       if ($currentTime > $resendExpire) {          
            $remainingTime = 0;
        } else {           
            $timeDifference = $resendExpire->diffInSeconds($currentTime);            
            $remainingTime = $timeDifference;
                }       
        $otpExpiryTime = Carbon::createFromFormat('Y-m-d H:i:s', $user->otp_expiry, $timezone);        
        if ($currentTime > $otpExpiryTime) {
            $remainingTime_expire = true;
        } else {
            $remainingTime_expire = false;
        }      
        $user->sendOtpEmail($user->email, $otp);
        return response()->json([

            'message' => 'Otp sent successfully', 
            'remainingTime' => $remainingTime,
            'remainingTime_expire' => $remainingTime_expire
        
        ]);
    }

    public function verifyOtp(Request $request)
    {
       
        $this->validate($request, [
            'first' => 'required|numeric',
            'second' => 'required|numeric',
            'third' => 'required|numeric',
            'fourth' => 'required|numeric',

        ]);
        
        $firstDigit = $request->input('first');
        $secondDigit = $request->input('second');
        $thirdDigit = $request->input('third');
        $fourthDigit = $request->input('fourth');      
        
        $completeOtp = $firstDigit . $secondDigit . $thirdDigit . $fourthDigit;        
        $user = Auth::user();
        if ($this->isValidOtp($user, $completeOtp)) {            
            $user->update(['is_verified' => true]);
            return redirect()->route('dashboard')->with('message', 'OTP verified successfully.');
        } else {
            
            return redirect()->route('verification.notice')->withErrors(['otp' => 'Invalid or expired OTP.']);
        }
    }

    protected function isValidOtp($user, $enteredOtp)
    {
        return $user->otp === $enteredOtp && now()->lt($user->otp_expiry);
    }

   

}
