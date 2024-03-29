@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<style>
.height-100 {
    height: 50vh
}

.card {
    width: 400px;
    border: none;
    height: 350px;
    box-shadow: 0px 5px 20px 0px #d2dae3;
    z-index: 1;
    display: flex;
    justify-content: center;
    align-items: center
}

.card h6 {
    color: #1c1942;
    font-size: 20px
}

.inputs input {
    width: 40px;
    height: 40px
}
.verfy_cont{
    padding:10px;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0
}

.card-2 {
    background-color: #fff;
    padding: 10px;
    width: 350px;
    height: 100px;
    bottom: -50px;
    left: 20px;
    position: absolute;
    border-radius: 5px
}

.card-2 .content {
    margin-top: 50px
}

.card-2 .content a {
    color: #6CB0FF
}

.form-control:focus {
    box-shadow: none;
    border: 2px solid #6CB0FF
}

.validate {
    border-radius: 20px;
    height: 40px;
    background-color: #6CB0FF;
    border: 1px solid #6CB0FF;
    width: 140px
}

.loader {
    border: 8px solid #f3f3f3;
    /* Light grey */
    border-top: 8px solid #3498db;
    /* Blue */
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
    display: none;
    /* Initially hidden */
    position: absolute;
    top: -52px;
    left: -28px;
    z-index: 9;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

.otp-container {
    height: 90vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.link_logout {
    text-align: right;
   display:flex;
   justify-content: end;
    margin-bottom: 10px;

}
.link_logout2{
    width:fit-content;
}
.verfiy_link{
    bottom: 51px;
    position: absolute;
    z-index: 999;
}
.verfyemail_link{
    text-decoration:none !important;
    box-sizing: border-box;
    min-width: 140px;
    display: inline-block;
    color: #fff;
    background-color: #007bff;
    border-radius: 10px;
    width: auto;
    font-weight:600;
    padding:10px 10px 10px 10px !important;
    font-family: 'Sora', sans-serif;
    text-align: center;
    word-break: keep-all;
    font-size: 16px;
}
.verfyemail_link:hover{
   background-color:#0d6efd;
   color:#fff !important;
}
.disabled_btn{
    pointer-events:none;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.all.min.js"></script>
@if($errors->has('otp'))
<script>
toastr.error("Invalid or expired OTP.", "Error");
</script>
@endif
@if(session('message'))
    <script>
        Swal.fire({
            icon: 'info',
            title: '',
            text: '{{ session('message') }}',
        });
    </script>
@endif
<div class="container otp-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- <a class="dropdown-item" href="{{ url('user/profile') }}"><i class="feather icon-user"></i>
                                    Edit Profile</a> -->
            <div class="link_logout">

                <a class="dropdown-item link_logout2" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            {{-- <div class="dropdown-divider"></div><a class="dropdown-item" href="auth-login.html"><i class="feather icon-power"></i> Logout</a> --}}


            <form method="POST" action="{{ route('verification.verify') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-12">


                        <!-- <input id="verification_code" type="text" class="form-control @error('verification_code') is-invalid @enderror" name="verification_code" required> -->
                        <!-- <p id="otp-timer">Remaining Time: <span id="minutes"></span> minutes <span id="seconds"></span> seconds</p> -->
                        <div class="container  align-items-center">
                            <div class="position-relative">
                                <div class="card p-2 text-center" style="width:100%">
                                    <h6>Thank you, <br>for registering with YouPost!
                                    </h6>
                                    <div class="verfy_cont"> <span>Please verify your email to complete the registration process.
                                        </span> <span>The verification link will expire in 72 hours.</span><br> {{auth()->user()->email}} </div>

                                    @error('verification_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

            </form>
            <form class="d-inline text-center verfiy_link" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit disb_load" id="resendVerificationEmail"
                    class="btn btn-link p-0 m-0 align-baseline verfyemail_link">{{ __('Resend Verification Email') }}</button>
            </form>
        </div>
    </div>
<script>
    $('#resendVerificationEmail').click(function (e) {
    e.preventDefault();
    $(this).addClass('disabled_btn');
    setTimeout(function () {
        $('.verfiy_link').submit();
        $('#resendVerificationEmail').removeClass('disabled_btn');

    }, 3500);
});
</script>    


    @endsection