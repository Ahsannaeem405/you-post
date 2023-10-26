<style>
.index_delete {
    text-align: right !important;
}
@media (max-width:992px){
    .all_social_platformWrp{
        width: 62%;
    }
}
@media (min-width:320px) and (max-width:576px) {
   .input_lb{
    display:flex;
    flex-direction:column;
   }
   .account-detail{
    width:100% !important;
    margin-bottom:20px;
   }
}
</style>
@foreach($accounts as $key=>$account)
<div id="elementToEmbed" class="d-none">
    <h5 class="all_social_platformTitle">Account #{{$key+1}} : {{$account->name}}</h5>
    <div class="all_social_platformMain">

        <div class="all_social_platformCnt">

            <div class="all_social_platformCntInner">
                <label for="">1.Name,Example:“Tito’sTacos”</label>
                <br>
                <div class="d-flex justify-content-between">
                    <input type="text" class="account_name" name="" id="" value="{{$account->name}}"
                        placeholder="Organization Name" data-account="{{$account->id}}">
                    <!-- <span class="tooltiptext" style="visibility:hidden">This field is empty</span> -->

                    <form action="{{ route('account-delete',$account->id) }}" method="POST">
                        @csrf
                        @method('Post')
                        <div class="index_delete">
                            <button type="button" class="btn btn-danger"> <i
                                    class="fa-solid fa-trash text-white"></i></button>
                        </div>
                    </form>
                </div>




            </div>

            <div class="all_social_platformCntInner">
                <label for="">2.Switch on & connect social post platforms for “Tito’sTacos” : FaceBook,
                    Instagram, etc...
                </label>
            </div>
        </div>


        <div class="all_social_platform" style="gap: 0 23px;">
            <div class="single_platform {{ in_array('Facebook', $account->platforms) ? 'showColorIcon' : '' }}">
                <div class="social_icon social_icon_fb">
                    <img src="{{asset('images/social-iconfb-clr.png')}}" class="color_icon " alt="" />
                    <img src="{{asset('images/social_iconfbblack.png')}}" class="black_icon " alt="" />
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
            <!-- <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Tiktok_Color.png')}}" class="color_icon" alt="" style="padding-bottom:2px"/>
                        <img src="{{asset('images/Tiktok_Black.png')}}" class="black_icon" alt="" style="padding-bottom:2px"/>
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox" disabled>
                        <span class="slider round"></span>
                    </label>
                </div> -->


            <div class="single_platform">
                <div class="social_icon" style="padding-bottom: 2px;">
                    <img src="{{asset('images/WhatsApp_Color.png')}}" class="color_icon" alt="" />
                    <img src="{{asset('images/WhatsApp_Black.png')}}" class="black_icon" alt="" />
                </div>
                <label class="switch">
                    <input type="checkbox" class="customCheckbox" disabled>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>

    </div>
</div>
<!--24,,10,23,  -->
<div style="text-align:center; border-radius: 10px;
border: 0.5px solid #E0E0E0;
background: #FFF;
box-shadow: 0px 0px 20px 0px rgba(129, 129, 129, 0.10);">
    <div>
        <img src="{{asset('images/waleedaccount.svg')}}" class="rounded-circle mb-3" style="width: 150px; margin-top:
        30px"
            alt="Avatar" />
        <div style="position:relative; margin-top:40px" class="input_lb">
            <label for="" style="color: #959595; font-size: 12px; font-family: Poppins; font-weight: 300; letter-spacing: 1.2px; left: left: 25%;;
    position: absolute;top: -8px; background:#fff; padding-left: 5px;
    padding-right: 5px;">Account Name</label>
            <input type="text" value="Waleed Ahmed"
                style="width: 50%; padding: 10px 15px; outline:none; border-color:#D6D6D6;   font-weight:400;  border: 1px solid#D6D6D6; border-radius:9px;" class="account-detail">
            <button type="button" class="btn btn-danger" style="margin-left:15px;"><img
                    src="{{asset('images/deletebuckit.png')}}" style="width:20px; height:20px" /></button>
        </div>
        <div style="margin-top:50px;">
            <span style="color: #2F2F2F;text-align: center;font-family: Poppins;font-size: 16px;font-style: normal;font-weight: 400; text-align:center;
line-height: normal;">Switch on & connect social platform for Facebook, Instagram, etc....</span>

        </div>
        <div style="margin-top:40px; padding-bottom:20px">
            <div class="all_social_platform" style="gap: 0 23px; background:none;">
                <div class="single_platform showColorIcon">
                    <div class="social_icon social_icon_fb">
                        <img src="http://127.0.0.1:8000/images/social-iconfb-clr.png" class="color_icon " alt="">
                        <img src="http://127.0.0.1:8000/images/social_iconfbblack.png" class="black_icon " alt="">
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox plateform" value="Facebook" data-account="7"
                            name="plateform[7]" id="checkboxId" checked="">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="single_platform showColorIcon">
                    <div class="social_icon social_icon_insta pb-1">
                        <img src="http://127.0.0.1:8000/images/Instagram_Color.png" class="color_icon" alt="">
                        <img src="http://127.0.0.1:8000/images/Instagram_Black.png" class="black_icon" alt="">
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox plateform" value="Instagram" data-account="7"
                            name="plateform[7]" checked="">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="single_platform showColorIcon">
                    <div class="social_icon" style="padding-bottom:2px;">
                        <img src="http://127.0.0.1:8000/images/Twitter_Color.png" class="color_icon" alt="">
                        <img src="http://127.0.0.1:8000/images/Twitter_Black.png" class="black_icon" alt="">
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox plateform" value="Twitter" data-account="7"
                            name="plateform[7]" checked="">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="single_platform showColorIcon">
                    <div class="social_icon pb-1" style="padding-bottom: 2px;">
                        <img src="http://127.0.0.1:8000/images/Linkedin_Color.png" class="color_icon" alt="">
                        <img src="http://127.0.0.1:8000/images/Linkedin_Black.png" class="black_icon" alt="">
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox plateform" value="Linkedin" data-account="7"
                            name="plateform[7]" checked="">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="single_platform">
                    <div class="social_icon" style="padding-bottom: 9px;">
                        <img src="http://127.0.0.1:8000/images/Youtube_Color.png" class="color_icon" alt="">
                        <img src="http://127.0.0.1:8000/images/Youtube_Black.png" class="black_icon" alt="">
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox" disabled="">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="single_platform">
                    <div class="social_icon" style="padding-bottom: 6px;">
                        <img src="http://127.0.0.1:8000/images/Telegram_Color.png" class="color_icon" alt="">
                        <img src="http://127.0.0.1:8000/images/Telegram_Black.png" class="black_icon" alt="">
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox" disabled="">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="single_platform">
                    <div class="social_icon" style="padding-bottom: 2px;">
                        <img src="http://127.0.0.1:8000/images/WhatsApp_Color.png" class="color_icon" alt="">
                        <img src="http://127.0.0.1:8000/images/WhatsApp_Black.png" class="black_icon" alt="">
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox" disabled="">
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="text-align:center; margin-top:
30px">
    <button class="btn btn-primary"><img src="{{asset('images/sum-icon.svg')}}" style="    padding-right: 5px; width: 17px;
    height: 13px;;">Add New
        Account</button>

</div>
<!--  -->
@endforeach