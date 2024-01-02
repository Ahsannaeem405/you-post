@extends('user_layout.main')
<style>
#image_div {
    position: relative;
    max-width: 270px;
    margin: auto;
}
.timer_style{
text-align:right;
font-size:12px;
padding-right:10px;

}
#image_div_youpost {
    position: relative;
    max-width: 270px;
    margin: auto;
}

.suggestion_clr {
   color:blue;
}
#image_div_ins,
#image_div_linked {
    max-width: 270px;
    margin: auto;
}

.uplaod-gif {
    width: 125px;
    position: absolute;
    left: -37px;
    top: -14px;
}

.uplaod-gif-video {
    width: 125px;
    position: absolute;
    left: -37px;
    top: -22px;
}

.create_preview_post_wrapInner {
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
    width: auto !important;
    margin: auto;

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
    width: calc(50% - 10px);
    margin: 5px !important;
    /* background: rgb(15 116 206) !important; */
}

.post_now_button.next_plat_button {}

.post_now_button.schedule_post input {}

/* .post_now_button.schedule_post_button input:nth-child(1) {
        background: #28a745 !important;
    } */

.post_now_button.schedule_post_button input:nth-child(2) {
    background: #dc3545 !important;
    color: #fff;
}

/* .list-unstyled.form-wizard-steps {
        margin-top: 20px;
    } */

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
.TwitterWrap .PostHeaderInner span{
    margin: 0 !important;
}
.TwitterWrap .post_img_name .post_img .PostHeaderInner{
    padding: 12px 12px 0 0 !important;
}
.TwitterWrap img.Twitter_Profile{
    margin: 12px 0 0 6px;
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
    /* border-top: 1px solid #dddddd7a; */
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

.x_bar_icons div img {
    width: 1em;
    height: 1em;
}

.LikeIcons .InnerIcon img:last-child {
    margin: 0 0 0 -7px;
}

.ActionBtn_Linkedin ul {
    margin: 0;
    padding: 0;
    list-style: none;
    display: flex;
    gap: 17px;
    justify-content: space-around;
}

.ActionBtn_Linkedin ul li button {
    background-color: transparent;
    border: none;
}

.ActionBtn_Linkedin ul li button svg {}

.ActionBtn_Linkedin ul li button span {
    color: #fff;
    font-size: 12px;
}
.dropdown-content-search{
    height: fit-content;
    /* overflow: scroll; */
    text-align: left;
    border-radius: 10px;
    width: 100%;
    border: 1px solid transparent;
}
.dropdown-content-search div{
    font-size:16px;
    font-weight:600;
    color:#050505;
    padding: 15px;
    font-family:inherit;
    letter-spacing:normal;
    line-height:30px;
}
.dropdown-content-search div:hover{
    border-radius:9px;
    background:#f2f2f2;
}
.dropdown-content-search div:first-child {
    background-color: #f2f2f2;
}

@media screen and (max-width: 768px) {
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

    /*  */
    .offcanvas-start {
        width: 350px !important;
    }

    /*  */

}

@media screen and (max-width: 575px) {
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

#selectedValues span {
    color: #fff;
}

.erro_background {
    background-color: rgba(255, 222, 144, 255) !important;
    color: rgba(125, 108, 71, 255) !important;
}

.color_info {
    text-align: center;
    margin-top: 43px;
    padding-bottom: 22px;
    color: #605858;
    font-size: 14px;
}

.fc-content-skeleton table thead {
    height: 40px !important;
}

.fc-content-skeleton table thead tr .fc-day-top .fc-day-number {
    padding: 12px;
}

/* timepicker style */
.time-picker_cls {
    margin-right: 10px;
    display: flex;
    align-items: center;
    background-color: #f4f4f4;
    border: 2px solid #ccc;
    border-radius: 5px;
    padding: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-family: 'Arial', sans-serif;
}

/* Style the select elements (hour, minute, am/pm) */
.time-picker_cls select {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 3px;
    padding: 5px;
    margin: 0 5px;
    font-size: 16px;
    color: #333;
}

/* Add some hover and focus styles for better user interaction */
.time-picker_cls select:hover,
.time-picker_cls select:focus {
    border-color: #3498db;
}

/* Style the AM/PM select element */
.time-picker_cls #ampm {
    margin-right: 0;
}

/* Customize the appearance of the selected option */
.time-picker_cls select option:checked {
    background-color: #3498db;
    color: #fff;
}

/* close btn sidebar */
.close-btn {
    position: absolute;
    top: -6px;
    left: 13px;
    font-size: 24px;
    cursor: pointer;
    color: #fff;
}


.croissant-icon:before {
    content: "\f190";
}

.bx-chevron-right.toggle2 {
    position: absolute;
    top: 4%;
    right: 94%;
    transform: translateY(-50%) rotate(180deg);
    height: 25px;
    width: 25px;
    background-color: var(--primary-color);
    color: var(--sidebar-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    cursor: pointer;
    transition: var(--tran-05);
}

.container.section5 .calendar_overflo {
    transition: all 1s ease;
}

.with-transition {
    transition: all 1s ease-out !important;
}

.btn-close {
    background-image: url("");
}

.btn-close {
    background-image: url("");
}
.LinkedinWrap #mypostresult_youpost,
    .FacebookWrap #mypostresult_youpost,
    .TwitterWrap #mypostresult_youpost,
    .InstagramWrap #mypostresult_youpost{
        overflow-y: hidden;
        height: auto;
    }
#mypostresult_youpost {
    display:inline-block;
    -webkit-box-orient: vertical;
    overflow-y:scroll;
    overflow-x:hidden;
    -ms-overflow-style: none;
    scrollbar-width: none;
    height:50px;
    width:100%;
}
#mypostresult_youpost::-webkit-scrollbar {
    width: 4px;
  height: auto;
}
#mypostresult_youpost::-webkit-scrollbar-thumb {
  background: #888;
}

#mypostresult_youpost::-webkit-scrollbar-track{
  background: #f1f1f1;
}
#mypostresult_youpost::-webkit-scrollbar-thumb:hover {
  background: #555;
}

.wizard-fieldset_youpost {
    color: #171717;
    font-weight: 500;
    font-size: 17px;
}

.mydeltpostbtn {
    border-radius: 10px;
    margin-top: 15px;
}

.visit_postsite {
    color: #6B9CFA;
    font-family: 'Poppins', sans-serif;
    font-size: 18px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    text-decoration-line: underline;
}

.postlink {
    margin-top: 40px;
    text-align: center;
}

.content_main {
    text-align: left;
}
#mySidebar{
    position: relative;
}
#mySidebar .CloseSidebar_Btn {
        position: absolute;
        top: 10px;
        left: 10px;
        right: auto;
        width: 100%;
    }
.BackBtnCS{
        background-color: #ddd;
        border-radius: 5px;
        padding: 6px;
        font-weight: 600;
        margin-right: 6%;
        float: right;
        cursor: pointer;
    }
.sidebar_post{
    background-repeat: no-repeat;
    height: 62px;
    background-size: contain;
    width: 68px;
    background-position: center;
}
.video_play_head{
    align-items: center;
    display: flex;
    border-radius: 30px;
    width: 40px;
    height: 40px;
    border: 1px solid #000;

}
.video_play{
    color:#000;
    font-size:17px;
    display: flex !important;
    justify-content:center;
    width: 100%;
}

.SetUp_PreviewImg .mobile_post_img:first-child,
.SetUp_PreviewImg .mobile_post_img_link:first-child,
.SetUp_PreviewImg .mobile_post_img_tw:first-child{
    background-size: 100% !important;
}
.AlignCenter{
    display: grid;
    align-content: center;
}
.mobile_post_img.SetUp_PreviewImg,
.InstaPreview_setup .mobile_post_img_inst{
    background-size: 100% auto !important;
}
.flex_myicon{
    flex-wrap:wrap;
}
.emoji_show.emojionearea-inline{
    background:transparent;
    border-radius:30px;
    border:none;
    box-shadow:none;
}
.emojionearea, .emojionearea.form-control {
padding:16px !important;
}
.emojionearea .emojionearea-button{
    opacity: 1 !important;
}
.emojionearea.emoji_show  .emojionearea-button>div, .emojionearea .emojionearea-picker .emojionearea-wrapper:after{
background-image:url('{{ asset('images/addemoji2.png') }}') !important;
background-size:cover;
background-repeat: no-repeat;
background-position:100% 100% !important;
}
/* .icon_buttons  ul .emojionearea {
    position: absolute !important;
    top: 22%;
    right: 2%;
    width: 32px;
    border:none;
    -webkit-box-shadow:none;
     box-shadow:none;
     background:none;

} */

/* .pick_date_from_calendar .calendar .pignose-calendar .pignose-calendar-body .pignose-calendar-row .pignose-calendar-unit.pignose-calendar-unit-date{
      opacity: 0.5;
      pointer-events: none;
    } */
/* close btn sidebar */
/* timepicker style */
</style>
@section('content')

