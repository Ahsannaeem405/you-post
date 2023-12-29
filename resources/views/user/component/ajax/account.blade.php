<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>



<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@200;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,500&family=Work+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap');

.index_delete {
    text-align: right !important;
}
/* main account file styling */
.account_main {
    text-align: center;
    border-radius: 10px;
    border: 0.5px solid #E0E0E0;
    background: #FFF;
    box-shadow: 0px 0px 20px 0px rgba(129, 129, 129, 0.10);
}

.rounded-circle {
    object-fit: cover;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-top: 40px;
    border: 4px solid #52a2e3;
}

.rounded-circle2 {
    object-fit: contain;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-top: 40px;
    border: 4px solid #52a2e3;
}

.input_lb {
    position: relative;
    margin-top: 40px
}


/* ahmad counter setting code */
.user_detail {
    color: #959595;
    font-size: 12px;
    font-family: 'Poppins', sans-serif;
    font-weight: 300;
    letter-spacing: 1.2px;
    left: 100px;
    position: absolute;
    top: 28px;
    background: #fff;
    padding-left: 5px;
    padding-right: 5px;
    z-index: 1;
}

.delete_input {
    width: 100%;
    position: relative;
}

.counter_numeric {
    position: absolute;
    top: 13px;
    right: 10px;
}

/* ahmad counter setting code */

.account-detail {
    width: 100%;
    padding: 10px 15px;
    outline: none;
    border-color: #D6D6D6;
    font-weight: 400;
    border: 1px solid#D6D6D6;
    border-radius: 9px;
}

.btn-danger {
    background: #FF3044 !important;
    margin-left: 15px;
}

.delete_account {
    margin-bottom: 3px;
    width: 20px;
    height: 20px
}

.switch_account {
    margin-top: 50px;
}

.Platforms {
    color: #2F2F2F;
    text-align: center;
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    font-style:
        normal;
    font-weight: 400;
    text-align: center;
    line-height: normal;
}

