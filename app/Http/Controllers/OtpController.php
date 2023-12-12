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
        $otpExpiryTime = Carbon::createFromFormat('Y-m-d H:i:s', $user->otp_expiry, $timezone);
        
        $timeDifference = $otpExpiryTime->diffInSeconds($currentTime);
        return view('auth.verify', [
            'remainingTime' => $timeDifference,
        ]);
       
    }

    public function sendOtp(Request $request)
    {
        // $otp = rand(1000, 9999);
        // $expiryTime = now()->addMinutes(5); 
        $user = Auth::user();
        $otp = rand(1000, 9999);
        $timezone =  $user->timezone;           
        $nowInUserTimezone = Carbon::now($timezone);
        $expiryTime = $nowInUserTimezone->addMinutes(5);
        
      
        $user->update([
            'otp' => $otp,
            'otp_expiry' => $expiryTime,
        ]);

        // Send the OTP via email
        $this->sendOtpEmail($user->email, $otp);

        return response()->json(['message' => 'Otp sent successfully']);
    }

    public function verifyOtp(Request $request)
    {
     
        $this->validate($request, [
            'verification_code' => 'required|numeric',
        ]);
        
        $enteredOtp = $request->input('verification_code');
        $user = Auth::user();

        if ($this->isValidOtp($user, $enteredOtp)) {
            
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

    protected function sendOtpEmail($email, $otp)
    {
        $subject = 'Your OTP for Verification';
        $message = "Your OTP is: $otp";

        \Mail::raw($message, function ($m) use ($email, $subject) {
            $m->to($email)->subject($subject);
        });
    }

}
