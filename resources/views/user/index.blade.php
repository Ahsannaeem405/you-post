@extends('user_layout.main')
<style>
/*    #image_div{
position: relative;
    }
    .cancel_mark{
      position: absolute;
        top: 14px;
        right: 70px;
        color: #000;
        font-weight: 800;
        display: none;

    }*/
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
    top: 45%;
    left: 45%;
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

.AIgeneratedCarousel .owl-nav .owl-next {
    width: 100%;
}

.AIgeneratedCarousel .owl-nav .owl-next span {
    position: relative;
    width: 90%;
    display: inline-block;
    text-align: end;
    padding-right: 20px;
}

.AIgeneratedCarousel .owl-nav .owl-next span::before {
    position: absolute;
    content: 'Next';
    left: 10px;
}

.AIgeneratedCarouselBtmBtn {
    display: flex;
    justify-content: end;
    margin: 60px 0 0px;
}

.AIgeneratedCarouselBtmBtn a {
    display: inline-block;
    color: #fff;
    padding: 5px 10px;
    border-radius: 6px;
    font-size: 13px;
    margin: 2px;
    font-family: 'Poppins', sans-serif;

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

.fc-unthemed .fc-content,
.fc-unthemed .fc-divider,
.fc-unthemed .fc-list-heading td,
.fc-unthemed .fc-list-view,
.fc-unthemed .fc-popover,
.fc-unthemed .fc-row,
.fc-unthemed tbody,
.fc-unthemed td,
.fc-unthemed th,
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
    background: #28a745 !important;
}

.post_now_button.schedule_post_button input:nth-child(2) {
    background: #dc3545 !important;
}

.list-unstyled.form-wizard-steps {
    margin-top: 20px;
}

.Customemojiarea {
    /* min-height: 130px !important; */
}

.MainMobileview img {
    width: 30px;
    border: 2px solid #0f74ce;
}

.MainMobileview span {
    font-size: 12px;
    font-weight: 600 !important;
    margin-left: 4px !important;
}

.MainMobileview span.sponsored {
    margin-left: 0 !important;
    color: #888888;
    font-weight: 400 !important;
    font-size: 10px;
}

.MainMobileview span.sponsored i {
    font-size: 8px;
}

.Mobcart_title span {
    margin-left: unset !important;
    margin-top: 3px;
    font-weight: 600;
}

.Mobcart_titleCustom,
.actions-buttons {
    border-top: 1px solid #d7d7d7;
    padding: 5px 0;
}

.actions-buttons {}

.actions-buttons ul {}

.actions-buttons ul li button {}

.actions-buttons ul li button i {
    font-size: 12px !important;
}

.actions-buttons ul li span {
    font-size: 10px !important;
    margin-left: 3px;
    font-weight: 600;
    color: #646464;
}

.PostDateTimePicker {
    text-align: end;
}