<!--===== Markup For "Create & Preview Post" Starts Here =====-->
<section class="create_preview_post_wrap">
    <div class="container container_2 create_preview_post_wrapInner">
        <div class="create_preview_post create_preview_post_index">

            <div
                class="create_post create_preview_post_index_item create_preview_post_index_itemLeft section2_borderleft_card mx-2 my-2">
                <form action="{{url('create_post')}}" class="" method="post" enctype="multipart/form-data"
                    id="post_form">
                    @csrf
                    <input type="hidden" name="suggestionsMap" id="suggestionsMapInput">

                    <section class="wizard-section" style="display: none">
                        <div class="row no-gutters">

                            <div class="col-lg-12">
                                <div class="pos_card">
                                    <div class="form-wizard card my-2">

                                        <div class="form-wizard-header">


                                            <ul class="list-unstyled form-wizard-steps form_wizard_steps clearfix">
                                                <li section="youpost"><span
                                                        class="d-flex justify-content-center align-items-center"><img
                                                            src="{{asset('images/you-post.png')}}" alt=""></span></li>
                                                @if(in_array(('Facebook'),auth()->user()->account->platforms))
                                                <li section="fb"><span
                                                        class="d-flex justify-content-center align-items-center"><img
                                                            src="{{asset('images/FB_Color.png')}}" width="12px"
                                                            height="20" alt=""></span></li>
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
                                                                src="{{asset('images/Linkedin_Color.png')}}"
                                                                width="20px" alt=""></span></span></li>
                                                @endif
                                            </ul>
                                        </div>

                                        <!-- you post content -->
                                        <fieldset class="wizard-fieldset youpost ">
                                            <div class="ml-2">
                                                <span class="wizard-fieldset_edit">Edit</span> : <span
                                                    class="wizard-fieldset_youpost">All Platform Content</span>

                                            </div>
                                            <div class="form-group emoji_parent emoji_parent2" data-emoji='youpost'>
                                                <textarea onkeyup="updateDiv(this)" onchange="updateDiv_other(this)"
                                                    name="youpost_content" id="youpost_content" cols="30" rows="10"
                                                    class="form-control wizard-required emojiarea" data-id="youpost_error"
                                                    placeholder="Write your content for all platforms...">{{old('youpost_content')}}</textarea>
                                                    <p id="youpost_char_count" class="charCount charCountYou"></p>
                                                <div class="expand_icon d-none"><img src="{{asset('')}}images/Expand.png"
                                                        class="img-fluid" alt="" /></div>

                                                <div id="dropdown" class="dropdown-content-search"></div>
                                            </div>
                                            <div class="icon_buttons_tags mt-3">
                                                <div class="icon_buttons grid_item">
                                                    <ul class="p-0 d-flex gap-2" >
                                                        <li>
                                                            <a href="javascript:void(0)"
                                                                class="image_or_video_youpost_all" typpe="image"
                                                                social="youpost" fordata="image_or_video_youpost"><label
                                                                    for="image_or_video_youpost">
                                                                    <img src="{{asset('')}}images/addimages3.png"
                                                                        class="img-fluid" alt="" />       
                                                                </label>
                                                            </a>
                                                            <span class="selectvideo">Add Image</span>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)"
                                                                class="image_or_video_youpost_all" typpe="video"
                                                                social="youpost" fordata="image_or_video_youpost"><label
                                                                    for="image_or_video_youpost">
                                                                    <img src="{{asset('')}}images/addvideos1.png"
                                                                        class="img-fluid" alt="" />      
                                                                </label>
                                                            </a>
                                                            <span class="selectvideo">Add Video</span>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" class="open_emoji d-flex justify-content-center">
                                                                <!-- <img src="{{asset('')}}images/emo.png"
                                                                    class="img-fluid" alt="" /> -->
                                                                    <input type="hidden" class="emoji_show show_emoji">                                             
                                                            </a>
                                                            <span class="selectvideo">Add Emoji</span>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="tags_input_wrap grid_item tags_hash d-none">
                                                    <!-- <div class="tags_input">
                                                        <select name="facebook_tag[]"
                                                            class="form-control selectmultiple1" multiple
                                                            id="facebook_tag">
                                                        </select>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <!-- my code -->
                                            <!-- append div waleed start -->
                                            <div id="image_div_youpost" class="image_div_2"><label for="file"
                                                    style="margin-top: 20px;">

                                                    <div class="sm_container" id="12">
                                                        <input type="file" name=""
                                                            class="image d-none file_image_video_youpost"
                                                            id="image_or_video_youpost" accept="image/*,video/*"
                                                            div_to_open="youpost">
                                                        <input type="hidden" name="media_type_youpost"
                                                            id="media_type_youpost">
                                                        <input type="hidden" name="youpost_video" id="youpost_video">

                                                    </div>
                                                </label>

                                            </div>
                                            <p id="file_error_youpost" class=" p-2  w-100 d-none mt-2 erro_background">
                                            </p>

                                            <!-- append div waleed start -->
                                            <!-- end my coed -->


                                            <div class="form-group clearfix clearfix2">
                                                <!-- <a href="javascript:;"
                                                   class="form-wizard-previous-btn float-left">Back</a>
                                                <a href="javascript:;" class="form-wizard-next-btn float-right">Next
                                                   Platform</a> -->
                                            </div>
                                        </fieldset>
                                        <!-- you post content end -->

                                        @if(in_array(('Facebook'),auth()->user()->account->platforms))
                                        <fieldset class="wizard-fieldset fb">
                                            <div class="ml-2">
                                                <span class="wizard-fieldset_edit">Edit</span> : <span
                                                    class="wizard-fieldset_facebook">Facebook</span>

                                            </div>
                                            <div class="form-group emoji_parent emoji_parent2">
                                                <textarea onkeyup="updateDiv(this)" onchange="suggested_text(this)"
                                                    name="facebook_content" id="facebook_content" cols="30" rows="10" maxlength="63206"
                                                    class="form-control wizard-required emojiarea"
                                                    data-id="facebok_error"
                                                    placeholder="Write your post...">{{old('facebook_content')}}</textarea>
                                                    <p id="fb_char_count" class="charCount charCountfb"></p>
                                                <div class="expand_icon d-none"><img src="{{asset('')}}images/Expand.png"
                                                        class="img-fluid" alt="" /></div>

                                                <div id="dropdown" class="dropdown-content-search"></div>
                                                <!-- <div id="myDiv" class ="div_text testing_it" contenteditable="true"></div> -->

                                            </div>
                                            <div class="icon_buttons_tags mt-3">
                                                <div class="icon_buttons grid_item">
                                                    <ul class="p-0 d-flex gap-2">
                                                        <li>
                                                            <a href="javascript:void(0)" class="image_or_video"
                                                                typpe="image" social="fb"
                                                                fordata="image_or_videofb"><label
                                                                    for="image_or_videofb">
                                                                    <img src="{{asset('')}}images/addimages3.png"
                                                                        class="img-fluid" alt="" />
                                                                </label>
                                                            </a>
                                                            <span class="selectvideo">Add Image</span>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" class="image_or_video"
                                                                typpe="video" social="fb"
                                                                fordata="image_or_videofb"><label
                                                                    for="image_or_videofb">
                                                                    <img src="{{asset('')}}images/addvideos1.png"
                                                                        class="img-fluid" alt="" />
                                                                </label>
                                                            </a>
                                                            <span class="selectvideo">Add Video</span>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" class="open_emoji d-flex justify-content-center">
                                                                <!-- <img src="{{asset('')}}images/emo.png"
                                                                    class="img-fluid" alt="" /> -->
                                                                    <input type="hidden" class="emoji_show show_emoji">
                                                            </a>
                                                            <span class="selectvideo">Add Emoji</span>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="tags_input_wrap grid_item tags_hash d-none">
                                                    <!-- <div class="tags_input">
                                                        <select name="facebook_tag[]"
                                                            class="form-control selectmultiple1" multiple
                                                            id="facebook_tag">
                                                        </select>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <!-- my code -->
                                            <!-- append div waleed start -->
                                            <div id="image_div" class="image_div_2"><label for="file"
                                                    style="margin-top: 20px;">

                                                    <div class="sm_container" id="11">
                                                        <input type="file" name="" class="image d-none file_image_video"
                                                            id="image_or_videofb" accept="image/*,video/*"
                                                            div_to_open="facebook">
                                                        <input type="hidden" name="media_type_facebook"
                                                            id="media_type_fb">
                                                        <input type="hidden" name="fb_video" id="fb_video">

                                                    </div>
                                                </label>

                                            </div>
                                            <p id="file_error_fb">
                                            </p>
                                            <!-- append div waleed start -->
                                            <!-- end my coed -->


                                            <div class="form-group clearfix clearfix2">
                                                <!-- <a href="javascript:;"
                                                    class="form-wizard-previous-btn float-left">Back</a>
                                                <a href="javascript:;" class="form-wizard-next-btn float-right">Next
                                                    Platform</a> -->
                                            </div>
                                        </fieldset>
                                        @endif

                                        @if(in_array(('Instagram'),auth()->user()->account->platforms))
                                        <fieldset class="wizard-fieldset insta">
                                        <div class="ml-2">
                                        <span class="wizard-fieldset_edit">Edit</span> : <span class="wizard-fieldset_youpost">Instagram</span>

                                            </div>


                                            <div class="form-group emoji_parent emoji_parent2 ">
                                                <textarea onkeyup="updateDiv(this)" onchange="suggested_text(this)"
                                                    name="instagram_content" id="instagram_content" cols="30" rows="10" maxlength="2200"
                                                    class="form-control wizard-required emojiarea" data-id="insta_error"
                                                    placeholder="Write your post...">{{old('instagram_content')}}</textarea>
                                                    <p id="insta_char_count" class="charCount charCountinst"></p>
                                                <div id="dropdown" class="dropdown-content-search"></div>
                                            </div>
                                            <div class="icon_buttons_tags mt-3">
                                                <div class="icon_buttons grid_item">
                                                    <ul class="p-0 d-flex gap-2">
                                                        <li>
                                                            <a href="javascript:void(0)" class="image_or_video"
                                                                typpe="image" social="insta"
                                                                fordata="image_or_video_insta"><label
                                                                    for="image_or_video_insta">
                                                                    <img src="{{asset('')}}images/addimages3.png"
                                                                        class="img-fluid" alt="" />
                                                                </label>
                                                            </a>
                                                            <span class="selectvideo">Add Image</span>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" class="image_or_video"
                                                                typpe="video" social="insta"
                                                                fordata="image_or_video_insta"><label
                                                                    for="image_or_video_insta">
                                                                    <img src="{{asset('')}}images/addvideos1.png"
                                                                        class="img-fluid" alt="" />
                                                                </label>
                                                            </a>
                                                            <span class="selectvideo">Add Video</span>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" class="open_emoji d-flex justify-content-center">
                                                                <!-- <img src="{{asset('')}}images/emo.png"
                                                                    class="img-fluid" alt="" /> -->
                                                                    <input type="hidden" class="emoji_show show_emoji">
                                                            </a>
                                                            <span class="selectvideo">Add Emoji</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tags_input_wrap grid_item tags_input_insta d-none">
                                                    <!-- <div class="tags_input">
                                                        <select name="instagram_tag[]"
                                                            class="form-control selectmultiple" multiple
                                                            id="instagram_tag">

                                                        </select>

                                                    </div> -->
                                                </div>
                                            </div>
                                            <div id="image_div_ins">
                                                <label for="file" style="margin-top: 20px;">
                                                    <div class="sm_container">

                                                        <input type="file" name=""
                                                            class="image d-none file_image_video wizard-required"
                                                            id="image_or_video_insta" accept="image/*,video/*"
                                                            div_to_open="instagram">
                                                        <input type="hidden" name="media_type_instagram"
                                                            id="media_type_insta">
                                                        <input type="hidden" name="inst_video" id="inst_video">
                                                    </div>
                                                </label>
                                            </div>
                                            <p class=" p-2  w-100 d-none mt-2 erro_background" id="file_error_insta">
                                            </p>

                                            <div class="form-group clearfix clearfix2">
                                                <!-- <a href="javascript:;"
                                                    class="form-wizard-previous-btn float-left">Back</a>
                                                <a href="javascript:;" class="form-wizard-next-btn float-right">Next
                                                    Platform</a> -->
                                            </div>
                                        </fieldset>
                                        @endif

                                        @if(in_array(('Twitter'),auth()->user()->account->platforms))
                                        <fieldset class="wizard-fieldset twitter">
                                            <span class="wizard-fieldset_edit">Edit</span> : <span
                                                class="wizard-fieldset_facebook">Twitter</span>
                                            <div class="form-group emoji_parent  emoji_parent2">
                                                <textarea datatype="fsdf" onkeyup="updateDiv(this)"
                                                    onchange="suggested_text(this)" name="twitter_content"  maxlength="280"
                                                    id="twitter_content" cols="30" rows="10" data-id="twitter_error"
                                                    class="form-control wizard-required emojiarea mention"
                                                    placeholder="Write your post..."
                                                    plt-name="fb">{{old('twitter_content')}}</textarea>
                                                    <p id="twitter_char_count" class="charCount charCounttwt"></p>

                                                <div id="dropdown" class="dropdown-content-search"></div>

                                            </div>
                                            <div class="icon_buttons_tags mt-3">
                                                <div class="icon_buttons grid_item">
                                                    <ul class="p-0 d-flex gap-2">
                                                        <li>
                                                            <a href="javascript:void(0)" class="image_or_video"
                                                                typpe="image" social="insta"
                                                                fordata="image_or_video_twiter"><label
                                                                    for="image_or_video_twiter">
                                                                    <img src="{{asset('')}}images/addimages3.png"
                                                                        class="img-fluid" alt="" />
                                                                </label>
                                                            </a>
                                                            <span class="selectvideo">Add Image</span>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" class="image_or_video"
                                                                typpe="video" social="insta"
                                                                fordata="image_or_video_twiter"><label
                                                                    for="image_or_video_twiter">
                                                                    <img src="{{asset('')}}images/addvideos1.png"
                                                                        class="img-fluid" alt="" />
                                                                </label>
                                                            </a>
                                                            <span class="selectvideo">Add Video</span>
                                                        </li>


                                                        <li>
                                                            <a href="javascript:void(0)" class="open_emoji d-flex justify-content-center">
                                                                <!-- <img src="{{asset('')}}images/emo.png"
                                                                    class="img-fluid" alt="" /> -->
                                                                    <input type="hidden" class="emoji_show show_emoji">
                                                            </a>
                                                            <span class="selectvideo">Add Emoji</span>
                                                        </li>
                                                    </ul>
                                                </div>


                                                <div class="tags_input_wrap grid_item tags_input_insta d-none">
                                                    <!-- <div class="tags_input">
                                                        <select name="twitter_tag[]" class="form-control selectmultiple"
                                                            multiple id="twitter_tag">

                                                        </select>

                                                    </div> -->
                                                </div>
                                            </div>
                                            <div id="image_div_twi" class="image_div_twi"><label for="file" style="margin-top: 20px;">

                                                    <div class="sm_container">

                                                        <input type="file" name="" class="image d-none file_image_video"
                                                            id="image_or_video_twiter" accept="image/*,video/*">
                                                        <input type="hidden" name="media_type_twitter"
                                                            id="media_type_twitter">
                                                        <input type="hidden" name="twitter_video" id="twitter_video">
                                                    </div>
                                                </label>
                                            </div>
                                            <p class=" p-2  w-100 d-none mt-2 erro_background" id="file_error_twiiter">
                                            </p>
                                            <div class="form-group clearfix clearfix2">
                                                <!-- <a href="javascript:;"
                                                    class="form-wizard-previous-btn float-left">Back</a>
                                                <a href="javascript:;" class="form-wizard-next-btn float-right">Next
                                                    Platform</a> -->
                                            </div>
                                        </fieldset>
                                        @endif


                                        @if(in_array(('Linkedin'),auth()->user()->account->platforms))
                                        <fieldset class="wizard-fieldset linkedin">
                                            <span class="wizard-fieldset_edit">Edit</span> : <span
                                                class="wizard-fieldset_facebook">Linkedin</span>

                                            <div class="form-group emoji_parent emoji_parent2">
                                                <textarea onkeyup="updateDiv(this)" onchange="suggested_text(this)"
                                                    name="linkedin_content" id="linkedin_content" cols="30" rows="10" maxlength="3000"
                                                    data-id="link_error"
                                                    class="Customemojiarea form-control wizard-required emojiarea mention "
                                                    placeholder="Write your post...">{{old('linkedin_content')}}</textarea>
                                                    <p id="linkedin_char_count" class="charCount charCountlink"></p>
                                                <div id="dropdown" class="dropdown-content-search"></div>
                                            </div>
                                            <div class="icon_buttons_tags mt-3">
                                                <div class="icon_buttons grid_item">
                                                    <ul class="p-0 d-flex gap-2">
                                                        <li>

                                                            <a href="javascript:void(0)" class="image_or_video"
                                                                typpe="image" social="linkedin"
                                                                fordata="image_or_video_linkedin"><label
                                                                    for="image_or_video_linkedin">
                                                                    <img src="{{asset('')}}images/addimages3.png"
                                                                        class="img-fluid" alt="" />
                                                                </label>
                                                            </a>
                                                            <span class="selectvideo">Add Image</span>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" class="image_or_video"
                                                                typpe="video" social="linkedin"
                                                                fordata="image_or_video_linkedin"><label
                                                                    for="image_or_video_linkedin">
                                                                    <img style="border-radius:50px"
                                                                        src="{{asset('')}}images/addvideos1.png"
                                                                        class="img-fluid" alt="" />
                                                                </label>
                                                            </a>
                                                            <span class="selectvideo">Add Video</span>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" class="open_emoji d-flex justify-content-center">
                                                                <!-- <img src="{{asset('')}}images/emo.png"
                                                                    class="img-fluid" alt="" /> -->
                                                                    <input type="hidden" class="emoji_show show_emoji">
                                                            </a>
                                                            <span class="selectvideo">Add Emoji</span>
                                                        </li>
                                                    </ul>
                                                </div>


                                                <div class="tags_input_wrap grid_item tags_input_insta d-none">
                                                    <!-- <div class="tags_input">
                                                        <select name="linkedin_tag[]"
                                                            class="form-control selectmultiple" multiple
                                                            id="linkedin_tag">
                                                        </select>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div id="image_div_linked"><label for="file" style="margin-top: 20px;">

                                                    <div class="sm_container">

                                                        <input type="file" name="" class="image d-none file_image_video"
                                                            id="image_or_video_linkedin" accept="image/*,video/*">
                                                        <input type="hidden" name="media_type_linkedin"
                                                            id="media_type_linkedin">
                                                        <input type="hidden" name="link_video" id="link_video">
                                                    </div>
                                                </label>
                                            </div>
                                            <p class=" p-2  w-100 d-none mt-2 erro_background" id="file_error_linkedin">
                                            </p>
                                            <div class="form-group clearfix clearfix2">
                                                <!-- <a href="javascript:;"
                                                    class="form-wizard-previous-btn float-left">Back</a>
                                                <a href="javascript:;" class="form-wizard-next-btn float-right">Next
                                                    Platform</a> -->
                                            </div>
                                        </fieldset>
                                        @endif
                                        <p class="  p-2  w-100 d-none mt-2 erro_background" id="file_error_all"></p>
                                        <div class="post_now_button schedule_post_button">

                                            <button type="button"
                                                class="btn post_later_now_btn  post_later_now_btn2 w-100"
                                                data-bs-toggle="modal" data-bs-target="#TimetoUploadPost">
                                                Schedule Post
                                            </button>

                                            <button type="submit"
                                                class="btn post_later_now_btn w-100 post_now_btn position-relative btn-danger" id="posted_now">
                                                <img class="uplaod-gif uplaod-gif-video uploader_post d-none"
                                                    src="{{asset("images/newimages/loader.gif")}}" alt=""> Post Now
                                            </button>

                                        </div>
                                        <!-- <div class="PostDateTimePicker PostDate_Time_Picker">
                                            Posted Date & Time
                                            <span data-bs-toggle="modal" data-bs-target="#TimetoUploadPost"
                                                id="browsertime2"></span>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="color_info">Social networks
                                    frequently introduce enhancements to their formatting, your post may appear
                                    different when published.</div>
                            </div>
                        </div>
                    </section>


                    {{-- -------------------------------- --}}


                    <!-- Modal -->
                    <!-- <div class="modal fade" id="TimetoUploadPost" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                        </div> -->
                    <!-- salman popup start-->
                    <div class="modal fade" id="TimetoUploadPost" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Date & Time To Upload Post</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="Timeselect d-flex justify-content-between">
                                    <label for="">Select Time:</label>
                                    <!-- <input type="time" name="" id="" class="form-control select_time" value="00:00"> -->
                                    <!--  -->
                                    <div class="time-picker time-picker_cls">
                                        <!-- <input type="time" name="" id="" class="form-control select_time" value="00:00"> -->

                                        <select id="hour" class="select_time"
                                            style="height: 42px; width: 69px; appearance: none; background-image:url('{{asset('images/down-arrow.png')}}'); background-repeat: no-repeat;background-size: 19px;background-position: 41px;"></select>
                                        <select id="minute" class="select_time"
                                            style="height: 42px; width: 69px; appearance: none; background-image:url('{{asset('images/down-arrow.png')}}'); background-repeat: no-repeat;background-size: 19px;background-position: 41px;"></select>
                                        <select id="ampm" name="ampm" class="select_time"
                                            style="height: 42px; width: 69px; appearance: none; background-image:url('{{asset('images/down-arrow.png')}}'); background-repeat: no-repeat;background-size: 19px;background-position: 41px;">
                                            <option value="AM">AM</option>
                                            <option value="PM">PM</option>
                                        </select>
                                    </div>
                                    <!--  -->
                                </div>
                                <div class="modal-body">
                                    <div class="post_later">
                                        <div class="tabs_type_heading_sm">
                                            <span id="browsertime d-none"></span>
                                            <input type="hidden" class="browsertimeinput" name="time">
                                            <input type="hidden" class="posttime" value="now" name="posttime">
                                            <input type="hidden" name="timezone" class="timezone">

                                        </div>
                                        <div class="pick_date_from_calendar">
                                            <div class="calendar"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                        id="cancelButton">Cancel
                                    </button>
                                    <button type="submit" class="btn post_later_now_btn btn-success">Schedule Post
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- salman popup end-->




                </form>
            </div>


            <form action="{{ route('resheudle-post') }}" method="POST" enctype="multipart/form-data" id="reschudledForm">
                    @csrf
                    @method('Post')
                    <!-- edit post schedule  -->
                    <div class="modal fade" id="SchedulePost" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reschedule your Post</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="Timeselect d-flex justify-content-between">
                                    <label for="">Select Time:</label>
                                    <!-- <input type="time" name="" id="" class="form-control select_time" value="00:00"> -->
                                    <!--  -->
                                    <div class="time-picker time-picker_cls">
                                        <!-- <input type="time" name="" id="" class="form-control select_time" value="00:00"> -->

                                        <select id="hour_schedule" class="select_time_schedule"name= "hour_schedule"
                                            style="height: 42px; width: 69px; appearance: none; background-image:url('{{asset('images/down-arrow.png')}}'); background-repeat: no-repeat;background-size: 19px;background-position: 41px;"></select>
                                        <select id="minute_schedule" class="select_time_schedule" name="minute_schedule"
                                            style="height: 42px; width: 69px; appearance: none; background-image:url('{{asset('images/down-arrow.png')}}'); background-repeat: no-repeat;background-size: 19px;background-position: 41px;"></select>
                                        <select id="ampm_schedule" name="ampm" class="select_time_schedule" name= "ampm_schedule"
                                            style="height: 42px; width: 69px; appearance: none; background-image:url('{{asset('images/down-arrow.png')}}'); background-repeat: no-repeat;background-size: 19px;background-position: 41px;">
                                            <option value="AM">AM</option>
                                            <option value="PM">PM</option>
                                        </select>
                                    </div>
                                    <!--  -->
                                </div>
                                <div class="modal-body">
                                    <div class="post_later">
                                        <div class="tabs_type_heading_sm">
                                            <span id="browsertime_schedule d-none"></span>
                                            <input type="hidden" class="browsertimeinput_schedule" name="time_schedule">
                                            <input type="hidden" class="posttime_schedule"  name="posttime_schedule">
                                            <input type="hidden" name="timezone_schedule" class="timezone_schedule">
                                            <input type="hidden" id="post_id" name ="post_id">
                                            <input type="hidden" name="postdate" class="" id= "postdate">


                                        </div>
                                        <div class="pick_date_from_calendar">
                                            <div class="calendar_reschedule"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                        id="cancelButton">Cancel
                                    </button>
                                    <button type="submit" class="btn  btn-success">Schedule Post
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
</form>