.single_platform {
    height: fit-content;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.reconnect_platform {
    color: blue;
    border-bottom: 1px solid #000;
    text-decoration: none;
}

.reconnect_platform:active {
    color: red;
    border-bottom: 1px solid red;
}

.fb-conect_btn {
    text-decoration: none;
}

.fb-conect_btn,
.fb-recont_btn,
.l-conect_btn,
.l_recont_btn,
.T-conect_btn,
.T-recont_btn,
.instconect_btn,
.instrecont_btn {
    margin-top: 18px;
    border-radius: 30px;
    border: none;
}

.delete_accountbtn {
    height: 45px;
}

.linkedbtnabc {
    border-radius: 30px;
    background: #0d6efd;
    color: #fff;
    padding: 10px;
    text-decoration: none;
}

.r_btn {
    text-decoration: none;
    color: #000;
}

/*  */
.fb-reconect_btn,
.l_recont_btn,
.T-recont_btn,
.instrecont_btn {
    position: relative;
}

.tooltiptext_fb,
.tooltiptext_inst,
.tooltiptext_tw,
.tooltiptext_link {
    visibility: hidden;
    width: 120px;
    font-family: 'Poppins', sans-serif;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 1;
}

.fb-recont_btn:hover .tooltiptext_fb,
.l_recont_btn:hover .tooltiptext_link,
.T-recont_btn:hover .tooltiptext_tw,
.instrecont_btn:hover .tooltiptext_inst {
    visibility: visible;
}

.maxchar {
    color: #959595;
    font-weight: 400;
    font-family: 'Poppins', sans-serif;
    padding: 5px 0;
    font-size: 14px;
    left: 67%;
    top: 48%;
    position: absolute;
}

.disabledBtn {
    position: relative;
    opacity: 0.5;
}

.disabledBtn span {
    display: block;
    /* Display the span by default */
    font-size: 10px;
    background-color: #000;
    position: absolute;
    top: -26px;
    left: -20px;
    color: #fff;
    width: 100px;
    padding: 4px;
    border-radius: 5px;
    display: none;
}

.disabledBtn:hover span {
    display: block;
}

/*  */
.user_detail .fa-info-circle:before {
    color: #0d6efd;
}

.pullee {
    width: 12rem;
    appearance: none;
}

.pullee:active::-webkit-slider-thumb {
    appearance: none;
    transform: scale(1.1);
    cursor: -webkit-grabbing;
    cursor: -moz-grabbing;
}

.pullee:active::-moz-range-thumb {
    border: 0;
    transform: scale(1.1);
    cursor: -webkit-grabbing;
    cursor: -moz-grabbing;
}

.pullee:active::-ms-thumb {
    transform: scale(1.1);
    cursor: -webkit-grabbing;
    cursor: -moz-grabbing;
}

.pullee:focus {
    outline: none;
}

.pullee::-webkit-slider-thumb {
    appearance: none;
    display: block;
    width: 2rem;
    height: 2rem;
    border-radius: 5px;
    background: #FF3044;
    background: #FF3044 url("{{asset('images/deletebuckit.png')}}") no-repeat top center;
    transform-origin: 50% 50%;
    transform: scale(1);
    transition: transform ease-out 100ms;
    cursor: -webkit-grab;
    cursor: -moz-grab;
}

.pullee::-moz-range-thumb {
    border: 0;
    display: block;
    width: 2rem;
    height: 2rem;
    border-radius: 5px;
    background: #FF3044;
    transform-origin: 50% 50%;
    transform: scale(1);
    transition: transform ease-out 100ms;
    cursor: -webkit-grab;
    cursor: -moz-grab;
}

.pullee::-ms-thumb {
    display: block;
    width: 2rem;
    height: 2rem;
    border-radius: 5px;
    background: #FF3044;
    transform-origin: 50% 50%;
    transform: scale(1);
    transition: transform ease-out 100ms;
    cursor: -webkit-grab;
    cursor: -moz-grab;
}

.pullee::-webkit-slider-runnable-track {
    height: 2rem;
    padding: 0.25rem;
    box-sizing: content-box;
    border-radius: 7px;
    background-color: #fff;
    box-shadow: inset 0px 2px 3px 3px rgba(0, 0, 0, 0.4);

}

.pullee::-moz-range-track {
    height: 2rem;
    padding: 0.25rem;
    box-sizing: content-box;
    border-radius: 7px;
    background-color: #fff;
    box-shadow: inset 0px 2px 3px 3px rgba(0, 0, 0, 0.4);
    /* Are you sure want to delete this?
this action can not undo
label
input field  */
}

.pullee::-moz-focus-outer {
    border: 0;
}

.pullee::-ms-track {
    border: 0;
    height: 2rem;
    padding: 0.25rem;
    box-sizing: content-box;
    border-radius: 5px;
    background-color: #DDE0E3;
    color: transparent;
}

.pullee::-ms-fill-lower,
.pullee::-ms-fill-upper {
    background-color: transparent;
}

.pullee::-ms-tooltip {
    display: none;
}

.range-wraper {
    display: flex;
    justify-content: end;
    padding: 10px;
}

.center-xy {
    position: relative;
    width: max-content;
    opacity: .5;
}

.range-text {
    font-size: 12px;
    position: absolute;
    left: 58px;
    top: 11px;
}

.pullee:active+.range-text {
    display: none;
}

.form-control:focus {
    box-shadow: 0 0 0 0.1rem rgba(13, 110, 253, .25) !important;
}

.md-head {
    border: none;
}
/* -------modal style------ */

.alert_generate {
    text-align: center;
}

.text-alert {
    color: #2F2F2F;
    text-align: center;
    font-family: 'Poppins', sans-serif;
    font-size: 15px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    padding-top: 10px;
}

.text-delmsg {
    padding: 0px 5px 0px 5px;
    left: 35px;
    background: #fff;
    top: 41px;
    position: absolute;
    color: #959595;
    text-align: center;
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    font-style: normal;
    font-weight: 300;
    line-height: normal;
}

.inner_msg {
    position: relative

}
/* -------modal style------ */
/* .center-xy {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
} */
/* main account file styling */
@media (max-width:992px) {
    .all_social_platformWrp {
        width: 62%;
    }
}
</style>
@foreach($accounts as $key=>$account)
<!--24,,10,23,  -->
<div class="account_main mt-5">
    <div>
        <div class="range-wraper">
            <button type="button" class="btn btn-danger" data-bs-toggle='modal' data-bs-target='#delaccountModal'
                data-id-account="{{$account->id}}">
                <img src="{{asset('images/deletebuckit.png')}}" class="" />

            </button>
            <!-- <div class="center-xy">
         <input type="range" value="0" class="pullee" />
         <span class='range-text text-danger'>Slide to delete account</span>
        </div> -->
        </div>
        @if(in_array("Facebook", $account->platforms))
        <img src="{{$account->fb_image}}" class="v_icon rounded-circle mb-3" alt="" />
        @elseif(in_array("Instagram", $account->platforms))
        <img src="{{$account->inst_image}}" class="v_icon rounded-circle mb-3" alt="" />

        @elseif(in_array("Twitter", $account->platforms))
        <img src="{{$account->twt_image}}" class="v_icon rounded-circle mb-3" alt="" />
        @elseif(in_array("Linkedin", $account->platforms))
        <img src="{{$account->link_image}}" class="v_icon rounded-circle mb-3" alt="" />
        @else
        <img src="{{asset('images/YouPost_Logo.png')}}" class="rounded-circle2 mb-3  " alt="Avatar" />
        @endif
        <div class="input_lb all_social_platformCnt" style=" background:none;">
            <div class="account-info">
                <label for="" class="user_detail">Organization Name <img src="{{asset('images/infoinfoinfo.png')}}" class="delete_account" /></label>
                <div class="delete_input">
                    <input type="text" value="{{$account->name}}" data-account="{{$account->id}}"
                        placeholder="Organization Name" class="account-detail account_name" maxlength="18"
                        oninput="countCharacters()">
                    <div class="counter_numeric">
                        <p><span class="charCount">0/18</span></p>
                    </div>
                </div>
                <!-- <form action="{{ route('account-delete',$account->id) }}" method="POST">
                    @csrf
                    @method('Post')


                        <div class="index_delete" id="deleteindex">
                        <button type="button" class="btn btn-danger delete_accountbtn">
                            <img src="{{asset('images/deletebuckit.png')}}" class="delete_account" />
                        </button>
                        </div>
                </form> -->
            </div>
            <!-- <div class="maxchar">
                <p><span class="charCount">0/18</span></p>
            </div> -->
        </div>
        <div class="switch_account">
            <span>Switch on & connect social platform</span>

        </div>
        <div style="margin-top:40px; padding-bottom:20px">
            <div class="all_social_platform justify-content-evenly flex-fill platform_icongp"
                style="gap: 0 23px; background:none;">
                <div class="single_platform  {{ in_array('Facebook', $account->platforms) ? 'showColorIcon' : '' }}">
                    <div class="social_icon social_icon_fb">
                        <img src="{{asset('images/social-iconfb-clr.png')}}" class="color_icon " alt=""
                            style="height:32px;">
                        <img src="{{asset('images/social_iconfbblack.png')}}" class="black_icon " alt=""
                            style="height:32px;">
                    </div>
                    <div></div>
                    <label class="switch" style="margin-top: 19px;">
                        <input type="checkbox" class="customCheckbox plateform fbCheckbox" value="Facebook"
                            data-account="{{$account->id}}" name="plateform[{{$account->id}}]" id="checkboxId"
                            {{ in_array('Facebook', $account->platforms) ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                    <!-- <button type="button" id="Facebookbtn"
                        class="fb-recont_btn  btn  {{ in_array('Facebook', $account->platforms) ? '' : 'd-none' }}"
                        value="Facebook" data-account="{{$account->id}}" name="plateform[{{$account->id}}]">
                        Reconnect</button> -->

                    <a class="fb-recont_btn {{ in_array('Facebook', $account->platforms) &&
                        $account->fb_access_token != null  ? '' : 'd-none' }} r_btn"
                        href="{{ url('connect_to_facebook', ['account' => $account->id]) }}">
                        <span class="reconnect_platform"> Reconnect</span>

                        <span class="tooltiptext_fb">Click here to connect a different facebook account</span>


                    </a>

                    <a class="fb-conect_btn {{ in_array('Facebook', $account->platforms) &&
                        $account->fb_access_token == null  ? 'showColorIcon' : 'd-none' }}"
                        href="{{ url('connect_to_facebook', ['account' => $account->id]) }}">
                        <span class="linkedbtnabc">Connect</span>
                    </a>
                    <!-- <button type="button" class="fb-conect_btn {{ in_array('Facebook', $account->platforms) ? 'showColorIcon' : 'd-none' }}">Connect</button> -->
                </div>
                <div class="single_platform {{ in_array('Instagram', $account->platforms) ? 'showColorIcon' : '' }}">
                    <div class="social_icon social_icon_insta pb-1">
                        <img src="{{asset('images/Instagram_Color.png')}}" class="color_icon" alt=""
                            style="  height: 28px;" />
                        <img src="{{asset('images/Instagram_Black.png')}}" class="black_icon" alt=""
                            style="height:28;" />
                    </div>
                    <label class="switch" style="margin-top: 19px;">
                        <input type="checkbox" class="customCheckbox plateform instCheckbox" value="Instagram"
                            data-account="{{$account->id}}" name="plateform[{{$account->id}}]"
                            {{ in_array('Instagram', $account->platforms) ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>


                    <a class="instrecont_btn   {{ in_array('Instagram', $account->platforms) &&
                        $account->insta_access_token != null  ? '' : 'd-none' }} r_btn"
                        href="{{ url('connect_to_instagram', ['account' => $account->id]) }}">
                        <span class="reconnect_platform"> Reconnect</span>

                        <span class="tooltiptext_inst">Click here to connect a different Instagram account</span>

                    </a>
                    <a class="instconect_btn {{ in_array('Instagram', $account->platforms) &&
                        $account->insta_access_token == null  ? '' : 'd-none' }}"
                        href="{{ url('connect_to_instagram', ['account' => $account->id]) }}">
                        <span class="linkedbtnabc"> Connect</span>
                    </a>

                </div>
                <div class="single_platform {{ in_array('Twitter', $account->platforms) ? 'showColorIcon' : '' }}">
                    <div class="social_icon" style="padding-bottom:2px;">
                        <img src="{{asset('images/Twitter_Color.png')}}" class="color_icon" alt="" />
                        <img src="{{asset('images/Twitter_Black.png')}}" class="black_icon" alt="" />
                    </div>
                    <label class="switch" style="margin-top: 19px;">
                        <input type="checkbox" class="customCheckbox plateform TwtCheckbox" value="Twitter"
                            data-account="{{$account->id}}" name="plateform[{{$account->id}}]"
                            {{ in_array('Twitter', $account->platforms) ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>



                    <a class="T-recont_btn {{
                        in_array('Twitter', $account->platforms) &&
                        $account->twiter_access_token != null  ? '' : 'd-none' }} r_btn"
                        href="{{ url('connect_twitter', ['account' => $account->id]) }}">
                        <span class="reconnect_platform">
                            Reconnect</span>

                        <span class="tooltiptext_tw">Click here to connect a different Twitter account</span>

                    </a>

                    <a class="T-conect_btn {{ in_array('Twitter', $account->platforms) &&
                        $account->twiter_access_token ==  null  ? '' : 'd-none' }}"
                        href="{{ url('connect_twitter', ['account' => $account->id]) }}">
                        <span class="linkedbtnabc">
                            Connect</span>
                    </a>

                </div>
                <div class="single_platform  {{ in_array('Linkedin', $account->platforms) ? 'showColorIcon' : '' }}">
                    <div class="social_icon pb-1" style="padding-bottom: 2px;">
                        <img src="{{asset('images/Linkedin_Color.png')}}" class="color_icon" alt=""
                            style="height:27px" />
                        <img src="{{asset('images/Linkedin_Black.png')}}" class="black_icon" alt=""
                            style="height:27px" />
                    </div>
                    <label class="switch" id="{{$account->id}}" style="margin-top: 19px;">
                        <input type="checkbox" class="customCheckbox plateform LinkCheckbox" value="Linkedin"
                            data-account="{{$account->id}}" name="plateform[{{$account->id}}]"
                            {{ in_array('Linkedin', $account->platforms) ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                    <a class="l_recont_btn {{
                        in_array('Linkedin', $account->platforms) &&
                        $account->linkedin_accesstoken != null &&
                        $account->linkedin_user_id != null
                        ? '' : 'd-none'
                    }} r_btn" href="{{ url('connect_to_linkedin', ['account' => $account->id]) }}">
                        <span class="reconnect_platform"> Reconnect</span>
                        <span class="tooltiptext_link">Click here to connect a different Linkedin account</span>
                    </a>
                    <a class="l-conect_btn {{
                        in_array('Linkedin', $account->platforms)
                        && $account->linkedin_accesstoken == null
                        &&  $account->linkedin_user_id == null ? '' : 'd-none' }}"
                        href="{{ url('connect_to_linkedin', ['account' => $account->id]) }}">
                        <span class="linkedbtnabc"> Connect</span>
                    </a>
                </div>
                <div class="single_platform d-none" style="">
                    <div class="social_icon" style="padding-bottom: 9px;">
                        <img src="{{asset('images/Youtube_Color.png')}}" class="color_icon" alt=""
                            style="    height: 21px;" />
                        <img src="{{asset('images/Youtube_Black.png')}}" class="black_icon" alt=""
                            style="    height: 21px;" />
                    </div>
                    <label class="switch" style="margin-top: 19px;">
                        <input type="checkbox" class="customCheckbox" disabled>
                        <span class="slider round"></span>
                    </label>

                </div>
                <!-- <div class="single_platform" style="">
                    <div class="social_icon" style="padding-bottom: 6px;">
                        <img src="{{asset('images/Telegram_Color.png')}}" class="color_icon" alt=""
                            style="height: 23px;" />
                        <img src="{{asset('images/Telegram_Black.png')}}" class="black_icon" alt=""
                            style="height: 23px;" />
                    </div>
                    <label class="switch" style="margin-top: 19px;">
                        <input type="checkbox" class="customCh
                        eckbox" disabled>
                        <span class="slider round"></span>
                    </label>

                </div> -->
            </div>
        </div>

        <button class="btn btn-primary mt-3 mb-4 fw-bold createPostBtn" data-account="{{$account->id}}"><img
                src="{{asset('images/sum-icon.svg')}}" style=" padding-right: 5px; width: 22px;
            height: 16px;" id="createPostBtn">Create a post</button>
    </div>
