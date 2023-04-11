
@extends('user_layout.main')
@section('content')

<!--===== Markup For "Create & Preview Post" Starts Here =====-->
<section class="create_preview_post_wrap">
    <div class="container">
        <div class="create_preview_post">
            <div class="create_post">
                <div class="sub_heading">
                    <h4>Create your post</h4>
                </div>

                <form action="{{url('create_post')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group emoji_parent">
                        <textarea required name="content" id="emojiarea" cols="30" rows="3" class="form-control" placeholder="Write your post..."></textarea>
                    </div>

                    <div class="icon_buttons_tags">
                        <div class="icon_buttons grid_item">
                            <ul>
                                <li>
                                    <a href="javascript:void(0)"><label for="image_or_video">
                                        <img src="{{asset('')}}images/Camera_Icon.png" class="img-fluid" alt=""/>
                                    </label>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><label for="image_or_video">
                                        <img src="{{asset('')}}images/Video_Player_Icon.png" class="img-fluid" alt="" />
                                    </label>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="open_emoji">
                                        <img src="{{asset('')}}images/Emoji_Icon.png" class="img-fluid" alt="" />
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <input type="file" name="media" class="image d-none" id="image_or_video" accept="image/*,video/*">

                        <div class="tags_input_wrap grid_item">
                            <div class="tags_input">
                                <input required name="tag" type="text" class="form-control" placeholder="#tags">
                            </div>
                        </div>
                    </div>

                    <div class="post_now_button">
                        <input type="submit" class="btn post_now_btn" value="Post Now">
                    </div>

                    <div class="post_later">
                        <div class="tabs_type_heading_sm">
                            <span id="browsertime"></span>
                            <input type="hidden" class="browsertimeinput" name="time">
                            <input type="hidden" class="posttime" value="now" name="posttime">
                            <h4>Post Later</h4>
                        </div>

                        <div class="pick_date_from_calendar">
                            <div class="calendar"></div>
                        </div>
                    </div>

                    <div class="post_now_button">
                        <input type="submit" class="btn post_later_now_btn" value="Post Later Now">
                    </div>
                </form>


            </div>

            <div class="preview_post">
                <div class="sub_heading">
                    <h4>Preview Setting: <span>iPhone | Facebook</span></h4>
                </div>

                <div class="preview_wrap">
                    <div class="the_preview">

                    </div>
                </div>
            </div>
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
                            <a href="javascript:void(0)"><img src="{{asset('images/V_Icon.png')}}" class="img-fluid" alt="" /></a>
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
                            <a href="javascript:void(0)"><img src="{{asset('images/V_Icon.png')}}" class="img-fluid" alt="" /></a>
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
                        <a class="nav-item nav-link active" id="likes_tab" data-toggle="tab" href="#likes" role="tab" aria-controls="likes" aria-selected="true">
                            <h4>Likes</h4>
                            <ul>
                                <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt="" /> 1748</li>
                            </ul>
                        </a>

                        <a class="nav-item nav-link" id="shares_tab" data-toggle="tab" href="#shares" role="tab" aria-controls="shares" aria-selected="false">
                            <h4>Shares</h4>
                            <ul>
                                <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt="" /> 1748</li>
                            </ul>
                        </a>

                        <a class="nav-item nav-link" id="rePosted_tab" data-toggle="tab" href="#rePosted" role="tab" aria-controls="rePosted" aria-selected="false">
                            <h4>RePosted</h4>
                            <ul>
                                <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt="" /> 1748</li>
                            </ul>
                        </a>

                        <a class="nav-item nav-link" id="comments_tab" data-toggle="tab" href="#comments" role="tab" aria-controls="comments" aria-selected="false">
                            <h4>Comments</h4>
                            <ul>
                                <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt="" /> 1748</li>
                            </ul>
                        </a>

                        <a class="nav-item nav-link" id="favorited_tab" data-toggle="tab" href="#favorited" role="tab" aria-controls="favorited" aria-selected="false">
                            <h4>Favorited</h4>
                            <ul>
                                <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt="" /> 1748</li>
                            </ul>
                        </a>

                        <a class="nav-item nav-link" id="friendsFollow_tab" data-toggle="tab" href="#friendsFollow" role="tab" aria-controls="friendsFollow" aria-selected="false">
                            <h4>Friends / Follow</h4>
                            <ul>
                                <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt="" /> 1748</li>
                            </ul>
                        </a>
                    </div>


                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="likes" role="tabpanel" aria-labelledby="likes_tab">

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

                        <div class="tab-pane fade" id="friendsFollow" role="tabpanel" aria-labelledby="friendsFollow_tab">

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