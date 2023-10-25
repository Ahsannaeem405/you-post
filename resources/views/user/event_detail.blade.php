<!-- Nav tabs -->
<ul class="nav nav-tabs nav_tabs post-detail-tab" id="myTab" role="tablist">

    @if(in_array('Facebook',$platformsName))
    <li class="nav-item" role="presentation">
        <a class="nav-link " id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1"
            aria-selected="true"><img src="{{asset('images/FB_Color.png')}}" class="socialfb" alt="" /></a>
    </li>
    @endif

    @if(in_array('Instagram',$platformsName))
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2"
            aria-selected="false"><img src="{{asset('images/Instagram_Color.png')}}" class="socialinsta" alt="" /></a>
    </li>
    @endif

    @if(in_array('Twitter',$platformsName))
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="tab3-tab" data-bs-toggle="tab" href="#tab3" role="tab" aria-controls="tab3"
            aria-selected="false"><img src="{{asset('images/Twitter_Color.png')}}" class="socialtwitter" alt="" /></a>
    </li>
    @endif

    @if(in_array('Linkedin',$platformsName))
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="tab4-tab" data-bs-toggle="tab" href="#tab4" role="tab" aria-controls="tab4"
            aria-selected="false"><img src="{{asset('images/Linkedin_Color.png')}}" class="sociallinkedin" alt="" /></a>
    </li>
    @endif
</ul>
@php
$newvar = $post->getPostLiveLink($post);
@endphp
<!-- Tab content -->
<div class="tab-content post-detail-tab-content" id="myTabContent">
    @if(in_array('Facebook',$platformsName))
    <div class="tab-pane fade " id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
        <div class="nav_card1 mt-3">
            <div class="row"  style="padding:12px;">
                <div class="col-7 d-flex align-items-center">
                    <div class="d-flex">
                        <div>
                            <img src="{{asset('images/fb_p.png')}}" class="img-fluid" alt="" />
                        </div>

                        <div class="Evano ms-2">
                            <h3 class="mb-0">{{$platforms['Facebook'][0]->user->name}}
                                <img src="{{asset('images/offical2.png')}}" class="d-none" alt="" height="" />
                            </h3>
                            <span>
                                <span class="text-secondary">Scheduled at:</span>
                                <span
                                    class="text-primary">{{\Carbon\Carbon::parse($platforms['Facebook'][0]->posted_at)->format('d M Y h:i A')}}</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-5 d-flex align-items-center">
                    <div>
                    <a href="{{ $newvar['fb_feed'] }}" target="_blank" style="font-size:12px;">@if(($platforms['Facebook'][0]->posted_at_moment)=='now')<img src="{{asset('images/copy.png')}}" class=""
                                alt="" /> View post in live feed @endif</a>
                        <p class="text-warning text-center" style="font-size:10px; padding-right:26px;"></p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="post_text pb-2  edit_posts">
                        <p class="mb-0">{{$platforms['Facebook'][0]->content}}</p>
                        <a href="">{{$platforms['Facebook'][0]->tag}}</a>
                    </div>
                </div>
                <div class="col-12 px-0 mb-3">
                    @php
                    $Facebookimages = explode(',',$platforms['Facebook'][0]->media);
                    @endphp
                    <div class="image_main_container px-0 container">
                        @if($platforms['Facebook'][0]->media_type=='image')
                        @foreach($Facebookimages as $image)
                        @if($loop->index <= 3) 
                    <div class="post_modal_con"
                            style="background-image: url({{asset('content_media/' .$image)}})">
                    </div>
                    @elseif($loop->index == 4)
                    <div class="post_modal_con post_modal_con5_img"
                        style="background-image: url({{asset('content_media/' .$image)}})">
                        <div class="fb_remain_img_counter">
                            <span>
                                <span><i class="fa-solid fa-plus"></i></span>
                                <span class="counter_val">{{count($Facebookimages)-4}}</span>
                            </span>
                        </div>
                        <div class="image_shade"> </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                @elseif($platforms['Facebook'][0]->media_type=='video')
                <div class="video_container">
                    <video src="{{asset("content_media/{$platforms['Facebook'][0]->media}")}}" controls></video>
                </div>
                @endif
                <!-- </div> -->
            </div>

            <div class="col-12">
                <div class="actions-buttons-list d-flex p-0 justify-content-between border_top pt-3 px-2">

                    <div class="actions-buttons-button small_viewicons d-flex align-items-center" style="cursor:pointer; ">
                        <img src="{{asset('images/t1.png')}}" class="img-fluid" alt="" style="height: 20px; margin-right: 5px;" />
                        <p class="text text3 mb-0">Like</p>
                    </div>
                    <div class="actions-buttons-button small_viewicons d-flex align-items-center" style="cursor:pointer; ">
                        <i class="fa-regular fa-message" style="color:#9DA1A5;height: 20px; margin-right: 5px;  margin-top:3px;" ></i>
                        <p class="text text3 mb-0">Comment</p>
                    </div>
                    <div class="actions-buttons-button small_viewicons  d-flex align-items-center" style="cursor:pointer;">
                        <img src="{{asset('images/tt3.png')}}" class="img-fluid myshare_icon" alt=""  style="margin-right: 5px; height: 20px;"/>
                        <p class="text text3 mb-0">Share</p>
                    </div>
                    <div class="actions-buttons-button small_viewicons d-flex" style="cursor:pointer;">
                        <div>
                            <!-- <img src="http://127.0.0.1:8000/images/Profile 1-01.png" alt="" class="insta_acc_bar" style="height:20px; padding-top:5px; opacity:0.5;
                                "> -->
                                <img src="{{asset('images/accountfbicon.png')}}" alt="" class="insta_acc_bar" style="height:20px; padding-top:5px; opacity:0.5;"/> 
                        </div>
                        <div class="mt-1">
                            <img src="{{asset('images/drop.png')}}" class="img-fluid" alt=""
                                style="height:14px; opacity:0.5" />
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-12 my-2 text-center delete2 pt-3 pb-2">
        <a class="text-decoration-none btn btn-danger"
            onclick="return confirm('Are you sure you want to delete this post?');"
            href="{{url('post_delete/' .encrypt($platforms['Facebook'][0]->id))}}">
            Delete
        </a>
    </div>

