@php
$newvar = $post->getPostLiveLink($post);
@endphp
<div class="col-md-12 the_preview_card">
    {{-- <div class="MainMobileview MainMobileview2 mt-1 Facebook">
        <div class="PostHeader d-flex justify-content-between align-items-center">
            <h5 class="HeadingTop"><img src="{{ asset('images/fbposticon.png') }}" alt="" class="mr-1"> Facebook</h5>
            <a href="#">View on Facebook Page</a>
        </div>
        <div class="post_img_name">
            <div class="post_img">
                <div class="PostHeaderInner d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-center align-items-start gap-1">
                        <img src="{{ asset('images/fbposticon.png') }}" alt="" class="mr-1">
                        <div class="">
                            <h5 class="m-0">Facebook</h5>
                            <span>Just Now</span>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('images/dots-25.png') }}" alt="">
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div class="DetailText">
                    <p class="short_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque ex aperiam doloribus exercitationem reprehenderit quo, ipsam architecto perferendis sapiente eaque, qui provident? Sapiente delectus, perspiciatis deserunt veritatis cupiditate possimus cum. <span>See more</span></p>
                </div>
                <div class="TagsSec">
                    <a href="#">#BrownTechInt</a>
                </div>
                <div class="ImgSec">
                    <img src="{{ asset('images/linkedinpost.jpg') }}" alt="">
                </div>
                <div class="NavBtmSec">
                    <ul class="actions-buttons-list d-flex p-0 m-0 justify-content-between">
                        <li class="actions-buttons-item d-flex align-item-center">
                            <img src="{{ asset('images/thumbs_up_black.png') }}" class="" alt="" height="20">
                            <span class="d-flex align-items-center" style="opacity: 1;">Like</span>
                        </li>
                        <li class="actions-buttons-item d-flex align-item-center pt-1">
                            <img src="{{ asset('images/coment_msg_black.png') }}" class="" alt="" height="15" width="14">
                            <span class="" style="opacity: 1;">Comment</span>
                        </li>
                        <li class="actions-buttons-item  d-flex align-item-center share_fb">
                            <img src="{{ asset('images/share_black.png')}}" class="" alt="" height="18">
                            <span class="" style="opacity: 1;">Share</span>
                        </li>
                    </ul>
                </div>
                @if($post->plateform === 'Facebook' && auth()->check() && auth()->user()->account &&
                auth()->user()->account->fb_image)
                <img src="{{auth()->user()->account->fb_image}}" class="img-fluid" width="40" height="40" alt="">
                @elseif($post->plateform === 'Instagram' && auth()->check() && auth()->user()->account &&
                auth()->user()->account->fb_image)
                <img src="{{auth()->user()->account->inst_image}}" class="img-fluid" width="40" height="40" alt="">
                @elseif($post->plateform === 'Twitter' && auth()->check() && auth()->user()->account &&
                auth()->user()->account->fb_image)
                <img src="{{auth()->user()->account->twt_image}}" class="img-fluid" width="40" height="40" alt="">
                @elseif($post->plateform === 'Linkedin' && auth()->check() && auth()->user()->account &&
                auth()->user()->account->fb_image)
                <img src="{{auth()->user()->account->link_image}}" class="img-fluid" width="40" height="40" alt="">
                @endif
            </div>
            @php
            $mediatype = $post->media_type;
            @endphp

            <div>
                <span id="" class="postname"> {{auth()->user()->account->fb_page_name}}<br>
                    <span class="sponsored">Public . <i class="fa-solid fa-earth-americas"></i></span>
                </span>
            </div>
        </div>
        <div class="icons_d">
            <span class="ellipses"><i class="fa-solid fa-ellipsis"></i></span>
            <span class="xmark"><i class="fa-solid fa-xmark"></i></span>
        </div>
    </div> --}}
    {{-- <div class="MainMobileview MainMobileview2 mt-1 LinkedIn">
        <div class="PostHeader d-flex justify-content-between align-items-center">
            <h5 class="HeadingTop"><img src="{{ asset('images/linkedinlogo.png') }}" alt="" class="mr-1"> LinkedIn</h5>
            <a href="#">View on LinkedIn Page</a>
        </div>
        <div class="post_img_name">
            <div class="post_img">
                <div class="PostHeaderInner d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-center align-items-start gap-1">
                        <img src="{{ asset('images/linkedinlogo.png') }}" alt="" class="mr-1">
                        <div class="">
                            <h5 class="m-0">LinkedIn</h5>
                            <span>Just Now</span>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('images/dots-25.png') }}" alt="">
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div class="DetailText">
                    <p class="short_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque ex aperiam doloribus exercitationem reprehenderit quo, ipsam architecto perferendis sapiente eaque, qui provident? Sapiente delectus, perspiciatis deserunt veritatis cupiditate possimus cum. <span>See more</span></p>
                </div>
                <div class="TagsSec">
                    <a href="#">#BrownTechInt</a>
                </div>
                <div class="ImgSec">
                    <img src="{{ asset('images/linkedinpost.jpg') }}" alt="">
                </div>
                <div class="NavBtmSec">
                    <ul class="actions-buttons-list d-flex p-0 m-0 justify-content-between">
                        <li class="actions-buttons-item d-flex align-item-center">
                            <img src="{{ asset('images/thumbs_up_black.png') }}" class="" alt="" height="20">
                            <span class="d-flex align-items-center" style="opacity: 1;">Like</span>
                        </li>
                        <li class="actions-buttons-item d-flex align-item-center pt-1">
                            <img src="{{ asset('images/coment_msg_black.png') }}" class="" alt="" height="15" width="14">
                            <span class="" style="opacity: 1;">Comment</span>
                        </li>
                        <li class="actions-buttons-item  d-flex align-item-center share_fb">
                            <img src="{{ asset('images/share_black.png')}}" class="" alt="" height="18">
                            <span class="" style="opacity: 1;">Share</span>
                        </li>
                    </ul>
                </div>
                @if($post->plateform === 'Facebook' && auth()->check() && auth()->user()->account &&
                auth()->user()->account->fb_image)
                <img src="{{auth()->user()->account->fb_image}}" class="img-fluid" width="40" height="40" alt="">
                @elseif($post->plateform === 'Instagram' && auth()->check() && auth()->user()->account &&
                auth()->user()->account->fb_image)
                <img src="{{auth()->user()->account->inst_image}}" class="img-fluid" width="40" height="40" alt="">
                @elseif($post->plateform === 'Twitter' && auth()->check() && auth()->user()->account &&
                auth()->user()->account->fb_image)
                <img src="{{auth()->user()->account->twt_image}}" class="img-fluid" width="40" height="40" alt="">
                @elseif($post->plateform === 'Linkedin' && auth()->check() && auth()->user()->account &&
                auth()->user()->account->fb_image)
                <img src="{{auth()->user()->account->link_image}}" class="img-fluid" width="40" height="40" alt="">
                @endif
            </div>
            @php
            $mediatype = $post->media_type;
            @endphp

            <div>
                <span id="" class="postname"> {{auth()->user()->account->fb_page_name}}<br>
                    <span class="sponsored">Public . <i class="fa-solid fa-earth-americas"></i></span>
                </span>
            </div>
        </div>
        <div class="icons_d">
            <span class="ellipses"><i class="fa-solid fa-ellipsis"></i></span>
            <span class="xmark"><i class="fa-solid fa-xmark"></i></span>
        </div>
    </div> --}}
    <div class="MainMobileview MainMobileview2 mt-1 Twitter">
        <div class="PostHeader d-flex justify-content-between align-items-center">
            <h5 class="HeadingTop"><img src="{{ asset('images/Twitter_Color.png') }}" alt="" class="mr-1"> Twitter</h5>
            <a href="#">View on Twitter Page</a>
        </div>
        <div class="post_img_name">
            <img src="{{ asset('images/Twitter_Color.png') }}" alt="" class="mr-1 ProfileIcon">
            <div class="post_img">
                <div class="PostHeaderInner d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <h5 class="m-0">Twitter</h5>
                        <div class="">
                            <span>@Tang...</span>
                            <span>Just Now</span>
                        </div>
                    </div>
                </div>
                <div class="DetailText">
                    <p class="short_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque ex aperiam doloribus exercitationem reprehenderit quo, ipsam architecto perferendis sapiente eaque, qui provident? Sapiente delectus, perspiciatis deserunt veritatis cupiditate possimus cum. <span id="show-button">See more</span></p>
                </div>
                <div class="TagsSec">
                    <a href="#">#BrownTechInt</a>
                </div>
                <div class="ImgSec">
                    <img src="{{ asset('images/linkedinpost.jpg') }}" alt="">
                </div>
                <div class="NavBtmSec">
                    <ul class="actions-buttons-list d-flex p-0 m-0 justify-content-between">
                        <li class="actions-buttons-item d-flex align-item-center">
                            <img src="{{ asset('images/thumbs_up_black.png') }}" class="" alt="" height="20">
                            <span class="d-flex align-items-center" style="opacity: 1;">Like</span>
                        </li>
                        <li class="actions-buttons-item d-flex align-item-center pt-1">
                            <img src="{{ asset('images/coment_msg_black.png') }}" class="" alt="" height="15" width="14">
                            <span class="" style="opacity: 1;">Comment</span>
                        </li>
                        <li class="actions-buttons-item  d-flex align-item-center share_fb">
                            <img src="{{ asset('images/share_black.png')}}" class="" alt="" height="18">
                            <span class="" style="opacity: 1;">Share</span>
                        </li>
                    </ul>
                </div>
                @if($post->plateform === 'Facebook' && auth()->check() && auth()->user()->account &&
                auth()->user()->account->fb_image)
                <img src="{{auth()->user()->account->fb_image}}" class="img-fluid" width="40" height="40" alt="">
                @elseif($post->plateform === 'Instagram' && auth()->check() && auth()->user()->account &&
                auth()->user()->account->fb_image)
                <img src="{{auth()->user()->account->inst_image}}" class="img-fluid" width="40" height="40" alt="">
                @elseif($post->plateform === 'Twitter' && auth()->check() && auth()->user()->account &&
                auth()->user()->account->fb_image)
                <img src="{{auth()->user()->account->twt_image}}" class="img-fluid" width="40" height="40" alt="">
                @elseif($post->plateform === 'Linkedin' && auth()->check() && auth()->user()->account &&
                auth()->user()->account->fb_image)
                <img src="{{auth()->user()->account->link_image}}" class="img-fluid" width="40" height="40" alt="">
                @endif
            </div>
            @php
            $mediatype = $post->media_type;
            @endphp

            {{-- <div>
                <span id="" class="postname"> {{auth()->user()->account->fb_page_name}}<br>
                    <span class="sponsored">Public . <i class="fa-solid fa-earth-americas"></i></span>
                </span>
            </div> --}}
        </div>
        {{-- <div class="icons_d">
            <span class="ellipses"><i class="fa-solid fa-ellipsis"></i></span>
            <span class="xmark"><i class="fa-solid fa-xmark"></i></span>
        </div> --}}
    </div>
    <p class="m-0"></p>
    <div class="Mobcart_title">
        <span id="mypostresult_youpost" class="mypostresult">{{$post->content}}</span>
        <span class="icon icon-privacy text-primary" id="mynameresult"></span>
    </div>
    <div id="selectedValues"></div>
