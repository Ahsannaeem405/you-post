<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail; // Import this
use App\Notifications\CustomVerifyEmail;




class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
            $otp = rand(1000, 9999);
            $timezone =  $data['timezone'];           
            $nowInUserTimezone = Carbon::now($timezone);
            $expiryTime = $nowInUserTimezone->addMinutes(5);
            $expiryTimeWithThirtySeconds =(Carbon::now($timezone))->addSeconds(35);

           
    
        
            
         $user = User::create([
            'name' => $data['fname'].' '.$data['lname'],
            'email' => $data['email'],
            'dob' => $data['dob'],
            'password' => Hash::make($data['password']),
            // 'otp' => $otp,
            // 'otp_expiry' => $expiryTime,
            // 'timezone' => $data['timezone'],
            // 'resend_time' => $expiryTimeWithThirtySeconds,

        ]);       
        
        // event(new Registered($user));

        if ($user instanceof MustVerifyEmail) {
            $this->guard()->login($user);
            $user->notify(new CustomVerifyEmail($user->name)); // Pass the user instance to the notification
        }

        return $user;
    }
  
}
