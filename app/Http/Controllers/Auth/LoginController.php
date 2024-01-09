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
use Illuminate\Http\Request;
use App\Events\UserLoggedIn;

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
    protected $redirectTo = 'dashboard';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){

 
        $request->validate([
            'email'=>'required',
            'password'=>'required',

        ]);
        // dd($request->all());
        if (auth()->attempt(array('email'=>$request->input('email'),'password'=>$request->input('password'))))
        {
            // $user = auth()->user();

            // if ($user->disabled) {
            //     // Logout the user and redirect back with an error message

            //     auth()->logout();

            //     return redirect()->back()->with('error', 'Your account is disabled. Please contact support.');
            // }

            if (auth()->user()->role=='admin') {

                return redirect()->route('admin.dashboard')->with('message','Login Successful');
            } else{
                // event(new UserLoggedIn($user));
                            $user = auth()->user();

                            if ($user && !$user->isEmailVerified()) {
                                
                                // $this->guard()->logout();
                                
                                return redirect('otp-verify')->with('verificationMessage', 'Please check your email for verification.');
                            }

                return redirect()->route('index')->with('success','Login Successful');
            }
        }
        else
        {
            return redirect()->route('login')->with('error','Enter valid credentials');
            // return redirect('index')->with('success', 'Login Successfully');

        }
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

                // $finduser = User::where('google_id', $user->id)->orWhere('email', $user->email)->first();

                if($finduser){
                    if (!$finduser->hasVerifiedEmail()) {
                        // Update the email_verified_at attribute in your application's database
                        $finduser->markEmailAsVerified();
                    }
                    event(new UserLoggedIn($finduser));
                    Auth::login($finduser);
                    return redirect('index')->with('success', 'Login Successfully');
                }else{

                    $newUser = User::updateOrCreate(['email' => $user->email],[
                        'name' => $user->name,
                        'google_id'=> $user->id,
                        'password' => encrypt('123456dummy'),
                        'is_verified' => true
                    ]);
                    if (!$newUser->hasVerifiedEmail()) {
                        // Update the email_verified_at attribute in your application's database
                        $newUser->markEmailAsVerified();
                    }
                    Auth::login($newUser);
                    return redirect('index')->with(['success-register' => 'Login Successfully', 'new_user' => $newUser->wasRecentlyCreated]);
                }
            } catch (\Throwable $e) {
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
                return redirect('index')->with('success', 'Login Successfully');
            }else{
                $user->email != null ? $email = $user->email : $email = "$user->id@gmail.com";
                $newUser = User::updateOrCreate(['email' => $email],[
                    'name' => $user->name,
                    'facebook_id'=> $user->id,
                    'password' => encrypt('123456dummy'),
                    'is_verified' => true
                ]);
                  if (!$newUser->hasVerifiedEmail()) {
                        // Update the email_verified_at attribute in your application's database
                        $newUser->markEmailAsVerified();
                    }
                Auth::login($newUser);
                return redirect('index')->with(['success-register' => 'Login Successfully', 'new_user' => $newUser->wasRecentlyCreated]);
            }
        } catch (\Throwable $e) {

            return redirect()->intended('/login')->with('error', $e->getMessage());
        }
    }
}