</div>
<!-- modal -->
<div class="modal fade delete" id="delaccountModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel"
    aria-hidden="true">
    <div class="modal-dialog del-account modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header md-head">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="hidden_account_id" name="hidden_account_id" id="hidden_account_id" value=''>
                <div class="alert_generate">
                    <img src="{{asset('images/errrorpostsmsg.png')}}" alt="">
                </div>
                <div class="inner_msg">
                <h2 class="text-alert">Are you sure you want to delete your Organization?</h2>
    <label class="text-delmsg">Type the word 'YES' to confirm</label>
    <input type="text" class="form-control mt-3" id="inputText" autocomplete="off">
                </div>

                <div class="mt-4 text-center">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary text-white ml-2 deleteBtn" id="deleteBtn" disabled>Confirm</button>
                </div>
            </div>

        </div>
    </div>
</div>
<!--  -->
@endforeach
<script>
$(document).ready(function(){
    $('.delete_account').tooltip({
        title: 'Organization Name refers to how we categorize your social accounts for seamless organization.<br><br>In your trial account, you can create up to 10 organizations, each capable of connecting to all four major social platforms.',
        html: true,
        placement: 'top'
    });
});
</script>
<script>
$(document).ready(function() {
    $('[data-bs-target="#delaccountModal"]').click(function() {
        var accountId = $(this).data('id-account');
        $('#hidden_account_id').val(accountId);
    });
    $('.deleteBtn').click(function() {
        // Get the account ID
        var accountId = $(this).closest('.modal').find('.hidden_account_id').val();

        $('#delaccountModal').modal('hide');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post",
            url: "{{ route('account-delete')}}",
            data: {
                accountId: accountId
            },
            success: function(response) {

                RefresehAccounts();
                Swal.fire({
                    title: 'Success!',
                    text: 'Your Organization has been deleted.',
                    icon: 'success'
                    }).then((result) => {
                        // Check if the user clicked "OK"
                        if (result.isConfirmed || result.isDismissed) {
                            // Reload the page
                            window.location.href = '/index';
                        }
                    });


                // Close the modal
            },
            error: function(error) {
                // Handle error if needed
                console.error('Error:', error);
                // Show error message in modal
                // $('.alert_generate').show();
            }
        });
    });
});

