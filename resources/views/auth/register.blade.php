@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.33/moment-timezone-with-data.min.js"></script>

<!-- Add this script to detect and send the timezone -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the user's timezone
        var userTimezone = moment.tz.guess();

        // Set the timezone value in a hidden input field in your form
        document.getElementById('timezone-input').value = userTimezone;
    });
</script>

<div class="LoginWrap_Page RegisterPage_Wrap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="LeftLogin_Img">
                                <h4>Social Media posting made simple. YouPost offers a friendly, easy-to-use solution , try us free.</h4>
                                <div class="rev_slider">
                                    <div class="rev_slide">
                                        <div class="test">
                                            <img src="{{ asset('images/auth-img-1.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="rev_slide">
                                        <div class="test">
                                            <img src="{{ asset('images/auth-img-2.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="rev_slide">
                                        <div class="test">
                                            <img src="{{ asset('images/auth-img-3.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <img src="{{ asset('images/YouPost_Logo.png') }}" alt="" class="Reg_Logo">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <input type="hidden" name="timezone" id="timezone-input" value="">

                                <div class="">
                                    <h4 class="mb-1">Create account</h3>
                                    <p>For business, band or celebrity.</p>
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-md-6">
                                        <label for="fname">First Name</label>
                                        <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" placeholder="First Name" required autocomplete="fname" autofocus>
                                        @error('fname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2 col-md-6">
                                        <label for="lname">Last Name</label>
                                        <input type="text" name="lname" id="lname" class="form-control @error('lname') is-invalid @enderror" placeholder="Last Name" value="{{ old('lname') }}" required>
                                        @error('lname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-md-6">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2 col-md-6">
                                        <label for="date">Date of birth (MM/DD/YY)</label>
                                        <input type="date" name="dob" value="{{ old('dob') }}" id="date" class="form-control" placeholder="Date of birth (MM/DD/YY)" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-md-6">
                                        <label for="password">Password</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2 col-md-6">
                                        <label for="password-confirm">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="agree" required id="agree">
                                            <label class="form-check-label" for="agree">
                                                I agree to all the <a href="{{ route('privacy.policy') }}" class="text-decoration-none">Terms and Privacy policy</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-12 SubmitBtn">
                                        <button type="submit" class="">
                                            {{ __('Create account') }}
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
                                <span class="Login__Reg">Already have an account? <a href="{{ route('login') }}">Log In</a></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    const today = new Date().toISOString().split('T')[0];
document.getElementById("date").setAttribute("max", today);
});
</script>
@endsection