</div>
<div class="col-md-12">
    <div class="MainMobileimg">
        <div class="media-container media_container">
            <div class="prv_div_youpost"> </div>
            <div id="mediaContainervideo_youpost">

                @if($mediatype=='image')
                @php
                $Images = explode(',',$post->media);
                @endphp
                <div class="image_main_container  {{count($Images) == 1 ? 'single_image' : ''}}">
                    @foreach($Images as $image)
                    @if($loop->index <= 3) <div class=" post_modal_con"
                        style="background-image: url({{asset('content_media/' .$image)}})">

                </div>
                @elseif($loop->index == 4)
                <div class="post_modal_con" style="background-image: url({{asset('content_media/' .$image)}})">

                    <div class="fb_remain_img_counter">
                        <span>
                            <span><i class="fa-solid fa-plus"></i></span>
                            <span class="counter_val">+{{count($Images)-4}}</span>
                        </span>
                    </div>
                    <div class="image_shade"> </div>

                </div>
                @endif
                @endforeach
                <!-- <div class="">
                    <div class="">
                        <div class="deletepost_btn mydeltpostbtn">
                            <a class="text-decoration-none btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this post?');"
                                href="{{url('post_delete/' .encrypt($post->id))}}">
                                Delete Post
                            </a>
                        </div>
                    </div>
                </div> -->
            </div>
           

            @elseif($mediatype=='video')
            <div class="video_container">
                <video src="{{asset("content_media/$post->media")}}" controls preload="auto"></video>
            </div>
            @endif
            <div class="">
                <div class="">
                    <div class="deletepost_btn mydeltpostbtn">
                        <a class="text-decoration-none btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this post?');"
                            href="{{url('post_delete/' .encrypt($post->id))}}">
                            Delete Post
                        </a>
                    </div>
                </div>
            </div>

            