$('.createPostBtn').click(function() {
    var accountId = $(this).data('account');
    // event.preventDefault();
    //     var inputs = $(".all_social_platformCnt input");
    //     var isEmpty = false;
    //     inputs.each(function() {
    //         var tooltip = this.nextElementSibling; // Get the tooltip span
    //         if ($(this).val().trim() === "") {
    //             isEmpty = true;
    //             $(this).addClass("empty-input");
    //         } else {
    //             $(this).removeClass("empty-input");
    //         }
    //     });
    //     if (isEmpty) {
    //         inputs.each(function() {
    //             if ($(this).val().trim() === "") {
    //                 $(this).focus();
    //                 return false; // Stop after focusing on the first empty input
    //             }
    //         });
    //     } else {
            window.location.href = "{{ route('user.create-posts', ['id' => ':accountId']) }}".replace(':accountId', accountId);
    // }

});
</script>
<script>
$(document).ready(function() {
    // Get references to the input and delete button
    const $inputText = $('#inputText');
    const $deleteBtn = $('#deleteBtn');
    // Add an input event listener to the text input
    $inputText.on('input', function() {
        // Check if the input value is exactly "YES" in uppercase
        const isInputValid = $inputText.val().trim() === 'YES';
        // Enable or disable the delete button based on the validation result
        $deleteBtn.prop('disabled', !isInputValid);
    });
});
</script>
<script>
$(document).ready(function() {
    // Enable Bootstrap tooltips
    $('[data-toggle="tooltip"]').tooltip();
});
$(document).ready(function() {
    // Get all elements with the class 'account_name'
    var inputFields = $('.account_name');

    // Iterate through each input field
    inputFields.on('input', function() {
        countCharacters($(this)); // Pass the current input field to the function
    });

    // Initialize character count on page load
    inputFields.each(function() {
        countCharacters($(this));
    });
});
// You can add this script in your existing script tag or in a separate script file

document.getElementById('deleteAccountIcon').addEventListener('mouseover', function() {
    document.getElementById('deleteAccountTooltip').innerHTML = 'Your Tooltip Text Here';
});


function countCharacters(inputField) {
    // Get the maximum allowed characters
    var maxLength = 18;

    // Update the character count for the specific input field
    var charCount = inputField.val().length;

    // Update the character count and format "0/18"
    inputField.closest('.delete_input').find('.counter_numeric .charCount').text(charCount + "/" + maxLength);
}
</script>