</div>
@endif

@if(in_array('Instagram',$platformsName))
<div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
    <div class="nav_card1 mt-3">
        <div class="row" style="padding:12px;">
            <div class="col-7">
                <div class="d-flex">
                    <div>
                        <img src="{{asset('images/insta_elp.png')}}" class="img-fluid" alt="" />
                    </div>

                    <div class="Evano">
                        <h3 class="mb-0 user_name_insta">{{$platforms['Instagram'][0]->user->name}} <img
                                src="{{asset('')}}images/offical.png" class="d-none" alt="" height="14" /></h3>

                    </div>

                </div>
            </div>
            <div class="col-5">
                <div>
                <a href="{{ $newvar['inst_feed'] }}" target="_blank"style="font-size:12px;">
                    @if(($platforms['Instagram'][0]->posted_at_moment)=='now')<img src="{{asset('')}}images/copy.png" class="" alt="" />  View post in live feed @endif</a>
                    <p class="text-warning text-center" style="font-size:12px; padding-right:26px;"></p>
                </div>
            </div>
            <div class="col-12 px-0">
                @php
                $InstagramImages = explode(',',$platforms['Instagram'][0]->media);
                @endphp
                <div class="image_main_container pt-3 {{count($InstagramImages) == 1 ? 'single_image' : ''}}">
                    @if($platforms['Instagram'][0]->media_type=='image')
                        <div class="post_modal_con"
                                style="background-image: url({{asset('content_media/' .end($InstagramImages))}})">
                        </div>
                               
                    @elseif($platforms['Instagram'][0]->media_type=='video')
                    <div class="video_container">
                        <video src="{{asset("content_media/{$platforms['Instagram'][0]->media}")}}" controls></video>
                    </div>
                    @endif

            </div>
        </div>

        <div class="col-12">
            <div class="d-flex justify-content-between ">
                <div>

                </div>
            </div>
            <div>
            </div>
        </div>
    </div>
    <div class="col-12 px-3">
        <div class="actions-buttons-list d-flex p-0 justify-content-between">
            <div class="actions-buttons-button">
                <div class="d-flex" style="gap: 0 18px;">
                    <img class="Edit_postins_icon" src="{{asset('images/icons8-heart1.png')}}" alt=""
                        style="cursor:pointer;">
                    <img class="Edit_postins_icon" src="{{asset('images/bubble-chat.png')}}" alt=""
                        style="cursor:pointer;">
                    <img class="Edit_postins_icon" src="{{asset('images/send1.png')}}" alt="" style="cursor:pointer;">
                </div>
            </div>
            <div class="actions-buttons-button">
            </div>

            <div class="actions-buttons-button d-flex">
                <i class="fa-regular fa-bookmark myinsta_icon" style="cursor:pointer; color:#000;"></i>
            </div>


        </div>
    </div>
    <div class="col-12 insta_likes">
        <span>
            <span>
                0 Likes
            </span>
        </span>
    </div>
    <div class="col-12 insta_post1">
        <div class="post_text pb-2 edit_posts">
            <p class="mb-0">{{$platforms['Instagram'][0]->content}}</p>
            <a href="">{{$platforms['Instagram'][0]->tag}}</a>
        </div>
    </div>

    <div class="col-12 schedule_date">
        <span>
            <span class="text-secondary">Scheduled at:</span>
            <span
                class="text-primary">{{\Carbon\Carbon::parse($platforms['Instagram'][0]->posted_at)->format('d M Y h:i A')}}</span>
        </span>

    </div>

