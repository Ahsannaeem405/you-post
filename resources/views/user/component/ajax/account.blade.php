<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@200;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,500&family=Work+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap');

.index_delete {
    text-align: right !important;
}

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
                              @if(in_array("Facebook",  $account->platforms))
                                <img src="{{auth()->user()->account->fb_image}}" class="v_icon" alt="" width="45px" />
                                @elseif(in_array("Instagram",  $account->platforms))
                                <img src="{{ auth()->user()->account->inst_image}}" class="v_icon" alt="" width="45px" />
                                
                                @elseif(in_array("Twitter", $account->platforms))
                                <img src="{{auth()->user()->account->twt_image}}" class="v_icon" alt="" width="45px" />
                                @elseif(in_array("Linkedin", $account->platforms))
                                <img src="{{ auth()->user()->account->link_image}}" class="v_icon" alt="" width="45px" />
                                @else                      
                                <img src="{{asset('images/admin.png')}}" class="rounded-circle mb-3" style="width: 150px; margin-top:
                                30px" alt="Avatar" />
                                @endif                
         <div style="position:relative; margin-top:40px" class="input_lb all_social_platformCnt">
            <label for="" style="color: #959595; font-size: 12px; font-family: Poppins; font-weight: 300; letter-spacing: 1.2px; left: left: 25%;;
            position: absolute;top: -8px; background:#fff; padding-left: 5px;
            padding-right: 5px;">Account Name</label>
            <input type="text" value="{{$account->name}}" data-account="{{$account->id}}" placeholder="Account Name"
                style="width: 50%; padding: 10px 15px; outline:none; border-color:#D6D6D6;   font-weight:400;  border: 1px solid#D6D6D6; border-radius:9px;"
                class="account-detail account_name">
            <form action="{{ route('account-delete',$account->id) }}" method="POST">
                @csrf
                @method('Post')
                <div class="index_delete"><button type="button" class="btn btn-danger" style="margin-left:15px;"><img
                            src="{{asset('images/deletebuckit.png')}}" style="width:20px; height:20px" /></button>
                </div>
            </form>
        </div>
        <div style="margin-top:50px;">
            <span style="color: #2F2F2F;text-align: center;font-family: Poppins;font-size: 16px;font-style: normal;font-weight: 400; text-align:center;
          line-height: normal;">Switch on & connect social platform for Facebook, Instagram, etc....</span>

        </div>
        <div style="margin-top:40px; padding-bottom:20px">
            <div class="all_social_platform" style="gap: 0 23px; background:none;">
                <div class="single_platform  {{ in_array('Facebook', $account->platforms) ? 'showColorIcon' : '' }}">
                    <div class="social_icon social_icon_fb">
                        <img src="http://127.0.0.1:8000/images/social-iconfb-clr.png" class="color_icon " alt="">
                        <img src="http://127.0.0.1:8000/images/social_iconfbblack.png" class="black_icon " alt="">
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox plateform" value="Facebook"
                            data-account="{{$account->id}}" name="plateform[{{$account->id}}]" id="checkboxId"
                            {{ in_array('Facebook', $account->platforms) ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="single_platform {{ in_array('Instagram', $account->platforms) ? 'showColorIcon' : '' }}">
                    <div class="social_icon social_icon_insta pb-1">
                        <img src="{{asset('images/Instagram_Color.png')}}" class="color_icon" alt="" />
                        <img src="{{asset('images/Instagram_Black.png')}}" class="black_icon" alt="" />
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox plateform" value="Instagram"
                            data-account="{{$account->id}}" name="plateform[{{$account->id}}]"
                            {{ in_array('Instagram', $account->platforms) ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="single_platform {{ in_array('Twitter', $account->platforms) ? 'showColorIcon' : '' }}">
                    <div class="social_icon" style="padding-bottom:2px;">
                        <img src="{{asset('images/Twitter_Color.png')}}" class="color_icon" alt="" />
                        <img src="{{asset('images/Twitter_Black.png')}}" class="black_icon" alt="" />
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox plateform" value="Twitter"
                            data-account="{{$account->id}}" name="plateform[{{$account->id}}]"
                            {{ in_array('Twitter', $account->platforms) ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="single_platform {{ in_array('Linkedin', $account->platforms) ? 'showColorIcon' : '' }}">
                    <div class="social_icon pb-1" style="padding-bottom: 2px;">
                        <img src="{{asset('images/Linkedin_Color.png')}}" class="color_icon" alt="" />
                        <img src="{{asset('images/Linkedin_Black.png')}}" class="black_icon" alt="" />
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox plateform" value="Linkedin"
                            data-account="{{$account->id}}" name="plateform[{{$account->id}}]"
                            {{ in_array('Linkedin', $account->platforms) ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="single_platform">
                    <div class="social_icon" style="padding-bottom: 9px;">
                        <img src="{{asset('images/Youtube_Color.png')}}" class="color_icon" alt="" />
                        <img src="{{asset('images/Youtube_Black.png')}}" class="black_icon" alt="" />
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox" disabled>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="single_platform">
                    <div class="social_icon" style="padding-bottom: 6px;">
                        <img src="{{asset('images/Telegram_Color.png')}}" class="color_icon" alt="" />
                        <img src="{{asset('images/Telegram_Black.png')}}" class="black_icon" alt="" />
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox" disabled>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  -->
@endforeach