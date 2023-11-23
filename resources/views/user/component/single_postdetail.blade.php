@php
    $newvar = $post->getPostLiveLink($post);
@endphp
@php
    $mediatype = $post->media_type;
@endphp
<div class="col-md-12 the_preview_card ">
    <div class="MainMobileview MainMobileview2 mt-1 FacebookWrap" style="display: none;">
        <div class="PostHeader d-flex justify-content-between align-items-center">
            <h5 class="HeadingTop">
                {{-- <img src="{{ asset('images/fbposticon.png') }}" alt="" class="mr-1">  --}}
                @if ($post->plateform === 'Facebook')
                        <img src="{{ asset('images/fbposticon.png') }}" alt=""
                            class="mr-1 ProfileIcon border-0">
                @endif
                Facebook
            </h5>
            <div class="postlink">
                <!-- <a href="javascript:void(0);" class="visit_postsite">View post on Twitter </a> -->
                @if ($post->plateform === 'Facebook')
                    <a href="{{ $newvar['fb_feed'] }}" target="_blank" style="font-size:12px;" class="visit_postsite">
                        @if ($post->posted_at_moment == 'now')
                            <img src="{{ asset('images/copy.png') }}" class="CopyIcon" alt="" /> View post
                            in live feed
                        @endif
                    </a>
                @endif
            </div>
        </div>
        <div class="post_img_name">
            <div class="post_img">
                <div class="PostHeaderInner d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-center align-items-start gap-1">
                    <img src="{{ auth()->user()->account->fb_image }}" class="img-fluid " width="40" height="40"
                        alt="">
                        <div class="">
                            <h5 class="m-0">{{ auth()->user()->account->fb_page_name }}</h5>
                            <span>Just Now</span>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false" disabled>
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
                    <div class="short_text Mobcart_title">
                        <span id="mypostresult_youpost" class="mypostresult">{!! nl2br(e($post->content)) !!}