.PostDateTimePicker span {
    color: #0f74ce;
    font-size: 14px;
    cursor: pointer;
    text-align: left;
    display: inline-block;
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

    .AIgeneratedCarousel .item .itemCntPlusWrp i {}

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
    <div class="container container_2 create_preview_post_wrapInner">
        <div class="create_preview_post create_preview_post_index">

            <div
                class="create_post create_preview_post_index_item create_preview_post_index_itemLeft section2_borderleft_card mx-2 my-2">


                <form action="{{url('create_post')}}" class="" method="post" enctype="multipart/form-data">
                    @csrf
                    <section class="wizard-section" style="display: none">
                        <div class="row no-gutters">

                            <div class="col-lg-12">
                                <div class="form-wizard card my-2">

                                    <div class="form-wizard-header">


                                        <ul class="list-unstyled form-wizard-steps form_wizard_steps clearfix">
                                            @if(in_array(('Facebook'),auth()->user()->account->platforms))
                                            <li section="fb"><span
                                                    class="d-flex justify-content-center align-items-center"><img
                                                        src="{{asset('images/FB_Color.png')}}" width="12px" height="20"
                                                        alt=""></span></li>
                                            @endif
                                            @if(in_array(('Instagram'),auth()->user()->account->platforms))
                                            <li section="insta"><span
                                                    class="d-flex justify-content-center align-items-center"><img
                                                        src="{{asset('images/Instagram_Color.png')}}" width="20px"
                                                        alt=""></span></li>
                                            @endif
                                            @if(in_array(('Twitter'),auth()->user()->account->platforms))
                                            <li section="twitter"><span><span
                                                        class="d-flex justify-content-center align-items-center"><img
                                                            src="{{asset('images/Twitter_Color.png')}}" width="20px"
                                                            alt=""></span></span></li>
                                            @endif
                                            @if(in_array(('Linkedin'),auth()->user()->account->platforms))
                                            <li section="linkedin"><span><span
                                                        class="d-flex justify-content-center align-items-center"><img
                                                            src="{{asset('images/Linkedin_Color.png')}}" width="20px"
                                                            alt=""></span></span></li>
                                            @endif
                                        </ul>
                                    </div>
                                    @if(in_array(('Facebook'),auth()->user()->account->platforms))
                                    <fieldset class="wizard-fieldset fb">
                                        <h5>Edit Facebook</h5>

                                        <div class="form-group emoji_parent">
                                            <textarea onkeyup="updateDiv(this)" onchange="suggested_text(this)" required
                                                name="facebook_content" id="" cols="30" rows="3"
                                                class="form-control wizard-required emojiarea mention"
                                                placeholder="Write your post...">{{old('facebook_content')}}</textarea>
                                            <div id="dropdown" class="dropdown-content-search"></div>
                                        </div>
                                        <div class="icon_buttons_tags mt-3">
                                            <div class="icon_buttons grid_item">
                                                <ul class="p-0">
                                                    <li>
                                                       <!--  <a href="javascript:void(0)" class="image_or_video"
                                                            typpe="image" social="fb" fordata="image_or_videofb"><label
                                                                for="image_or_videofb">
                                                                <img src="{{asset('')}}images/Camera_Icon.png"
                                                                    class="img-fluid" alt="" />
                                                            </label>
                                                        </a> -->
                                                         <a href="javascript:void(0)" class="image_or_video_div"
                                                            typpe="image" social="fb" fordata="image_div"><label
                                                                for="">
                                                                <img src="{{asset('')}}images/Camera_Icon.png"
                                                                    class="img-fluid" alt="" />
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)" class="image_or_video"
                                                            typpe="video" social="fb" fordata="image_or_videofb"><label
                                                                for="image_or_videofb">
                                                                <img src="{{asset('')}}images/Video_Player_Icon.png"
                                                                    class="img-fluid" alt="" />
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)" class="open_emoji">
                                                            <img src="{{asset('')}}images/Emoji_Icon.png"
                                                                class="img-fluid" alt="" />
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- my code -->

                                                <div class="d-none" id="image_div"><label for="file" style="margin-top: 20px;">
                                                   <!--  <i class="fa-solid fa-xmark cancel_mark"></i> -->
                                                <span id="file_error"></span>


                                                    <a href="javascript:void(0)" class="image_or_video"
                                                            typpe="image" social="fb" fordata="image_or_videofb"><label
                                                                for="image_or_videofb">
                                                                <img src="{{asset('')}}images/plus.png"
                                                                    class="img-fluid" alt=""  width="20px" height="20px" />
                                                            </label>
                                                        </a> 
                                                       <!--  <img src="" class="d-none preview_image_my" alt="" width="50px" height="50px"> -->
                                                        <input type="file" name="facebook_media[]" multiple
                                                class="image d-none file_image_video" id="image_or_videofb"
                                                accept="image/*,video/*">
                                            <input type="hidden" name="media_type_facebook" id="media_type_fb">
                                            <p id="error1" style="display:none; color:#FF0000;">

                                                </div>

                                                 <!-- end my coed -->



                                            </div>

                                           

                                            <div class="tags_input_wrap grid_item">
                                                <div class="tags_input">
                                                    <select name="facebook_tag[]" class="form-control selectmultiple"
                                                        multiple id="">
                                                    </select>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group clearfix clearfix2">
                                            <a href="javascript:;" class="form-wizard-previous-btn float-left">Back</a>
                                            <a href="javascript:;" class="form-wizard-next-btn float-right">Next
                                                Platform</a>
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
                                            <textarea onkeyup="updateDiv(this)" onchange="suggested_text(this)" required
                                                name="instagram_content" id="" cols="30" rows="3"
                                                class="form-control wizard-required emojiarea "
                                                placeholder="Write your post...">{{old('instagram_content')}}</textarea>
                                            <div id="dropdown" class="dropdown-content-search"></div>
                                        </div>
                                        <div class="icon_buttons_tags mt-3">
                                            <div class="icon_buttons grid_item">
                                                <ul class="p-0">
                                                    <li>
                                                        <a href="javascript:void(0)" class="image_or_video_div"
                                                            typpe="image" social="insta"
                                                            fordata="image_or_video_insta"><label
                                                                for="image_or_video_insta">
                                                                <img src="{{asset('')}}images/Camera_Icon.png"
                                                                    class="img-fluid" alt="" />
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)" class="image_or_video"
                                                            typpe="video" social="insta"
                                                            fordata="image_or_video_insta"><label
                                                                for="image_or_video_insta">
                                                                <img src="{{asset('')}}images/Video_Player_Icon.png"
                                                                    class="img-fluid" alt="" />
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)" class="open_emoji">
                                                            <img src="{{asset('')}}images/Emoji_Icon.png"
                                                                class="img-fluid" alt="" />
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <input type="file" name="insta_media[]" required multiple
                                                class="image d-none file_image_video wizard-required"
                                                id="image_or_video_insta" accept="image/*,video/*">
                                            <input type="hidden" name="media_type_instagram" id="media_type_insta">


                                            <div class="tags_input_wrap grid_item">
                                                <div class="tags_input">
                                                    <select name="instagram_tag[]" class="form-control selectmultiple"
                                                        multiple id="">

                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix clearfix2">
                                            <a href="javascript:;" class="form-wizard-previous-btn float-left">Back</a>
                                            <a href="javascript:;" class="form-wizard-next-btn float-right">Next
                                                Platform</a>
                                        </div>
                                    </fieldset>
                                    @endif

                                    @if(in_array(('Twitter'),auth()->user()->account->platforms))
                                    <fieldset class="wizard-fieldset twitter">
                                        <h5>Edit Twitter</h5>
                                        <div class="form-group emoji_parent">
                                            <textarea onkeyup="updateDiv(this)" onchange="suggested_text(this)" required
                                                name="twitter_content" id="" cols="30" rows="3"
                                                class="form-control wizard-required emojiarea mention"
                                                placeholder="Write your post...">{{old('twitter_content')}}</textarea>

                                            <div id="dropdown" class="dropdown-content-search"></div>

                                        </div>
                                        <div class="icon_buttons_tags mt-3">
                                            <div class="icon_buttons grid_item">
                                                <ul class="p-0">
                                                    <li>
                                                        <a href="javascript:void(0)" class="open_emoji">
                                                            <img src="{{asset('')}}images/Emoji_Icon.png"
                                                                class="img-fluid" alt="" />
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>


                                            <div class="tags_input_wrap grid_item">
                                                <div class="tags_input">
                                                    <select name="twitter_tag[]" class="form-control selectmultiple"
                                                        multiple id="">

                                                    </select>
                                                    {{--                                                            <input onkeyup="Namechangefun(this)" id="namechange"--}}
                                                    {{--                                                                   name="twitter_tag" type="text"--}}
                                                    {{--                                                                   class="form-control ai-tag"--}}
                                                    {{--                                                                   placeholder="tags" value="{{old('twitter_tag')}}">--}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix clearfix2">
                                            <a href="javascript:;" class="form-wizard-previous-btn float-left">Back</a>
                                            <a href="javascript:;" class="form-wizard-next-btn float-right">Next
                                                Platform</a>
                                        </div>
                                    </fieldset>
                                    @endif


                                    @if(in_array(('Linkedin'),auth()->user()->account->platforms))
                                    <fieldset class="wizard-fieldset linkedin">
                                        <h5>Edit Linkedin</h5>

                                        <div class="form-group emoji_parent">
                                            <textarea onkeyup="updateDiv(this)" onchange="suggested_text(this)" required
                                                name="linkedin_content" id="" cols="30" rows="3"
                                                class="Customemojiarea form-control wizard-required emojiarea mention "
                                                placeholder="Write your post...">{{old('linkedin_content')}}</textarea>
                                            <div id="dropdown" class="dropdown-content-search"></div>
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
                                                                    class="img-fluid" alt="" />
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)" class="image_or_video"
                                                            typpe="video" social="linkedin"
                                                            fordata="image_or_video_linkedin"><label
                                                                for="image_or_video_linkedin">
                                                                <img src="{{asset('')}}images/Video_Player_Icon.png"
                                                                    class="img-fluid" alt="" />
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)" class="open_emoji">
                                                            <img src="{{asset('')}}images/Emoji_Icon.png"
                                                                class="img-fluid" alt="" />
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <input type="file" name="linkedin_media[]" multiple
                                                class="image d-none file_image_video" id="image_or_video_linkedin"
                                                accept="image/*,video/*">
                                            <input type="hidden" name="media_type_linkedin" id="media_type_linkedin">

                                            <div class="tags_input_wrap grid_item">
                                                <div class="tags_input">
                                                    <select name="linkedin_tag[]" class="form-control selectmultiple"
                                                        multiple id="">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix clearfix2">
                                            <a href="javascript:;" class="form-wizard-previous-btn float-left">Back</a>
                                            <a href="javascript:;" class="form-wizard-next-btn float-right">Next
                                                Platform</a>
                                        </div>
                                    </fieldset>
                                    @endif
                                    <div class="post_now_button schedule_post_button">
                                        <input type="button" class="btn post_later_now_btn" value="Schedule Post"
                                            data-bs-toggle="modal" data-bs-target="#TimetoUploadPost">
                                        <input type="submit" class="btn post_later_now_btn" value="Post Now">
                                    </div>
                                    <div class="PostDateTimePicker PostDate_Time_Picker">
                                        Posted Date & Time
                                        <span data-bs-toggle="modal" data-bs-target="#TimetoUploadPost"
                                            id="browsertime2"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>



                    {{-- -------------------------------- --}}


                    <!-- Modal -->
                    <div class="modal fade" id="TimetoUploadPost" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Time to upload post</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
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
                                        <label for="">Select Time:</label>
                                        <input type="time" name="" id="" class="form-control select_time" value="00:00">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary d-none">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- -------------------------------- --}}

                </form>
            </div>

            <div
                class="create_preview_post_index_item create_preview_post_index_itemRight section2_rightcard mx-2 my-2 ">

                <div class="d-lg-flex justify-content-center create_preview_post_index_itemRightInner">
                    <div class="preview_post position-relative" style="width: 80%!important;">
                        <div class="loader d-none"></div>
                        <div class="sub_heading">
                            <h4>Post Preview</h4>
                        </div>

                        <div class="preview_wrap">
                            <div class="col-md-12">
                                <div class="Mobcompny-title">
                                    <div class="w-50">
                                        <h6 class="text-light">facebook</h6>
                                    </div>
                                    <div class="w-50 Mobsocial-icon Mobsocial_icon">
                                        <div><i class="fa-solid fa-plus text-light i_one"></i></div>
                                        <div><i class="fa-solid fa-magnifying-glass text-light i_one "></i></div>
                                        <div><i class="fab fa-facebook-messenger text-light i_one"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="Mobcompny-smallicon pt-2">
                                <span><i class="fa-solid fa-house"></i></span>
                                <!-- <span><i class="fa fa-youtube-play"></i></span>  -->
                                <div class="one_img"> <img src="{{asset('images/ad.png')}}" class="" alt=""></div>
                                <div class="one_img"> <img src="{{asset('images/you.png')}}" class="" alt=""></div>
                                <div class="one_img"> <img src="{{asset('images/reel.png')}}" class="" alt=""></div>
                                <div class="one_img"> <img src="{{asset('images/bell.png')}}" class="" alt=""></div>
                                <div class="one_img"> <img src="{{asset('images/br.png')}}" class="" alt=""></div>

                            </div>


                            <div class="the_preview pt-2">
                                <div class="col-md-12" style="height: 100px">
                                    <div class="MainMobileview d-flex justify-content-between">
                                        <div>
                                            <img src="{{asset('images/ava.png')}}" class="img-fluid" width="40"
                                                height="40" alt="">
                                            <span id="" class="postname">{{auth()->user()->name}} <br>
                                                <span class="sponsored">Public . <i
                                                        class="fa-solid fa-earth-americas"></i></span>
                                            </span>
                                        </div>
                                        <div class="icons_d">
                                            <span class="ellipses"><i class="fa-solid fa-ellipsis"></i></span>
                                            <span class="xmark"><i class="fa-solid fa-xmark"></i></span>
                                        </div>

                                    </div>
                                    <p class="m-0"></p>
                                    <div class="Mobcart_title">
                                        <span id="mypostresult" class="mypostresult">Write your post...</span>
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
                                    <div class="Mobcart_title bile d-flex justify-content-between Mobcart_titleCustom">
                                        <div class="reactions reactions2">8❤️</div>
                                        <div class="total-comments total_comments u-margin-inline-start">
                                            <a>12 Comments</a>
                                            <a>2 Shares</a>
                                        </div>
                                    </div>
                                    <div class="actions-buttons">
                                        <ul class="actions-buttons-list d-flex p-0 justify-content-between">
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
                                                <button class="actions-buttons-button"><i
                                                        class="fa-solid fa-share"></i><span
                                                        class="text">Share</span></button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="AIgeneratedContent create_preview_post_index_itemRightInner position-relative ">

                    <div class="sub_heading">
                        <h4>AI Generated Content</h4>
                    </div>

                    <div class="AIgeneratedContentInner AIgeneratedContentInner_card_shade">
                        <div class="AIgeneratedContentData">
                            <div>
                                <label for="" class="add_cap_label">Add Caption</label>
                                <div class="add_caption">
                                    <a href="#">
                                        <input type="text" placeholder="">
                                        <img src="{{asset('images/add.png')}}" class="img-fluid add_icon" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div>
                                <label for="" class="add_cap_label">Add Tags</label>
                                <div class="add_caption">
                                    <select id="slect_drop" class="js-example-basic-single form-control" name="state"
                                        multiple>
                                        <option value="AL">Facebook +</option>
                                        ...
                                        <option value="WY">Instagram +</option>
                                    </select>
                                </div>
                            </div>
                            <div class="suggest_img">
                                <p class="mb-0">Suggested Images :</p>
                            </div>
                            <div class="owl-carousel owl_carousel">
                                <div class="opacity-cover">
                                    <img src="{{asset('images/carousel1.png')}}" alt="">
                                    <div class="opacity_sheet">
                                        <div class="opacity_sheet_icons">
                                            <div><a href="#"><i class="fa-solid fa-plus"></i></a></div>
                                            <div><a href="#"><i class="fa-solid fa-expand"></i></a></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="opacity-cover">
                                    <img src="{{asset('images/carousel2.png')}}" alt="">
                                    <div class="opacity_sheet">
                                        <div class="opacity_sheet_icons">
                                            <div><a href="#"><i class="fa-solid fa-plus"></i></a></div>
                                            <div><a href="#"><i class="fa-solid fa-expand"></i></a></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="opacity-cover">
                                    <img src="{{asset('images/carousel1.png')}}" alt="">
                                    <div class="opacity_sheet">
                                        <div class="opacity_sheet_icons">
                                            <div><a href="#"><i class="fa-solid fa-plus"></i></a></div>
                                            <div><a href="#"><i class="fa-solid fa-expand"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="opacity-cover">
                                    <img src="{{asset('images/carousel2.png')}}" alt="">
                                    <div class="opacity_sheet">
                                        <div class="opacity_sheet_icons">
                                            <div><a href="#"><i class="fa-solid fa-plus"></i></a></div>
                                            <div><a href="#"><i class="fa-solid fa-expand"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="opacity-cover">
                                    <img src="{{asset('images/carousel1.png')}}" alt="">
                                    <div class="opacity_sheet">
                                        <div class="opacity_sheet_icons">
                                            <div><a href="#"><i class="fa-solid fa-plus"></i></a></div>
                                            <div><a href="#"><i class="fa-solid fa-expand"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="opacity-cover">
                                    <img src="{{asset('images/carousel2.png')}}" alt="">
                                    <div class="opacity_sheet">
                                        <div class="opacity_sheet_icons">
                                            <div><a href="#"><i class="fa-solid fa-plus"></i></a></div>
                                            <div><a href="#"><i class="fa-solid fa-expand"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="opacity-cover">
                                    <img src="{{asset('images/carousel1.png')}}" alt="">
                                    <div class="opacity_sheet">
                                        <div class="opacity_sheet_icons">
                                            <div><a href="#"><i class="fa-solid fa-plus"></i></a></div>
                                            <div><a href="#"><i class="fa-solid fa-expand"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <!-- <div class="AIgeneratedContentDataWrp d-flex mb-3">
                                    <div class="AIgeneratedContentAdd">
                                        <a id="addContent" href="#">Add +</a>
                                    </div>
                                    <div class="AIgeneratedContentText">
                                        <p class="mb-0">AI Generated Content: <span id="gpt_content"></span></p>
                                    </div>
                                </div> -->
                            <!-- <div class="AIgeneratedContentDataWrp d-flex mb-3">
                                    <div class="AIgeneratedContentAdd">
                                        <a id="addTags" href="#">Add +</a>
                                    </div>
                                    <div class="AIgeneratedContentText">
                                        <p class="mb-0">AI Generated Tags: <span id="gpt_tags"></span></p>
                                    </div>
                                </div> -->
                            <div class="AIgeneratedCarouselWrp d-none">

                                <div class="owl-carousel owl-theme AIgeneratedCarousel">
                                </div>
                                <div class="AIgeneratedCarouselBtmBtn AIgenerated_new">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#edit_prompt"
                                        class="btn btn-primary">Edit / Prompt</a>
                                    <a href="#" class="add_to_post btn btn-primary">Add to Post</a>
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
<!-- <section class="post_manager">
     <div class="title_bar_wrap d-none">
        <div class="container container_2">
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
                                    alt="" /></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="post_manage_calendar post_manage_calendar_card my-2 mx-2">
        <div class="container container_2">
            <div class="the_post_manager">
                <div id='postManagerCalendar'></div>
            </div>
        </div>
    </div>
