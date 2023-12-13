@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<style>
.height-100{height:50vh}.card{width:400px;border:none;height:300px;box-shadow: 0px 5px 20px 0px #d2dae3;z-index:1;display:flex;justify-content:center;align-items:center}.card h6{color:#1c1942;font-size:20px}.inputs input{width:40px;height:40px}input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button{-webkit-appearance: none;-moz-appearance: none;appearance: none;margin: 0}.card-2{background-color:#fff;padding:10px;width:350px;height:100px;bottom:-50px;left:20px;position:absolute;border-radius:5px}.card-2 .content{margin-top:50px}.card-2 .content a{color:#6CB0FF}.form-control:focus{box-shadow:none;border:2px solid #6CB0FF}.validate{border-radius:20px;height:40px;background-color:#6CB0FF;border:1px solid #6CB0FF;width:140px}

.loader {
    border: 8px solid #f3f3f3; /* Light grey */
    border-top: 8px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
    display: none; /* Initially hidden */
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
@if($errors->has('otp'))
    <script>
        toastr.error("Invalid or expired OTP.", "Error");
    </script>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form method="POST" action="{{ route('verification.verify') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                            <div id="loader" class="loader"></div>

                                <!-- <input id="verification_code" type="text" class="form-control @error('verification_code') is-invalid @enderror" name="verification_code" required> -->
                                <!-- <p id="otp-timer">Remaining Time: <span id="minutes"></span> minutes <span id="seconds"></span> seconds</p> -->
                                <div class="container height-100 d-flex justify-content-center align-items-center">
                <div class="position-relative"> <div class="card p-2 text-center">
                    <h6>Please enter the otp <br> to verify your account</h6>
                    <div> <span>A otp has been sent to</span> <small>email</small> </div>
                    <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                        <input required class="m-2 text-center form-control rounded" type="number" id="first" name ="first" maxlength="1" /> 
                        <input required class="m-2 text-center form-control rounded" type="number" id="second" name ="second" maxlength="1" /> 
                        <input required class="m-2 text-center form-control rounded" type="number" id="third" name ="third" maxlength="1" /> 
                        <input required class="m-2 text-center form-control rounded" type="number" id="fourth" name ="fourth" maxlength="1" /> 
                        
                       </div> <div class="mt-4"> 
                       <button type="submit" class="btn  px-4 validate" id="validateButton" @if($remainingTime_expire) disabled @endif>Verify</button>
                       </div>
                     </div> 
                     <div class="card-2">
                      <div class="content d-flex justify-content-center align-items-center">
                         <span>Didn't get the code</span>
                          <a href="#" class="text-decoration-none ms-3" id="resendButton">Resend(<span id = "seconds"></span>)</a> 
                        </div>
                     </div> 
                    </div>
                 </div>
                   @error('verification_code')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                          </span>
                            @enderror
                            </div>
                        </div>

                       
                    </form>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function(event) {  
function OTPInput() {
            const inputs = document.querySelectorAll('#otp > *[id]');
            for (let i = 0; i < inputs.length; i++) { inputs[i].addEventListener('keydown', function(event) { if (event.key==="Backspace" ) { inputs[i].value='' ; if (i !==0) inputs[i - 1].focus(); } else { if (i===inputs.length - 1 && inputs[i].value !=='' ) { return true; } else if (event.keyCode> 47 && event.keyCode < 58) { inputs[i].value=event.key; if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } else if (event.keyCode> 64 && event.keyCode < 91) { inputs[i].value=String.fromCharCode(event.keyCode); if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } } }); } } OTPInput();
    });
    var remainingTime = {{ $remainingTime }};
    var secondsElement = document.getElementById('seconds');
    var validateButton = document.getElementById('validateButton');
    var resendButton = document.getElementById('resendButton');

    function updateTimer() {
        var timerInterval = setInterval(function () {
            var seconds = remainingTime % 60;
            secondsElement.innerHTML = seconds;

            remainingTime--;

            if (remainingTime < 0) {
                clearInterval(timerInterval);
                // Optionally hide the resend button when the timer reaches 0
                // resendButton.style.display = 'none';
                resendButton.style.pointerEvents = 'auto';  // Enable the Resend link

            }else{

                resendButton.style.pointerEvents = 'none';  // Disable the Resend link

            }
        }, 1000);
    }

    // Call the function to start the timer
    updateTimer();

</script>


<script>
    // Handle click event for the edit link
    $('#resendButton').click(function(e) {  
          
              e.preventDefault();    
              var csrfToken = $('meta[name="csrf-token"]').attr('content');
              var loader = $('#loader');  // Assuming you have an element with id 'loader'


        $.ajax({
            url: '/send-otp', 
            method: 'POST',
            data: {_token: csrfToken}, 
            beforeSend: function() {
            // Show loader before sending the request
            loader.show();
            validateButton.disabled = true;
            resendButton.style.pointerEvents = 'none'; 
        },

            
            success: function(data) {
                // $('#resendButton').hide();            
                // $('#verifyButton').show();
                 remainingTime = data.remainingTime;
                 remainingTime_expire = data.remainingTime_expire;  
                 if (!remainingTime_expire) {
                    validateButton.disabled = false;
                } else {
                    
                    validateButton.disabled = true;
                }            

                 updateTimer(); 
                 loader.hide();


            // window.location.reload();
                toastr.success('OTP sent successfully');
            }
        });
    });
    </script>
@endsection