<!-- edit schedule -->


            <div
                class="create_preview_post_index_item create_preview_post_index_itemRight section2_rightcard mx-2 my-2 ">

                <div
                    class="d-lg-flex justify-content-center post_preview_small_screen create_preview_post_index_itemRightInner">
                    <!-- <div class="preview_post position-relative" style="width: 80%!important;"> -->
                    <div class="preview_post position-relative" style="width: 80%">
                        <div class="loader d-none"></div>
                        <div class="sub_heading">
                            <h4>Post Preview</h4>
                        </div>
                        <!-- <div class="color_info">Social networks frequently introduce enhancements to their formatting, your post may appear different when published.</div> -->

                        <!-- you post preview -->
                        <div class="preview_wrap add_preview  prv_youpost prev_wrap_youpost">
                            <div class="col-md-12">
                                <div class="Mobcompny-title">
                                    <div class="w-50">
                                        <h6 class="text-light">YouPost</h6>
                                    </div>
                                    <div class="w-50 Mobsocial-icon Mobsocial_icon d-none">
                                        <div><i class="fa-solid fa-plus text-light i_one"></i></div>
                                        <div><i class="fa-solid fa-magnifying-glass text-light i_one "></i></div>
                                        <div class="messenger"><i
                                                class="fab fa-facebook-messenger text-light i_one"></i>
                                            <div class="msg_2 d-none">
                                                <p>2</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="Mobcompny-smallicon Mobcompny_smallicon pt-2 px-2 pb-1 d-none">
                                <span><i class="fa-solid fa-house"></i></span>
                                <div class="one_img"><img src="{{asset('images/ad.png')}}" class="" alt=""></div>
                                <div class="one_img messenger"><img src="{{asset('images/you.png')}}" class="" alt="">
                                    <div class="msg_1 icon_opc d-none">
                                        <p>8</p>
                                    </div>
                                </div>
                                <div class="one_img messenger marketicon">
                                    <img src="{{asset('images/marketplace2.png')}}" class="" alt="">
                                    <div class="msg_1 icon_opc d-none">
                                        <p>1</p>
                                    </div>
                                </div>
                                <div class="one_img mb-1"><img src="{{asset('images/bell.png')}}" class="" alt="">
                                </div>
                                <div class="one_img"><img src="{{asset('images/br.png')}}" class="" alt=""></div>
                            </div>
                            <hr style="color:gray;" class="m-0">
                            <div class="the_preview ">
                                <div class="col-md-12 the_preview_card" style="height: 80px">
                                    <div class="MainMobileview MainMobileview2 d-flex justify-content-between mt-1 youpost_prev">
                                        <div class="post_img_name youpost_prev_name">
                                            <div class="post_img youpost_prev_img">
                                                <img src="{{asset('images/you-post.png')}}" class="img-fluid" width="40"
                                                    height="40" alt="">
                                            </div>
                                            <div>
                                                <span id="" class="postname">{{auth()->user()->name}} <br>
                                                    <span class="sponsored">Public . <i
                                                            class="fa-solid fa-earth-americas"></i></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="icons_d ">
                                            <span class="ellipses"><i class="fa-solid fa-ellipsis"></i></span>
                                            <span class="xmark"><i class="fa-solid fa-xmark"></i></span>
                                        </div>
                                    </div>
                                    <p class="m-0"></p>
                                    <div class="Mobcart_title mobprev_container">
                                        <span id="mypostresult_youpost" class="mypostresult mob_prevcontent">Write your content for all platforms...</span>
                                        <span class="icon icon-privacy text-primary" id="mynameresult"></span>
                                    </div>
                                    <div id="selectedValues"></div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="MainMobileimg">
                                        <div class="media-container media_container">
                                            <div class="prv_div_youpost Preview_ImagesSetup"> </div>
                                            <div id="mediaContainervideo_youpost">
                                                <!-- <video class="d-none video_preview_youpost" controls>
                                                    <source src="movie.mp4" type="video/*">
                                                </video> -->
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="color:gray; margin-top:45px !important;" class="m-0">
                                </div>
                                <div class="col-md-12">
                                    <div
                                        class="Mobcart_title Mobcart_title2 bile d-flex justify-content-between Mobcart_titleCustom d-none">
                                        <div
                                            class="reactions reactions2 d-flex justify-content-center align-items-center d-none">
                                            <img src="{{asset('')}}images/fb_thumb.png" class="" alt="" height="12" />
                                            <img src="{{asset('')}}images/fb_heart.png" class="thums_up" alt=""
                                                height="12" />
                                        </div>
                                        <div class="total-comments total_comments u-margin-inline-start d-none">
                                            <a>Muhammad Talha and 24k others 8.3k comments</a>
                                        </div>
                                    </div>
                                    <hr style="color:gray;" class="m-0">
                                    <div class="actions-buttons actions_buttons px-1 mt-3">
                                        <ul class="actions-buttons-list d-flex p-0 justify-content-between">
                                            <li class="actions-buttons-item  d-flex align-item-center">
                                                <!-- <i class="fa-regular fa-thumbs-up"></i> -->
                                                <img src="{{asset('')}}images/thumbs_up.png" class="" alt=""
                                                    height="20" />
                                                <span class="text text2  d-flex align-items-center">Like</span>
                                            </li>
                                            <li class="actions-buttons-item d-flex align-item-center pt-1">
                                                <img src="{{asset('')}}images/coment_msg.png" class="" alt=""
                                                    height="15" width="14" />
                                                <span class="text text2">Comment</span>
                                            </li>
                                            <li class="actions-buttons-item  d-flex align-item-center share_fb">
                                                <img src="{{asset('')}}images/share.png" class="" alt="" height="18" />
                                                <span class="text text2">Share</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- you post preview end -->
                        @if(in_array(('Facebook'),auth()->user()->account->platforms))
                        <div class="preview_wrap d-none add_preview  prv_fb prev_wrap_fb">
                            <div class="col-md-12">
                                <div class="Mobcompny-title">
                                    <div class="w-50">
                                        <h6 class="text-light">facebook</h6>
                                    </div>
                                    <div class="w-50 Mobsocial-icon Mobsocial_icon">
                                        <div><i class="fa-solid fa-plus text-light i_one"></i></div>
                                        <div><i class="fa-solid fa-magnifying-glass text-light i_one "></i></div>
                                        <div class="messenger"><i
                                                class="fab fa-facebook-messenger text-light i_one"></i>
                                            <div class="msg_2 d-none">
                                                <p>2</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="Mobcompny-smallicon Mobcompny_smallicon pt-2 px-2 pb-1">
                                <span><i class="fa-solid fa-house"></i></span>
                                <div class="one_img"><img src="{{asset('images/ad.png')}}" class="" alt=""></div>
                                <div class="one_img messenger"><img src="{{asset('images/you.png')}}" class="" alt="">
                                    <div class="msg_1 icon_opc d-none">
                                        <p>8</p>
                                    </div>
                                </div>
                                <div class="one_img messenger marketicon">
                                    <img src="{{asset('images/marketplace2.png')}}" class="" alt="">
                                    <div class="msg_1 icon_opc d-none">
                                        <p>1</p>
                                    </div>
                                </div>
                                <div class="one_img mb-1"><img src="{{asset('images/bell.png')}}" class="" alt="">
                                </div>
                                <div class="one_img"><img src="{{asset('images/br.png')}}" class="" alt=""></div>
                            </div>
                            <hr style="color:gray;" class="m-0">
                            <div class="the_preview">
                                <div class="col-md-12 the_preview_card" style="height: 80px">
                                    <div class="MainMobileview MainMobileview2 d-flex justify-content-between mt-1 youpost_prev">
                                        <div class="post_img_name youpost_prev_name">
                                            <div class="post_img youpost_prev_img">
                                                <img src="{{auth()->user()->account->fb_image}}" class="img-fluid"
                                                    width="40" height="40" alt="">
                                            </div>
                                            <div>
                                                <span id="" class="postname">{{auth()->user()->account->fb_page_name}}
                                                    <br>
                                                    <span class="sponsored">Public . <i
                                                            class="fa-solid fa-earth-americas"></i></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="icons_d">
                                            <span class="ellipses"><i class="fa-solid fa-ellipsis"></i></span>
                                            <span class="xmark"><i class="fa-solid fa-xmark"></i></span>
                                        </div>
                                    </div>
                                    <p class="m-0"></p>
                                    <div class="Mobcart_title mobprev_container">
                                        <span id="mypostresult_fb" class="mypostresult mob_prevcontent">Write your post...</span>
                                        <span class="icon icon-privacy text-primary" id="mynameresult"></span>
                                    </div>
                                    <div id="selectedValues"></div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="MainMobileimg">
                                        <div class="media-container media_container">
                                            <div class="prv_div Preview_ImagesSetup Preview_ImagesSetupFB"> </div>
                                            <div id="mediaContainervideo_fb">
                                                <!-- <video class="d-none video_preview" controls>
                                                    <source src="movie.mp4" type="video/*">
                                                </video> -->
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="color:gray; margin-top:41px !important;" class="m-0">
                                </div>
                                <div class="col-md-12">
                                    <div
                                        class="Mobcart_title Mobcart_title2 bile d-flex justify-content-between Mobcart_titleCustom d-none">
                                        <div
                                            class="reactions reactions2 d-flex justify-content-center align-items-center">
                                            <img src="{{asset('')}}images/fb_thumb.png" class="" alt="" height="12" />
                                            <img src="{{asset('')}}images/fb_heart.png" class="thums_up" alt=""
                                                height="12" />
                                        </div>
                                        <div class="total-comments total_comments u-margin-inline-start">
                                            <a>Muhammad Talha and 24k others 8.3k comments</a>
                                        </div>
                                    </div>
                                    <hr style="color:gray;" class="m-0">
                                    <div class="actions-buttons actions_buttons px-1 mt-2">
                                        <ul class="actions-buttons-list d-flex p-0 justify-content-between">
                                            <li class="actions-buttons-item  d-flex align-item-center">
                                                <!-- <i class="fa-regular fa-thumbs-up"></i> -->
                                                <img src="{{asset('')}}images/thumbs_up.png" class="" alt=""
                                                    height="20" />
                                                <span class="text text2  d-flex align-items-center">Like</span>
                                            </li>
                                            <li class="actions-buttons-item d-flex align-item-center pt-1">
                                                <img src="{{asset('')}}images/coment_msg.png" class="" alt=""
                                                    height="15" width="14" />
                                                <span class="text text2">Comment</span>
                                            </li>
                                            <li class="actions-buttons-item  d-flex align-item-center share_fb">
                                                <img src="{{asset('')}}images/share.png" class="" alt="" height="18" />
                                                <span class="text text2">Share</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endif
                        <!-- moble_insta_post2 start-->
                        @if(in_array(('Instagram'),auth()->user()->account->platforms))

                        <div class="instagram_bg add_preview d-none  prv_insta">
                            <div class="the_preview">
                                <div class="d-flex justify-content-between  px-2">
                                    <div class="d-flex gap-4">
                                        <div style="cursor:pointer;"> <i class="fa-solid fa-arrow-left mt-1"></i> </div>
                                        <div class="ins_post_p">
                                            <p>Posts</p>
                                        </div>
                                    </div>
                                    <div class="ins_post_a"><a href="">Follow</a></div>
                                </div>
                                <div class="row">
                                    <div class="col-10">
                                        <div class="d-flex show active gap-1 px-1">
                                            <div class="show active">
                                                <img src="{{auth()->user()->account->inst_image}} "
                                                    class="rounded-circle" alt="" height="28" />
                                            </div>
                                            <div class="inst_post_name">
                                                <h3 class="mb-0 user_name">{{auth()->user()->account->inst_name}}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="" style="cursor:pointer;">
                                            <i class="fa-solid fa-ellipsis-vertical mt-2"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="insta_post_img_inner_con Insta_post_previnner">
                                        <div class="prv_div_isnt InstaPreview_setup">
                                            <!-- <img src="" class="d-none preview_image_inst" alt=""> -->
                                        </div>

                                        <div id="mediaContainervideo_inst">
                                            <!-- <video class="d-none video_preview_inst" controls>
                                                <source src="movie.mp4" type="video/*">
                                            </video> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row px-2">
                                    <div class="col-12">
                                        <div class="actions-buttons-list d-flex justify-content-between show active">
                                            <div class="actions-buttons-button show active">
                                                <div class="d-flex show active" style="gap: 0 10px;">
                                                    <img class="ins_icon" src="{{asset('images/icons8-heart1.png')}}"
                                                        alt="" style="cursor:pointer;">
                                                    <img class="ins_icon" src="{{asset('images/bubble-chat.png')}}"
                                                        alt="" style="cursor:pointer;">
                                                    <img class="ins_icon" src="{{asset('images/send1.png')}}" alt=""
                                                        style="cursor:pointer;">
                                                </div>
                                            </div>
                                            <!-- <div class="actions-buttons-button d-flex" style="padding-top:
                                            5px">
                                            <img  class="" src="{{asset('images/dotb.png')}}" alt="" style="cursor:pointer; height:9px;width:9px">
                                            <img  class="" src="{{asset('images/dotg.png')}}" alt="" style="cursor:pointer; height:9px;width:9px">
                                            <img  class="" src="{{asset('images/dotg.png')}}" alt="" style="cursor:pointer; height:9px;width:9px">

                                            </div> -->
                                            <div class="actions-buttons-button">
                                            </div>
                                            <div class="actions-buttons-button d-flex">
                                                <img class="ins_icon" src="{{asset('images/myiconsave.png')}}" alt=""
                                                    style="cursor:pointer;">
                                            </div>
                                        </div>
                                        <div class="pt-1 insta_likes_post">
                                            <span>
                                                0 Likes
                                            </span>
                                        </div>

                                    </div>
                                    <div class="col-md-12" style="height:56px">
                                        <div class="Mobcart_title mobprev_container">
                                            <span id="mypostresult_insta" class="mypostresult mob_prevcontent" style="color:#000;">Write
                                                your
                                                post...</span>
                                            <span class="icon icon-privacy text-primary" id="mynameresult_insta"></span>
                                        </div>
                                        <div id="selectedValues"></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="insta_pos_comm d-none">
                                            <p class="mb-0">
                                                0 comments
                                            </p>
                                            <p class="mb-0">Just Now</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row px-2">
                                    <div class="col-12 insta_pos_acc_icons py-2">
                                        <div class="insta_acc_bar_parent">
                                            <img src="{{asset('images/Home-01.png')}}" alt="" class="insta_acc_bar">
                                            <img src="{{asset('images/search-01.png')}}" alt="" class="insta_acc_bar">
                                            <img src="{{asset('images/Plus-01.png')}}" alt="" class="insta_acc_bar">
                                            <img src="{{asset('images/Movie-01.png')}}" alt="" class="insta_acc_bar">
                                            <img src="{{asset('images/accountfbicon.png')}}" alt=""
                                                class="insta_acc_bar">


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- moble_insta_post2 end-->
                        @endif

                        <!-- moble_twitter_post start-->
                        @if(in_array(('Twitter'),auth()->user()->account->platforms))

                        <div class="twitter_post add_preview  d-none  prv_twitter">
                            <div class="row">
                                <div class="col-2  twitter_prev">
                                    <div class="indrive_icon2">
                                        <img src="{{auth()->user()->account->twt_image}}" alt="">
                                    </div>
                                </div>
                                <div class="col-9 colum_nine">
                                    <div>
                                        <div class="twitter_header">
                                            <div>
                                                <span class="twitter_post_content">
                                                    {{auth()->user()->account->tw_name}}</span> <img
                                                    src="{{asset('images/offical2.png')}}" class="d-none" alt="">
                                                <span class="twitter_post_content_tag ">
                                                    {{'@'.auth()->user()->account->tw_user_name}}</span>
                                            </div>
                                            <div class="elps">
                                                <i class="fa-solid fa-ellipsis-vertical mt-2 "></i>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="twitter_text pb-1 mobprev_container">
                                        <span id="mypostresult_twitter" class="mypostresult mob_prevcontent">Write your post...</span>
                                        <span id="mynameresult_twitter" class="icon icon-privacy text-primary"></span>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="twitter_img_container ">

                                        <div class="prv_div_tw twitter_preview Preview_ImagesSetup Preview_ImagesSetupTwitter" >
                                            <!-- <img src="" class="d-none preview_image_link" alt=""> -->
                                        </div>
                                        <div id="mediaContainervideo_twitter">
                                            <!-- <video class="d-none video_preview_link" controls>
                                                <source src="movie.mp4" type="video/*">
                                                </video> -->
                                        </div>

                                        <!-- <img class="uploader_img" src="{{asset('')}}images/upload22.png" class="" alt="" /> -->
                                    </div>
                                </div>
                                <div class="x_bar_icons pt-1 col-12">
                                        <div>
                                            <img src="{{asset('')}}images/icons/Comment-titter.svg" class="" alt="" />
                                            <span>0</span>
                                        </div>
                                        <div>
                                            <img src="{{asset('')}}images/icons/share-twitter.svg" class="" alt="" />
                                            <span>0</span>
                                        </div>
                                        <div>
                                            <img src="{{asset('')}}images/icons/heart-twitter.svg" class="" alt="" />
                                            <span>0k</span>
                                        </div>
                                        <div class="d-flex mt-1 gap-1">
                                            <img src="{{asset('')}}images/icons/graph.svg" class="" alt="" />
                                            <div style="color:#8a96a3; font-size:12px;">0</div>
                                        </div>
                                        <div>
                                            <img src="{{asset('')}}images/share2.png" class="ShareIcon" alt="" />

                                        </div>

                                    </div>
                            </div>
                            <!-- <div class="row mt-3">
                                <div class="col-12 twitter_second_row pt-2"></div>
                                <div class="col-3">
                                    <div class="indrive_icon2">
                                        <img src="{{asset('')}}images/x_img.jpg" class="" alt="" />
                                    </div>
                                </div>
                                <div class="col-9 colum_nine">
                                    <div class="twitter_header">
                                        <div>
                                            <span class="twitter_post_content">Elon Musk</span> <img
                                                src="{{asset('')}}images/offical2.png" class="" alt="" />
                                            <span class="twitter_post_content_tag ">@elonmusk</span>
                                        </div>
                                        <div class="elps">
                                            <i class="fa-solid fa-ellipsis-vertical mt-2 "></i>
                                             <i class="fa-light fa-ellipsis-vertical"></i>
                                        </div>

                                    </div>
                                    <div style="height:54px;">
                                        <img src="{{asset('')}}images/fa.png" class="" alt="" style="width:100%;" />
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- moble_twitter_post3 end-->
                        @endif

                        <!-- moble_linkdin_post start-->
                        @if(in_array(('Linkedin'),auth()->user()->account->platforms))

                        <div class="preview_linkedin  d-none  add_preview  prv_linkedin preview_linkin">
                            <div class="linked_add d-flex justify-content-between">
                                <div class="d-flex gap-2">
                                    <div class="linked_logo">

                                        <img src=" {{auth()->user()->account->link_image}}" alt="" class="">

                                    </div>
                                    <div class="">
                                        <div class="linked_inaccount">
                                            <div class="linkdin_author">
                                                <span>
                                                    {{auth()->user()->account->link_page_name}}
                                                </span>
                                            </div>
                                            <div class="follwers">
                                                <span>
                                                    0 followers
                                                </span><br>
                                                <span class="">0d . <i class="fa-solid fa-earth-americas"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu_icon">
                                    <img src="{{asset('images/ellips.png')}}" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="linkedin_post mobprev_container">
                                        <span id="mypostresult_linkedin" class="mypostresult mob_prevcontent">Write your post...</span>
                                        <span id="mynameresult_linkedin" class="icon icon-privacy text-primary"></span>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="linkedin_post_image">
                                        <div class="prv_div_link Preview_ImagesSetup Preview_ImagesSetupLinkedin">
                                            <!-- <img src="" class="d-none preview_image_link" alt=""> -->
                                        </div>

                                        <div id="mediaContainervideo_link">
                                            <!-- <video class="d-none video_preview_link" controls>
                                                <source src="movie.mp4" type="video/*">
                                            </video> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="LikeIcons px-2 d-none">
                                        <div class="d-flex">
                                            <div class="InnerIcon">
                                                <img src="{{asset('images/icons/linkedin-laugh.svg')}}" alt=""
                                                    height="12">
                                                <img src="{{asset('images/icons/linkedin-thumb.svg')}}" alt=""
                                                    height="12" style="margin: 0 0 0 -7px;">
                                                <img src="{{asset('images/icons/linkedin-heart.svg')}}" alt=""
                                                    height="12">
                                            </div>
                                            <span style="color:#888d91; font-size:10px; padding-top:7px;">345</span>
                                        </div>
                                        <div class="linkdin_likes_comm">
                                            <span style="color:#888d91; font-size:10px; ">109comments.</span>
                                            <span style="color:#888d91; font-size:10px;">59 reports</span>
                                        </div>
                                        <div class="TotalCmnts">
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="ActionBtn_Linkedin">
                                        <ul class="LI_Like">
                                            <li>
                                                <button>
                                                    <img src="{{asset('images/icons/thum-linkedin.svg')}}" alt=""
                                                        height="18">
                                                    <span class="Innerxt">Like</span>
                                                </button>
                                            </li>
                                            <li>
                                                <button>
                                                    <img src="{{asset('images/icons/comment-linkedin.svg')}}" alt=""
                                                        height="18">
                                                    <span class="Innerxt">Comment</span>
                                                </button>
                                            </li>
                                            <li>
                                                <button>
                                                    <img src="{{asset('images/icons/share-linkedin.svg')}}" alt=""
                                                        height="18">
                                                    <span class="Innerxt">Repost</span>
                                                </button>
                                            </li>
                                            <li>
                                                <button>
                                                    <img src="{{asset('images/icons/send-linkedin.svg')}}" alt=""
                                                        height="18">
                                                    <span class="Innerxt">Send</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="linkedin_icons d-flex px-1">
                                        <div class="btm_icon">
                                            <div style="text-align:center;">
                                                <img src="{{asset('images/home-02.png')}}" alt="">
                                            </div>
                                            <div> <span>Home</span></div>
                                        </div>
                                        <div class="btm_icon btm_icon_notification">
                                            <div style="text-align:center;">
                                                <img src="{{asset('images/profile-01.png')}}" alt="">
                                            </div>
                                            <div> <span>My Network</span></div>
                                            <div class="notification_circle d-none">
                                                <p style="padding-right:1px;">1</p>
                                            </div>
                                        </div>
                                        <div class="btm_icon">
                                            <div style="text-align:center;"><img
                                                    src="{{asset('images/postlinked.png')}}" alt=""></div>
                                            <div><span>Post</span></div>
                                        </div>
                                        <div class="btm_icon btm_icon_notification">
                                            <div style="text-align:center;"><img
                                                    src="{{asset('images/updatebellicon.png')}}" alt=""></div>
                                            <div> <span>Notifications</span></div>
                                            <div class="notification_circle d-none">
                                                <p>14</p>
                                            </div>
                                        </div>
                                        <div class="btm_icon">
                                            <div style="text-align:center;"> <img src="{{asset('images/jobs.png')}}"
                                                    alt=""></div>
                                            <div> <span>Jobs</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- moble_linkdin_post end-->
                        @endif

                    </div>

                </div>
                <div class="mybgcontainer">
                    <div>
                        <img src="{{asset('images/overlayimgwithbg.png')}}" alt="" class="overlayimg"
                            style="object-fit:contain;">
                    </div>
                    <div
                        class="AIgeneratedContent AIgeneratedContent_hiddenpart create_preview_post_index_itemRightInner  overlay">
                        <div class="sub_heading">
                            <div>
                                <h4>AI Generated Content</h4>
                            </div>
                            <div class="comming_soon">
                                <p class="mb-0" style="font-weight:600;">Coming Soon</p>
                            </div>

                        </div>


                        <div class="AIgeneratedContentInner AIgeneratedContentInner_card_shade">
                            <div class="AIgeneratedContentData">
                                <div>
                                    <label for="" class="add_cap_label add_cap_labal">Add Caption</label>
                                    <div class="add_caption">
                                        <a href="javascript:void(0)">
                                            <input type="text" placeholder="" readonly>
                                            <img src="{{asset('images/add.png')}}" class="img-fluid add_icon" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <label for="" class="add_cap_label add_cap_labal">Add Tags</label>
                                    <div class="add_caption">
                                        <!-- <select id="slect_drop" class="js-example-basic-single form-control" name="state"
                                        multiple>
                                        <option value="AL">Facebook +</option>
                                        ...
                                        <option value="WY">Instagram +</option>
                                    </select> -->
                                        <p id="slect_drop" class="js-example-basic-single form-control" name="state">
                                            Facebook + <br>
                                            Instagram +
                                        </p>
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
                                                <div><a href="javascript:void(0)"><i class="fa-solid fa-plus"></i></a>
                                                </div>
                                                <div><a href="javascript:void(0)"><i class="fa-solid fa-expand"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="opacity-cover">
                                        <img src="{{asset('images/carousel2.png')}}" alt="">
                                        <div class="opacity_sheet">
                                            <div class="opacity_sheet_icons">
                                                <div><a href="javascript:void(0)"><i class="fa-solid fa-plus"></i></a>
                                                </div>
                                                <div><a href="javascript:void(0)"><i class="fa-solid fa-expand"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="opacity-cover">
                                        <img src="{{asset('images/carousel1.png')}}" alt="">
                                        <div class="opacity_sheet">
                                            <div class="opacity_sheet_icons">
                                                <div><a href="javascript:void(0)"><i class="fa-solid fa-plus"></i></a>
                                                </div>
                                                <div><a href="javascript:void(0)"><i class="fa-solid fa-expand"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="opacity-cover">
                                        <img src="{{asset('images/carousel2.png')}}" alt="">
                                        <div class="opacity_sheet">
                                            <div class="opacity_sheet_icons">
                                                <div><a href="javascript:void(0)"><i class="fa-solid fa-plus"></i></a>
                                                </div>
                                                <div><a href="javascript:void(0)"><i class="fa-solid fa-expand"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="opacity-cover">
                                        <img src="{{asset('images/carousel1.png')}}" alt="">
                                        <div class="opacity_sheet">
                                            <div class="opacity_sheet_icons">
                                                <div><a href="javascript:void(0)"><i class="fa-solid fa-plus"></i></a>
                                                </div>
                                                <div><a href="javascript:void(0)"><i class="fa-solid fa-expand"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="opacity-cover">
                                        <img src="{{asset('images/carousel2.png')}}" alt="">
                                        <div class="opacity_sheet">
                                            <div class="opacity_sheet_icons">
                                                <div><a href="javascript:void(0)"><i class="fa-solid fa-plus"></i></a>
                                                </div>
                                                <div><a href="javascript:void(0)"><i class="fa-solid fa-expand"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="opacity-cover">
                                        <img src="{{asset('images/carousel1.png')}}" alt="">
                                        <div class="opacity_sheet">
                                            <div class="opacity_sheet_icons">
                                                <div><a href="javascript:void(0)"><i class="fa-solid fa-plus"></i></a>
                                                </div>
                                                <div><a href="javascript:void(0)"><i class="fa-solid fa-expand"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <div style="width:16px; cursor:pointer;">
                                        <img src="{{asset('images/dot3.png')}}" alt="" class="w-100">
                                    </div>
                                    <div style="width:16px; cursor:pointer;">
                                        <img src="{{asset('images/dot1.png')}}" alt="" class="w-100">
                                    </div>
                                    <div style="width:16px; cursor:pointer;">
                                        <img src="{{asset('images/dot3.png')}}" alt="" class="w-100">
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
            </div>
            {{-- Instagram card ------}}

            {{-- End Instagram card  --}}
        </div>
    </div>