</section>  -->

<!-- =======Calender========= -->

<section>
    <div class="row container section5">
        <div class="col-sm-12 col-md-12 col-lg-3 calender">
            <div class="calendarmain">
                <div class="l1">
                    <div class="navigation">
                        <h2 id="month-year"></h2>
                        <!-- <h2 id="current-day"></h2> -->
                        <div class="leftrightbtn">
                            <button onclick="prevMonth()" class="prev">&#10094;</button>
                            <button onclick="nextMonth()" class="next"> &#10095;</button>
                        </div>

                    </div>
                    <div id="calendar-container">

                    </div>
                </div>
                <div class="R1">
                    <div class="Thumbnail">
                        <h3>
                            Thumbnail
                        </h3>
                        <a href=""><i class='fa fa-info red-color'></i></a>

                    </div>
                    <div class="div2">
                        <h1>
                            TUESDAY
                        </h1>
                        <h3>9/8/2023</h3>

                    </div>
                    <div class="div3">
                        <div>
                            <span class="clr"></span>
                        </div>
                        <div>
                            <img src="\images\Ellipse 17 (1).png" alt="">
                        </div>
                        <div class="myspan">
                            <span class="sp1">This is the caption </span>
                            <p class="sp2">Scheduled</p>
                        </div>


                        <div class="Edit">
                            <i class='fas fa-edit'></i>
                            <a href=""> <span>Edit</span></a>
                        </div>

                    </div>
                    <div class="div3">
                        <div>
                            <span class="clr2"></span>
                        </div>
                        <div>
                            <img src="\images\Ellipse 17 (2).png" alt="">
                        </div>
                        <div class="myspan">
                            <span class="sp1">This is the caption </span>
                            <p class="sp2">Scheduled</p>
                        </div>


                        <div class="Edit2">
                            <i class='fas fa-edit'></i>
                            <a href=""> <span>Edit</span></a>
                        </div>

                    </div>

                    <div class="div2">
                        <h1>
                            Friday
                        </h1>
                        <h3>21/8/2023</h3>

                    </div>


                    <div class="div3">
                        <div>
                            <span class="clr3"></span>
                        </div>
                        <div>
                            <img src="\images\Ellipse 17 (3).png" alt="">
                        </div>
                        <div class="myspan">
                            <span class="sp1">This is the caption </span>
                            <p class="sp2">Scheduled</p>
                        </div>


                        <div class="Edit3">
                            <i class='fas fa-edit'></i>
                            <a href=""> <span>Edit</span></a>
                        </div>

                    </div>
                    <div class="div3">
                        <div>
                            <span class="clr4"></span>
                        </div>
                        <div>
                            <img src="\images\Ellipse 17.png" alt="">
                        </div>
                        <div class="myspan">
                            <span class="sp1">This is the caption </span>
                            <p class="sp2">Scheduled</p>
                        </div>


                        <div class="Edit4">
                            <i class='fas fa-edit'></i>
                            <a href=""> <span>Edit</span></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <!-- <div class="col-sm-12 col-md-12 col-lg-9 calendar2">
            <div class="title_bar_wrap d-none">
                <div class="container container_2">
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
                                <li class="month_name">
                                    <span>December 2022</span>
                                    <a href="javascript:void(0)"><img src="{{asset('images/V_Icon.png')}}"
                                            class="img-fluid" alt="" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="post_manage_calendar post_manage_calendar_card my-2 mx-2">
                <div class="container container_2">
                    <div class="the_post_manager">
                        <div id='postManagerCalendar'></div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-sm-12 col-md-12 col-lg-9 calendar2">
            <div class="title_bar_wrap d-none">
                <div class="container container_2">
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
                                <li class="month_name">
                                    <span>December 2022</span>
                                    <a href="javascript:void(0)"><img src="{{asset('images/V_Icon.png')}}"
                                            class="img-fluid" alt="" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="post_manage_calendar post_manage_calendar_card my-2 mx-2">
                <div class="container container_2">
                    <div class="the_post_manager">
                        <div id='postManagerCalendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-3 like-card">
                    <div class="card-body">
                        <h3 class="card-title">Likes</h3>
                        <div class="card-content">
                            <div class="svg-div">
                                <div class="text-center" id="product-order-chart" class="mb-3"
                                    style="min-height: 320px;">
                                    <!-- <div id="apexchartsdf3fohp" class="apexcharts-canvas apexchartsdf3fohp light"
                                            style="width: 280px; height: 320px;"> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="239" height="239"
                                        viewBox="0 0 239 239" fill="none">
                                        <path
                                            d="M239 119.5C239 185.498 185.498 239 119.5 239C53.502 239 0 185.498 0 119.5C0 53.502 53.502 0 119.5 0C185.498 0 239 53.502 239 119.5ZM10.198 119.5C10.198 179.866 59.1342 228.802 119.5 228.802C179.866 228.802 228.802 179.866 228.802 119.5C228.802 59.1342 179.866 10.198 119.5 10.198C59.1342 10.198 10.198 59.1342 10.198 119.5Z"
                                            fill="#E9EBF3" />
                                        <path
                                            d="M119.5 5.09901C119.5 2.28291 121.784 -0.0113555 124.598 0.108768C139.535 0.746517 154.236 4.18261 167.932 10.2542C183.183 17.0155 196.849 26.8951 208.051 39.2571C219.254 51.6192 227.743 66.1899 232.974 82.0313C238.205 97.8726 240.061 114.634 238.422 131.236C236.784 147.838 231.688 163.913 223.461 178.426C215.235 192.939 204.061 205.57 190.659 215.504C177.256 225.438 161.922 232.455 145.644 236.105C131.025 239.383 115.936 239.879 101.163 237.585C98.3798 237.153 96.5882 234.456 97.1387 231.694C97.6891 228.932 100.373 227.152 103.158 227.573C116.533 229.596 130.184 229.12 143.413 226.154C158.302 222.816 172.327 216.397 184.586 207.311C196.845 198.225 207.065 186.672 214.589 173.397C222.114 160.123 226.775 145.419 228.274 130.234C229.772 115.049 228.075 99.7183 223.29 85.2288C218.506 70.7393 210.741 57.4121 200.494 46.105C190.248 34.7979 177.748 25.7614 163.798 19.5772C151.404 14.0826 138.11 10.9478 124.597 10.3169C121.784 10.1856 119.5 7.91512 119.5 5.09901Z"
                                            fill="black" />
                                        <path
                                            d="M213 119.5C213 171.055 171.206 212.849 119.652 212.849C68.0965 212.849 26.303 171.055 26.303 119.5C26.303 67.9451 68.0965 26.1515 119.652 26.1515C171.206 26.1515 213 67.9451 213 119.5ZM35.1991 119.5C35.1991 166.142 73.0097 203.952 119.652 203.952C166.293 203.952 204.104 166.142 204.104 119.5C204.104 72.8582 166.293 35.0476 119.652 35.0476C73.0097 35.0476 35.1991 72.8582 35.1991 119.5Z"
                                            fill="#E9EBF3" />
                                        <path
                                            d="M119.652 30.5995C119.652 28.143 121.644 26.1404 124.098 26.2574C144.63 27.2361 164.313 34.9708 180.05 48.3241C196.919 62.6387 208.155 82.4796 211.756 104.309C215.356 126.138 211.086 148.536 199.708 167.51C189.093 185.209 172.936 198.855 153.806 206.376C151.52 207.275 148.99 206.018 148.201 203.692C147.412 201.365 148.664 198.851 150.946 197.94C168.08 191.105 182.548 178.826 192.078 162.935C202.373 145.769 206.235 125.505 202.978 105.756C199.721 86.0076 189.555 68.0576 174.294 55.1071C160.165 43.1183 142.52 36.1355 124.098 35.1647C121.645 35.0354 119.652 33.0561 119.652 30.5995Z"
                                            fill="#DA8741" />
                                        <path
                                            d="M187 119.5C187 156.511 156.996 186.515 119.985 186.515C82.9734 186.515 52.9697 156.511 52.9697 119.5C52.9697 82.4886 82.9734 52.4849 119.985 52.4849C156.996 52.4849 187 82.4886 187 119.5ZM61.3667 119.5C61.3667 151.874 87.611 178.118 119.985 178.118C152.359 178.118 178.603 151.874 178.603 119.5C178.603 87.1261 152.359 60.8819 119.985 60.8819C87.611 60.8819 61.3667 87.1261 61.3667 119.5Z"
                                            fill="#E9EBF3" />
                                        <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle"
                                            font-size="16" fill="black">
                                            Total Likes
                                        </text>
                                        <text x="50%" y="59%" dominant-baseline="middle" text-anchor="middle"
                                            font-size="22" fill="black">
                                            26.20k
                                        </text>
                                        <path
                                            d="M119.985 56.6834C119.985 54.3646 121.867 52.4712 124.181 52.6163C139.03 53.5473 153.153 59.3972 164.312 69.2388C166.051 70.7726 166.043 73.4423 164.403 75.0819C162.763 76.7215 160.114 76.7086 158.362 75.1905C148.797 66.9057 136.802 61.9372 124.18 61.0321C121.867 60.8662 119.985 59.0021 119.985 56.6834Z"
                                            fill="#288EFF" />
                                    </svg>
                                    <div class="apexcharts-legend"></div>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div>
                                        <div class="d-flex gap-2">
                                            <div class="cirle-img ">
                                                <img src="{{asset('images/Oval (1).png')}}" width="20px" alt="">
                                            </div>
                                            <h5>Facebook</h5>
                                        </div>
                                        <div>
                                            <h4 class="text-center">1.12k</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <div class="d-flex gap-2">
                                            <div class="cirle-img ">
                                                <img src="{{asset('images/Oval (2).png')}}" width="20px" alt="">
                                            </div>
                                            <h5>Instagram</h5>
                                        </div>
                                        <div>
                                            <h4 class="text-center">1.12k</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <div class="d-flex gap-2">
                                            <div class="cirle-img">
                                                <img src="{{asset('images/Oval (3).png')}}" width="20px" alt="">
                                            </div>
                                            <h5>X.com</h5>
                                        </div>
                                        <div>
                                            <h4 class="text-center">1.12k</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
            </div>
        </div>



    </div>



