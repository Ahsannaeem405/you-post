<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;





class OtpController extends Controller
{
    public function showOtpForm()
    {
        return view('auth.verify');
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

          // Assuming you have a user instance
                    $user = Auth::user();

          // Mark the user's email as verified
          $user->markEmailAsVerified();

          // Redirect to a success page or wherever you want
          return redirect()->route('dashboard')->with('message', 'OTP verified successfully.');



    }

    protected function isValidOtp($user, $enteredOtp)
    {
        return $user->otp === $enteredOtp && now()->lt($user->otp_expiry);
    }

    public function resendVerificationEmail(Request $request)
    {

            $user = User::find(Auth::User()->id);
            if (!$user) {
                abort(404);
            }
            Mail::to($user->email)->send(new VerifyEmail($user));
            return redirect()->route('verification.notice')->with('success', 'Email Sent successfully.');

    }

    // app/Http/Controllers/VerificationController.php

public function verifyEmail($userId, $token)
{
    $user = User::find($userId);

    if (!$user || $user->token !== $token) {
        abort(404); // Handle invalid verification link
    }

    // Mark the user as verified and clear the verification token
    $user->email_verified_at = now();
    $user->token = null;
    $user->save();

    // Redirect or respond as needed
    return redirect()->route('index')->with(['message'=> 'Email successfully verified.','new_user'=>true]);
}



}