</section>

<!-- =======Calender========= -->
<section class="position-relative">
    <div class=" container section5">
        <div class="calender calendar_overflo container col-lg-12" style="width: 0; position: absolute;z-index: 2; display:none;" id="mySidebar">
            <div class="CloseSidebar_Btn" style="">
                <span class="close-btn" onclick="closeSidebar()">&times;</span>
                <span class="BackBtnCS d-none">
                    <img src="{{ asset('images/back.png') }}" alt="" width="20">
                </span>
            </div>
            <span class="croissant-icon"></span>
            <div class="l1">
                <div class="navigation">
                <h1 class="date-day mt-5 mb-4">
                        {{\Carbon\Carbon::now()->format('l')}}
                    </h1>


                </div>
            </div>
            <div class="calendarmain">



            </div>
            <div class="Today-post-detail" style="margin-top:30px;" id="inner_div">

            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 calendar2">
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
    </div>
    </div>
    </div>
    </div>
</section>
<section style="background-color:#e4e2e2;">
    <div>
        <div class="container">
            <div class="row pb-5">
                <div class="col-12">
                    <div class="dropdown dropdown1 ">
                        <button style="background-color:#6CB0FF; border:none;" class="btn btn-primary dropdown-toggle"
                            type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Last 7 days <img src="{{asset('images/vector.png')}}" class="img-fluid" alt="" />

                        </button>
                        <ul class="dropdown-menu d-none" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-6 ">
                    <div class="card-main ">
                        <div class="card custom_card mt-3 mybgcontainer2" id="like-card">
                            <img src="{{asset('images/overlayimg.jpg')}}" alt="" class="overlayimg2"
                                style="object-fit: contain;">
                            <div class="card-body overlay">
                                <div class="likes_card">
                                    <h3 class="card-title">Likes</h3>
                                    <p class="" style="font-weight:600;">Coming Soon</p>
                                </div>

                                <div class="card-content">
                                    <div class="widget-chart text-center">
                                        <div id="morris-donut-example" dir="ltr" style="height: 245px;"
                                            class="morris-chart">
                                            <div class="width:238px;">
                                                <svg height="245" version="1.1" width="100%"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" class="svg_sequence"
                                                    style="overflow: hidden; position: relative; top: -0.375px;">
                                                    <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                        Created
                                                        with Raphaël 2.3.0
                                                    </desc>
                                                    <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                                                    <path fill="none" stroke=""
                                                        d="M126.5,197.5A75,75,0,0,0,197.53058844420985,146.57603591269296"
                                                        stroke-width="0" opacity="0"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;">
                                                    </path>
                                                    <path fill="#FF9966" stroke="#000000"
                                                        d="M126.5,200.5A78,78,0,0,0,200.37181198197825,147.53907734920068L228.31051010336745,157.00898480819325A107.5,107.5,0,0,1,126.5,230Z"
                                                        stroke-opacity="0" stroke-width="2"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                                    <path fill="none" stroke="#000"
                                                        d="M197.53058844420985,146.57603591269296A75,75,0,0,0,59.2429080941063,89.31139369659871"
                                                        stroke-width="2" opacity="1"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;">
                                                    </path>
                                                    <path fill="#000000" stroke="#000000"
                                                        d="M200.37181198197825,147.53907734920068A78,78,0,0,0,56.55262441787056,87.98384944446265L25.61436214115946,72.71709054489806A112.5,112.5,0,0,1,233.04588266631478,158.61405386903942Z"
                                                        stroke-opacity="0" stroke-width="2"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                                    <path fill="none" stroke="#288eff"
                                                        d="M59.2429080941063,89.31139369659871A75,75,0,0,0,126.4764380554856,197.4999962988984"
                                                        stroke-width="2" opacity="0"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;">
                                                    </path>
                                                    <path fill="#288eff" stroke="#000000"
                                                        d="M56.55262441787056,87.98384944446265A78,78,0,0,0,126.47549557770502,200.49999615085432L126.46622787952936,229.99999469508768A107.5,107.5,0,0,1,30.09816826821904,74.92966429845814Z"
                                                        stroke-opacity="0" stroke-width="2"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                                    <text x="126.5" y="112.5" text-anchor="middle" stroke="none"
                                                        fill="#000000"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle;"
                                                        transform="matrix(1.3504,0,0,1.3504,-44.3364,-42.5702)"
                                                        stroke-width="0.7405364990234375">
                                                        <tspan dy="5"
                                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"
                                                            class="total_likes">Total Likes
                                                        </tspan>
                                                    </text>
                                                    <text x="126.5" y="132.5" text-anchor="middle" stroke="none"
                                                        fill="#000000"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle;"
                                                        transform="matrix(1.4706,0,0,1.4706,-59.5294,-58.3529)"
                                                        stroke-width="0.6799999999999999">
                                                        <tspan dy="4.5"
                                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"
                                                            class="total_likes_value">26.20k
                                                        </tspan>
                                                    </text>
                                                </svg>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-4 social_cards">
                                            <div>
                                                <div class="oval-img-div d-flex ">
                                                    <div class="cirle-img fb-image">
                                                        <!-- <img src="/Oval (1).png" class="fb-img" alt=""> -->
                                                        <img src="{{asset('')}}images/Oval (1).png" class=" x-com-img"
                                                            alt="" />
                                                    </div>
                                                    <h5 class="fb-text">Facebook</h5>
                                                </div>
                                                <div class="like-counter">
                                                    <h4 class="text-center fb_card_v">1.12k</h4>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-4 social_cards">
                                            <div>
                                                <div class=" oval-img-div d-flex ">
                                                    <div class="cirle-img fb-image ">
                                                        <!-- <img src="/Oval (2).png" class="fb-img" alt=""> -->
                                                        <img src="{{asset('')}}images/Oval (2).png" class=" x-com-img"
                                                            alt="" />
                                                    </div>
                                                    <h5 class="fb-text">Instagram</h5>
                                                </div>
                                                <div class="like-counter">
                                                    <h4 class="text-center fb_card_v ">11.89k</h4>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-4 social_cards">
                                            <div>
                                                <div class="oval-img-div d-flex ">
                                                    <div class="cirle-img x-com">
                                                        <!-- <img src="/Oval (3).png" class="x-com-img" alt=""> -->
                                                        <img src="{{asset('')}}images/Oval (3).png" class="x-com-img"
                                                            alt="" />
                                                    </div>
                                                    <h5 class="fb-text">x.com</h5>
                                                </div>
                                                <div class="like-counter">
                                                    <h4 class="text-center fb_card_v fouteen_k_custom">14k</h4>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption-main d-flex align-center justify-space-between">
                                        <div class="d-flex gap-2 captions">

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault" disabled>
                                            </div>
                                            <div>
                                                <!-- <img src="/caption-image1.png" alt=""> -->
                                                <img src="{{asset('')}}images/circle2.png" class="img-fluid" alt="" />
                                            </div>
                                            <p class="caption-text mt-3">This is the caption </p>
                                        </div>
                                        <div class="likesAndShare d-flex align-center justify-content-end ">
                                            <div class="d-flex align-center justify-content-end ">
                                                <div class="only-like me-1">
                                                    <a href="javascript:void(0)"><i
                                                            class="fa-solid fa-thumbs-up"></i></a>
                                                    <p class="like-para">likes</p>
                                                </div>
                                                <div class="only-share ms-1">
                                                    <a href="javascript:void(0)"><i
                                                            class="fa-solid fa-share-nodes"></i></a>
                                                    <p class="like-para">share</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption-main d-flex align-center justify-space-between mt-2">
                                        <div class="d-flex gap-2 captions">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault" disabled>
                                            </div>
                                            <div>
                                                <img src="{{asset('')}}images/circle1.png" class="img-fluid" alt="" />
                                            </div>
                                            <p class="caption-text mt-3">This is the caption </p>
                                        </div>
                                        <div class="likesAndShare d-flex align-center justify-content-end ">
                                            <div class="d-flex align-center justify-content-end ">
                                                <div class="only-like me-1">
                                                    <a href="javascript:void(0)"><i
                                                            class="fa-solid fa-thumbs-up"></i></a>
                                                    <p class="like-para">likes</p>
                                                </div>
                                                <div class="only-share ms-1">
                                                    <a href="javascript:void(0)"><i
                                                            class="fa-solid fa-share-nodes"></i></a>
                                                    <p class="like-para">share</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 col-md-6 ">
                    <div class="card-main">
                        <div class="card custom_card mt-3 mybgcontainer2" id="like-card">
                            <img src="{{asset('images/overlayimg.jpg')}}" alt="" class="overlayimg2"
                                style="object-fit: contain;">
                            <div class="card-body overlay">
                                <div class="likes_card">
                                    <h3 class="card-title">Share</h3>
                                    <p class="" style="font-weight:600;">Coming Soon</p>
                                </div>

                                <div class="card-content">
                                    <div class="widget-chart text-center">
                                        <div id="morris-donut-example" dir="ltr" style="height: 245px;"
                                            class="morris-chart">
                                            <div class="width:238px;">
                                                <svg height="245" version="1.1" width="100%"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" class="svg_sequence"
                                                    style="overflow: hidden; position: relative; top: -0.375px;">
                                                    <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                        Created
                                                        with Raphaël 2.3.0
                                                    </desc>
                                                    <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                                                    <path fill="none" stroke=""
                                                        d="M126.5,197.5A75,75,0,0,0,197.53058844420985,146.57603591269296"
                                                        stroke-width="0" opacity="0"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;">
                                                    </path>
                                                    <path fill="#FF9966" stroke="#000000"
                                                        d="M126.5,200.5A78,78,0,0,0,200.37181198197825,147.53907734920068L228.31051010336745,157.00898480819325A107.5,107.5,0,0,1,126.5,230Z"
                                                        stroke-opacity="0" stroke-width="2"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                                    <path fill="none" stroke="#000"
                                                        d="M197.53058844420985,146.57603591269296A75,75,0,0,0,59.2429080941063,89.31139369659871"
                                                        stroke-width="2" opacity="1"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;">
                                                    </path>
                                                    <path fill="#000000" stroke="#000000"
                                                        d="M200.37181198197825,147.53907734920068A78,78,0,0,0,56.55262441787056,87.98384944446265L25.61436214115946,72.71709054489806A112.5,112.5,0,0,1,233.04588266631478,158.61405386903942Z"
                                                        stroke-opacity="0" stroke-width="2"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                                    <path fill="none" stroke="#288eff"
                                                        d="M59.2429080941063,89.31139369659871A75,75,0,0,0,126.4764380554856,197.4999962988984"
                                                        stroke-width="2" opacity="0"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;">
                                                    </path>
                                                    <path fill="#288eff" stroke="#000000"
                                                        d="M56.55262441787056,87.98384944446265A78,78,0,0,0,126.47549557770502,200.49999615085432L126.46622787952936,229.99999469508768A107.5,107.5,0,0,1,30.09816826821904,74.92966429845814Z"
                                                        stroke-opacity="0" stroke-width="2"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                                    <text x="126.5" y="112.5" text-anchor="middle" stroke="none"
                                                        fill="#000000"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle;"
                                                        transform="matrix(1.3504,0,0,1.3504,-44.3364,-42.5702)"
                                                        stroke-width="0.7405364990234375">
                                                        <tspan dy="5"
                                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"
                                                            class="total_likes">Total Share
                                                        </tspan>
                                                    </text>
                                                    <text x="126.5" y="132.5" text-anchor="middle" stroke="none"
                                                        fill="#000000"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle;"
                                                        transform="matrix(1.4706,0,0,1.4706,-59.5294,-58.3529)"
                                                        stroke-width="0.6799999999999999">
                                                        <tspan dy="4.5"
                                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"
                                                            class="total_likes_value">26.20k
                                                        </tspan>
                                                    </text>
                                                </svg>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-4 social_cards">
                                            <div>
                                                <div class="oval-img-div d-flex ">
                                                    <div class="cirle-img fb-image">
                                                        <!-- <img src="/Oval (1).png" class="fb-img" alt=""> -->
                                                        <img src="{{asset('')}}images/Oval (1).png" class=" x-com-img"
                                                            alt="" />
                                                    </div>
                                                    <h5 class="fb-text">Facebook</h5>
                                                </div>
                                                <div class="like-counter">
                                                    <h4 class="text-center fb_card_v">1.12k</h4>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-4 social_cards">
                                            <div>
                                                <div class=" oval-img-div d-flex ">
                                                    <div class="cirle-img fb-image ">
                                                        <!-- <img src="/Oval (2).png" class="fb-img" alt=""> -->
                                                        <img src="{{asset('')}}images/Oval (2).png" class=" x-com-img"
                                                            alt="" />
                                                    </div>
                                                    <h5 class="fb-text">Instagram</h5>
                                                </div>
                                                <div class="like-counter">
                                                    <h4 class="text-center fb_card_v ">11.89k</h4>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-4 social_cards">
                                            <div>
                                                <div class="oval-img-div d-flex ">
                                                    <div class="cirle-img x-com">
                                                        <!-- <img src="/Oval (3).png" class="x-com-img" alt=""> -->
                                                        <img src="{{asset('')}}images/Oval (3).png" class="x-com-img"
                                                            alt="" />
                                                    </div>
                                                    <h5 class="fb-text">x.com</h5>
                                                </div>
                                                <div class="like-counter">
                                                    <h4 class="text-center fb_card_v fouteen_k_custom">14k</h4>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption-main d-flex align-center justify-space-between">
                                        <div class="d-flex gap-2 captions">

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault" disabled>
                                            </div>
                                            <div>
                                                <!-- <img src="/caption-image1.png" alt=""> -->
                                                <img src="{{asset('')}}images/circle2.png" class="img-fluid" alt="" />
                                            </div>
                                            <p class="caption-text mt-3">This is the caption </p>
                                        </div>
                                        <div class="likesAndShare d-flex align-center justify-content-end ">
                                            <div class="d-flex align-center justify-content-end ">
                                                <div class="only-like me-1">
                                                    <a href="javascript:void(0)"><i
                                                            class="fa-solid fa-thumbs-up"></i></a>
                                                    <p class="like-para">likes</p>
                                                </div>
                                                <div class="only-share ms-1">
                                                    <a href="javascript:void(0)"><i
                                                            class="fa-solid fa-share-nodes"></i></a>
                                                    <p class="like-para">share</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption-main d-flex align-center justify-space-between mt-2">
                                        <div class="d-flex gap-2 captions">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault" disabled>
                                            </div>
                                            <div>
                                                <img src="{{asset('')}}images/circle1.png" class="img-fluid" alt="" />
                                            </div>
                                            <p class="caption-text mt-3">This is the caption </p>
                                        </div>
                                        <div class="likesAndShare d-flex align-center justify-content-end ">
                                            <div class="d-flex align-center justify-content-end ">
                                                <div class="only-like me-1">
                                                    <a href="javascript:void(0)"><i
                                                            class="fa-solid fa-thumbs-up"></i></a>
                                                    <p class="like-para">likes</p>
                                                </div>
                                                <div class="only-share ms-1">
                                                    <a href="javascript:void(0)"><i
                                                            class="fa-solid fa-share-nodes"></i></a>
                                                    <p class="like-para">share</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-6 ">
                    <div class="card-main">
                        <div class="card custom_card mt-3 mybgcontainer2" id="like-card">
                            <img src="{{asset('images/overlayimg.jpg')}}" alt="" class="overlayimg2"
                                style="object-fit: contain;">
                            <div class="card-body overlay">
                                <!-- <h3 class="card-title">Engagement</h3> -->
                                <div class="likes_card">
                                    <h3 class="card-title">Engagement</h3>
                                    <p class="" style="font-weight:600;">Coming Soon</p>
                                </div>
                                <div class="card-content">
                                    <div class="widget-chart text-center">
                                        <div id="morris-donut-example" dir="ltr" style="height: 245px;"
                                            class="morris-chart">
                                            <div class="width:238px;">
                                                <svg height="245" version="1.1" width="100%"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" class="svg_sequence"
                                                    style="overflow: hidden; position: relative; top: -0.375px;">
                                                    <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                        Created
                                                        with Raphaël 2.3.0
                                                    </desc>
                                                    <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                                                    <path fill="none" stroke=""
                                                        d="M126.5,197.5A75,75,0,0,0,197.53058844420985,146.57603591269296"
                                                        stroke-width="0" opacity="0"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;">
                                                    </path>
                                                    <path fill="#FF9966" stroke="#000000"
                                                        d="M126.5,200.5A78,78,0,0,0,200.37181198197825,147.53907734920068L228.31051010336745,157.00898480819325A107.5,107.5,0,0,1,126.5,230Z"
                                                        stroke-opacity="0" stroke-width="2"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                                    <path fill="none" stroke="#000"
                                                        d="M197.53058844420985,146.57603591269296A75,75,0,0,0,59.2429080941063,89.31139369659871"
                                                        stroke-width="2" opacity="1"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;">
                                                    </path>
                                                    <path fill="#000000" stroke="#000000"
                                                        d="M200.37181198197825,147.53907734920068A78,78,0,0,0,56.55262441787056,87.98384944446265L25.61436214115946,72.71709054489806A112.5,112.5,0,0,1,233.04588266631478,158.61405386903942Z"
                                                        stroke-opacity="0" stroke-width="2"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                                    <path fill="none" stroke="#288eff"
                                                        d="M59.2429080941063,89.31139369659871A75,75,0,0,0,126.4764380554856,197.4999962988984"
                                                        stroke-width="2" opacity="0"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;">
                                                    </path>
                                                    <path fill="#288eff" stroke="#000000"
                                                        d="M56.55262441787056,87.98384944446265A78,78,0,0,0,126.47549557770502,200.49999615085432L126.46622787952936,229.99999469508768A107.5,107.5,0,0,1,30.09816826821904,74.92966429845814Z"
                                                        stroke-opacity="0" stroke-width="2"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                                    <text x="126.5" y="112.5" text-anchor="middle" stroke="none"
                                                        fill="#000000"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle;"
                                                        transform="matrix(1.3504,0,0,1.3504,-44.3364,-42.5702)"
                                                        stroke-width="0.7405364990234375">
                                                        <tspan dy="5"
                                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"
                                                            class="total_likes">Total Likes
                                                        </tspan>
                                                    </text>
                                                    <text x="126.5" y="132.5" text-anchor="middle" stroke="none"
                                                        fill="#000000"
                                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle;"
                                                        transform="matrix(1.4706,0,0,1.4706,-59.5294,-58.3529)"
                                                        stroke-width="0.6799999999999999">
                                                        <tspan dy="4.5"
                                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"
                                                            class="total_likes_value">26.20k
                                                        </tspan>
                                                    </text>
                                                </svg>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-4 social_cards">
                                            <div>
                                                <div class="oval-img-div d-flex ">
                                                    <div class="cirle-img fb-image">
                                                        <!-- <img src="/Oval (1).png" class="fb-img" alt=""> -->
                                                        <img src="{{asset('')}}images/Oval (1).png" class=" x-com-img"
                                                            alt="" />
                                                    </div>
                                                    <h5 class="fb-text">Facebook</h5>
                                                </div>
                                                <div class="like-counter">
                                                    <h4 class="text-center fb_card_v">1.12k</h4>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-4 social_cards">
                                            <div>
                                                <div class=" oval-img-div d-flex ">
                                                    <div class="cirle-img fb-image ">
                                                        <!-- <img src="/Oval (2).png" class="fb-img" alt=""> -->
                                                        <img src="{{asset('')}}images/Oval (2).png" class=" x-com-img"
                                                            alt="" />
                                                    </div>
                                                    <h5 class="fb-text">Instagram</h5>
                                                </div>
                                                <div class="like-counter">
                                                    <h4 class="text-center fb_card_v ">11.89k</h4>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-4 social_cards">
                                            <div>
                                                <div class="oval-img-div d-flex ">
                                                    <div class="cirle-img x-com">
                                                        <!-- <img src="/Oval (3).png" class="x-com-img" alt=""> -->
                                                        <img src="{{asset('')}}images/Oval (3).png" class="x-com-img"
                                                            alt="" />
                                                    </div>
                                                    <h5 class="fb-text">x.com</h5>
                                                </div>
                                                <div class="like-counter">
                                                    <h4 class="text-center fb_card_v fouteen_k_custom">14k</h4>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption-main d-flex align-center justify-space-between">
                                        <div class="d-flex gap-2 captions">

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault" disabled>
                                            </div>
                                            <div>
                                                <!-- <img src="/caption-image1.png" alt=""> -->
                                                <img src="{{asset('')}}images/circle2.png" class="img-fluid" alt="" />
                                            </div>
                                            <p class="caption-text mt-3">This is the caption </p>
                                        </div>
                                        <div class="likesAndShare d-flex align-center justify-content-end ">
                                            <div class="d-flex align-center justify-content-end ">
                                                <div class="only-like me-1">
                                                    <a href="javascript:void(0)"><i
                                                            class="fa-solid fa-thumbs-up"></i></a>
                                                    <p class="like-para">likes</p>
                                                </div>
                                                <div class="only-share ms-1">
                                                    <a href="javascript:void(0)"><i
                                                            class="fa-solid fa-share-nodes"></i></a>
                                                    <p class="like-para">share</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption-main d-flex align-center justify-space-between mt-2">
                                        <div class="d-flex gap-2 captions">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault" disabled>
                                            </div>
                                            <div>
                                                <img src="{{asset('')}}images/circle1.png" class="img-fluid" alt="" />
                                            </div>
                                            <p class="caption-text mt-3">This is the caption </p>
                                        </div>
                                        <div class="likesAndShare d-flex align-center justify-content-end ">
                                            <div class="d-flex align-center justify-content-end ">
                                                <div class="only-like me-1">
                                                    <a href="javascript:void(0)"><i
                                                            class="fa-solid fa-thumbs-up"></i></a>
                                                    <p class="like-para">likes</p>
                                                </div>
                                                <div class="only-share ms-1">
                                                    <a href="javascript:void(0)"><i
                                                            class="fa-solid fa-share-nodes"></i></a>
                                                    <p class="like-para">share</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- modal test1 start -->