</span>
                        <span class="icon icon-privacy text-primary" id="mynameresult"></span>
                    </div>
                </div>
                <div class="TagsSec d-none">
                    <a href="#">#BrownTechInt</a>
                </div>
                <div class="ImgSec">
                    {{-- <img src="{{ asset('images/linkedinpost.jpg') }}" alt=""> --}}
                    @if ($mediatype == 'image')
                        @php
                            $Images = explode(',', $post->media);
                        @endphp
                        <div class="image_main_container  {{ count($Images) == 1 ? 'single_image' : '' }}">
                            @foreach ($Images as $image)
                                @if ($loop->index <= 3)
                                    <div class=" post_modal_con"
                                        style="background-image: url({{ asset('content_media/' . $image) }})">

                                    </div>
                                @elseif($loop->index == 4)
                                    <div class="post_modal_con"
                                        style="background-image: url({{ asset('content_media/' . $image) }})">

                                        <div class="fb_remain_img_counter">
                                            <span>
                                                <span><i class="fa-solid fa-plus"></i></span>
                                                <span class="counter_val">+{{ count($Images) - 4 }}</span>
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
                                            href="{{ url('post_delete/' . encrypt($post->id)) }}">
                                            Delete Post
                                        </a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    @elseif($mediatype == 'video')
                        <div class="video_container">
                            <video src="{{ asset("content_media/$post->media") }}" controls preload="auto"></video>
                        </div>
                    @endif
                </div>
                <div class="NavBtmSec">
                    <ul class="actions-buttons-list d-flex p-0 m-0 justify-content-between w-100">
                        <li class="actions-buttons-item d-flex align-item-center">
                            <img src="{{ asset('images/thumbs_up_black.png') }}" class="" alt=""
                                height="20">
                            <span class="d-flex align-items-center" style="opacity: 1;">Like</span>
                        </li>
                        <li class="actions-buttons-item d-flex align-item-center pt-1">
                            <img src="{{ asset('images/coment_msg_black.png') }}" class="" alt=""
                                height="15" width="14">
                            <span class="" style="opacity: 1;">Comment</span>
                        </li>
                        <li class="actions-buttons-item  d-flex align-item-center share_fb">
                            <img src="{{ asset('images/share_black.png') }}" class="" alt=""
                                height="18">
                            <span class="" style="opacity: 1;">Share</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="icons_d">
            <span class="ellipses"><i class="fa-solid fa-ellipsis"></i></span>
            <span class="xmark"><i class="fa-solid fa-xmark"></i></span>
        </div>
    </div>
    <div class="MainMobileview MainMobileview2 mt-1 LinkedinWrap" style="display: none;">
        <div class="PostHeader d-flex justify-content-between align-items-center">
            <h5 class="HeadingTop">
                {{-- <img src="{{ asset('images/linkedinlogo.png') }}" alt="" class="mr-1">  --}}
                @if($post->plateform === 'Linkedin')
                <img src="{{ asset('images/linkedinlogo.png') }}" alt="" class="mr-1">
                @endif
                LinkedIn
            </h5>
            <div class="postlink">
                <!-- <a href="javascript:void(0);" class="visit_postsite">View post on Twitter </a> -->
                @if($post->plateform === 'Linkedin')
                    <a href="{{ $newvar['linkedin_feed'] }}" target="_blank" style="font-size:12px;"
                        class="visit_postsite">
                        @if ($post->posted_at_moment == 'now')
                            <img src="{{ asset('images/copy.png') }}" class="CopyIcon" alt="" /> View post
                            in live feed
                        @endif
                    </a>
                @endif
            </div>
        </div>
        <div class="post_img_name">
            <div class="post_img">
                <div class="PostHeaderInner d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-center align-items-start gap-1">
                        <img src="{{ auth()->user()->account->link_image }}" class="img-fluid" width="40"
                        height="40" alt="">
                        <div class="">
                            <h5 class="m-0">{{ auth()->user()->account->link_page_name }}</h5>
                            <span>Just Now</span>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false" disabled>
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
                    <div class="short_text Mobcart_title">
                        <span id="mypostresult_youpost" class="mypostresult">{!! nl2br(e($post->content)) !!}</span>
                        <span class="icon icon-privacy text-primary" id="mynameresult"></span>
                    </div>
                </div>
                <div class="TagsSec d-none">
                    <!-- <a href="#">#BrownTechInt</a> -->
                </div>
                <div class="ImgSec">
                    {{-- <img src="{{ asset('images/linkedinpost.jpg') }}" alt=""> --}}
                    @if ($mediatype == 'image')
                        @php
                            $Images = explode(',', $post->media);
                        @endphp
                        <div class="image_main_container  {{ count($Images) == 1 ? 'single_image' : '' }}">
                            @foreach ($Images as $image)
                                @if ($loop->index <= 3)
                                    <div class=" post_modal_con"
                                        style="background-image: url({{ asset('content_media/' . $image) }})">

                                    </div>
                                @elseif($loop->index == 4)
                                    <div class="post_modal_con"
                                        style="background-image: url({{ asset('content_media/' . $image) }})">

                                        <div class="fb_remain_img_counter">
                                            <span>
                                                <span><i class="fa-solid fa-plus"></i></span>
                                                <span class="counter_val">+{{ count($Images) - 4 }}</span>
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
                                            href="{{ url('post_delete/' . encrypt($post->id)) }}">
                                            Delete Post
                                        </a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    @elseif($mediatype == 'video')
                        <div class="video_container">
                            <video src="{{ asset("content_media/$post->media") }}" controls preload="auto"></video>
                        </div>
                    @endif
                </div>
                <div class="NavBtmSec">
                    <ul class="actions-buttons-list d-flex p-0 m-0 justify-content-between w-100">
                        <li class="actions-buttons-item d-flex align-item-center">
                            <img src="{{ asset('images/thumbs_up_black.png') }}" class="" alt=""
                                height="20">
                            <span class="d-flex align-items-center" style="opacity: 1;">Like</span>
                        </li>
                        <li class="actions-buttons-item d-flex align-item-center pt-1">
                            <img src="{{ asset('images/coment_msg_black.png') }}" class="" alt=""
                                height="15" width="14">
                            <span class="" style="opacity: 1;">Comment</span>
                        </li>
                        <li class="actions-buttons-item  d-flex align-item-center share_fb">
                            <img src="{{ asset('images/share_black.png') }}" class="" alt=""
                                height="18">
                            <span class="" style="opacity: 1;">Share</span>
                        </li>
                    </ul>
                </div>
            </div>
            @php
                $mediatype = $post->media_type;
            @endphp
        </div>
        <div class="icons_d">
            <span class="ellipses"><i class="fa-solid fa-ellipsis"></i></span>
            <span class="xmark"><i class="fa-solid fa-xmark"></i></span>
        </div>
    </div>
    <div class="MainMobileview MainMobileview2 mt-1 TwitterWrap" style="display: none;">
        <div class="PostHeader d-flex justify-content-between align-items-center">
            <h5 class="HeadingTop">
                @if($post->plateform === 'Twitter')
                <img src="{{ asset('images/Twitter_Color.png') }}" alt="" class="mr-1 ProfileIcon">
                @endif
                 Twitter
            </h5>
            <div class="postlink">
                <!-- <a href="javascript:void(0);" class="visit_postsite">View post on Twitter </a> -->
                @if($post->plateform === 'Twitter')
                    <a href="{{ $newvar['tw_feed'] }}" target="_blank" style="font-size:12px;"
                        class="visit_postsite">
                        @if ($post->posted_at_moment == 'now')
                            <img src="{{ asset('images/copy.png') }}" class="CopyIcon" alt="" /> View post
                            in live feed
                        @endif
                    </a>
                @endif
            </div>
        </div>
        <div class="post_img_name">
            <img src="{{auth()->user()->account->twt_image}}" class="img-fluid Twitter_Profile" width="40" height="40" alt="">
            <div class="post_img">
                <div class="PostHeaderInner d-flex justify-content-between align-items-center">
                    <div class="">
                        <h5 class="m-0">{{auth()->user()->account->tw_name}}</h5>
                        <div class="">
                            <span>@ {{auth()->user()->account->tw_user_name}}</span>
                            <!-- <span>Just Now</span> -->
                        </div>
                    </div>
                </div>
                <div class="DetailText pb-2 sidebar_preview">
                    <div class="short_text Mobcart_title">
                        <span id="mypostresult_youpost" class="mypostresult">{!! nl2br(e($post->content)) !!}</span>
                        <span class="icon icon-privacy text-primary" id="mynameresult"></span>
                    </div>
                </div>
                <!-- <div class="TagsSec">
                    <a href="#">#BrownTechInt</a>
                </div> -->
                <div class="ImgSec">
                    {{-- <img src="{{ asset('images/linkedinpost.jpg') }}" alt=""> --}}
                    @if ($mediatype == 'image')
                        @php
                            $Images = explode(',', $post->media);
                        @endphp
                        <div class="image_main_container  {{ count($Images) == 1 ? 'single_image' : '' }}">
                            @foreach ($Images as $image)
                                @if ($loop->index <= 3)
                                    <div class=" post_modal_con"
                                        style="background-image: url({{ asset('content_media/' . $image) }})">

                                    </div>
                                @elseif($loop->index == 4)
                                    <div class="post_modal_con"
                                        style="background-image: url({{ asset('content_media/' . $image) }})">

                                        <div class="fb_remain_img_counter">
                                            <span>
                                                <span><i class="fa-solid fa-plus"></i></span>
                                                <span class="counter_val">+{{ count($Images) - 4 }}</span>
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
                                            href="{{ url('post_delete/' . encrypt($post->id)) }}">
                                            Delete Post
                                        </a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    @elseif($mediatype == 'video')
                        <div class="video_container">
                            <video src="{{ asset("content_media/$post->media") }}" controls preload="auto"></video>
                        </div>
                    @endif
                </div>
                <div class="NavBtmSec">
                    <ul class="actions-buttons-list d-flex p-0 m-0 justify-content-between w-100">
                        <li class="actions-buttons-item d-flex align-item-center">
                            <img src="{{ asset('images/icons/Comment-titter.svg') }}" class="" alt="" height="20">
                        </li>
                        <li class="actions-buttons-item d-flex align-item-center pt-1">
                            <img src="{{ asset('images/icons/share-twitter.svg') }}" class="" alt="" height="15" width="14">
                        </li>
                        <li class="actions-buttons-item  d-flex align-item-center share_fb">
                            <img src="{{ asset('images/icons/heart-twitter.svg')}}" class="" alt="" height="18">
                        </li>
                        <li class="actions-buttons-item  d-flex align-item-center share_fb">
                            <img src="{{ asset('images/icons/thum-01.svg')}}" class="" alt="" height="18">
                        </li>
                    </ul>
                </div>
            </div>
            @php
            $mediatype = $post->media_type;
            @endphp
        </div>
        <div class="icons_d">
            <span class="ellipses"><i class="fa-solid fa-ellipsis"></i></span>
            <span class="xmark"><i class="fa-solid fa-xmark"></i></span>
        </div>
    </div>
    <div class="MainMobileview MainMobileview2 mt-1 InstagramWrap" style="display: none;">
        <div class="PostHeader d-flex justify-content-between align-items-center">
            <h5 class="HeadingTop">
                @if($post->plateform === 'Instagram')
                <img src="{{ asset('images/instapost.png') }}" alt="" class="mr-1 ProfileIcon">
                @endif
                Instagram
            </h5>
            <div class="postlink">
                <!-- <a href="javascript:void(0);" class="visit_postsite">View post on Twitter </a> -->
                @if($post->plateform === 'Instagram')
                    <a href="{{ $newvar['inst_feed'] }}" target="_blank" style="font-size:12px;"
                        class="visit_postsite">
                        @if ($post->posted_at_moment == 'now')
                            <img src="{{ asset('images/copy.png') }}" class="CopyIcon" alt="" /> View post
                            in live feed
                        @endif
                    </a>
                @endif
            </div>
        </div>
        <div class="post_img_name">
            <div class="post_img">
                <div class="PostHeaderInner d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-between align-items-center w-100 mb-2">
                        <div class="d-flex align-items-center gap-1">
                        <img src="{{auth()->user()->account->inst_image}}" class="img-fluid" width="40" height="40" alt="">
                            <h5 class="m-0">{{auth()->user()->account->inst_page_name}}</h5>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false" disabled>
                                <img src="{{ asset('images/dots-25.png') }}" alt="">
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="ImgSec">
                    {{-- <img src="{{ asset('images/linkedinpost.jpg') }}" alt=""> --}}
                    @if ($mediatype == 'image')
                        @php
                            $Images = explode(',', $post->media);
                        @endphp
                        <div class="image_main_container  {{ count($Images) == 1 ? 'single_image' : '' }}">
                            @foreach ($Images as $image)
                                @if ($loop->index <= 3)
                                    <div class=" post_modal_con"
                                        style="background-image: url({{ asset('content_media/' . $image) }})">

                                    </div>
                                @elseif($loop->index == 4)
                                    <div class="post_modal_con"
                                        style="background-image: url({{ asset('content_media/' . $image) }})">

                                        <div class="fb_remain_img_counter">
                                            <span>
                                                <span><i class="fa-solid fa-plus"></i></span>
                                                <span class="counter_val">+{{ count($Images) - 4 }}</span>
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
                                            href="{{ url('post_delete/' . encrypt($post->id)) }}">
                                            Delete Post
                                        </a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    @elseif($mediatype == 'video')
                        <div class="video_container">
                            <video src="{{ asset("content_media/$post->media") }}" controls preload="auto"></video>
                        </div>
                    @endif
                </div>
            
                <div class="NavBtmSec">
                    <ul class="actions-buttons-list d-flex p-0 m-0 justify-content-between align-items-center">
                        <li class="actions-buttons-item  d-flex align-item-center">
                            <img src="{{ asset('images/icons/heart-twitter.svg') }}" class="" alt=""
                                height="18">
                        </li>
                        <li class="actions-buttons-item d-flex align-item-center">
                            <img src="{{ asset('images/icons/Comment-titter.svg') }}" class="" alt=""
                                height="20">
                        </li>
                        <li class="actions-buttons-item  d-flex align-item-center">
                            <img src="{{ asset('images/icons/send-insta.svg') }}" class="" alt=""
                                height="18">
                        </li>
                    </ul>
                    <ul class="SaveBtn">
                        <li class="actions-buttons-item d-flex align-item-center">
                            <img src="{{ asset('images/myiconheart.png') }}" class="" alt=""
                                height="18">
                        </li>
                    </ul>
                </div>
                {{$post->content}}
                {{-- <span id="show-button">See more</span> --}}
                <div class="DetailText pt-0">
                    <div class="short_text Mobcart_title">
                        <!-- <span id="mypostresult_youpost" class="mypostresult">{!! nl2br(e($post->content)) !!}</span>
                        <span class="icon icon-privacy text-primary" id="mynameresult"></span> -->
                    </div>
                </div>
                <div class="TagsSec d-none">
                    <a href="#">#BrownTechInt</a>
                </div>
                @if ($post->plateform === 'Facebook' && auth()->check() && auth()->user()->account)
                    <img src="{{ auth()->user()->account->fb_image }}" class="img-fluid" width="40" height="40"
                        alt="">
                @elseif($post->plateform === 'Instagram' && auth()->check() && auth()->user()->account)
                    <img src="{{ auth()->user()->account->inst_image }}" class="img-fluid d-none" width="40" height="40"
                        alt="">
                @elseif($post->plateform === 'Twitter' && auth()->check() && auth()->user()->account )
                    <img src="{{ auth()->user()->account->twt_image }}" class="img-fluid" width="40" height="40"
                        alt="">
                @elseif($post->plateform === 'Linkedin' && auth()->check() && auth()->user()->account)
                    <img src="{{ auth()->user()->account->link_image }}" class="img-fluid" width="40"
                        height="40" alt="">
                @endif
            </div>
            @php
                $mediatype = $post->media_type;
            @endphp
        </div>
        <div class="icons_d">
            <span class="ellipses"><i class="fa-solid fa-ellipsis"></i></span>
            <span class="xmark"><i class="fa-solid fa-xmark"></i></span>
        </div>
    </div>
    <!-- <p class="m-0"></p>
    <div id="selectedValues"></div> -->
    <div class="MainMobileimg">
        <div class="media-container media_container">
            <div class="prv_div_youpost"> </div>
            <div id="mediaContainervideo_youpost">
                <div class="">
                    <div class="">
                        <div class="deletepost_btn mydeltpostbtn">
                            <a class="text-decoration-none btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this post?');"
                                href="{{ url('post_delete/' . encrypt($post->id)) }}">
                                Delete Post
                            </a>
                        </div>

                        <!-- @if ($post->posted_at_moment != 'now')
                        

                        <a href="#" 
                        class="text-decoration-none btn btn-danger"
                         data-id="{{ $post->id }}" 
                         data-posted_at="{{ $post->posted_at }}"                       
                         data-bs-toggle="modal" 
                         data-bs-target="#SchedulePost">
                            Edit Post
                        </a>

                                    
                        @endif -->
                       

                    </div>
                </div>
            </div>
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

    

