<section>
    <header class="header mx-2 mb-2">
        <div class="container">
            <!-- <div class="top">
                <div class="logo_wrap">
                    <div class="logo">
                        <a href="{{url('/')}}"><img src="{{asset('images/YouPost_Logo.png')}}" class="img-fluid"
                                alt="" /></a>
                    </div>
                </div>

                <div class="new_post_button_wrap" style="visibility: hidden">
                    <div class="new_post_button">
                        <a href="javascript:void(0)">+ New Post</a>
                    </div>
                </div>


                <div class="user_info">
                    <a href="javascript:void(0)">
                        <div class="profile_pic">
                            <img src="{{asset('images/avatar-light.png')}}" class="img-fluid" alt="" />
                        </div>

                        <div class="user_name grid_item">
                            <div class="the_name">
                                <span>youpost.social<span class="color">/{{auth()->user()->account->name}}</span></span>


                            </div>
                        </div>
                    </a>
                    <div class="dropdown">
                        <button class="dropdown-toggle bg-transparent border-0" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{asset('')}}images/V_Icon.png" class="v_icon" alt="" width="15px" />
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @foreach($accounts as $account)
                            <li><a class="dropdown-item {{auth()->user()->account_id==$account->id ? 'active' : null}}"
                                    href="{{url("change_acount/".encrypt($account->id))}}"><i
                                        class="fa-solid fa-user"></i> {{$account->name}}</a></li>
                            @endforeach
                            <li><a class="dropdown-item" style="cursor: pointer" data-bs-toggle="modal"
                                    data-bs-target="#addAccount">Add Account <i
                                        class="fa-solid fa-plus text-success"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div> -->

            <div class="bottom">
                <div class="select_the_platform grid_item">
                    <h5>Select the platforms to post on:</h5>
                </div>

                <div class="all_social_platform all_social_platform2">
                    <div class="single_platform">
                        <div class="social_icon">
                            <img src="{{asset('images/FB_Color.png')}}" class="color_icon" alt="" />
                            <img src="{{asset('images/FB_Black.png')}}" class="black_icon" alt="" />
                        </div>
                        <input type="checkbox" class="plateform" name="plateform[]"
                            data-account="{{auth()->user()->account_id}}" value="Facebook" id="socialFB"
                            {{ in_array('Facebook', auth()->user()->account->platforms) ? 'checked' : '' }}>
                        <label for="socialFB"></label>
                    </div>

                    <div class="single_platform">
                        <div class="social_icon">
                            <img src="{{asset('images/Instagram_Color.png')}}" class="color_icon" alt="" />
                            <img src="{{asset('images/Instagram_Black.png')}}" class="black_icon" alt="" />
                        </div>
                        <input type="checkbox" class="plateform instagram_modal"
                            data-account="{{auth()->user()->account_id}}" name="plateform[]" value="Instagram"
                            id="socialInstagram"
                            {{ in_array('Instagram', auth()->user()->account->platforms) ? 'checked' : '' }}>
                        <label for="socialInstagram"></label>
                    </div>

                    <div class="single_platform">
                        <div class="social_icon">
                            <img src="{{asset('images/Twitter_Color.png')}}" class="color_icon" alt="" />
                            <img src="{{asset('images/Twitter_Black.png')}}" class="black_icon" alt="" />
                        </div>

                        <input type="checkbox" class="plateform" name="plateform[]"
                            data-account="{{auth()->user()->account_id}}" value="Twitter" id="socialTwitter"
                            {{ in_array('Twitter', auth()->user()->account->platforms) ? 'checked' : '' }}>
                        <label for="socialTwitter"></label>
                    </div>
                    <div class="single_platform">
                        <div class="social_icon">
                            <img src="{{asset('images/Linkedin_Color.png')}}" class="color_icon" alt="" />
                            <img src="{{asset('images/Linkedin_Black.png')}}" class="black_icon" alt="" />
                        </div>

                        <input type="checkbox" class="plateform" name="plateform[]"
                            data-account="{{auth()->user()->account_id}}" value="Linkedin" id="socialLinkedin"
                            {{ in_array('Linkedin', auth()->user()->account->platforms) ? 'checked' : '' }}>
                        <label for="socialLinkedin"></label>
                    </div>

                    <!-- <div class="single_platform">
                        <div class="social_icon">
                            <img src="{{asset('images/Tiktok_Color.png')}}" class="color_icon" alt="" />
                            <img src="{{asset('images/Tiktok_Black.png')}}" class="black_icon" alt="" />
                        </div>

                        <input type="checkbox" name="" id="socialTiktok" disabled>
                        <label for="socialTiktok"></label>
                    </div> -->

                    <!-- <div class="single_platform">
                        <div class="social_icon">
                            <img src="{{asset('images/Youtube_Color.png')}}" class="color_icon" alt="" />
                            <img src="{{asset('images/Youtube_Black.png')}}" class="black_icon" alt="" />
                        </div>

                        <input type="checkbox" name="" id="socialYoutube" disabled>
                        <label for="socialYoutube"></label>
                    </div>

                    <div class="single_platform">
                        <div class="social_icon">
                            <img src="{{asset('images/Telegram_Color.png')}}" class="color_icon" alt="" />
                            <img src="{{asset('images/Telegram_Black.png')}}" class="black_icon" alt="" />
                        </div>

                        <input type="checkbox" name="" id="socialTelegram" disabled>
                        <label for="socialTelegram"></label>
                    </div>

                    <div class="single_platform">
                        <div class="social_icon">
                            <img src="{{asset('images/WhatsApp_Color.png')}}" class="color_icon" alt="" />
                            <img src="{{asset('images/WhatsApp_Black.png')}}" class="black_icon" alt="" />
                        </div>

                        <input type="checkbox" name="" id="socialWhatsApp" disabled>
                        <label for="socialWhatsApp"></label>
                    </div> -->
                </div>
            </div>
        </div>
    </header>
</section>