<div class="modal fade" id="postSuccessModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content success_modal_content">
            <div class="modal-header success_modal_header ">
                <!-- <h5 class="modal-title" id="exampleModalLabel">New message</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-0 mb">
                <div class="woohoo mt-5">
                    <h2>Woohoo!</h2>
                    <div class="success_social_icons">
                        @if (isset($platforms))

                        @if (in_array('Facebook', $platforms))
                        <div class="success_fb"><a href=""><img src="{{asset('')}}images/FB_Color.png" class="img-fluid"
                                    alt="" /></a>
                        </div>
                        @endif
                        @if (in_array('Instagram', $platforms))
                        <div class="success_fb"><a href=""><img src="{{asset('')}}images/Instagram_Color.png"
                                    class="img-fluid" alt="" /></a>
                        </div>

                        @endif
                        @if (in_array('Twitter',$platforms))
                        <div class="success_fb"><a href=""><img src="{{asset('')}}images/Twitter_Color.png"
                                    class="img-fluid" alt="" /></a>
                        </div>
                        @endif
                        @if (in_array('Linkedin', $platforms))
                        <div class="success_fb"><a href=""><img src="{{asset('')}}images/Linkedin_Color.png"
                                    class="img-fluid" alt="" /></a>
                        </div>
                        @endif
                        @endif
                    </div>
                    <div class="success_modal_para mt-3">

                        <p class="mb-0">You just @if (!session()->has('IsScheduled')) published @else scheduled @endif
                            your
                            @if (!session()->has('check_first_post')) first @endif
                            post! Keep @if (!session()->has('IsScheduled')) posting @else scheduling @endif and let the
                            world know what you’ve got to say.</p>
                    </div>
                    @php
                    session()->forget('check_first_post');
                    session()->forget('IsScheduled');

                    @endphp
                </div>

            </div>
            <div class="modal-footer success_modal_footer pb-5">
                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-danger">GO BACK
                </button>
            </div>
        </div>
    </div>