</section>


@endsection






@section('js')

<script>
$(document).ready(function() {
    $('.mention').each(function() {
        const textarea = $(this);
        const dropdown = textarea.parent().find('.dropdown-content-search');

        textarea.on('input', function() {

            const text = textarea.val();
            const atIndex = text.lastIndexOf('@');

            if (atIndex !== -1) {

                const searchString = text.slice(atIndex + 1);
                const suggestions = getFriendSuggestions(
                    searchString); // Replace with your friend suggestion logic


                if (suggestions.length > 0) {
                    const dropdownHTML = suggestions.map(suggestion =>
                        `<div class="suggestion">${suggestion}</div>`).join('');
                    dropdown.html(dropdownHTML);
                    dropdown.css('display', 'block');
                } else {
                    dropdown.css('display', 'none');
                }
            } else {
                dropdown.css('display', 'none');
            }
        });

        // Rest of your code...
    });
    // Replace this with your actual logic to fetch friend suggestions
    function getFriendSuggestions(searchString) {
        // Your suggestion logic here...
        const mockSuggestions = [
            'Friend1',
            'Friend2',
            'Friend3',
            // ...
        ];

        return mockSuggestions.filter(suggestion => suggestion.toLowerCase().includes(searchString
            .toLowerCase()));
    }


    // Handle dropdown suggestion click
    $('.dropdown-content-search').on('click', '.suggestion', function() {
        const suggestionText = $(this).text();
        const textarea = $(this).closest('.emoji_parent').find('.emojiarea');
        const currentText = textarea.val();
        const atIndex = currentText.lastIndexOf('@');

        const newText = currentText.slice(0, atIndex) + suggestionText + ' ' + currentText.slice(
            atIndex + suggestionText.length + 1);
        textarea.val(newText);
        $(this).parent().css('display', 'none');
    });
});
</script>
<script>
$(document).ready(function() {

    if ($('.wizard-fieldset').length == 0) {
        $('.wizard-section').hide();
    } else {
        $('.wizard-section').show();
    }
    $('.wizard-fieldset').last().find('.form-wizard-next-btn').remove();
    $('.wizard-fieldset').first().find('.form-wizard-previous-btn').remove();
    $('.list-unstyled.form-wizard-steps li:first').addClass('active');
    $('.wizard-fieldset:first').addClass('show');

    // click on next button
    $('.form-wizard-next-btn').click(function() {
        var parentFieldset = $(this).parents('.wizard-fieldset');
        var currentActiveStep = $(this).parents('.form-wizard').find('.form-wizard-steps .active');
        var next = $(this);
        var nextWizardStep = true;
        parentFieldset.find('.wizard-required').each(function() {
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
                currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',
                    "400");
                next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show", "400");
                $(document).find('.wizard-fieldset').each(function() {
                    if ($(this).hasClass('show')) {
                        var formAtrr = $(this).attr('data-tab-content');
                        $(document).find('.form-wizard-steps .form-wizard-step-item').each(
                            function() {
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
    $('.form-wizard-previous-btn').click(function() {
        var counter = parseInt($(".wizard-counter").text());;
        var prev = $(this);
        var currentActiveStep = $(this).parents('.form-wizard').find('.form-wizard-steps .active');
        prev.parents('.wizard-fieldset').removeClass("show", "400");
        prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show", "400");
        currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',
            "400");
        $(document).find('.wizard-fieldset').each(function() {
            if ($(this).hasClass('show')) {
                var formAtrr = $(this).attr('data-tab-content');
                $(document).find('.form-wizard-steps .form-wizard-step-item').each(function() {
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
    $(document).on("click", ".form-wizard .form-wizard-submit", function() {
        var parentFieldset = $(this).parents('.wizard-fieldset');
        var currentActiveStep = $(this).parents('.form-wizard').find('.form-wizard-steps .active');
        parentFieldset.find('.wizard-required').each(function() {
            var thisValue = $(this).val();
            if (thisValue == "") {
                $(this).siblings(".wizard-form-error").slideDown();
            } else {
                $(this).siblings(".wizard-form-error").slideUp();
            }
        });
    });

    // focus on input field check empty or not
    $(".form-control").on('focus', function() {
        var tmpThis = $(this).val();
        if (tmpThis == '') {
            $(this).parent().addClass("focus-input");
        } else if (tmpThis != '') {
            $(this).parent().addClass("focus-input");
        }
    }).on('blur', function() {
        var tmpThis = $(this).val();
        if (tmpThis == '') {
            $(this).parent().removeClass("focus-input");
            $(this).siblings('.wizard-form-error').slideDown("3000");
        } else if (tmpThis != '') {
            $(this).parent().addClass("focus-input");
            $(this).siblings('.wizard-form-error').slideUp("3000");
        }
    });

    $('.form-wizard-steps li').click(function() {
        $('.form-wizard-steps li').removeClass('active');
        $(this).addClass('active');
        var section = $(this).attr('section');
        $('.wizard-fieldset').removeClass('show');
        $('.' + section).addClass('show');

    })
});






// ---------------------
// owl.owlCarousel({
//     loop: true,
//     margin: 10,
//     nav: true,
//     dots: false,
//     onTranslated: setActiveItem,
//     responsive: {
//         0: {
//             items: 1
//         },
//         600: {
//             items: 2
//         },
//         1000: {
//             items: 2
//         }
//     }
// });

$('.owl-carousel').owlCarousel({
    loop: true,
    autoplay: true,
    margin: 10,
    nav: true,
    pages: true,
    pagination: false,
    navigation: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
})


function setActiveItem(event) {
    var current = event.item.index;
    var owlItems = $('.owl-carousel .owl-item');

    owlItems.removeClass('active');
    owlItems.eq(current).addClass('active');
}
// ---------------------
</script>

<script>
$(document).ready(function() {

    // $('.js-example-basic-single').select2();
    $('.add_to_post').click(function() {
        var content = $('#gpt_content').text();
        insertContent(content);

        var tags = $('#gpt_tags').text();
        insertTag(tags);

        var imageSrc = $('.owl-item.active').find('img').attr('src');
        $('.preview_image').attr('src', imageSrc).removeClass('d-none');
        $('.video_preview').addClass('d-none');

    });

    $("#addContent").on("click", function() {
        var content = $('#gpt_content').text();
        insertContent(content);
    });

    $("#addTags").on("click", function() {
        var tags = $('#gpt_tags').text();
        insertTag(tags);
    });

    function insertContent(text) {
        $('.wizard-fieldset.show').find('.emojiarea').val(text);
        $('#mypostresult').text(text);
    }

    function insertTag(tag) {
        $('.wizard-fieldset.show').find('.ai-tag').val(tag);
        $('#mynameresult').text(tag);
    }
});
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
let currentDate = new Date();

function displayCalendar() {
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();
    // const today = currentDate.getDate();
    const day = currentDate.getDay();
    const today = new Date(year, month, currentDate.getDate());
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const firstDay = new Date(year, month, 1).getDay();
    const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    const monthNames = [
        "January", "February", "March", "April", "May", "June", "July",
        "August", "September", "October", "November", "December"
    ];

    document.getElementById("month-year").textContent = monthNames[month] + " , " + year;

    // Add day names row
    let tableHtml = `
      <table class="table">
        <tr>
          <th style="opacity:0.5;">Sun</th>
          <th style="opacity:0.5;">Mon</th>
          <th style="opacity:0.5;">Tue</th>
          <th style="opacity:0.5;">Wed</th>
          <th style="opacity:0.5;">Thu</th>
          <th style="opacity:0.5;">Fri</th>
          <th style="opacity:0.5;">Sat</th>
        </tr>
    `;

    let prevMonth = new Date(year, month, 0).getDate();
    let dayNum = 1 - firstDay;
    for (let i = 0; i < 6; i++) {
        tableHtml += '<tr>';
        for (let j = 0; j < 7; j++) {

            // if (dayNum <= 0) {
            //   tableHtml += `<td class="other-month" style="opacity:0.5;">${prevMonth + dayNum}</td>`;
            // } else if (dayNum <= daysInMonth) {
            //   const isCurrentDay = (i === 0 && j === dayNum - 1);
            //   const dayClass = isCurrentDay ? "current-day" : "";
            //   tableHtml += `<td class="${dayClass}">${String(dayNum).padStart(2, '0')}</td>`;
            // } else {
            //   tableHtml += `<td class="other-month" style="opacity:0.5">${String(dayNum - daysInMonth).padStart(2, '0')}</td>`;
            // }


            if (dayNum <= 0) {
                tableHtml += `<td class="other-month" style="opacity:0.5;">${prevMonth + dayNum}</td>`;
            } else if (dayNum <= daysInMonth) {
                const isCurrentDay = (dayNum === today.getDate());

                const dayClass = isCurrentDay ? "current-day current-date" : "current-day";
                tableHtml += `<td class="${dayClass}">${String(dayNum).padStart(2, '0')}</td>`;
            } else {
                tableHtml +=
                    `<td class="other-month" style="opacity:0.5">${String(dayNum - daysInMonth).padStart(2, '0')}</td>`;
            }
            dayNum++;
        }
        tableHtml += '</tr>';
    }


    tableHtml += '</table>';

    document.getElementById('calendar-container').innerHTML = tableHtml;
    document.getElementById('current-day').textContent = ` ${daysOfWeek[day]}`;
}

function prevMonth() {
    currentDate.setMonth(currentDate.getMonth() - 1);
    displayCalendar();
}

function nextMonth() {
    currentDate.setMonth(currentDate.getMonth() + 1);
    displayCalendar();

}


// Call the displayCalendar function when the page loads
window.onload = function() {
    displayCalendar();

};
</script>

<script>
//   document.addEventListener("DOMContentLoaded", function () {
//   const todayBtn = document.getElementById("today-btn");
//   const prevBtn = document.getElementById("prev-btn");
//   const nextBtn = document.getElementById("next-btn");
//   const currentDateElem = document.getElementById("current-date");
//   const calendarDaysContainer = document.querySelector(".calendar-days");

//   // Set the current date to display initially
//   let currentDate = new Date();
//   currentDateElem.textContent = currentDate.toDateString();

//   // Event listeners for buttons
//   todayBtn.addEventListener("click", () => {
//     // Set the current date as today's date
//     currentDate = new Date();
//     currentDateElem.textContent = currentDate.toDateString();
//     generateCalendar();
//   });

//   prevBtn.addEventListener("click", () => {
//     currentDate.setMonth(currentDate.getMonth() - 1);
//     currentDateElem.textContent = currentDate.toDateString();
//     generateCalendar();
//   });

//   nextBtn.addEventListener("click", () => {
//     currentDate.setMonth(currentDate.getMonth() + 1);
//     currentDateElem.textContent = currentDate.toDateString();
//     generateCalendar();
//   });


//   // Function to generate calendar days and events
//   function generateCalendar() {
//     // Clear existing content
//     calendarDaysContainer.innerHTML = "";

//     const year = currentDate.getFullYear();
//     const month = currentDate.getMonth();
//     const daysInMonth = new Date(year, month + 1, 0).getDate();
//     const firstDay = new Date(year, month, 1).getDay();

//     // Generate calendar days
//     let dayNum = 1 - firstDay;
//     for (let i = 0; i < 6; i++) {
//       const weekRow = document.createElement("div");
//       weekRow.classList.add("week-row");

//       for (let j = 0; j < 7; j++) {
//         const dayCell = document.createElement("div");
//         dayCell.classList.add("day-cell");

//         if (dayNum <= 0 || dayNum > daysInMonth) {
//           dayCell.classList.add("other-month");
//         } else {
//           dayCell.textContent = dayNum;
//         }

//         weekRow.appendChild(dayCell);
//         dayNum++;
//       }

//       calendarDaysContainer.appendChild(weekRow);
//     }
//   }

//   // Initial calendar generation
//   generateCalendar();


// });

// document.addEventListener("DOMContentLoaded", function () {
//   const todayBtn = document.getElementById("today-btn");
//   const prevBtn = document.getElementById("prev-btn");
//   const nextBtn = document.getElementById("next-btn");
//   const currentDateElem = document.getElementById("current-date");
//   const calendarDaysContainer = document.querySelector(".calendar-days");

//   // Set the current date to display initially
//   let currentDate = new Date();
//   currentDateElem.textContent = currentDate.toDateString();

//   // Event listeners for buttons
//   todayBtn.addEventListener("click", () => {
//     // Set the current date as today's date
//     currentDate = new Date();
//     currentDateElem.textContent = currentDate.toDateString();
//     generateCalendar();
//   });

//   prevBtn.addEventListener("click", () => {
//     currentDate.setMonth(currentDate.getMonth() - 1);
//     currentDateElem.textContent = currentDate.toDateString();
//     generateCalendar();
//   });

//   nextBtn.addEventListener("click", () => {
//     currentDate.setMonth(currentDate.getMonth() + 1);
//     currentDateElem.textContent = currentDate.toDateString();
//     generateCalendar();
//   });

//   // Function to generate calendar days and events
//   function generateCalendar() {
//     // Clear existing content
//     calendarDaysContainer.innerHTML = "";

//     const year = currentDate.getFullYear();
//     const month = currentDate.getMonth();
//     const daysInMonth = new Date(year, month + 1, 0).getDate();
//     const firstDay = new Date(year, month, 1).getDay();

//     // Generate calendar days
//     let dayNum = 1 - firstDay;
//     for (let i = 0; i < 6; i++) {
//       const weekRow = document.createElement("div");
//       weekRow.classList.add("week-row");

//       for (let j = 0; j < 7; j++) {
//         const dayCell = document.createElement("div");
//         dayCell.classList.add("day-cell");

//         if (dayNum <= 0 || dayNum > daysInMonth) {
//           dayCell.classList.add("other-month");
//         } else {
//           dayCell.textContent = dayNum;

//           const addEventButton = document.createElement("button");
//           addEventButton.textContent = "+";
//           addEventButton.classList.add("add-event-btn");
//           addEventButton.addEventListener("click", () => openEventModal(year, month, dayNum));
//           dayCell.appendChild(addEventButton);
//         }

//         weekRow.appendChild(dayCell);
//         dayNum++;
//       }

//       calendarDaysContainer.appendChild(weekRow);
//     }
//   }

//   function openEventModal(year, month, day) {
//     const modalContent = prompt(`Enter event for ${day}/${month + 1}/${year}:`);
//     if (modalContent) {
//       // In this example, we are just displaying the event as an alert
//       alert(`Event added: ${modalContent}`);
//     }
//   }

//   // Initial calendar generation
//   generateCalendar();
// });
</script>

<script>
// document.addEventListener("DOMContentLoaded", function () {
//   const todayBtn = document.getElementById("today-btn");
//   const prevBtn = document.getElementById("prev-btn");
//   const nextBtn = document.getElementById("next-btn");
//   const currentDateElem = document.getElementById("current-date");
//   const calendarDaysContainer = document.querySelector(".calendar-days");
//   const dayNamesContainer = document.querySelector(".day-names");

//   // Set the current date to display initially
//   let currentDate = new Date();
//   currentDateElem.textContent = currentDate.toDateString();

//   // Define day names
//   const dayNames = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

//   // Populate day names at the top of the calendar
//   dayNames.forEach(dayName => {
//     const dayNameCell = document.createElement("div");
//     dayNameCell.classList.add("day-name-cell");
//     dayNameCell.textContent = dayName;
//     dayNamesContainer.appendChild(dayNameCell);

//   });

//   // Event listeners for buttons
//   todayBtn.addEventListener("click", () => {
//     // Set the current date as today's date
//     currentDate = new Date();
//     currentDateElem.textContent = currentDate.toDateString();
//     generateCalendar();
//   });

//   prevBtn.addEventListener("click", () => {
//     currentDate.setMonth(currentDate.getMonth() - 1);
//     currentDateElem.textContent = currentDate.toDateString();
//     generateCalendar();
//   });

//   nextBtn.addEventListener("click", () => {
//     currentDate.setMonth(currentDate.getMonth() + 1);
//     currentDateElem.textContent = currentDate.toDateString();
//     generateCalendar();
//   });

//   // Function to generate calendar days and events
//   function generateCalendar() {
//     // Clear existing content
//     calendarDaysContainer.innerHTML = "";

//     const year = currentDate.getFullYear();
//     const month = currentDate.getMonth();
//     const daysInMonth = new Date(year, month + 1, 0).getDate();
//     const firstDay = new Date(year, month, 1).getDay();

//     // Generate calendar days
//     let dayNum = 1 - firstDay;
//     for (let i = 0; i < 6; i++) {
//       const weekRow = document.createElement("div");
//       weekRow.classList.add("week-row");

//       for (let j = 0; j < 7; j++) {
//         const dayCell = document.createElement("div");
//         dayCell.classList.add("day-cell");

//         if (dayNum <= 0 || dayNum > daysInMonth) {
//           dayCell.classList.add("other-month");
//         } else {
//           dayCell.textContent = dayNum;
//           const dayOfWeek = new Date(year, month, dayNum).toLocaleDateString("en-US", { weekday: "short" });
//     dayCell.addEventListener("click", () => openEventModal(year, month, dayNum));

//         }

//         weekRow.appendChild(dayCell);
//         dayNum++;
//       }

//       calendarDaysContainer.appendChild(weekRow);
//     }

//   }

//   // Initial calendar generation
//   generateCalendar();


// });
document.addEventListener("DOMContentLoaded", function() {
    const todayBtn = document.getElementById("today-btn");
    const prevBtn = document.getElementById("prev-btn");
    const nextBtn = document.getElementById("next-btn");
    const currentDateElem = document.getElementById("current-date");
    const calendarDaysContainer = document.querySelector(".calendar-days");
    const dayNamesContainer = document.querySelector(".day-names");

    // Set the current date to display initially
    let currentDate = new Date();
    currentDateElem.textContent = currentDate.toDateString();

    // Define day names
    const dayNames = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

    // Populate day names at the top of the calendar
    dayNames.forEach(dayName => {
        const dayNameCell = document.createElement("div");
        dayNameCell.classList.add("day-name-cell");
        dayNameCell.textContent = dayName;
        dayNamesContainer.appendChild(dayNameCell);
    });

    // Event listeners for buttons
    todayBtn.addEventListener("click", () => {
        // Set the current date as today's date
        currentDate = new Date();
        currentDateElem.textContent = currentDate.toDateString();
        generateCalendar();
    });

    prevBtn.addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        currentDateElem.textContent = currentDate.toDateString();
        generateCalendar();
    });

    nextBtn.addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        currentDateElem.textContent = currentDate.toDateString();
        generateCalendar();
    });

    // Function to generate calendar days and events
    function generateCalendar() {
        // Clear existing content
        calendarDaysContainer.innerHTML = "";

        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const firstDay = new Date(year, month, 1).getDay();

        // Generate calendar days
        let dayNum = 1 - firstDay;
        for (let i = 0; i < 6; i++) {
            const weekRow = document.createElement("div");
            weekRow.classList.add("week-row");

            for (let j = 0; j < 7; j++) {
                const dayCell = document.createElement("div");
                dayCell.classList.add("day-cell");

                if (dayNum <= 0 || dayNum > daysInMonth) {
                    const otherMonthDate = new Date(year, month, dayNum);
                    dayCell.classList.add("other-month");
                    dayCell.textContent = otherMonthDate.getDate();
                } else {
                    dayCell.textContent = dayNum;
                }

                if (dayNum === 1) {
                    dayCell.classList.add("first-day");
                }

                dayCell.addEventListener("click", () => openEventModal(year, month, dayNum));
                weekRow.appendChild(dayCell);
                dayNum++;
            }

            calendarDaysContainer.appendChild(weekRow);
        }
    }

    // Initial calendar generation
    generateCalendar();
});
</script>


<script>
function openEventModal(year, month, day) {
    const event = prompt(`Enter event for ${month + 1}/${day}/${year}:`);
    if (event) {
        const eventElement = document.createElement("div");
        eventElement.classList.add("event");
        eventElement.textContent = event;
        calendarDaysContainer.querySelector(`[data-day="${day}"]`).appendChild(eventElement);
    }
}
</script>
@endsection