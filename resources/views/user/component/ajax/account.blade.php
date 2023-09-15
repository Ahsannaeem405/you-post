<style>
    .index_delete{
        text-align:right !important;
    }
</style>
@foreach($accounts as $key=>$account)
    <div id="elementToEmbed">
        <h5 class="all_social_platformTitle">Account #{{$key+1}} : {{$account->name}}</h5>
        <div class="all_social_platformMain">

            <div class="all_social_platformCnt">
        <form action="{{ route('account-delete',$account->id) }}" method="POST">
            @csrf
            @method('Post')
           <div class="index_delete">
               <button type="submit"> <i class="fa-solid fa-trash"></i></button>

          </div>
           </form>

                <div class="all_social_platformCntInner">
                    <label for="">1.Name,Example:“Tito’sTacos”</label>
                    <br>
                    <input type="text" class="account_name" name="" id="" value="{{$account->name}}"
                           placeholder="Organization Name" data-account="{{$account->id}}">
                </div>

                <div class="all_social_platformCntInner">
                    <label for="">2.Switch on & connect social post platforms for “Tito’sTacos” : FaceBook,
                        Instagram, etc...
                    </label>
                </div>
            </div>

            <!-- <div class="all_social_platform">
                <div class="single_platform {{ in_array('Facebook', $account->platforms) ? 'showColorIcon' : '' }}">
                    <div class="social_icon social_icon_fb">
                        <img src="{{asset('images/FB_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/FB_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox"  class="customCheckbox plateform" value="Facebook" data-account="{{$account->id}}" name="plateform[{{$account->id}}]" id="checkboxId"  {{ in_array('Facebook', $account->platforms) ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="single_platform {{ in_array('Instagram', $account->platforms) ? 'showColorIcon' : '' }}">
                    <div class="social_icon">
                        <img src="{{asset('images/Instagram_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Instagram_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox"   class="customCheckbox plateform" value="Instagram" data-account="{{$account->id}}" name="plateform[{{$account->id}}]" {{ in_array('Instagram', $account->platforms) ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="single_platform {{ in_array('Twitter', $account->platforms) ? 'showColorIcon' : '' }}">
                    <div class="social_icon">
                        <img src="{{asset('images/Twitter_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Twitter_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox"  class="customCheckbox plateform" value="Twitter" data-account="{{$account->id}}" name="plateform[{{$account->id}}]" {{ in_array('Twitter', $account->platforms) ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="single_platform {{ in_array('Linkedin', $account->platforms) ? 'showColorIcon' : '' }}">
                    <div class="social_icon">
                        <img src="{{asset('images/Linkedin_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Linkedin_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox plateform" value="Linkedin" data-account="{{$account->id}}" name="plateform[{{$account->id}}]" {{ in_array('Linkedin', $account->platforms) ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Tiktok_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Tiktok_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox" disabled>
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Youtube_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Youtube_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox" disabled>
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Telegram_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Telegram_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox" disabled>
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/WhatsApp_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/WhatsApp_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox" disabled>
                        <span class="slider round"></span>
                    </label>
                </div>


            </div> -->
            <div class="all_social_platform" style="gap: 0 23px;">
                <div class="single_platform {{ in_array('Facebook', $account->platforms) ? 'showColorIcon' : '' }}">
                    <div class="social_icon social_icon_fb">
                        <img src="{{asset('images/social-iconfb-clr.png')}}" class="color_icon " alt=""/>
                        <img src="{{asset('images/social_iconfbblack.png')}}" class="black_icon " alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox"  class="customCheckbox plateform" value="Facebook" data-account="{{$account->id}}" name="plateform[{{$account->id}}]" id="checkboxId"  {{ in_array('Facebook', $account->platforms) ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="single_platform {{ in_array('Instagram', $account->platforms) ? 'showColorIcon' : '' }}">
                    <div class="social_icon social_icon_insta pb-1">
                        <img src="{{asset('images/Instagram_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Instagram_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox"   class="customCheckbox plateform" value="Instagram" data-account="{{$account->id}}" name="plateform[{{$account->id}}]" {{ in_array('Instagram', $account->platforms) ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="single_platform {{ in_array('Twitter', $account->platforms) ? 'showColorIcon' : '' }}">
                    <div class="social_icon" style="padding-bottom:2px;">
                        <img src="{{asset('images/Twitter_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Twitter_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox"  class="customCheckbox plateform" value="Twitter" data-account="{{$account->id}}" name="plateform[{{$account->id}}]" {{ in_array('Twitter', $account->platforms) ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="single_platform {{ in_array('Linkedin', $account->platforms) ? 'showColorIcon' : '' }}">
                    <div class="social_icon pb-1" style="padding-bottom: 2px;">
                        <img src="{{asset('images/Linkedin_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Linkedin_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox plateform" value="Linkedin" data-account="{{$account->id}}" name="plateform[{{$account->id}}]" {{ in_array('Linkedin', $account->platforms) ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Tiktok_Color.png')}}" class="color_icon" alt="" style="padding-bottom:2px"/>
                        <img src="{{asset('images/Tiktok_Black.png')}}" class="black_icon" alt="" style="padding-bottom:2px"/>
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox" disabled>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="single_platform">
                    <div class="social_icon" style="padding-bottom: 9px;">
                        <img src="{{asset('images/Youtube_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Youtube_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox" disabled>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="single_platform">
                    <div class="social_icon"style="padding-bottom: 6px;">
                        <img src="{{asset('images/Telegram_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Telegram_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox" disabled>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="single_platform">
                    <div class="social_icon" style="padding-bottom: 2px;">
                        <img src="{{asset('images/WhatsApp_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/WhatsApp_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox" disabled>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>

        </div>
    </div>
@endforeach