</div>

<!-- modal test1 end -->

<!-- modal for germ -->

<div class="modal fade" id="BugModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header success_modal_header ">
                <h3 class="modal-title" id="exampleModalLabel">Give Feedback</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-0 mb">
                <div class="woohoo">
                <form action="{{ route('report-bug') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('Post')
                        <!-- Email form fields go here -->
                        <div class="d-none">
                            <label for="recipient">Name:</label>
                            <input type="text" id="name" class="form-control" name="name">
                        </div>
                        <div class="mt-2">
                            <label for="subject">Subject:</label>
                            <input type="text" id="subject" class="form-control" name="subject">
                        </div>
                        <div class="mt-2">
                            <label for="message">Message:</label>
                            <textarea id="message" class="form-control" name="message"></textarea>
                        </div>
                        <div class="mt-2">
                            <input name="image" type="file" class="dropify" data-height="100" accept="image/*" />
                        </div>
                        {{-- <input type="file" name="image" accept="image/*"> --}}
                        <div class="my-4 text-center">
                            <button type="submit" class="btn btn-primary">Send Feedback</button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- <div class="modal-footer success_modal_footer pb-5">
                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-danger">GO BACK</button>
            </div> --}}
        </div>
    </div>
</div>

<!-- modal for germ end -->


