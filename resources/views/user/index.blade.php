@extends('user_layout.main')
<style>
.create_preview_post_wrapInner {
    /* background: #fff;
    padding: 20px;
    border-radius: 5px; */
    padding: unset !important;
}
.AIgeneratedContent .AIgeneratedContentInner {
    background: rgb(235 235 235);
    padding: 10px;
    border-radius: 10px;
    margin-top: 25px !important;
}

.create_preview_post_index {
    display: flex !important;
    max-width: 100% !important;
    gap: 0px !important;
    overflow: hidden;
    justify-content: space-between;
}
.create_preview_post_index .create_preview_post_index_itemLeft {
    width: 30%;
    background: #fff;
    padding: 20px 10px;
    border-radius: 5px;
}
.create_preview_post_index .create_preview_post_index_itemRight {
    width: calc(70% - 20px);
    display: flex;
    background: #fff;
    padding: 20px 10px;
    border-radius: 5px;
}
 .create_preview_post_index_itemRight .create_preview_post_index_itemRightInner {
    width: 40%;
}
 .create_preview_post_index_itemRight .AIgeneratedContent.create_preview_post_index_itemRightInner {
    width: 60%;
}
 .create_preview_post_index_item .preview_post,
 .create_preview_post_index_item .preview_post .preview_wrap {
    width: 100% !important;
}
.create_preview_post_index .create_post {}
.create_preview_post_index .justify-content-center {}
.create_preview_post_index .AIgeneratedContent {}
.AIgeneratedContentAdd {
    width: 60px;
}
.AIgeneratedContentAdd a {
    background: rgb(15 116 206);
    color: #fff;
    display: inline-block;
    text-decoration: none;
    padding: 1px 10px;
    border-radius: 5px;
    font-size: 14px;
    border: 1px solid transparent;
}
.AIgeneratedContentText {
    width: calc(100% - 65px);
    margin-left: 5px;
}
.AIgeneratedContentText p {
    font-size: 12px;
}
.AIgeneratedCarousel {
    position: relative;
}
.AIgeneratedCarouselWrp {
    margin-top: 30px;
}
.AIgeneratedCarousel {}
.AIgeneratedCarousel .item .itemCnt {
    position: relative;
}
.AIgeneratedCarousel .item .itemCntPlusWrp {}
.AIgeneratedCarousel .item .itemCntPlusWrp i {
    position: absolute;
    top: 40%;
    left: 40%;
    margin: auto;
    z-index: 999;
    font-size: 20px;
    background: #0f74ce;
    color: #fff;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 2px solid #000;
    cursor: pointer;
    display: none;
}
.AIgeneratedCarousel .owl-item.active .item .itemCntPlusWrp i {
    display: flex;
}
.AIgeneratedCarousel .owl-item .item {
    opacity: 0.5;
}

.AIgeneratedCarousel .owl-item.active {}
.AIgeneratedCarousel .owl-item.cloned {}

.AIgeneratedCarousel .owl-item.cloned:nth-child(2) {}

.AIgeneratedCarousel .owl-item.active:nth-child(2) {}

.AIgeneratedCarousel .owl-item.active .item {
    opacity: unset;
}
.AIgeneratedCarousel .owl-item.active:first-of-type {}

.AIgeneratedCarousel .owl-nav {
    position: absolute;
    right: 30px;
    top: 40%;
    width: 80px;
    margin-top: unset !important;
    background: #0f74ce;
    color: #fff;
    border-radius: 5px;
}
.AIgeneratedCarousel .owl-nav .owl-prev {
    display: none !important;
}
.AIgeneratedCarousel .owl-nav button:hover {
    background: transparent !important;
}

.AIgeneratedCarouselBtmBtn {
    display: flex;
    justify-content: end;
    margin: 60px 0 0px;
}
.AIgeneratedCarouselBtmBtn a {
    display: inline-block;
    background: rgb(15 116 206);
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
    font: 13px;
    margin: 2px;
    border: 1px solid transparent;
}
.AIgeneratedCarouselBtmBtn a:hover,
.AIgeneratedContentAdd a:hover {
    background: transparent;
    color: rgb(15 116 206);
    border: 1px solid rgb(15 116 206);
}




.create_preview_post_wrap {
    padding-bottom: 20px !important;
}
.post_manage_calendar {
    padding-top: unset !important;
}
.post_manage_calendar .container { 
    background: #fff;
    padding-top: 30px;
}
.post_manage_calendar .fc .fc-toolbar {
    background: #fff !important;
}
.post_manage_calendar .the_post_manager {
    max-width: 100% !important;
}

.fc-head {}
.fc-head .fc-row {}
.fc-head .fc-row thead {}
.fc-head .fc-row thead .fc-day-header {
    padding: 40px 0;
}

