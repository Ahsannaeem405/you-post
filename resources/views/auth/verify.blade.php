@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Otp code') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification code has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification code.') }}
                    <!-- {{ __('If you did not receive the email') }}, -->
                    <form method="POST" action="{{ route('verification.verify') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="verification_code" class="col-md-4 col-form-label text-md-right">{{ __('Verification Code') }}</label>
                            <div class="col-md-6">
                                <input id="verification_code" type="text" class="form-control @error('verification_code') is-invalid @enderror" name="verification_code" required>
                                <p id="otp-timer">Remaining Time: <span id="minutes"></span> minutes <span id="seconds"></span> seconds</p>

                                @error('verification_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="verifyButton">
                                    {{ __('Verify') }}
                                </button>
                                <button type="button" class="btn btn-secondary" id="resendButton" style="display:none">
                                    {{ __('Resend Code') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var remainingTime = {{ $remainingTime }};
    var minutesElement = document.getElementById('minutes');
    var secondsElement = document.getElementById('seconds');
    var verifyButton = document.getElementById('verifyButton');
    var resendButton = document.getElementById('resendButton');

    function updateTimer() {
        // Update the timer every second
        setInterval(function () {
            var minutes = Math.floor(remainingTime / 60);
            var seconds = remainingTime % 60;

            // Update elements
            minutesElement.innerHTML = minutes;
            secondsElement.innerHTML = seconds;

            // Decrement remaining time
            remainingTime--;

            if (remainingTime < 0) {
                // Handle expiration, e.g., hide verify button, show resend button, and display a message
                clearInterval(timerInterval);
                minutesElement.innerHTML = '0';
                secondsElement.innerHTML = '0';
                verifyButton.style.display = 'none';
                resendButton.style.display = 'inline-block';
                // alert('OTP has expired. Please resend it.');
            }
        }, 1000);
    }

    // Call the function to start the timer
    var timerInterval = updateTimer();
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    // Handle click event for the edit link
    $('#resendButton').click(function(e) {        
              e.preventDefault();    
              var csrfToken = $('meta[name="csrf-token"]').attr('content');


        $.ajax({
            url: '/send-otp', // Define a route to fetch record data
            method: 'POST',
            data: {_token: csrfToken}, // Include the CSRF token in the data

            
            success: function(data) {
            //     $('#resendButton').hide();

            // // Show the verify button
            // $('#verifyButton').show();
            window.location.reload();

                toastr.success('OTP sent successfully');
            }
        });
    });
    </script>
@endsection
