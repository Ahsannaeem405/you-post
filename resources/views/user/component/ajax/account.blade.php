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
    width: 150px;
    margin-top: 30px
}

.input_lb {
    position: relative;
    margin-top: 40px
}

.user_detail {
    color: #959595;
    font-size: 12px;
    font-family: 'Poppins', sans-serif;
    font-weight: 300;
    letter-spacing: 1.2px;
    left: 27%;
    position: absolute;
    top: 30px;
    background: #fff;
    padding-left: 5px;
    padding-right: 5px;

}

.account-detail {
    width: 50%;
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

.single_platform{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.fb-conect_btn, .fb-recont_btn,.l-conect_btn,.l_recont_btn,.T-conect_btn,.T-recont_btn,.instrecont_btn,.instrecont_btn{
    margin-top:10px;
    border-radius: 30px;
    border:none;
}

/* main account file styling */
@media (max-width:992px) {
    .all_social_platformWrp {
        width: 62%;
    }
}

@media (min-width:320px) and (max-width:576px) {
    .input_lb {
        display: flex;
        flex-direction: column;
    }

    .account-detail {
        width: 100% !important;
        margin-bottom: 20px;
    }
}
</style>
@foreach($accounts as $key=>$account)
<!--24,,10,23,  -->
<div class="account_main">
    <div>
        @if(in_array("Facebook", $account->platforms))
        <img src="{{auth()->user()->account->fb_image}}" class="v_icon rounded-circle mb-3" alt=""/>
        @elseif(in_array("Instagram", $account->platforms))
        <img src="{{ auth()->user()->account->inst_image}}" class="v_icon rounded-circle mb-3" alt=""/>

        @elseif(in_array("Twitter", $account->platforms))
        <img src="{{auth()->user()->account->twt_image}}" class="v_icon rounded-circle mb-3" alt=""/>
        @elseif(in_array("Linkedin", $account->platforms))
        <img src="{{ auth()->user()->account->link_image}}" class="v_icon rounded-circle mb-3" alt=""/>
        @else
        <img src="{{asset('images/admin.png')}}" class="rounded-circle mb-3"  alt="Avatar" />
        @endif
        <div  class="input_lb all_social_platformCnt" style=" background:none;">
            <label for="" class="user_detail">Account Name</label>
            <div style="display:flex; justify-content:center;">
            <input type="text" value="{{$account->name}}" data-account="{{$account->id}}" placeholder="Account Name"
                class="account-detail account_name">
            <form action="{{ route('account-delete',$account->id) }}" method="POST">
                @csrf
                @method('Post')
                <div class="index_delete"><button type="button" class="btn btn-danger" ><img
                            src="{{asset('images/deletebuckit.png')}}"  class="delete_account"/></button>
                </div>
            </form>
            </div>
        </div>
        <div class="switch_account">
            <span >Switch on & connect social platform for Facebook, Instagram, etc....</span>

        </div>
        <div style="margin-top:40px; padding-bottom:20px">
            <div class="all_social_platform justify-content-evenly" style="gap: 0 23px; background:none;">
                <div class="single_platform  {{ in_array('Facebook', $account->platforms) ? 'showColorIcon' : '' }}">
                    <div class="social_icon social_icon_fb">
                        <img src="{{asset('images/social-iconfb-clr.png')}}" class="color_icon " alt="" style="height:32px;">
                        <img src="{{asset('images/social_iconfbblack.png')}}" class="black_icon " alt="" style="height:32px;">
                    </div>
                    <div></div>
                    <label class="switch" style="margin-top: 19px;">
                        <input type="checkbox" class="customCheckbox plateform fbCheckbox" value="Facebook"
                            data-account="{{$account->id}}" name="plateform[{{$account->id}}]" id="checkboxId"
                            {{ in_array('Facebook', $account->platforms) ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                    <button type="button" class="btn btn-primary fb-recont_btn">Reconnect</button>
                    <button type="button" class="fb-conect_btn">Connect</button>
                </div>
                
                   
                    
                <div class="single_platform {{ in_array('Instagram', $account->platforms) ? 'showColorIcon' : '' }}">
                    <div class="social_icon social_icon_insta pb-1">
                        <img src="{{asset('images/Instagram_Color.png')}}" class="color_icon" alt="" style="  height: 28px;"/>
                        <img src="{{asset('images/Instagram_Black.png')}}" class="black_icon" alt="" style="height:28;"/>
                    </div>
                    <label class="switch" style="margin-top: 19px;">
                        <input type="checkbox" class="customCheckbox plateform instCheckbox" value="Instagram"
                            data-account="{{$account->id}}" name="plateform[{{$account->id}}]"
                            {{ in_array('Instagram', $account->platforms) ? 'checked' : '' }} >
                        <span class="slider round"></span>
                    </label>
                    
                    <button type="button" class="btn btn-primary instrecont_btn">Reconnect</button>
                    
                    <button type="button" class="instconect_btn">Connect</button>
                    
                </div>
                <div class="single_platform {{ in_array('Twitter', $account->platforms) ? 'showColorIcon' : '' }}">
                    <div class="social_icon" style="padding-bottom:2px;">
                        <img src="{{asset('images/Twitter_Color.png')}}" class="color_icon" alt="" />
                        <img src="{{asset('images/Twitter_Black.png')}}" class="black_icon" alt="" />
                    </div>
                    <label class="switch" style="margin-top: 19px;">
                        <input type="checkbox" class="customCheckbox plateform TwtCheckbox" value="Twitter"
                            data-account="{{$account->id}}" name="plateform[{{$account->id}}]"
                            {{ in_array('Twitter', $account->platforms) ? 'checked' : '' }} >
                        <span class="slider round"></span>
                    </label>
                  
                    <button type="button" class="btn btn-primary T-recont_btn">Reconnect</button>
                    
                    
                    <button type="button"class="T-conect_btn" >Connect</button>
                    
                </div>
                <div class="single_platform {{ in_array('Linkedin', $account->platforms) ? 'showColorIcon' : '' }}">
                    <div class="social_icon pb-1" style="padding-bottom: 2px;">
                        <img src="{{asset('images/Linkedin_Color.png')}}" class="color_icon" alt="" style="height:27px"/>
                        <img src="{{asset('images/Linkedin_Black.png')}}" class="black_icon" alt="" style="height:27px"/>
                    </div>
                    <label class="switch" style="margin-top: 19px;">
                        <input type="checkbox" class="customCheckbox plateform LinkCheckbox" value="Linkedin"
                            data-account="{{$account->id}}" name="plateform[{{$account->id}}]"
                            {{ in_array('Linkedin', $account->platforms) ? 'checked' : '' }} >
                        <span class="slider round"></span>
                    </label>
                    
                    <button type="button" class="btn btn-primary l_recont_btn">Reconnect</button>
                    
                    <button type="button" class="l-conect_btn">Connect</button>
                    
                </div>
                <div class="single_platform" style="margin-bottom: 42px;">
                    <div class="social_icon" style="padding-bottom: 9px;">
                        <img src="{{asset('images/Youtube_Color.png')}}" class="color_icon" alt="" style="    height: 21px;"/>
                        <img src="{{asset('images/Youtube_Black.png')}}" class="black_icon" alt="" style="    height: 21px;"/>
                    </div>
                    <label class="switch" style="margin-top: 19px;">
                        <input type="checkbox" class="customCheckbox" disabled>
                        <span class="slider round"></span>
                    </label>
                    <button type="button" class="btn btn-primary" style="opacity:0;">Reconnect</button>
                 
                </div>
                <div class="single_platform" style="margin-bottom: 42px;">
                    <div class="social_icon" style="padding-bottom: 6px;">
                        <img src="{{asset('images/Telegram_Color.png')}}" class="color_icon" alt="" style="height: 23px;"/>
                        <img src="{{asset('images/Telegram_Black.png')}}" class="black_icon" alt="" style="height: 23px;"/>
                    </div>
                    <label class="switch" style="margin-top: 19px;">
                        <input type="checkbox" class="customCheckbox" disabled>
                        <span class="slider round"></span>
                    </label>
                    <button type="button" class="btn btn-primary" style="opacity:0;">Reconnect</button>
              
                </div>
            </div>
        </div>
    </div>
</div>

<!--  -->
@endforeach
<script>
$(document).ready(function() {
    var fbCheckbox = $(".fbCheckbox");
    var instCheckbox = $(".instCheckbox");
    var TwtCheckbox = $(".TwtCheckbox");
    var LinkCheckbox = $(".LinkCheckbox");
    var reconnectButtonfb = $(".fb-recont_btn");
    var reconnectButtoninst = $(".instrecont_btn");
    var reconnectButtontwt = $(".T-recont_btn");
    var reconnectButtonLink = $(".l_recont_btn");
    var connectButtonfb = $(".fb-conect_btn");
    var connectButtoninst = $(".instconect_btn");
    var connectButtontwt = $(".T-conect_btn");
    var connectButtonLink = $(".l-conect_btn");

    // Function to toggle the visibility of the buttons based on the checkbox state
    function toggleButtonVisibility(checkbox, reconnectButton, connectButton) {
        if (checkbox.prop("checked")) {
            reconnectButton.show();
            connectButton.hide();
        } 
        else {
            reconnectButton.hide();
            connectButton.show();
        }
    }

    // Initially set the visibility of buttons for each checkbox
    toggleButtonVisibility(fbCheckbox, reconnectButtonfb, connectButtonfb);
    toggleButtonVisibility(instCheckbox, reconnectButtoninst, connectButtoninst);
    toggleButtonVisibility(TwtCheckbox, reconnectButtontwt, connectButtontwt);
    toggleButtonVisibility(LinkCheckbox, reconnectButtonLink, connectButtonLink);

    // Add event listeners to each checkbox to toggle the button visibility
    fbCheckbox.change(function() {
        toggleButtonVisibility(fbCheckbox, reconnectButtonfb, connectButtonfb);
    });

    instCheckbox.change(function() {
        toggleButtonVisibility(instCheckbox, reconnectButtoninst, connectButtoninst);
    });

    TwtCheckbox.change(function() {
        toggleButtonVisibility(TwtCheckbox, reconnectButtontwt, connectButtontwt);
    });

    LinkCheckbox.change(function() {
        toggleButtonVisibility(LinkCheckbox, reconnectButtonLink, connectButtonLink);
    });
});
</script>