</div>
<div class="col-12 my-2 text-center">
    <a class="text-decoration-none btn btn-danger"
        onclick="return confirm('Are you sure you want to delete this post?');"
        href="{{url('post_delete/' .encrypt($platforms['Instagram'][0]->id))}}">
        Delete
    </a>
</div>
</div>
@endif

@if(in_array('Twitter',$platformsName))
<div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">

    <div class="nav_card1 mt-3 navcard_3">
        <div class="row" style="padding:12px;">
            <div class="col-7 ">
                <div class="d-flex">
                    <div> <img src="{{asset('')}}images/elpx.png" class="navcard_3_img1" alt="" />
                    </div>
                    <div class="Evano">
                        <h3 class="mb-0 user_name">{{$platforms['Twitter'][0]->user->name}} <img src="" class="d-none" alt=""
                                height="14" /></h3>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div>
                <a href="{{ $newvar['tw_feed'] }}" target="_blank" style="font-size:12px;"> @if(($platforms['Twitter'][0]->posted_at_moment)=='now')<img src="{{asset('images/copy.png')}}" class=""
                                alt="" /> View post in live feed @endif</a>

                    <p class="text-warning text-center" style="font-size:12px; padding-right:26px;"></p>
                </div>
            </div>
            <div class="post_title">
                <div class="col-12">
                    <div class="post_text pb-2 edit_posts">
                        <p class="mb-0">{{$platforms['Twitter'][0]->content}}</p>
                        <a href="">{{$platforms['Twitter'][0]->tag}}</a>
                    </div>
                </div>
            </div>
            <div class="col-12 bottom-content">
                <div class="actions-buttons-list d-flex p-0 justify-content-between border_top border-card3 mt-3">
                    <div class="actions-buttons-button">

                        <i class="fa-regular fa-comment myicon"></i>
                        <span class="text text3"></span>
                    </div>
                    <div class="actions-buttons-button">

                        <i class="fa-solid fa-retweet myicon"></i>
                        <span class="text text3"></span>
                    </div>
                    <div class="actions-buttons-button">

                        <i class="fa-regular fa-heart myicon"></i>
                        <span class="text text3"></span>
                    </div>
                    <div class="actions-buttons-button">

                        <i class="fa-solid fa-chart-simple myicon"></i>
                        <span class="text text3"></span>
                    </div>
                    <div class="actions-buttons-button">

                        <i class="fa-solid fa-arrow-up-from-bracket myicon"></i>
                        <span class="text text3"></span>
                    </div>
                </div>
            </div>
            <div class="col-12 schedule_date">
                <span>
                    <span class="text-secondary">Scheduled at:</span>
                    <span
                        class="text-primary">@if(isset($platforms['Instagram'])){{\Carbon\Carbon::parse($platforms['Instagram'][0]->posted_at)->format('d M Y h:i A')}}@endif</span>
                </span>

            </div>
        </div>
    </div>
    <div class="col-12 my-2 text-center">
        <a class="text-decoration-none btn btn-danger"
            onclick="return confirm('Are you sure you want to delete this post?');"
            href="{{url('post_delete/' .encrypt($platforms['Twitter'][0]->id))}}">
            Delete
        </a>
    </div>
</div>
@endif

