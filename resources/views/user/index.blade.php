@extends('user_layout.main')
<style>

</style>
@section('content')
    <!--===== Markup For "Create & Preview Post" Starts Here =====-->
    <section class="create_preview_post_wrap">
        <div class="container">
            <div class="create_preview_post">
                <div class="create_post">


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
                                                    <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
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
                                                              class="form-control wizard-required emojiarea"
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
                                                            <input onkeyup="Namechangefun(this)" id="namechange" name="linkedin_tag" type="text" class="form-control" placeholder="tags" value="{{old('linkedin_tag')}}">
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
                                        <div class="post_now_button">
                                            <input type="submit" class="btn post_later_now_btn" value="Post">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>


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


                    </form>
                </div>

                <div class="d-lg-flex justify-content-center">
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


                {{-- Instagram card ------}}

                {{-- End Instagram card --}}
            </div>
        </div>
    </section>


    <!--===== Markup For "Create & Preview Post" Ends Here =====-->


    <!--===== Markup For "Post Manager" Starts Here =====-->
    <section class="post_manager">
        <div class="title_bar_wrap">
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
                                             alt=""/> {{$data['total_fb_likes']}}</li>
                                    <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid"
                                             alt=""/> {{$data['total_insta_likes']}}</li>
                                    <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt=""/> 1748
                                    </li>
                                    <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt=""/>
                                        1748
                                    </li>
                                    <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt=""/> 1748
                                    </li>
                                </ul>
                            </a>

                            <a class="nav-item nav-link" id="shares_tab" data-toggle="tab" href="#shares" role="tab"
                               aria-controls="shares" aria-selected="false" disabled>
                                <h4>Shares</h4>
                                <ul>
                                    <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt=""/> 1748</li>
                                    <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt=""/>
                                        1748
                                    </li>
                                    <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt=""/> 1748
                                    </li>
                                    <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt=""/>
                                        1748
                                    </li>
                                    <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt=""/> 1748
                                    </li>
                                </ul>
                            </a>

                            <a class="nav-item nav-link" id="rePosted_tab" data-toggle="tab" href="#rePosted" role="tab"
                               aria-controls="rePosted" aria-selected="false">
                                <h4>RePosted</h4>
                                <ul>
                                    <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt=""/> 1748</li>
                                    <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt=""/>
                                        1748
                                    </li>
                                    <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt=""/> 1748
                                    </li>
                                    <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt=""/>
                                        1748
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
                                             alt=""/> {{$data['total_fb_comments']}}</li>
                                    <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid"
                                             alt=""/> {{$data['total_insta_comments']}}</li>
                                    <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt=""/> 1748
                                    </li>
                                    <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt=""/>
                                        1748
                                    </li>
                                    <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt=""/> 1748
                                    </li>
                                </ul>
                            </a>

                            <a class="nav-item nav-link" id="favorited_tab" data-toggle="tab" href="#favorited"
                               role="tab" aria-controls="favorited" aria-selected="false">
                                <h4>Favorited</h4>
                                <ul>
                                    <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt=""/> 1748</li>
                                    <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt=""/>
                                        1748
                                    </li>
                                    <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt=""/> 1748
                                    </li>
                                    <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt=""/>
                                        1748
                                    </li>
                                    <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt=""/> 1748
                                    </li>
                                </ul>
                            </a>

                            <a class="nav-item nav-link" id="friendsFollow_tab" data-toggle="tab" href="#friendsFollow"
                               role="tab" aria-controls="friendsFollow" aria-selected="false">
                                <h4>Friends / Follow</h4>
                                <ul>
                                    <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt=""/> 1748</li>
                                    <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt=""/>
                                        1748
                                    </li>
                                    <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt=""/> 1748
                                    </li>
                                    <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt=""/>
                                        1748
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

                            <div class="tab-pane fade" id="rePosted" role="tabpanel" aria-labelledby="rePosted_tab">

                                <div class="states_graph">
                                    <div id="repostedGraph" style="width: 100%; height: 500px">

                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments_tab">

                                <div class="states_graph">
                                    <div id="commentsGraph" style="width: 100%; height: 500px">

                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="favorited" role="tabpanel" aria-labelledby="favorited_tab">

                                <div class="states_graph">
                                    <div id="favoritedGraph" style="width: 100%; height: 500px">

                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="friendsFollow" role="tabpanel"
                                 aria-labelledby="friendsFollow_tab">

                                <div class="states_graph">
                                    <div id="friendsFollowGraph" style="width: 100%; height: 500px">

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


    </script>
@endsection
