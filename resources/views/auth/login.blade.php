@extends('layouts.app')
<style>
    /* .loginBtn {
        box-sizing: border-box;
        position: relative;
        margin: 0.2em;
        padding: 0 15px 0 46px;
        border: none;
        text-align: left;
        line-height: 34px;
        white-space: nowrap;
        border-radius: 0.2em;
        font-size: 16px;
        color: #FFF !important;
        text-decoration: none;
        padding: 6px 39px;
        cursor: pointer;
    } */

    /* .loginBtn:before {
        content: "";
        box-sizing: border-box;
        position: absolute;
        top: 0;
        left: 0;
        width: 34px;
        height: 100%;
    } */

    /* .loginBtn:focus {
        outline: none;
    }

    .loginBtn:active {
        box-shadow: inset 0 0 0 32px rgba(0, 0, 0, 0.1);

    } */


    /* Facebook */
    /* .loginBtn--facebook {
        background-color: #4C69BA;
        background-image: linear-gradient(#4C69BA, #3B55A0);
        text-shadow: 0 -1px 0 #354C8C;
    } */

    /* .loginBtn--facebook:before {
        border-right: #364e92 1px solid;
        background: url('http://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
    }

    .loginBtn--facebook:hover,
    .loginBtn--facebook:focus {
        background-color: #5B7BD5;
        background-image: linear-gradient(#5B7BD5, #4864B1);
    } */


    /* Google */
    .loginBtn--google {
        /*font-family: "Roboto", Roboto, arial, sans-serif;*/
        /* background: #DD4B39; */
    }

    /* .loginBtn--google:before {
        border-right: #BB3F30 1px solid;
        background: url('http://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
    }

    .loginBtn--google:hover,
    .loginBtn--google:focus {
        background: #E74B37;
    } */
</style>
@section('content')
<div class="LoginWrap_Page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="LeftLogin_Img">
                                <h4>Social media shared today, tomorrow or by location</h4>
                                <div class="rev_slider">
                                    <div class="rev_slide">
                                        <div class="test">
                                            <img src="{{ asset('images/imgfeatures-archive.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="rev_slide">
                                        <div class="test">
                                            <img src="{{ asset('images/imgfeatures-archive.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="rev_slide">
                                        <div class="test">
                                            <img src="{{ asset('images/imgfeatures-archive.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <img src="{{ asset('images/YouPost_Logo.png') }}" alt="" class="Reg_Logo">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <h4>Login</h4>
                                <div class="mb-3">
                                    <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                                    <div class="">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password"
                                        class="col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        @if (Route::has('password.request'))
                                            <a class="ForgotPassword" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-12 SubmitBtn">
                                        <button type="submit" class="">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </div>

                                <div class="BtnsWrap mb-0">
                                    <a href="{{ url('auth/google') }}" class="loginBtn loginBtn--google">
                                        <img src="{{ asset('images/icon_google.png') }}" alt="" class="mr-2">Sign-in with google
                                    </a>

                                    <a href="{{ url('auth/facebook') }}" class="loginBtn loginBtn--facebook">
                                        <img src="{{ asset('images/facebook-15.png') }}" alt="" class="mr-2">Login with Facebook
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