<div class="postlink">
    <!-- <a href="javascript:void(0);" class="visit_postsite">View post on Twitter </a> -->
    @if($post->plateform === 'Facebook' && auth()->check() && auth()->user()->account &&
    auth()->user()->account->fb_image)
    <a href="{{ $newvar['fb_feed'] }}" target="_blank" style="font-size:12px;"
        class="visit_postsite">@if(($post->posted_at_moment)=='now')<img src="{{asset('images/copy.png')}}" class=""
            alt="" /> View post in live feed @endif</a>
    @elseif($post->plateform === 'Instagram' && auth()->check() && auth()->user()->account &&
    auth()->user()->account->fb_image)
    <a href="{{ $newvar['inst_feed'] }}" target="_blank" style="font-size:12px;"
        class="visit_postsite">@if(($post->posted_at_moment)=='now')<img src="{{asset('images/copy.png')}}" class=""
            alt="" /> View post in live feed @endif</a>
    @elseif($post->plateform === 'Twitter' && auth()->check() && auth()->user()->account &&
    auth()->user()->account->fb_image)
    <a href="{{ $newvar['tw_feed'] }}" target="_blank" style="font-size:12px;"
        class="visit_postsite">@if(($post->posted_at_moment)=='now')<img src="{{asset('images/copy.png')}}" class=""
            alt="" /> View post in live feed @endif</a>
    @elseif($post->plateform === 'Linkedin' && auth()->check() && auth()->user()->account &&
    auth()->user()->account->fb_image)
    <a href="{{ $newvar['linkedin_feed'] }}" target="_blank" style="font-size:12px;"
        class="visit_postsite">@if(($post->posted_at_moment)=='now')<img src="{{asset('images/copy.png')}}" class=""
            alt="" /> View post in live feed @endif</a>
    @endif