@if(in_array('Linkedin',$platformsName))
<div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
    <div class="nav_card1 mt-3">
        <div class="row" style="padding:12px;">
            <div class="col-7">
                <div class="d-flex">
                    <div>
                        @if(isset($imageUrl))
                        <img src="{{$imageUrl}}" class="" alt="" />
                        @else
                        <img src="{{asset('')}}images/elplinkedin.png" class="" alt="" />
                        @endif
                    </div>
                    <div class="Evano card_4Evano">
                        <h3 class="mb-0 user_name">{{$platforms['Linkedin'][0]->user->name}} <img src="" class="d-none" alt=""
                                height="14" /></h3>
                        <span class="linkedin_schedule">
                            <span class="text-secondary">Scheduled at:</span>
                            <span
                                class="text-primary">{{\Carbon\Carbon::parse($platforms['Linkedin'][0]->posted_at)->format('d M Y h:i A')}}</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div>
                <a href= "{{$newvar['linkedin_feed'] }}" target="_blank" style="font-size:12px;">   @if(($platforms['Linkedin'][0]->posted_at_moment)=='now')<img src="{{asset('images/copy.png')}}" class=""
                                alt="" /> View post in live feed @endif </a>
                    <p class="text-warning text-center" style="font-size:12px; padding-right:26px;"></p>
                </div>
            </div>
            <div class="col-12">
                <div class="post_text pb-2 edit_posts">
                    <p class="mb-0">{{$platforms['Linkedin'][0]->content}}</p>
                    <a href="">{{$platforms['Linkedin'][0]->tag}}</a>
                </div>
            </div>
           
            <!-- test -->
            <div class="col-12 px-0">
                @php
                $LinkedinImages = explode(',',$platforms['Linkedin'][0]->media);
                @endphp
                <div class="image_main_container  {{count($LinkedinImages) == 1 ? 'single_image' : ''}}">
                    @if($platforms['Linkedin'][0]->media_type=='image')
                    @foreach($LinkedinImages as $image)
                    @if($loop->index <= 3) <div class=" post_modal_con"
                        style="background-image: url({{asset('content_media/' .$image)}})">
                </div>
                @elseif($loop->index == 4)
                <div class="post_modal_con" style="background-image: url({{asset('content_media/' .$image)}})">

                    <div class="fb_remain_img_counter">
                        <span>
                            <span><i class="fa-solid fa-plus"></i></span>
                            <span class="counter_val">{{count($LinkedinImages)-4}}</span>
                        </span>
                    </div>
                    <div class="image_shade"> </div>

                </div>
                @endif
                @endforeach
                @elseif($platforms['Linkedin'][0]->media_type=='video')
                <div class="video_container">
                    <video src="{{asset("content_media/{$platforms['Instagram'][0]->media}")}}" controls></video>
                </div>
                @endif

            </div>
            <!-- test -->




            <div class="col-12">
                <div class="actions-buttons-list d-flex  justify-content-between border_top  mt-3 bottom_padd">
                    <div class="dropimg d-flex">
                        <img src="{{asset('')}}images/elp2.png" class="dropimg1" alt="" />
                        <i class="fa-solid fa-caret-down myicon dropimg2" style="padding-top:5px; margin-left: 5px;"></i>
                    </div>
                    <div class="actions-buttons-button d-flex align-items-center small_viewicons2">
                        <i class="fa-regular fa-thumbs-up fa-flip-horizontal myicon" style="padding-top:4px; margin-right: 5px;"></i>
                        <p class="text text3 icon_text3 mb-0">Like</p>
                    </div>
                    <div class="actions-buttons-button d-flex align-items-center small_viewicons2">

                        <i class="fa-solid fa-comments myicon" style="padding-top:4px; margin-right: 5px;"></i>
                        <p class="text text3 icon_text3 mb-0">Comment</p>
                    </div>
                    <div class="actions-buttons-button d-flex align-items-center small_viewicons2">
                        <i class="fa-solid fa-retweet myicon" style="padding-top:4px; margin-right: 5px;"></i>
                        <p class="text text3 icon_text3 mb-0">Repost</p>
                    </div>
                    <div class="actions-buttons-button d-flex align-items-center small_viewicons2">
                        <i class="fa-solid fa-paper-plane myicon" style="padding-top:4px; margin-right: 5px;"></i>
                        <p class="text text3 icon_text3 mb-0">Send</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 my-2 text-center">
    <a class="text-decoration-none btn btn-danger"
        onclick="return confirm('Are you sure you want to delete this post?');"
        href="{{url('post_delete/' .encrypt($platforms['Linkedin'][0]->id))}}">
        Delete
    </a>
</div>
@endif
<script>
$(document).ready(function() {

    function setImagePreview() {
        $('.image_main_container').each(function() {
            var mainlength = $(this).find('.post_modal_con').length;
           
            if (mainlength == 1) {
                $(this).css('column-count', '1');
            } else {
                $(this).css('column-count', '2');
            }

            if (mainlength == 1 || mainlength == 2) {
                $(this).find('.post_modal_con').addClass('max_height_popup');
            } else {
                $(this).find('.post_modal_con').removeClass('max_height_popup');

            }
            if (mainlength == 3) {
                $(this).find('.post_modal_con:nth-child(1)').addClass('post_modal_child_img1');
                $(this).find('.post_modal_con:nth-child(2)').addClass('post_modal_child_img2');
            } else {
                $(this).find('.post_modal_con:nth-child(1)').removeClass('post_modal_child_img1');
            }

            if (mainlength == 4) {
                $(this).find('.post_modal_con:nth-child(3)').addClass('post_modal_child_img3');
            } else {
                $(this).find('.post_modal_con:nth-child(3)').removeClass('post_modal_child_img3');
            }
            // alert('sddd');
        });
    }

    setImagePreview();

});
</script>