.fc-unthemed .fc-content, .fc-unthemed .fc-divider,
.fc-unthemed .fc-list-heading td, .fc-unthemed .fc-list-view,
.fc-unthemed .fc-popover, .fc-unthemed .fc-row,
.fc-unthemed tbody, .fc-unthemed td, .fc-unthemed th,
.fc-unthemed thead {
    border-color: transparent !important;
}


.form-wizard {
    padding: 0px !important;
    margin: unset;
    border: unset !important;
}
.form-wizard .wizard-fieldset.show {
    padding: 0 !important;
}
.create_preview_post .create_post .icon_buttons_tags .form-control {
    box-shadow: -1px 0px 3px 2px rgba(0, 0, 0, 0.25) inset !important;
}

.post_now_button {
    display: flex;
}
.post_now_button input {
    min-width: unset !important;
    font-weight: 600 !important;
    font-size: 14px !important;
    border: 1px solid transparent !important;
    width: calc(50% - 10px) !important;
    margin: 5px !important;
    background: rgb(15 116 206) !important;
}
.post_now_button.next_plat_button {}
.post_now_button.schedule_post input {}
.post_now_button.schedule_post_button input:nth-child(1) {
    background: #28a745!important;
}
.post_now_button.schedule_post_button input:nth-child(2) {
    background: #dc3545!important;
}
.list-unstyled.form-wizard-steps {
    margin-top: 20px;
}
.Customemojiarea {
    min-height: 130px !important;
}



@media screen and (max-width:768px) {
    .create_preview_post_wrapInner {
        padding: 10px !important;
    }
    .create_preview_post_index {
        flex-direction: column;
    }
    .create_preview_post_index .create_preview_post_index_item {
        width: 100% !important;
    }
    .create_preview_post_index .create_preview_post_index_itemLeft {
        margin-bottom: 15px;
    }
    .create_preview_post_index .create_preview_post_index_item.create_preview_post_index_itemRight {
        flex-direction: column;
    }
    .AIgeneratedCarousel .item .itemCntPlusWrp i {

    }
    .create_preview_post_index_itemRight .create_preview_post_index_itemRightInner,
    .create_preview_post_index_itemRight .AIgeneratedContent.create_preview_post_index_itemRightInner {
        width: 100% !important;
    }
    .create_preview_post_index .AIgeneratedContent h4 {
        margin-top: 20px;
        text-align: center;
    }
}
@media screen and (max-width:575px) {
    .AIgeneratedCarousel .item .itemCntPlusWrp i {
        top: 45%;
        left: 45%;
    }
    .plus-icon-calender {
        padding: 5px !important;
        font-size: 12px !important;
        width: 10px !important;
        height: 10px !important;
        left: 50px !important;
    }
    .fc-scroller.fc-day-grid-container {
        height: 300px !important;
    }
    .AIgeneratedCarousel .owl-nav {
        bottom: -40px;
        left: calc(50% - 35px);
        top: unset;
        right: unset;
    }
}