</div>
        </div>
    </div>
  
    
</div>

<div class="col-md-12 d-none">
    <div class="Mobcart_title Mobcart_title2 bile d-flex justify-content-between Mobcart_titleCustom d-none">
        <div class="reactions reactions2 d-flex justify-content-center align-items-center d-none">
            <img src="{{asset('')}}images/fb_thumb.png" class="" alt="" height="12" />
            <img src="{{asset('')}}images/fb_heart.png" class="thums_up" alt="" height="12" />
        </div>
        <div class="total-comments total_comments u-margin-inline-start d-none">
            <a>Muhammad Talha and 24k others 8.3k comments</a>
        </div>
    </div>
    <hr style="color:gray; d-none" class="m-0">
    <div class="actions-buttons actions_buttons px-1 mt-3">
        <ul class="actions-buttons-list d-flex p-0 justify-content-between">
            <li class="actions-buttons-item  d-flex align-item-center">
                <!-- <i class="fa-regular fa-thumbs-up"></i> -->
                <img src="{{asset('')}}images/thumbs_up.png" class="" alt="" height="20" />
                <span class="lign-items-center">Like</span>
            </li>
            <li class="actions-buttons-item d-flex align-item-center pt-1">
                <img src="{{asset('')}}images/coment_msg.png" class="" alt="" height="15" width="14" />
                <span class="">Comment</span>
            </li>
            <li class="actions-buttons-item  d-flex align-item-center share_fb">
                <img src="{{asset('')}}images/share.png" class="" alt="" height="18" />
                <span class="">Share</span>
            </li>
        </ul>
    </div>
</div>

<script>
    $(document).ready(function() {
      $("#show-button").on("click", function() {
        // Toggle the text overflow style
        $(".post_img_name .post_img .DetailText p.short_text").toggleClass("show-full-text");
        // $(this).text("Show Less");
        $(this).text(function(i, text) {
        return text === "Show Less" ? "Show More" : "Show Less";
      });
      });
    });
  </script>


