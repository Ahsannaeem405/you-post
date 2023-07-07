<?php

namespace App\Http\Controllers\Auth;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()
    {

        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
            try {
                $user = Socialite::driver('google')->stateless()->user();
                // $finduser = User::where('email', $user->email)->first();
                $finduser = User::where('google_id', $user->id)->first();
                if($finduser){

                    Auth::login($finduser);
                    return redirect()->intended('/index')->with('success', 'Login Successfully');
                }else{

                    $newUser = User::updateOrCreate(['email' => $user->email],[
                        'name' => $user->name,
                        'google_id'=> $user->id,
                        'password' => encrypt('123456dummy')
                    ]);
                    Auth::login($newUser);
                    return redirect()->intended('/index')->with('success', 'Login Successfully');
                }
            } catch (\Throwable $e) {
                dd($e);
                return redirect()->intended('/login')->with('error', $e->getMessage()) ;
            }

    }


    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();

    }

    public function handleFacebookCallback()
    {

        try {
            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('facebook_id', $user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('/index')->with('success', 'Login Successfully');
            }else{
                $user->email != null ? $email = $user->email : $email = "$user->id@gmail.com";
                $newUser = User::updateOrCreate(['email' => $email],[
                    'name' => $user->name,
                    'facebook_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
                Auth::login($newUser);
                return redirect()->intended('/index')->with('success', 'Login Successfully');
            }
        } catch (\Throwable $e) {

            return redirect()->intended('/login')->with('error', $e->getMessage());
        }
    }
}
