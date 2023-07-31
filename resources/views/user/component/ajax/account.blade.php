@foreach($accounts as $key=>$account)
    <div id="elementToEmbed">
        <h5 class="all_social_platformTitle">Account #{{$key+1}} : {{$account->name}}</h5>
        <div class="all_social_platformMain">

            <div class="all_social_platformCnt">
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

            <div class="all_social_platform">
                <div class="single_platform {{ in_array('Facebook', $account->platforms) ? 'showColorIcon' : '' }}">
                    <div class="social_icon">
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


            </div>

        </div>
    </div>
@endforeach
