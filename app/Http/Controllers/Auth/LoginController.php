<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use Auth;
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
                $finduser = User::where('email', $user->email)->first();
                if($finduser){
                    
                    Auth::login($finduser);
                    return redirect()->intended('/');
                }else{
                        $newUser = User::create([
                            'name' => $user->name,
                            'email' => $user->email,
                            'google_id'=> $user->id,
                            'password' => encrypt('123456dummy')
                        ]);
                        Auth::login($newUser);
                        return redirect()->intended('/');
                }
            } catch (Exception $e) {
                dd($e->getMessage());
            }
        
    }


    public function redirectToFacebook()
    {
        return redirect('/');
        return Socialite::driver('facebook')->redirect();

    }
}
