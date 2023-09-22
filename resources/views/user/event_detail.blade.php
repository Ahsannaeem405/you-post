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
<!-- Tab content -->
<div class="tab-content post-detail-tab-content" id="myTabContent">
    @if(in_array('Facebook',$platformsName))
    <div class="tab-pane fade " id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
        <div class="nav_card1 mt-3">
            <div class="row p-3">
                <div class="col-7 d-flex align-items-center">
                    <div class="d-flex">
                        <div>
                            <img src="{{asset('images/fb_p.png')}}" class="img-fluid" alt="" />
                        </div>

                        <div class="Evano">
                            <h3 class="mb-0">{{$platforms['Facebook'][0]->user->name}}
                                <img src="{{asset('images/offical2.png')}}" class="" alt="" height="" />
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
                        <a href="" style="font-size:12px;"><img src="{{asset('images/copy.png')}}" class=""
                                alt="" />View post in live feed</a>
                        <p class="text-warning text-center" style="font-size:10px; padding-right:26px;"></p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="post_text pb-2">
                        <p class="mb-0">{{$platforms['Facebook'][0]->content}}</p>
                        <a href="">{{$platforms['Facebook'][0]->tag}}</a>
                    </div>
                </div>
                <div class="col-12">
                    @php
                    $Facebookimages = explode(',',$platforms['Facebook'][0]->media);
                    @endphp
                    <div class="image_main_container container">
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
                <div class="actions-buttons-list d-flex p-0 justify-content-between border_top mt-3">

                    <div class="actions-buttons-button">

                        <img src="{{asset('images/t1.png')}}" class="img-fluid" alt="" height="20" />
                        <span class="text text3">Like</span>
                    </div>
                    <div class="actions-buttons-button">
                        <i class="fa-regular fa-message" style="color:#9DA1A5; padding-top:4px;"></i>
                        <span class="text text3">Comment</span>
                    </div>
                    <div class="actions-buttons-button">
                        <img src="{{asset('images/tt3.png')}}" class="img-fluid" alt="" height="20" />
                        <span class="text text3">Share</span>
                    </div>
                    <div class="actions-buttons-button d-flex">
                        <div><img src="{{asset('images/admn.png')}}" class="img-fluid" alt="" height="13"
                                style="height:25px;" /></div>
                        <div class="mt-1">
                            <img src="{{asset('images/drop.png')}}" class="img-fluid" alt="" height="13"
                                style="height:14px;" />
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-12 my-2 text-center delete2">
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
        <div class="row p-3">
            <div class="col-7">
                <div class="d-flex">
                    <div>
                        <img src="{{asset('images/insta_elp.png')}}" class="img-fluid" alt="" />
                    </div>

                    <div class="Evano">
                        <h3 class="mb-0 user_name_insta">{{$platforms['Instagram'][0]->user->name}} <img
                                src="{{asset('')}}images/offical.png" class="" alt="" height="14" /></h3>

                    </div>

                </div>
            </div>
            <div class="col-5">
                <div>
                    <a href="" style="font-size:12px;"><img src="{{asset('')}}images/copy.png" class="" alt="" />
                        View post in live feed</a>
                    <p class="text-warning text-center" style="font-size:12px; padding-right:26px;"></p>
                </div>
            </div>
            <div class="col-12 ">
                @php
                $InstagramImages = explode(',',$platforms['Instagram'][0]->media);
                @endphp
                <div class="image_main_container  {{count($InstagramImages) == 1 ? 'single_image' : ''}}">
                    @if($platforms['Instagram'][0]->media_type=='image')

                    @foreach($InstagramImages as $image)
                    @if($loop->index <= 3) <div class="post_modal_con"
                        style="background-image: url({{asset('content_media/' .$image)}})">
                </div>
                @elseif($loop->index == 4)
                <div class="post_modal_con" style="background-image: url({{asset('content_media/' .$image)}})">

                    <div class="fb_remain_img_counter">
                        <span>
                            <span><i class="fa-solid fa-plus"></i></span>
                            <span class="counter_val">{{count($InstagramImages)-4}}</span>
                        </span>
                    </div>
                    <div class="image_shade"> </div>

                </div>
                @endif
                @endforeach
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
        <div class="actions-buttons-list d-flex p-0 justify-content-between mt-3">


            <div class="actions-buttons-button">
                <div class="d-flex" style="gap: 0 18px;">
                    <i class="fa-regular fa-heart myinsta_icon1"></i>
                    <i class="fa-regular fa-comment fa-flip-horizontal myinsta_icon2"></i>
                    <i class="fa-regular fa-paper-plane myinsta_icon3"></i>
                </div>
            </div>
            <div class="actions-buttons-button">
                <i class="fa-solid fa-ellipsis myinsta_icon"></i>
            </div>


            <div class="actions-buttons-button">
            </div>

            <div class="actions-buttons-button d-flex">
                <i class="fa-regular fa-bookmark myinsta_icon"></i>
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
        <div class="post_text pb-2">
            <p class="mb-0">{{$platforms['Instagram'][0]->content}}</p>
            <a href="">{{$platforms['Instagram'][0]->tag}}</a>
        </div>
    </div>

    <div class="col-12 schedule_date">
        <span>
            <span class="text-secondary">Scheduled at:</span>
            <span
                class="text-primary">{{\Carbon\Carbon::parse($platforms['Twitter'][0]->posted_at)->format('d M Y h:i A')}}</span>
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
        <div class="row p-3">
            <div class="col-7 ">
                <div class="d-flex">
                    <div> <img src="{{asset('')}}images/elpx.png" class="navcard_3_img1" alt="" />
                    </div>
                    <div class="Evano">
                        <h3 class="mb-0 user_name">{{$platforms['Twitter'][0]->user->name}} <img src="" class="" alt=""
                                height="14" /></h3>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div>
                    <a href="" style="font-size:12px;"><img src="{{asset('')}}images/copy.png" class="" alt="" />
                        View post in live feed</a>
                    <p class="text-warning text-center" style="font-size:12px; padding-right:26px;"></p>
                </div>
            </div>
            <div class="post_title">
                <div class="col-12">
                    <div class="post_text pb-2">
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
                        class="text-primary">{{\Carbon\Carbon::parse($platforms['Instagram'][0]->posted_at)->format('d M Y h:i A')}}</span>
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
        <div class="row p-3">
            <div class="col-7 ">
                <div class="d-flex">
                    <div> <img src="{{asset('')}}images/elplinkedin.png" class="" alt="" />
                    </div>
                    <div class="Evano card_4Evano">
                        <h3 class="mb-0 user_name">{{$platforms['Linkedin'][0]->user->name}} <img src="" class="" alt=""
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
                    <a href="" style="font-size:12px;"><img src="{{asset('')}}images/copy.png" class="" alt="" />
                        View post in live feed</a>
                    <p class="text-warning text-center" style="font-size:12px; padding-right:26px;"></p>
                </div>
            </div>

            <div class="col-12">
                <div class="post_text pb-2">
                    <p class="mb-0">{{$platforms['Linkedin'][0]->content}}</p>
                    <a href="">{{$platforms['Linkedin'][0]->tag}}</a>
                </div>
            </div>
            <!-- <div class="col-12">
                @if($platforms['Linkedin'][0]->media_type=='image')
                <div class="image_main_container">
                    @foreach(explode(',',$platforms['Linkedin'][0]->media) as $image)
                    @if($image !== null)
                    <div class="post_modal_con" style="background-image: url({{asset('content_media/' .$image)}})">
                    </div>
                    @endif
                    @endforeach

                </div>
                @endif

                @if($platforms['Linkedin'][0]->media_type=='video')
                <div class="video_container">
                    <video src="{{asset("content_media/{$platforms['Linkedin'][0]->media}")}}" controls></video>
                    @endif
                </div>
            </div> -->
            <!-- test -->
            <div class="col-12 ">
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
                    <div class="dropimg">
                        <img src="{{asset('')}}images/elp2.png" class="dropimg1" alt="" />
                        <i class="fa-solid fa-caret-down myicon dropimg2"></i>
                    </div>
                    <div class="actions-buttons-button">
                        <i class="fa-regular fa-thumbs-up fa-flip-horizontal myicon"></i>
                        <span class="text text3">Like</span>
                    </div>
                    <div class="actions-buttons-button">

                        <i class="fa-solid fa-comments myicon"></i>
                        <span class="text text3">Comment</span>
                    </div>
                    <div class="actions-buttons-button">
                        <i class="fa-solid fa-retweet myicon"></i>
                        <span class="text text3">Repost</span>
                    </div>
                    <div class="actions-buttons-button">
                        <i class="fa-solid fa-paper-plane myicon"></i>
                        <span class="text text3">Send</span>
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
<!-- <script>
function post_cards(i) {
    // var Elements = $('.image_main_container').find('.post_modal_con');
    const secondContainer = $('.image_main_container:eq(' + i + ')'); //within the second container
    const childElements = secondContainer.find('.post_modal_con');
    // var allImages = Elements;
    if (childElements.length === 1) {
        $(".image_main_container").css({
            "column-count": "1",

        });

    } else {
        $(".image_main_container").css({
            "column-count": "2",

        });
    }
    return childElements.length;

}
$('#tab1-tab').click(function() {
    alert(post_cards(1));
});
$('#tab2-tab').click(function() {
    alert(post_cards(2));
});
$('#tab3-tab').click(function() {
    alert(post_cards(3));
});
$('#tab4-tab').click(function() {
    alert(post_cards(4));
});
post_cards(0);

// alert(allImages); 
</script> -->

<script>
$(document).ready(function () {

    function setImagePreview()
    {
        $('.image_main_container').each(function(){
            var mainlength = $(this).find('.post_modal_con').length;
            // alert(mainlength);
            if(mainlength == 1)
            {
                $(this).css('column-count', '1');
            }else{
                $(this).css('column-count', '2');
            }

            if(mainlength == 1 || mainlength == 2){
                $(this).find('.post_modal_con').addClass('max_height_popup');
            }else{
                $(this).find('.post_modal_con').removeClass('max_height_popup');

            }
            if(mainlength == 3){
                $(this).find('.post_modal_con:nth-child(1)').addClass('post_modal_child_img1');
                $(this).find('.post_modal_con:nth-child(2)').addClass('post_modal_child_img2');
            }
            else{
                $(this).find('.post_modal_con:nth-child(1)').removeClass('post_modal_child_img1');
            }
        
            if(mainlength == 4){
                $(this).find('.post_modal_con:nth-child(3)').addClass('post_modal_child_img3');
            }
            else{
                $(this).find('.post_modal_con:nth-child(3)').removeClass('post_modal_child_img3');
            }
            // alert('sddd');
        });
    }

    setImagePreview();
});
</script>