</div>
@endsection

@section('js')
<!-- sidebar close btn -->
<!--  -->
<script>
    $('.dropify').dropify();
</script>
<script>
var abc = 0;

$('.mybgcontainer2').click(function() {
    $('.overlay', this).css('opacity', 1);
    $('.overlayimg2', this).css('opacity', 0);
});
$('.mybgcontainer').click(function() {
    $('.overlay', this).css('opacity', 1);
    $('.overlayimg', this).css('opacity', 0);

});
</script>



<!--  -->
<script>
function closeSidebar() {
    document.getElementById("mySidebar").style.display = "none";
    $('.calendar2').css('padding-left', '0px');
    $('.calender.calendar_overflo').addClass('with-transition');
    // $(".fb-post").css('display', 'block');
    $(".Today-post-detail").hide();


}





$(document).on('click', '.BackBtnCS', function(){
            $('.Today-post-detail').css('display', 'none');
            $('.calendarmain .fb-post').css('display', 'block');
            $('.BackBtnCS').addClass('d-none');
        });


    $(document).ready(function() {
        var isDetailVisible = false; // Initialize a flag to track visibility
        // Add a click event handler to the todayEbents-list div
        $(document).on('click', '.fc-content', function() {
            $(".Today-post-detail").css('display', 'none');

            $(".sidebar_preview").css('display', 'none');
            $(".Today-post-detail").css('display', 'none');
        });
        $(document).on('click', '.fb-post', function() {

            var id = $(this).data('id');
            var platform = $(this).data('plateform');

            $.ajax({
                type: "get"
                , url: "{{ url('get_single_detail') }}"
                , data: {
                    'id': id
                }
                , success: function(response) {

                    if (!isDetailVisible) {
                        // If the detail is not visible, show it and set the flag
                        // var contentToAppend = $(".the_preview").html();
                        $(".Today-post-detail").html('');
                        $(".Today-post-detail").append(response);
                        $(".Today-post-detail").show();

                        if (platform == 'Facebook') {
                            $(".FacebookWrap").removeAttr('style');
                        } else if (platform == 'Instagram') {
                            $(".InstagramWrap").removeAttr('style');
                        }else if (platform == 'Linkedin') {
                            $(".LinkedinWrap").removeAttr('style');
                        }else if (platform == 'Twitter') {
                            $(".TwitterWrap").removeAttr('style');
                        }
                        $(".fb-post").css('display', 'none');
                    } else {
                        // If the detail is visible, hide it and reset the flag
                        $(".Today-post-detail").hide();
                        $(".fb-post").css('display', 'block');
                    }
                }
            });




    });




});
</script>
<!-- sidebar close btn -->
<script>
    $(document).ready(function(){
            // Bind the input event on the div
            $("#myDiv").on("input", function(){
                // Get the current content of the div
                var divContent = $(this).text();

                // Update the value of the textarea with the div content
                // new code
                // end new code
                $("#facebook_content").val(divContent);
                $("#facebook_content").trigger("keyup");


            });




        $('.div_text').each(function() {
        const textarea = $(this);

        const dropdown = textarea.parent().find('.dropdown-content-search');
        let currentSearchString = '';
        var delayTimer;
        textarea.on('input', function() {
            const textAreaid=   $(this).attr('id');
            const text = textarea.text();
            const atIndex = text.lastIndexOf('@');
            counter = true;
            clearTimeout(delayTimer);


            if (atIndex !== -1) {

                const searchString = text.slice(atIndex + 1);
                currentSearchString = searchString;
                if (searchString.includes(' ')) {
                counter = false;
                dropdown.css('display', 'none');
                return;
            }
                            delayTimer = setTimeout(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                url: 'get-suggestion', // Replace with the actual URL
                method: 'POST',
                data: { searchQuery: searchString,textAreaid:textAreaid },
                success: function(response) {


                    const suggestionsObject = response.suggestions;

                    if (suggestionsObject && Object.keys(suggestionsObject).length > 0) {
                        const dropdownHTML = Object.entries(suggestionsObject).map(([id, name]) =>
                            `<div class="suggestion" data-id="${id}" data-type = "${textAreaid}">${name}</div>`).join('');
                        dropdown.html(dropdownHTML);
                        dropdown.css({
                            'display': 'block',
                        });
                    } else {
                        dropdown.css('display', 'none');
                    }

                },
                error: function(error) {
                    console.error(error);
                }
            });
        }, 500);
            } else {
                dropdown.css('display', 'none');
            }
        });

        // Rest of your code...
    });



    $('.mention').each(function() {
        const textarea = $(this);

        const dropdown = textarea.parent().find('.dropdown-content-search');
        let currentSearchString = '';
        var delayTimer;
        textarea.on('input', function() {
            const textAreaid=   $(this).attr('id');
            const text = textarea.val();
            const atIndex = text.lastIndexOf('@');

            clearTimeout(delayTimer);


            if (atIndex !== -1) {

                const searchString = text.slice(atIndex + 1);
                currentSearchString = searchString;
                delayTimer = setTimeout(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                url: 'get-suggestion', // Replace with the actual URL
                method: 'POST',
                data: { searchQuery: searchString,textAreaid:textAreaid },
                success: function(response) {


                    const suggestionsObject = response.suggestions;

                    if (suggestionsObject && Object.keys(suggestionsObject).length > 0) {
                        const dropdownHTML = Object.entries(suggestionsObject).map(([id, name]) =>
                            `<div class="suggestion" data-id="${id}" data-type = "${textAreaid}">${name}</div>`).join('');
                        dropdown.html(dropdownHTML);
                        dropdown.css({
                            'display': 'block',
                        });
                    } else {
                        dropdown.css('display', 'none');
                    }

                },
                error: function(error) {
                    console.error(error);
                }
            });
        }, 500);
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
            'Friend1', 'Friend2', 'Friend3',
            // ...
        ];

        return mockSuggestions.filter(suggestion => suggestion.toLowerCase().includes(searchString
            .toLowerCase()));
    }


    // Handle dropdown suggestion click
    $('.dropdown-content-search').on('click', '.suggestion', function() {

        const suggestionText = $(this).text();
        const suggestionId = $(this).data('id'); // Assuming you have set data-id attribute
        const suggestionType = $(this).data('type'); // Assuming you have set data-id attribute

        const textarea = $(this).closest('.emoji_parent').find('.emojiarea');
        const textArea_id= textarea.attr('id');
        const currentText = textarea.val();
        const atIndex = currentText.lastIndexOf('@');
        const coloredSuggestionText = `<span style='color: blue;'>${suggestionText}</span>`;
        // new code
        const textarea_div = $(this).closest('.emoji_parent').find('.testing_it');
        const textArea_id_div= textarea_div.attr('id');
        const currentText_div = textarea_div.text();
        const atIndex_div = currentText_div.lastIndexOf('@');



        // new code end

        const newText = currentText.slice(0, atIndex) + coloredSuggestionText + ' ' + currentText.slice(
            atIndex + suggestionText.length + 1);
        textarea.val(newText);

        // const coloredSuggestionText = `<span style='color: blue;'>${suggestionText}</span>`;
        $('#' + textArea_id).trigger('keyup');
                    var currentValue = $('#' + textArea_id).val();
                    var updatedValue = currentValue.replace(/<span[^>]*>|<\/span>/g, '');
                    $('#' + textArea_id).val(updatedValue);




                            $(this).parent().css('display', 'none');
                            suggestionsMap[suggestionText] = {
                                id: suggestionId,
                                type: suggestionType
                            };
                           console.log(suggestionsMap);

                        //    new cocde
                const coloredSuggestionText_div = `<span class="suggestion suggestion_clr" >${suggestionText}</span>`;
                const newText_div = currentText.slice(0, atIndex_div) + coloredSuggestionText_div + ' ' + currentText_div.slice(
                    atIndex_div + suggestionText.length + 1);
                    textarea_div.html(newText_div);



                           var formattedText =  textarea_div.text();

                            for (var name in suggestionsMap) {
                                if (suggestionsMap.hasOwnProperty(name)) {
                                    var data = suggestionsMap[name];
                                    var id = data.id;
                                    var type = data.type;

                                    if (type === 'myDiv') {
                                        // Replace matched text and change text color to blue
                                        formattedText = formattedText.replace(new RegExp(name, 'g'), '<span class="suggestion_clr" contenteditable=false>' + name + '</span>');
                                    }
                                }
                            }
                            textarea_div.html(formattedText);

                        // new code ernd

                        });
});
</script>
<script>
$(document).ready(function() {


    if ($('.add_preview').length == 0) {


        $('.preview_post').hide();
    } else {
        $('.preview_post').show();
        $('.add_preview:first').addClass('show');
        $('.add_preview:first').removeClass('d-none');

    }


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

            var classAttribute = next.parents('.wizard-fieldset').next('fieldset').attr('class');
            var classNames = classAttribute.split(" ");


            if (nextFieldset.length > 0) {

                next.parents('.wizard-fieldset').removeClass("show", "400");
                currentActiveStep.removeClass('active').addClass('activatedold').next().addClass(
                    'active', "400");
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
                $(".preview_post").find(".add_preview").addClass("d-none");
                $(".preview_post").find($('.prv_' + classNames[1])).addClass("show");
                $(".preview_post").find($('.prv_' + classNames[1])).removeClass("d-none");
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

        var classAttribute = prev.parents('.wizard-fieldset').prev('.wizard-fieldset').attr('class');
        var classNames = classAttribute.split(" ");

        currentActiveStep.removeClass('active').prev().removeClass('activatedold').addClass('active',
            "400");
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

        $(".preview_post").find(".add_preview").addClass("d-none");
        $(".preview_post").find($('.prv_' + classNames[1])).addClass("show");
        $(".preview_post").find($('.prv_' + classNames[1])).removeClass("d-none");
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


        $(".preview_post").find(".add_preview").addClass("d-none");
        $(".preview_post").find($('.prv_' + section)).addClass("show");
        $(".preview_post").find($('.prv_' + section)).removeClass("d-none");
    })

});