</style>
@section('content')


    <!--===== Markup For "Create & Preview Post" Starts Here =====-->
    <section class="create_preview_post_wrap">
        <div class="container create_preview_post_wrapInner">
            <div class="create_preview_post create_preview_post_index">

                <div class="create_post create_preview_post_index_item create_preview_post_index_itemLeft">


                    <form action="{{url('create_post')}}" class="" method="post" enctype="multipart/form-data">
                        @csrf

                        <section class="wizard-section" style="display: none">
                            <div class="row no-gutters">

                                <div class="col-lg-12">
                                    <div class="form-wizard card my-2">

                                        <div class="form-wizard-header">

                                            <ul class="list-unstyled form-wizard-steps clearfix">
                                                @if(in_array(('Facebook'),auth()->user()->account->platforms))
                                                    <li section="fb"><span
                                                            class="d-flex justify-content-center align-items-center"><img
                                                                src="{{asset('images/FB_Color.png')}}" width="20px"
                                                                alt=""></span></li>
                                                @endif
                                                @if(in_array(('Instagram'),auth()->user()->account->platforms))
                                                    <li section="insta"><span
                                                            class="d-flex justify-content-center align-items-center"><img
                                                                src="{{asset('images/Instagram_Color.png')}}"
                                                                width="20px" alt=""></span></li>
                                                @endif
                                                @if(in_array(('Twitter'),auth()->user()->account->platforms))
                                                    <li section="twitter"><span><span
                                                                class="d-flex justify-content-center align-items-center"><img
                                                                    src="{{asset('images/Twitter_Color.png')}}"
                                                                    width="20px" alt=""></span></span></li>
                                                @endif
                                                @if(in_array(('Linkedin'),auth()->user()->account->platforms))
                                                    <li section="linkedin"><span><span
                                                                class="d-flex justify-content-center align-items-center"><img
                                                                    src="{{asset('images/Linkedin_Color.png')}}"
                                                                    width="20px" alt=""></span></span></li>
                                                @endif
                                            </ul>
                                        </div>
                                        @if(in_array(('Facebook'),auth()->user()->account->platforms))
                                            <fieldset class="wizard-fieldset fb">
                                                <h5>Edit Facebook</h5>

                                                <div class="form-group emoji_parent">
                                                    <textarea onkeyup="updateDiv(this)" onchange="suggested_text(this)"
                                                              required name="facebook_content" id="" cols="30" rows="3"
                                                              class="form-control wizard-required emojiarea"
                                                              placeholder="Write your post...">{{old('facebook_content')}}</textarea>
                                                </div>
                                                <div class="icon_buttons_tags mt-3">
                                                    <div class="icon_buttons grid_item">
                                                        <ul class="p-0">
                                                            <li>
                                                                <a href="javascript:void(0)" class="image_or_video"
                                                                   typpe="image" social="fb" fordata="image_or_videofb"><label
                                                                        for="image_or_videofb">
                                                                        <img src="{{asset('')}}images/Camera_Icon.png"
                                                                             class="img-fluid" alt=""/>
                                                                    </label>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="image_or_video"
                                                                   typpe="video" social="fb" fordata="image_or_videofb"><label
                                                                        for="image_or_videofb">
                                                                        <img
                                                                            src="{{asset('')}}images/Video_Player_Icon.png"
                                                                            class="img-fluid" alt=""/>
                                                                    </label>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="open_emoji">
                                                                    <img src="{{asset('')}}images/Emoji_Icon.png"
                                                                         class="img-fluid" alt=""/>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <input type="file" name="facebook_media"
                                                           class="image d-none file_image_video" id="image_or_videofb"
                                                           accept="image/*,video/*">
                                                    <input type="hidden" name="media_type_facebook" id="media_type_fb">


                                                    <div class="tags_input_wrap grid_item">
                                                        <div class="tags_input">
                                                            <input onkeyup="Namechangefun(this)" id="namechange"
                                                                   name="facebook_tag" type="text"
                                                                   class="form-control "
                                                                   placeholder="tags" value="{{old('facebook_tag')}}">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group clearfix">
                                                    <a href="javascript:;" class="form-wizard-previous-btn float-left">Back</a>
                                                    <a href="javascript:;"
                                                       class="form-wizard-next-btn float-right">Next</a>
                                                </div>
                                            </fieldset>
                                        @endif

                                        @if(in_array(('Instagram'),auth()->user()->account->platforms))
                                            <fieldset class="wizard-fieldset insta">
                                                <h5>Edit Instagram</h5>
                                                <div class="IG_social_main must_add_image ">
                                                    <div class="IG_main_card">
                                                        <div class="d-flex align-items-center">
                                                            <div class="IG_card_title">
                                                                <h5>Instagram is selected you must upload an media</h5>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="form-group emoji_parent">
                                                    <textarea onkeyup="updateDiv(this)" onchange="suggested_text(this)"
                                                              required name="instagram_content" id="" cols="30" rows="3"
                                                              class="form-control wizard-required emojiarea"
                                                              placeholder="Write your post...">{{old('instagram_content')}}</textarea>
                                                </div>
                                                <div class="icon_buttons_tags mt-3">
                                                    <div class="icon_buttons grid_item">
                                                        <ul class="p-0">
                                                            <li>
                                                                <a href="javascript:void(0)" class="image_or_video"
                                                                   typpe="image" social="insta"
                                                                   fordata="image_or_video_insta"><label
                                                                        for="image_or_video_insta">
                                                                        <img src="{{asset('')}}images/Camera_Icon.png"
                                                                             class="img-fluid" alt=""/>
                                                                    </label>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="image_or_video"
                                                                   typpe="video" social="insta"
                                                                   fordata="image_or_video_insta"><label
                                                                        for="image_or_video_insta">
                                                                        <img
                                                                            src="{{asset('')}}images/Video_Player_Icon.png"
                                                                            class="img-fluid" alt=""/>
                                                                    </label>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="open_emoji">
                                                                    <img src="{{asset('')}}images/Emoji_Icon.png"
                                                                         class="img-fluid" alt=""/>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <input type="file" name="insta_media" required
                                                           class="image d-none file_image_video wizard-required"
                                                           id="image_or_video_insta" accept="image/*,video/*">
                                                    <input type="hidden" name="media_type_instagram"
                                                           id="media_type_insta">


                                                    <div class="tags_input_wrap grid_item">
                                                        <div class="tags_input">
                                                            <input onkeyup="Namechangefun(this)" id="namechange"
                                                                   name="instagram_tag" type="text"
                                                                   class="form-control"
                                                                   placeholder="tags" value="{{old('instagram_tag')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <a href="javascript:;" class="form-wizard-previous-btn float-left">Back</a>
                                                    <a href="javascript:;"
                                                       class="form-wizard-next-btn float-right">Next</a>
                                                </div>
                                            </fieldset>
                                        @endif

                                        @if(in_array(('Twitter'),auth()->user()->account->platforms))
                                            <fieldset class="wizard-fieldset twitter">
                                                <h5>Edit Twitter</h5>
                                                <div class="form-group emoji_parent">
                                                    <textarea onkeyup="updateDiv(this)" onchange="suggested_text(this)"
                                                              required name="twitter_content" id="" cols="30" rows="3"
                                                              class="form-control wizard-required emojiarea"
                                                              placeholder="Write your post...">{{old('twitter_content')}}</textarea>
                                                </div>
                                                <div class="icon_buttons_tags mt-3">
                                                    <div class="icon_buttons grid_item">
                                                        <ul class="p-0">
                                                            <li>
                                                                <a href="javascript:void(0)" class="open_emoji">
                                                                    <img src="{{asset('')}}images/Emoji_Icon.png"
                                                                         class="img-fluid" alt=""/>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>


                                                    <div class="tags_input_wrap grid_item">
                                                        <div class="tags_input">
                                                            <input onkeyup="Namechangefun(this)" id="namechange"
                                                                   name="twitter_tag" type="text"
                                                                   class="form-control "
                                                                   placeholder="tags" value="{{old('twitter_tag')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <a href="javascript:;" class="form-wizard-previous-btn float-left">Back</a>
                                                    <a href="javascript:;"
                                                       class="form-wizard-next-btn float-right">Next</a>
                                                </div>
                                            </fieldset>
                                        @endif


                                        @if(in_array(('Linkedin'),auth()->user()->account->platforms))
                                            <fieldset class="wizard-fieldset linkedin">
                                                <h5>Edit Linkedin</h5>

                                                <div class="form-group emoji_parent">
                                                    <textarea onkeyup="updateDiv(this)" onchange="suggested_text(this)"
                                                              required name="linkedin_content" id="" cols="30" rows="3"
                                                              class="Customemojiarea form-control wizard-required emojiarea"
                                                              placeholder="Write your post...">{{old('linkedin_content')}}</textarea>
                                                </div>
                                                <div class="icon_buttons_tags mt-3">
                                                    <div class="icon_buttons grid_item">
                                                        <ul class="p-0">
                                                            <li>
                                                                <a href="javascript:void(0)" class="image_or_video"
                                                                   typpe="image" social="linkedin"
                                                                   fordata="image_or_video_linkedin"><label
                                                                        for="image_or_video_linkedin">
                                                                        <img src="{{asset('')}}images/Camera_Icon.png"
                                                                             class="img-fluid" alt=""/>
                                                                    </label>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="image_or_video"
                                                                   typpe="video" social="linkedin"
                                                                   fordata="image_or_video_linkedin"><label
                                                                        for="image_or_video_linkedin">
                                                                        <img
                                                                            src="{{asset('')}}images/Video_Player_Icon.png"
                                                                            class="img-fluid" alt=""/>
                                                                    </label>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="open_emoji">
                                                                    <img src="{{asset('')}}images/Emoji_Icon.png"
                                                                         class="img-fluid" alt=""/>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <input type="file" name="linkedin_media"
                                                           class="image d-none file_image_video"
                                                           id="image_or_video_linkedin" accept="image/*,video/*">
                                                    <input type="hidden" name="media_type_linkedin"
                                                           id="media_type_linkedin">


                                                    <div class="tags_input_wrap grid_item">
                                                        <div class="tags_input">
                                                            <input onkeyup="Namechangefun(this)" id="namechange"
                                                                   name="linkedin_tag" type="text" class="form-control"
                                                                   placeholder="tags" value="{{old('linkedin_tag')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <a href="javascript:;" class="form-wizard-previous-btn float-left">Back</a>
                                                    <a href="javascript:;"
                                                       class="form-wizard-next-btn float-right">Next</a>
                                                </div>
                                            </fieldset>
                                        @endif

                                        <div class="post_now_button next_plat_button my-4">
                                            <input type="submit" class="btn post_later_now_btn" value="Back">
                                            <input type="submit" class="btn post_later_now_btn" value="Next Platform">
                                        </div>

                                        <div class="post_now_button schedule_post_button">
                                            <input type="submit" class="btn post_later_now_btn" value="Schedule Post"  data-bs-toggle="modal" data-bs-target="#TimetoUploadPost">
                                            <input type="submit" class="btn post_later_now_btn" value="Post Now">
                                        </div>


                                        {{-- -------------------------------- --}}
                                       
  
                                        <!-- Modal -->
                                        <div class="modal fade" id="TimetoUploadPost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Time to upload post</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="post_later">
                                                        <div class="tabs_type_heading_sm">
                                                            <span id="browsertime"></span>
                                                            <input type="hidden" class="browsertimeinput" name="time">
                                                            <input type="hidden" class="posttime" value="now" name="posttime">
                                                            <input type="hidden" name="timezone" class="timezone">
                                                            <h4>Post Later</h4>
                                                        </div>
                            
                                                        <div class="pick_date_from_calendar">
                                                            <div class="calendar"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary d-none">Save changes</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        {{-- -------------------------------- --}}

                                    </div>
                                </div>
                            </div>
                        </section>





                        
                        {{-- <div class="post_later d-none">
                            <div class="tabs_type_heading_sm">
                                <span id="browsertime"></span>
                                <input type="hidden" class="browsertimeinput" name="time">
                                <input type="hidden" class="posttime" value="now" name="posttime">
                                <input type="hidden" name="timezone" class="timezone">
                                <h4>Post Later</h4>
                            </div>

                            <div class="pick_date_from_calendar">
                                <div class="calendar"></div>
                            </div>
                        </div> --}}


                    </form>
                </div>

                <div class="create_preview_post_index_item create_preview_post_index_itemRight">

                    <div class="d-lg-flex justify-content-center create_preview_post_index_itemRightInner">
                        <div class="preview_post">
                            <div class="sub_heading">
                                <h4>Post Preview</h4>
                            </div>

                            <div class="preview_wrap">
                                <div class="col-md-12">
                                    <div class="Mobcompny-title">
                                        <div class="w-50">
                                            <h6>Facebook</h6>
                                        </div>
                                        <div class="w-50 Mobsocial-icon">
                                            <span><i class="fa-solid fa-plus"></i></span>
                                            <span><i class="fa-solid fa-magnifying-glass"></i></span>
                                            <span><i class="fab fa-facebook-messenger"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="Mobcompny-smallicon">
                                    <span><i class="fa-solid fa-house"></i></span>
                                    <span><i class="fa fa-youtube-play"></i></span>
                                    <span><i class="fas fa-user-circle"></i></span>
                                    <span><i class="fa-solid fa-bell"></i></span>
                                    <span><i class="fa-solid fa-bars"></i></span>
                                </div>


                                <div class="the_preview pt-2">
                                    <div class="col-md-12" style="height: 100px">
                                        <div class="MainMobileview d-flex">
                                            <img src="{{asset('images/ava.png')}}" class="img-fluid" width="40" height="40"
                                                alt="">
                                            <span id="">{{auth()->user()->name}}</span>
                                        </div>
                                        <p class="m-0"></p>
                                        <div class="Mobcart_title">
                                            <span id="mypostresult">Write your post...</span>
                                            <span class="icon icon-privacy text-primary" id="mynameresult"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="MainMobileimg">
                                            <div class="media-container">
                                                <img src="" class="d-none preview_image" alt="">
                                                <div id="mediaContainervideo">
                                                    <video class="d-none video_preview" controls>
                                                        <source src="movie.mp4" type="video/*">
                                                    </video>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="Mobcart_title bile d-flex">
                                            <div class="reactions">8❤️</div>
                                            <div class="total-comments u-margin-inline-start">
                                                <a>12 Comments</a>
                                                <a>2 Shares</a>
                                            </div>
                                        </div>
                                        <div class="actions-buttons mt-2">
                                            <ul class="actions-buttons-list d-flex p-0">
                                                <li class="actions-buttons-item">
                                                    <button class="actions-buttons-button"><i
                                                            class="fa-solid fa-thumbs-up"></i><span class="text">Like</span>
                                                    </button>
                                                </li>
                                                <li class="actions-buttons-item">
                                                    <button class="actions-buttons-button"><i
                                                            class="fa-solid fa-comment"></i><span
                                                            class="text">Comment</span></button>
                                                </li>
                                                <li class="actions-buttons-item">
                                                    <button class="actions-buttons-button"><i class="fa-solid fa-share"></i><span
                                                            class="text">Share</span></button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="preview_post position-relative d-none">

                            <div class="loader d-none"></div>


                            <div class="sub_heading">
                                <h4>Post Suggested</h4>
                            </div>

                            <div class="preview_wrap">
                                <div class="col-md-12">
                                    <div class="Mobcompny-title">
                                        <div class="w-50">
                                            <h6>Facebook</h6>
                                        </div>
                                        <div class="w-50 Mobsocial-icon">
                                            <span><i class="fa-solid fa-plus"></i></span>
                                            <span><i class="fa-solid fa-magnifying-glass"></i></span>
                                            <span><i class="fab fa-facebook-messenger"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="Mobcompny-smallicon">
                                    <span><i class="fa-solid fa-house"></i></span>
                                    <span><i class="fa fa-youtube-play"></i></span>
                                    <span><i class="fas fa-user-circle"></i></span>
                                    <span><i class="fa-solid fa-bell"></i></span>
                                    <span><i class="fa-solid fa-bars"></i></span>
                                </div>


                                <div class="the_preview pt-2">
                                    <div class="col-md-12" style="height: 67%">

                                        <div class="MainMobileview d-flex">
                                            <img src="{{asset('images/ava.png')}}" class="img-fluid" width="40" height="40"
                                                alt="">
                                            <span id="">{{auth()->user()->name}}</span>
                                        </div>
                                        <p class="m-0"></p>
                                        <div class="Mobcart_title">
                                            <span id="mypostresult_gpt">Write your post...</span>
                                            <span class="icon icon-privacy text-primary" id="mynameresult_gpt"> #tags</span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="Mobcart_title bile d-flex">
                                            <div class="reactions">8❤️</div>
                                            <div class="total-comments u-margin-inline-start">
                                                <a>12 Comments</a>
                                                <a>2 Shares</a>
                                            </div>
                                        </div>
                                        <div class="actions-buttons mt-2">
                                            <ul class="actions-buttons-list d-flex p-0">
                                                <li class="actions-buttons-item">
                                                    <button class="actions-buttons-button"><i
                                                            class="fa-solid fa-thumbs-up"></i><span class="text">Like</span>
                                                    </button>
                                                </li>
                                                <li class="actions-buttons-item">
                                                    <button class="actions-buttons-button"><i
                                                            class="fa-solid fa-comment"></i><span
                                                            class="text">Comment</span></button>
                                                </li>
                                                <li class="actions-buttons-item">
                                                    <button class="actions-buttons-button"><i class="fa-solid fa-share"></i><span
                                                            class="text">Share</span></button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="AIgeneratedContent create_preview_post_index_itemRightInner">
                        <div class="sub_heading">
                            <h4>AI Generated Content</h4>
                        </div>

                        <div class="AIgeneratedContentInner">
                            <div class="AIgeneratedContentData">

                                <div class="AIgeneratedContentDataWrp d-flex mb-3">
                                    <div class="AIgeneratedContentAdd">
                                        <a href="">Add +</a>
                                    </div>
                                    <div class="AIgeneratedContentText">
                                        <p class=" mb-0">This is an AIgenerated post from ChatGPT, designedfor, facebook</p>
                                    </div> 
                                </div>

                                <div class="AIgeneratedContentDataWrp d-flex mb-3">
                                    <div class="AIgeneratedContentAdd">
                                        <a href="">Add +</a>
                                    </div>
                                    <div class="AIgeneratedContentText">
                                        <p class=" mb-0">AI Generated Tags : #Tag1#, #TAG2, #TAG3</p>
                                    </div> 
                                </div>

                                <div class="AIgeneratedContentDataWrp d-flex mb-3">
                                    <div class="AIgeneratedContentAdd">
                                        <a href="">Add +</a>
                                    </div>
                                    <div class="AIgeneratedContentText">
                                        <p class=" mb-0">AI Generated Image</p>
                                    </div> 
                                </div>

                                <div class="AIgeneratedCarouselWrp">

                                    <div class="owl-carousel owl-theme AIgeneratedCarousel">
                            
                                        <div class="item">
                                            <div class="itemCnt">
                                                <div class="itemCntImg">
                                                    <img src="{{asset('images/Instagram_Color.png')}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="itemCntPlusWrp">
                                                    <i class="fa-solid fa-plus itemCntPlus" id=""></i>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="item">
                                            <div class="itemCnt">
                                                <div class="itemCntImg">
                                                    <img src="{{asset('images/Tiktok_Color.png')}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="itemCntPlusWrp">
                                                    <i class="fa-solid fa-plus itemCntPlus" id=""></i>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="item">
                                            <div class="itemCnt">
                                                <div class="itemCntImg">
                                                    <img src="{{asset('images/WhatsApp_Color.png')}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="itemCntPlusWrp">
                                                    <i class="fa-solid fa-plus itemCntPlus" id=""></i>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>


                                    <div class="AIgeneratedCarouselBtmBtn">
                                        <a href="">Edit / Prompt</a>
                                        <a href="">Add to Post</a>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>

                </div>




                {{-- Instagram card ------}}

                {{-- End Instagram card --}}
            </div>
        </div>
    </section>


    <!--===== Markup For "Create & Preview Post" Ends Here =====-->


    <!--===== Markup For "Post Manager" Starts Here =====-->
    <section class="post_manager">
        <div class="title_bar_wrap d-none">
            <div class="container">
                <div class="title_bar">
                    <div class="tabs_type_heading">
                        <h3>Post Manager</h3>
                    </div>

                    <div class="right_contents">
                        <ul>
                            <li class="filter_by">
                                <span>Filter by:</span>
                            </li>
                            <li>
                                <a class="filter_link" href="javascript:void(0)">PLATFORM</a>
                            </li>
                            <li>
                                <a class="filter_link" href="javascript:void(0)">VIDEO</a>
                            </li>
                            <li>
                                <a class="filter_link" href="javascript:void(0)">IMAGE</a>
                            </li>
                            <li class="month_name">
                                <span>December 2022</span>
                                <a href="javascript:void(0)"><img src="{{asset('images/V_Icon.png')}}" class="img-fluid"
                                                                  alt=""/></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="post_manage_calendar">
            <div class="container">
                <div class="the_post_manager">
                    <div id='postManagerCalendar'></div>
                </div>
            </div>
        </div>
    </section>
    <!--===== Markup For "Post Manager" Ends Here =====-->


    <!--===== Markup For "States Viewer" Starts Here =====-->
    <section class="stats_viewer_wrap">
        <div class="title_bar_wrap">
            <div class="container">
                <div class="title_bar">
                    <div class="tabs_type_heading">
                        <h3>Stats Viewer</h3>
                    </div>

                    <div class="right_contents">
                        <ul>
                            <li class="total_amount">
                                Total Posts: 1
                            </li>
                            <li class="total_amount">
                                Total Platforms: 5
                            </li>
                            <li class="month_name">
                                <span>December 2nd 2022</span>
                                <a href="javascript:void(0)"><img src="{{asset('images/V_Icon.png')}}" class="img-fluid"
                                                                  alt=""/></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="view_social_stats">
            <div class="container">
                <div class="stats_viewer">
                    <section id="tabs">
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="likes_tab" data-toggle="tab" href="#likes"
                               role="tab" aria-controls="likes" aria-selected="true">
                                <h4>Likes</h4>
                                <ul>
                                    <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid"
                                             alt=""/> {{$stattistics['total_fb_likes']}}</li>
                                    <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid"
                                             alt=""/> {{$stattistics['total_insta_likes']}}</li>
                                    <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid"
                                             alt=""/> {{$stattistics['total_twitter_likes']}}
                                    </li>
                                    <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt=""/>
                                        {{$stattistics['total_linkedin_likes']}}
                                    </li>
                                    <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt=""/> 1748
                                    </li>
                                </ul>
                            </a>

                            <a class="nav-item nav-link" id="shares_tab" data-toggle="tab" href="#shares" role="tab"
                               aria-controls="shares" aria-selected="false" disabled>
                                <h4>Shares</h4>
                                <ul>
                                    <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt=""/>   {{$stattistics['total_fb_shares']}}</li>
                                    <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt=""/>
                                        {{$stattistics['total_insta_shares']}}
                                    </li>
                                    <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt=""/>   {{$stattistics['total_twitter_shares']}}
                                    </li>
                                    <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt=""/>
                                        {{$stattistics['total_linkedin_shares']}}
                                    </li>
                                    <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt=""/> 1748
                                    </li>
                                </ul>
                            </a>



                            <a class="nav-item nav-link" id="comments_tab" data-toggle="tab" href="#comments" role="tab"
                               aria-controls="comments" aria-selected="false">
                                <h4>Comments</h4>
                                <ul>
                                    <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid"
                                             alt=""/> {{$stattistics['total_fb_comments']}}</li>
                                    <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid"
                                             alt=""/> {{$stattistics['total_insta_comments']}}</li>
                                    <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt=""/>
                                        {{$stattistics['total_twitter_comments']}}
                                    </li>
                                    <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt=""/>
                                        {{$stattistics['total_linkedin_comments']}}
                                    </li>
                                    <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt=""/> 1748
                                    </li>
                                </ul>
                            </a>


                        </div>


                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="likes" role="tabpanel"
                                 aria-labelledby="likes_tab">

                                <div class="states_graph">
                                    <div id="likesGraph" style="width: 100%; height: 500px">

                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="shares" role="tabpanel" aria-labelledby="shares_tab">

                                <div class="states_graph">
                                    <div id="sharesGraph" style="width: 100%; height: 500px">

                                    </div>
                                </div>

                            </div>



                            <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments_tab">

                                <div class="states_graph">
                                    <div id="commentsGraph" style="width: 100%; height: 500px">

                                    </div>
                                </div>

                            </div>

                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!--===== Markup For "States Viewer" Ends Here =====-->

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            if($('.wizard-fieldset').length==0){
                $('.wizard-section').hide();
            }else {
                $('.wizard-section').show();
            }
            $('.wizard-fieldset').last().find('.form-wizard-next-btn').remove();
            $('.wizard-fieldset').first().find('.form-wizard-previous-btn').remove();
            $('.list-unstyled.form-wizard-steps li:first').addClass('active');
            $('.wizard-fieldset:first').addClass('show');

            // click on next button
            $('.form-wizard-next-btn').click(function () {
                var parentFieldset = $(this).parents('.wizard-fieldset');
                var currentActiveStep = $(this).parents('.form-wizard').find('.form-wizard-steps .active');
                var next = $(this);
                var nextWizardStep = true;
                parentFieldset.find('.wizard-required').each(function () {
                    var thisValue = $(this).val();

                    if (thisValue == "") {
                        $(this).addClass("wizard-error");
                        nextWizardStep = false;
                    } else {
                        $(this).removeClass("wizard-error");
                    }
                });

                if (nextWizardStep) {

                    var nextFieldset = next.parents('.wizard-fieldset').next('fieldset');
                    if (nextFieldset.length > 0) {

                        next.parents('.wizard-fieldset').removeClass("show", "400");
                        currentActiveStep.removeClass('active').addClass('activated').next().addClass('active', "400");
                        next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show", "400");
                        $(document).find('.wizard-fieldset').each(function () {
                            if ($(this).hasClass('show')) {
                                var formAtrr = $(this).attr('data-tab-content');
                                $(document).find('.form-wizard-steps .form-wizard-step-item').each(function () {
                                    if ($(this).attr('data-attr') == formAtrr) {
                                        $(this).addClass('active');
                                        var innerWidth = $(this).innerWidth();
                                        var position = $(this).position();
                                        $(document).find('.form-wizard-step-move').css({
                                            "left": position.left,
                                            "width": innerWidth
                                        });
                                    } else {
                                        $(this).removeClass('active');
                                    }
                                });
                            }
                        });
                    }

                }
            });
            //click on previous button
            $('.form-wizard-previous-btn').click(function () {
                var counter = parseInt($(".wizard-counter").text());
                ;
                var prev = $(this);
                var currentActiveStep = $(this).parents('.form-wizard').find('.form-wizard-steps .active');
                prev.parents('.wizard-fieldset').removeClass("show", "400");
                prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show", "400");
                currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active', "400");
                $(document).find('.wizard-fieldset').each(function () {
                    if ($(this).hasClass('show')) {
                        var formAtrr = $(this).attr('data-tab-content');
                        $(document).find('.form-wizard-steps .form-wizard-step-item').each(function () {
                            if ($(this).attr('data-attr') == formAtrr) {
                                $(this).addClass('active');
                                var innerWidth = $(this).innerWidth();
                                var position = $(this).position();
                                $(document).find('.form-wizard-step-move').css({
                                    "left": position.left,
                                    "width": innerWidth
                                });
                            } else {
                                $(this).removeClass('active');
                            }
                        });
                    }
                });
            });
            //click on form submit button
            $(document).on("click", ".form-wizard .form-wizard-submit", function () {
                var parentFieldset = $(this).parents('.wizard-fieldset');
                var currentActiveStep = $(this).parents('.form-wizard').find('.form-wizard-steps .active');
                parentFieldset.find('.wizard-required').each(function () {
                    var thisValue = $(this).val();
                    if (thisValue == "") {
                        $(this).siblings(".wizard-form-error").slideDown();
                    } else {
                        $(this).siblings(".wizard-form-error").slideUp();
                    }
                });
            });

            // focus on input field check empty or not
            $(".form-control").on('focus', function () {
                var tmpThis = $(this).val();
                if (tmpThis == '') {
                    $(this).parent().addClass("focus-input");
                } else if (tmpThis != '') {
                    $(this).parent().addClass("focus-input");
                }
            }).on('blur', function () {
                var tmpThis = $(this).val();
                if (tmpThis == '') {
                    $(this).parent().removeClass("focus-input");
                    $(this).siblings('.wizard-form-error').slideDown("3000");
                } else if (tmpThis != '') {
                    $(this).parent().addClass("focus-input");
                    $(this).siblings('.wizard-form-error').slideUp("3000");
                }
            });

            $('.form-wizard-steps li').click(function () {
               $('.form-wizard-steps li').removeClass('active');
               $(this).addClass('active');
               var section=$(this).attr('section');
               $('.wizard-fieldset').removeClass('show');
               $('.'+section).addClass('show');

            })
        });





        
    // ---------------------
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots: false,
        onTranslated: setActiveItem,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:2
            }
        }
    });


    function setActiveItem(event) {
    var current = event.item.index;
    var owlItems = $('.owl-carousel .owl-item');

    owlItems.removeClass('active');
    owlItems.eq(current).addClass('active');
    }
    // ---------------------
    </script>
@endsection
