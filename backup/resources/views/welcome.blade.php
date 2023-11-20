<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <!--Metatags-->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatble" content="ie=edge" />
    <!--Website Title-->
    <title>YOUPOST</title>
    <!--Calling Favicon-->
    <link rel="icon" href="{{asset('')}}images/favicon.png" />
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" />
    <!--FontAwesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <!--Normalize v8.0.1 CSS FILE-->
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}" />
    <!--Bootstrap v4.6.0 CSS FILE-->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <!--Fonts Are Loads From Here-->
    <link rel="stylesheet" href="{{asset('fonts/fonts.css')}}" />
    <!--Pignose Calendar CSS File-->
    <link rel="stylesheet" href="{{asset('css/pignose.calendar.min.css')}}" />
    <!--Main Stylesheet-->
    <link rel="stylesheet" href="{{asset('style.css')}}" />
    <!--Stylesheet For The Responsiveness-->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" />
    <!-- font-family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Poppins:wght@300;500&family=Proza+Libre:ital@0;1&display=swap"
        rel="stylesheet">
    <!-- font-family -->
    <!-- select2 -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <!-- select2 -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap">
</head>

<body>

    <!--===== Markup For "Header" Starts Here =====-->
    <header class="header">
        <div class="container">
            <div class="top">
                <div class="logo_wrap">
                    <div class="logo">
                        <a href="index.html"><img src="{{asset('')}}images/YouPost_Logo.png" class="img-fluid"
                                alt="" /></a>
                    </div>
                </div>

                <div class="new_post_button_wrap">
                    <div class="new_post_button">
                        <a href="javascript:void(0)">+ New Post</a>
                    </div>
                </div>

                <div class="user_info">
                    <a href="javascript:void(0)">
                        <div class="profile_pic">
                            <img src="{{asset('')}}images/Profile_Pic.png" class="img-fluid" alt="" />
                        </div>

                        <div class="user_name grid_item">
                            <div class="the_name">
                                <span>youpost.com<span class="color">/dougmcka</span></span>
                                <img src="{{asset('')}}images/V_Icon.png" class="v_icon" alt="" />
                            </div>
                        </div>
                    </a>
                </div>
            </div>
           
            <div class="bottom">
           
                <div class="select_the_platform grid_item">
                    <h5>Select the platforms to post on:</h5>
                </div>

                <div class="all_social_platform">
                    <div class="single_platform">
                        <div class="social_icon">
                            <img src="{{asset('')}}images/FB_Color.png" class="color_icon" alt="" />
                            <img src="{{asset('')}}images/FB_Black.png" class="black_icon" alt="" />
                        </div>
                        <input type="checkbox" name="" id="socialFB" checked>
                        <label for="socialFB"></label>
                    </div>

                    <div class="single_platform">
                        <div class="social_icon">
                            <img src="{{asset('')}}images/Instagram_Color.png" class="color_icon" alt="" />
                            <img src="{{asset('')}}images/Instagram_Black.png" class="black_icon" alt="" />
                        </div>
                        <input type="checkbox" name="" id="socialInstagram" checked>
                        <label for="socialInstagram"></label>
                    </div>

                    <div class="single_platform">
                        <div class="social_icon">
                            <img src="{{asset('')}}images/Twitter_Color.png" class="color_icon" alt="" />
                            <img src="{{asset('')}}images/Twitter_Black.png" class="black_icon" alt="" />
                        </div>

                        <input type="checkbox" name="" id="socialTwitter" checked>
                        <label for="socialTwitter"></label>
                    </div>

                    <div class="single_platform">
                        <div class="social_icon">
                            <img src="{{asset('')}}images/Tiktok_Color.png" class="color_icon" alt="" />
                            <img src="{{asset('')}}images/Tiktok_Black.png" class="black_icon" alt="" />
                        </div>

                        <input type="checkbox" name="" id="socialTiktok" checked>
                        <label for="socialTiktok"></label>
                    </div>

                    <div class="single_platform">
                        <div class="social_icon">
                            <img src="{{asset('')}}images/Youtube_Color.png" class="color_icon" alt="" />
                            <img src="{{asset('')}}images/Youtube_Black.png" class="black_icon" alt="" />
                        </div>

                        <input type="checkbox" name="" id="socialYoutube">
                        <label for="socialYoutube"></label>
                    </div>

                    <div class="single_platform">
                        <div class="social_icon">
                            <img src="{{asset('')}}images/Telegram_Color.png" class="color_icon" alt="" />
                            <img src="{{asset('')}}images/Telegram_Black.png" class="black_icon" alt="" />
                        </div>

                        <input type="checkbox" name="" id="socialTelegram">
                        <label for="socialTelegram"></label>
                    </div>

                    <div class="single_platform">
                        <div class="social_icon">
                            <img src="{{asset('')}}images/WhatsApp_Color.png" class="color_icon" alt="" />
                            <img src="{{asset('')}}images/WhatsApp_Black.png" class="black_icon" alt="" />
                        </div>

                        <input type="checkbox" name="" id="socialWhatsApp">
                        <label for="socialWhatsApp"></label>
                    </div>

                    <div class="single_platform">
                        <div class="social_icon">
                            <img src="{{asset('')}}images/Linkedin_Color.png" class="color_icon" alt="" />
                            <img src="{{asset('')}}images/Linkedin_Black.png" class="black_icon" alt="" />
                        </div>

                        <input type="checkbox" name="" id="socialLinkedin">
                        <label for="socialLinkedin"></label>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--===== Markup For "Header" Ends Here =====-->


    <!--===== Markup For "Create & Preview Post" Starts Here =====-->
    <section class="create_preview_post_wrap">
        <div class="container container_test">
            <div class="create_preview_post">
                <div class="create_post">
                    <div class="sub_heading">
                        <h4>Create your post</h4>
                    </div>

                    <form action="">
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="3" class="form-control"
                                placeholder="Write your post...">This is a sample post content block, the preview for this post will show up on the right</textarea>
                        </div>

                        <div class="icon_buttons_tags">
                            <div class="icon_buttons grid_item">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img src="{{asset('')}}images/Camera_Icon.png" class="img-fluid" alt="" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img src="{{asset('')}}images/Video_Player_Icon.png" class="img-fluid"
                                                alt="" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img src="{{asset('')}}images/Emoji_Icon.png" class="img-fluid" alt="" />
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tags_input_wrap grid_item">
                                <div class="tags_input">
                                    <input type="text" class="form-control" placeholder="#tags">
                                </div>
                            </div>
                        </div>

                        <div class="post_now_button">
                            <button type="submit" class="btn">Post Now</button>
                        </div>
                    </form>

                    <div class="post_later">
                        <div class="tabs_type_heading_sm">
                            <h4>Post Later</h4>
                        </div>

                        <div class="pick_date_from_calendar">
                            <div class="calendar"></div>
                        </div>
                    </div>
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
                                <a href="javascript:void(0)"><img src="{{asset('')}}images/V_Icon.png" class="img-fluid"
                                        alt="" /></a>
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
                                <a href="javascript:void(0)"><img src="{{asset('')}}images/V_Icon.png" class="img-fluid"
                                        alt="" /></a>
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
                                    <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt="" /> 1748
                                    </li>
                                    <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt="" />
                                        1748</li>
                                    <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt="" />
                                        1748</li>
                                    <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt="" />
                                        1748</li>
                                    <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt="" /> 1748
                                    </li>
                                </ul>
                            </a>

                            <a class="nav-item nav-link" id="shares_tab" data-toggle="tab" href="#shares" role="tab"
                                aria-controls="shares" aria-selected="false">
                                <h4>Shares</h4>
                                <ul>
                                    <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt="" /> 1748
                                    </li>
                                    <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt="" />
                                        1748</li>
                                    <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt="" />
                                        1748</li>
                                    <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt="" />
                                        1748</li>
                                    <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt="" /> 1748
                                    </li>
                                </ul>
                            </a>

                            <a class="nav-item nav-link" id="rePosted_tab" data-toggle="tab" href="#rePosted" role="tab"
                                aria-controls="rePosted" aria-selected="false">
                                <h4>RePosted</h4>
                                <ul>
                                    <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt="" /> 1748
                                    </li>
                                    <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt="" />
                                        1748</li>
                                    <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt="" />
                                        1748</li>
                                    <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt="" />
                                        1748</li>
                                    <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt="" /> 1748
                                    </li>
                                </ul>
                            </a>

                            <a class="nav-item nav-link" id="comments_tab" data-toggle="tab" href="#comments" role="tab"
                                aria-controls="comments" aria-selected="false">
                                <h4>Comments</h4>
                                <ul>
                                    <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt="" /> 1748
                                    </li>
                                    <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt="" />
                                        1748</li>
                                    <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt="" />
                                        1748</li>
                                    <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt="" />
                                        1748</li>
                                    <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt="" /> 1748
                                    </li>
                                </ul>
                            </a>

                            <a class="nav-item nav-link" id="favorited_tab" data-toggle="tab" href="#favorited"
                                role="tab" aria-controls="favorited" aria-selected="false">
                                <h4>Favorited</h4>
                                <ul>
                                    <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt="" /> 1748
                                    </li>
                                    <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt="" />
                                        1748</li>
                                    <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt="" />
                                        1748</li>
                                    <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt="" />
                                        1748</li>
                                    <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt="" /> 1748
                                    </li>
                                </ul>
                            </a>

                            <a class="nav-item nav-link" id="friendsFollow_tab" data-toggle="tab" href="#friendsFollow"
                                role="tab" aria-controls="friendsFollow" aria-selected="false">
                                <h4>Friends / Follow</h4>
                                <ul>
                                    <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt="" /> 1748
                                    </li>
                                    <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt="" />
                                        1748</li>
                                    <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt="" />
                                        1748</li>
                                    <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt="" />
                                        1748</li>
                                    <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt="" /> 1748
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


    <!--===== Markup For "Footer" Starts Here =====-->
    <footer class="footer_outer">
        <div class="footer_inner">
            <div class="container">
                <div class="footer">
                    <div class="site_links grid_item">
                        <ul>
                            <li><a href="javascript:void(0)">My Account</a></li>
                            <li><a href="javascript:void(0)">Add New Social Profile</a></li>
                            <li><a href="javascript:void(0)">Privacy Policy</a></li>
                            <li><a href="javascript:void(0)">Support</a></li>
                            <li><a href="javascript:void(0)">Public Profile</a></li>
                        </ul>
                    </div>

                    <div class="logo_wrap grid_item">
                        <div class="logo">
                            <a href="{{url('index')}}"><img src="{{asset('')}}images/YouPost_Logo.png" class="img-fluid"
                                    alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--===== Markup For "Footer" Ends Here =====-->

    <!--jQuery Main Libraty Latest Version-->
    <script type="text/javascript" src="{{asset('js/jquery-3.5.1.min.js')}}"></script>

    <!--Bootstrap v4.5.3 JS File-->
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <!--Pignose Calendar JS File-->
    <script type="text/javascript" src="{{asset('js/pignose.calendar.full.min.js')}}"></script>
    <!--Full Calendar JS File-->
    <script type="text/javascript" src="{{asset('js/index.global.min.js')}}"></script>
    <!--SimpleChart JS File-->
    <script type="text/javascript" src="{{asset('js/SimpleChart.js')}}"></script>
    <!--Custom JavaScript-->
    <script type="text/javascript">
    // (1) when page is loading
    $(document).ready(function() {
        $(".single_platform").each(function(index) {
            if ($(this).find('input[type="checkbox"]').is(':checked')) {
                $(this).addClass('active_social');
            }
        });
    });

    //(2) change it later while user will click something on my list.
    $(document).on('change', ".single_platform input[type=checkbox]", function() {
        $(this).parent().toggleClass('active_social');
    });

    // Initialize Pignose Calendar
    $(function() {
        $('.calendar').pignoseCalendar();
    });

    // Initialize Full Calendar
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('postManagerCalendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialDate: '2023-03-01',
            editable: true,
            selectable: true,
            businessHours: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: [{
                    title: 'All Day Event',
                    start: '2023-03-01'
                },
                {
                    title: 'Long Event',
                    start: '2023-03-07',
                    end: '2023-03-10'
                },
                {
                    groupId: 999,
                    title: 'Repeating Event',
                    start: '2023-03-09T16:00:00'
                },
                {
                    groupId: 999,
                    title: 'Repeating Event',
                    start: '2023-03-16T16:00:00'
                },
                {
                    title: 'Conference',
                    start: '2023-03-11',
                    end: '2023-03-13'
                },
                {
                    title: 'Meeting',
                    start: '2023-03-12T10:30:00',
                    end: '2023-03-12T12:30:00'
                },
                {
                    title: 'Lunch',
                    start: '2023-03-12T12:00:00'
                },
                {
                    title: 'Meeting',
                    start: '2023-03-12T14:30:00'
                },
                {
                    title: 'Happy Hour',
                    start: '2023-03-12T17:30:00'
                },
                {
                    title: 'Dinner',
                    start: '2023-03-12T20:00:00'
                },
                {
                    title: 'Birthday Party',
                    start: '2023-03-13T07:00:00'
                },
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2023-03-28'
                }
            ]
        });
        calendar.render();
    });
    </script>

    <script>
    var graphdata1 = {
        linecolor: "#000000",
        title: "TikTok",
        values: [{
                X: "6:00",
                Y: 10.00
            },
            {
                X: "7:00",
                Y: 20.00
            },
            {
                X: "8:00",
                Y: 500.00
            },
            {
                X: "9:00",
                Y: 34.00
            },
            {
                X: "10:00",
                Y: 40.25
            },
            {
                X: "11:00",
                Y: 28.56
            },
            {
                X: "12:00",
                Y: 18.57
            },
            {
                X: "13:00",
                Y: 34.00
            },
            {
                X: "14:00",
                Y: 40.89
            },
            {
                X: "15:00",
                Y: 12.57
            },
            {
                X: "16:00",
                Y: 28.24
            },
            {
                X: "17:00",
                Y: 18.00
            },
            {
                X: "18:00",
                Y: 34.24
            },
            {
                X: "19:00",
                Y: 40.58
            },
            {
                X: "20:00",
                Y: 12.54
            },
            {
                X: "21:00",
                Y: 28.00
            },
            {
                X: "22:00",
                Y: 18.00
            },
            {
                X: "23:00",
                Y: 34.89
            },
            {
                X: "0:00",
                Y: 40.26
            },
            {
                X: "1:00",
                Y: 28.89
            },
            {
                X: "2:00",
                Y: 18.87
            },
            {
                X: "3:00",
                Y: 34.00
            },
            {
                X: "4:00",
                Y: 40.00
            }
        ]
    };
    var graphdata2 = {
        linecolor: "#CF2872",
        title: "Instagram",
        values: [{
                X: "6:00",
                Y: 100.00
            },
            {
                X: "7:00",
                Y: 120.00
            },
            {
                X: "8:00",
                Y: 140.00
            },
            {
                X: "9:00",
                Y: 134.00
            },
            {
                X: "10:00",
                Y: 140.25
            },
            {
                X: "11:00",
                Y: 128.56
            },
            {
                X: "12:00",
                Y: 118.57
            },
            {
                X: "13:00",
                Y: 134.00
            },
            {
                X: "14:00",
                Y: 140.89
            },
            {
                X: "15:00",
                Y: 112.57
            },
            {
                X: "16:00",
                Y: 128.24
            },
            {
                X: "17:00",
                Y: 118.00
            },
            {
                X: "18:00",
                Y: 134.24
            },
            {
                X: "19:00",
                Y: 140.58
            },
            {
                X: "20:00",
                Y: 112.54
            },
            {
                X: "21:00",
                Y: 128.00
            },
            {
                X: "22:00",
                Y: 118.00
            },
            {
                X: "23:00",
                Y: 134.89
            },
            {
                X: "0:00",
                Y: 140.26
            },
            {
                X: "1:00",
                Y: 128.89
            },
            {
                X: "2:00",
                Y: 118.87
            },
            {
                X: "3:00",
                Y: 134.00
            },
            {
                X: "4:00",
                Y: 180.00
            }
        ]
    };
    var graphdata3 = {
        linecolor: "#26C6DA",
        title: "Twitter",
        values: [{
                X: "5:00",
                Y: 230.00
            },
            {
                X: "10:00",
                Y: 210.00
            },
            {
                X: "15:00",
                Y: 214.00
            },
            {
                X: "9:00",
                Y: 234.00
            },
            {
                X: "10:00",
                Y: 247.25
            },
            {
                X: "11:00",
                Y: 218.56
            },
            {
                X: "12:00",
                Y: 268.57
            },
            {
                X: "13:00",
                Y: 274.00
            },
            {
                X: "14:00",
                Y: 280.89
            },
            {
                X: "15:00",
                Y: 242.57
            },
            {
                X: "16:00",
                Y: 298.24
            },
            {
                X: "17:00",
                Y: 208.00
            },
            {
                X: "18:00",
                Y: 214.24
            },
            {
                X: "19:00",
                Y: 214.58
            },
            {
                X: "20:00",
                Y: 211.54
            },
            {
                X: "21:00",
                Y: 248.00
            },
            {
                X: "22:00",
                Y: 258.00
            },
            {
                X: "23:00",
                Y: 234.89
            },
            {
                X: "0:00",
                Y: 210.26
            },
            {
                X: "1:00",
                Y: 248.89
            },
            {
                X: "2:00",
                Y: 238.87
            },
            {
                X: "3:00",
                Y: 264.00
            },
            {
                X: "4:00",
                Y: 270.00
            }
        ]
    };
    var graphdata4 = {
        linecolor: "#1976D2",
        title: "Facebook",
        values: [{
                X: "6:00",
                Y: 300.00
            },
            {
                X: "7:00",
                Y: 410.98
            },
            {
                X: "8:00",
                Y: 310.00
            },
            {
                X: "9:00",
                Y: 314.00
            },
            {
                X: "10:00",
                Y: 310.25
            },
            {
                X: "11:00",
                Y: 318.56
            },
            {
                X: "12:00",
                Y: 318.57
            },
            {
                X: "13:00",
                Y: 314.00
            },
            {
                X: "14:00",
                Y: 310.89
            },
            {
                X: "15:00",
                Y: 512.57
            },
            {
                X: "16:00",
                Y: 318.24
            },
            {
                X: "17:00",
                Y: 318.00
            },
            {
                X: "18:00",
                Y: 314.24
            },
            {
                X: "19:00",
                Y: 310.58
            },
            {
                X: "20:00",
                Y: 312.54
            },
            {
                X: "21:00",
                Y: 318.00
            },
            {
                X: "22:00",
                Y: 318.00
            },
            {
                X: "23:00",
                Y: 314.89
            },
            {
                X: "0:00",
                Y: 310.26
            },
            {
                X: "1:00",
                Y: 318.89
            },
            {
                X: "2:00",
                Y: 518.87
            },
            {
                X: "3:00",
                Y: 314.00
            },
            {
                X: "4:00",
                Y: 310.00
            }
        ]
    };

    $(function() {
        $("#likesGraph").SimpleChart({
            ChartType: "Line",
            toolwidth: "50",
            toolheight: "25",
            axiscolor: "#E6E6E6",
            textcolor: "#6E6E6E",
            showlegends: true,
            data: [graphdata4, graphdata3, graphdata2, graphdata1],
            legendsize: "30",
            legendposition: 'bottom',
            xaxislabel: null,
            title: null,
            yaxislabel: null,
        });
    });

    $('#shares_tab').on("shown.bs.tab", function() {
        $(function() {
            $("#sharesGraph").SimpleChart({
                ChartType: "Line",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: true,
                data: [graphdata4, graphdata3, graphdata2, graphdata1],
                legendsize: "30",
                legendposition: 'bottom',
                xaxislabel: null,
                title: null,
                yaxislabel: null,
            });
        });
    });

    $('#rePosted_tab').on("shown.bs.tab", function() {
        $(function() {
            $("#repostedGraph").SimpleChart({
                ChartType: "Line",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: true,
                data: [graphdata4, graphdata3, graphdata2, graphdata1],
                legendsize: "30",
                legendposition: 'bottom',
                xaxislabel: null,
                title: null,
                yaxislabel: null,
            });
        });
    });

    $('#comments_tab').on("shown.bs.tab", function() {
        $(function() {
            $("#commentsGraph").SimpleChart({
                ChartType: "Line",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: true,
                data: [graphdata4, graphdata3, graphdata2, graphdata1],
                legendsize: "30",
                legendposition: 'bottom',
                xaxislabel: null,
                title: null,
                yaxislabel: null,
            });
        });
    });

    $('#favorited_tab').on("shown.bs.tab", function() {
        $(function() {
            $("#favoritedGraph").SimpleChart({
                ChartType: "Line",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: true,
                data: [graphdata4, graphdata3, graphdata2, graphdata1],
                legendsize: "30",
                legendposition: 'bottom',
                xaxislabel: null,
                title: null,
                yaxislabel: null,
            });
        });
    });

    $('#friendsFollow_tab').on("shown.bs.tab", function() {
        $(function() {
            $("#friendsFollowGraph").SimpleChart({
                ChartType: "Line",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: true,
                data: [graphdata4, graphdata3, graphdata2, graphdata1],
                legendsize: "30",
                legendposition: 'bottom',
                xaxislabel: null,
                title: null,
                yaxislabel: null,
            });
        });
    });
    </script>

</body>

</html>