$('.owl-carousel').owlCarousel({
    loop: true,
    autoplay: false,
    margin: 10,
    touchDrag: false,
    mouseDrag: false,
    nav: false,
    pages: true,
    dots: false,
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

</script>


<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->

<script>
let currentDate = new Date();

function displayCalendar() {
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();
    const day = currentDate.getDay();
    const today = new Date(year, month, currentDate.getDate());
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const firstDay = new Date(year, month, 1).getDay();
    const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    const monthNames = [
        "January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
        "November", "December"
    ];
    document.getElementById("month-year").textContent = monthNames[month] + " , " + year;
    // Add day names row
    let tableHtml = `
        <table class="table">
            <tr>
            <th style="opacity:0.5;" class="myro">Sun</th>
            <th style="opacity:0.5;" class="myro">Mon</th>
            <th style="opacity:0.5;" class="myro">Tue</th>
            <th style="opacity:0.5;" class="myro">Wed</th>
            <th style="opacity:0.5;" class="myro">Thu</th>
            <th style="opacity:0.5;" class="myro">Fri</th>
            <th style="opacity:0.5;" class="myro">Sat</th>
            </tr>
        `;
    let prevMonth = new Date(year, month, 0).getDate();
    let dayNum = 1 - firstDay;
    for (let i = 0; i < 6; i++) {
        tableHtml += '<tr>';
        for (let j = 0; j < 7; j++) {
            if (dayNum <= 0) {
                tableHtml += `<td class="other-month" style="opacity:0.5;">${prevMonth + dayNum}</td>`;
            } else if (dayNum <= daysInMonth) {
                const isCurrentDay = (dayNum === today.getDate());
                const dayClass = isCurrentDay ? "current-day current-date" : "current-day";
                const formattedDate =
                    `${String(month + 1).padStart(2, '0')}/${String(dayNum).padStart(2, '0')}/${year}`;

                tableHtml +=
                    `<td class="${dayClass}" data-date="${formattedDate}">${String(dayNum).padStart(2, '0')}</td>`;
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
    //document.getElementById('current-day').textContent = ` ${daysOfWeek[day]}`;
}

$(document).on('click', '.current-day', function() {
    $('.current-day').removeClass('current-date');
    $(this).addClass('current-date');
    getEvents();

});

function getEvents() {
    var dateSelect = $('.current-day.current-date').data('date');

    const dateString = dateSelect;
    // Split the date string into day, month, and year components
    const [month, day, year] = dateString.split('/').map(Number);
    // Create a JavaScript Date object
    const date = new Date(year, month - 1, day); // Note: month is zero-based (0 for January)
    // Get the weekday index (0 for Sunday, 1 for Monday, and so on)
    const weekdayIndex = date.getDay();
    // Define an array of weekday names
    const weekdayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    // Get the weekday name based on the weekday index
    const weekdayName = weekdayNames[weekdayIndex];

    $('.date-date').text(dateSelect);
    $('.date-day').text(weekdayName);

    $.ajax({
        type: "get",
        url: "{{ url('get-events') }}",
        data: {
            'date': dateSelect
        },
        success: function(response) {

            $('.todayEbents-list').empty().append(response);
        }
    });

}


setInterval(getEvents, 10000);

function prevMonth() {
    currentDate.setMonth(currentDate.getMonth() - 1);
    displayCalendar();
    getEvents();
}

function nextMonth() {
    currentDate.setMonth(currentDate.getMonth() + 1);
    displayCalendar();
    getEvents();
}

// Call the displayCalendar function when the page loads
window.onload = function() {
    displayCalendar();

};
</script>



<script>
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


// Initial calendar generation
//generateCalendar();


function updateCalendar() {
    $.ajax({
        url: '/get-updated-posts',
        method: 'GET',
        success: function (data) {
            // Update the FullCalendar events based on the fetched data
            // For example, update the event source
            $('#postManagerCalendar').fullCalendar('removeEvents');
            $('#postManagerCalendar').fullCalendar('addEventSource', data);

            console.log('Calendar updated successfully.');
        },
        error: function (error) {
            console.error('Error updating calendar:', error);
        }
    });
}
        //    setInterval(updateCalendar, 60000); // 60 seconds

           setInterval(() => {
                updateCalendar();
                checkSidebarAndPerformAction();
            }, 60000);


            // Function to check if the sidebar is open
            function isSidebarOpen() {
                return $('#mySidebar').css('display') === 'block';
            }

            function isDivHidden() {

                return $('#inner_div').css('display') === 'none';

            }
            // Function to perform an action based on the sidebar state
            function checkSidebarAndPerformAction() {
                if (isSidebarOpen() && isDivHidden()) {
                    // Sidebar is open, perform your action (e.g., call AJAX)

                    var a_id = $('#ac_id').val();
                    var date = $('#date').val();


                    $.ajax({
                        url: "{{ url('get_event_detail') }}",
                        type: 'GET',

                        data: {
                            'id': a_id,
                            'date': date
                        },
                        success: function(data) {
                            // Handle the success response
                            $('.calendarmain').empty().append(data);
                            console.error('AJAX call success:');

                        },
                        error: function(xhr, status, error) {
                            // Handle the error response
                            console.error('AJAX call error:', error);
                        }
                    });
                } else {
                    console.log(isDivHidden);

                    // Sidebar is not open, perform other actions or skip
                    console.log('Sidebar is not open');
                }
            }



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
<script>
function populateOptions(selectId, start, end, step) {

    const select = document.getElementById(selectId);

    while (select.options.length > 0) {
    select.remove(0);
}

    for (let i = start; i <= end; i += step) {
        const option = document.createElement("option");
        option.value = String(i).padStart(2, "0");
        option.text = String(i).padStart(2, "0");
        select.appendChild(option);
    }

}
// Populate hour options (01 to 12)

var currentTime = new Date();
var currentHour = currentTime.getHours();
var currentMinute = currentTime.getMinutes();
if ( currentHour<12 || (currentHour === 11 &&  currentMinute === 59)) {
populateOptions("hour", (currentHour%12 || 12), 12, 1);
}else{
    if ( currentHour>12){
        populateOptions("hour", (currentHour%12 || 12), 12, 1);
    }
    else{
        populateOptions("hour",1,12, 1);

    }

}
// Populate minute options (00 to 59)
populateOptions("minute", currentMinute, 59, 1);
const amPmSelect = document.getElementById("ampm");
if (currentHour < 12 ) {
    amPmSelect.value = "AM";
    // amPmSelect.disabled = true;
} else {
    amPmSelect.value = "PM";
    amPmSelect.disabled = true;
}
</script>
@endsection
