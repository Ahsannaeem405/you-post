<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <!--Metatags-->
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatble" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!--Website Title-->
    <title>YOUPOST</title>
    <!--Calling Favicon-->
    <link rel="icon" href="{{asset('')}}images/favicon.png"/>
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}"/>
    <!--FontAwesome CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <!--Normalize v8.0.1 CSS FILE-->
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}"/>
    <!--Bootstrap v4.6.0 CSS FILE-->

    <!--Fonts Are Loads From Here-->
    <link rel="stylesheet" href="{{asset('fonts/fonts.css')}}"/>
    <!--Pignose Calendar CSS File-->
    <link rel="stylesheet" href="{{asset('css/pignose.calendar.min.css')}}"/>
    <!--Main Stylesheet-->
    <link rel="stylesheet" href="{{asset('style.css')}}"/>
    <!--Stylesheet For The Responsiveness-->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}"/>
    <script src="https://kit.fontawesome.com/4366d6f846.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css">

    <style>
        .dropdown-toggle::after {
            content: none !important;
        }

        .user_info {
            display: flex !important;
            align-items: center;
            gap: 4px;
        }

        .dropdown a {
            display: block !important;
        }
    </style>
</head>

<body>

<!--===== Markup For "Header" Starts Here =====-->
<header class="header">

    <div class="container">
        <div class="top">
            <div class="logo_wrap">
                <div class="logo">
                    <a href="{{url('/')}}"><img src="{{asset('images/YouPost_Logo.png')}}" class="img-fluid"
                                                alt=""/></a>
                </div>
            </div>

            <div class="new_post_button_wrap" style="visibility: hidden">
                <div class="new_post_button">
                    <a href="javascript:void(0)">+ New Post</a>
                </div>
            </div>


            <div class="user_info">
                <a href="javascript:void(0)">
                    <div class="profile_pic">
                        <img src="{{asset('images/avatar-light.png')}}" class="img-fluid" alt=""/>
                    </div>

                    <div class="user_name grid_item">
                        <div class="the_name">
                            <span>youpost.com<span class="color">/{{auth()->user()->account->name}}</span></span>


                        </div>
                    </div>
                </a>
                <div class="dropdown">
                    <button class="dropdown-toggle bg-transparent border-0" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('')}}images/V_Icon.png" class="v_icon" alt="" width="15px"/>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @foreach($accounts as $account)
                            <li><a class="dropdown-item {{auth()->user()->account_id==$account->id ? 'active' : null}}"
                                   href="{{url("change_acount/".encrypt($account->id))}}"><i
                                        class="fa-solid fa-user"></i> {{$account->name}}</a></li>
                        @endforeach
                        <li><a class="dropdown-item" style="cursor: pointer" data-bs-toggle="modal"
                               data-bs-target="#addAccount">Add Account <i
                                    class="fa-solid fa-plus text-success"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="bottom">
            <div class="select_the_platform grid_item">
                <h5>Select the platforms to post on:</h5>
            </div>

            <div class="all_social_platform">
                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/FB_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/FB_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <input type="checkbox" class="plateform" name="plateform[]" value="Facebook" id="socialFB"
                        {{ in_array('Facebook', auth()->user()->account->platforms) ? 'checked' : '' }}>
                    <label for="socialFB"></label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Instagram_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Instagram_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <input type="checkbox" class="plateform instagram_modal" name="plateform[]" value="Instagram"
                           id="socialInstagram"
                        {{ in_array('Instagram', auth()->user()->account->platforms) ? 'checked' : '' }}>
                    <label for="socialInstagram"></label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Twitter_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Twitter_Black.png')}}" class="black_icon" alt=""/>
                    </div>

                    <input type="checkbox" class="plateform" name="plateform[]" value="Twitter" id="socialTwitter"
                        {{ in_array('Twitter', auth()->user()->account->platforms) ? 'checked' : '' }}>
                    <label for="socialTwitter"></label>
                </div>
                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Linkedin_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Linkedin_Black.png')}}" class="black_icon" alt=""/>
                    </div>

                    <input type="checkbox" class="plateform" name="plateform[]" value="Linkedin" id="socialLinkedin"
                        {{ in_array('Linkedin', auth()->user()->account->platforms) ? 'checked' : '' }}>
                    <label for="socialLinkedin"></label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Tiktok_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Tiktok_Black.png')}}" class="black_icon" alt=""/>
                    </div>

                    <input type="checkbox" name="" id="socialTiktok" disabled>
                    <label for="socialTiktok"></label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Youtube_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Youtube_Black.png')}}" class="black_icon" alt=""/>
                    </div>

                    <input type="checkbox" name="" id="socialYoutube" disabled>
                    <label for="socialYoutube"></label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Telegram_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Telegram_Black.png')}}" class="black_icon" alt=""/>
                    </div>

                    <input type="checkbox" name="" id="socialTelegram" disabled>
                    <label for="socialTelegram"></label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/WhatsApp_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/WhatsApp_Black.png')}}" class="black_icon" alt=""/>
                    </div>

                    <input type="checkbox" name="" id="socialWhatsApp" disabled>
                    <label for="socialWhatsApp"></label>
                </div>


            </div>
        </div>
    </div>
</header>
<!--===== Markup For "Header" Ends Here =====-->


@yield('content')


{{-- time modal --}}
<!-- Modal -->
<div class="modal fade" id="timeModal" tabindex="-1" aria-labelledby="timeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-cross-btn">
                <h5 class="modal-title" id="timeModalLabel">Time to upload post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="">Select Time:</label>
                <input type="time" name="" id="" class="form-control select_time" value="00:00">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary change_time" data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>
{{-- time modal --}}



{{-- account modal --}}
<!-- Modal -->
<div class="modal fade" id="addAccount" tabindex="-1" aria-labelledby="timeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-cross-btn">
                <h5 class="modal-title" id="timeModalLabel">Add Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('store_acount')}}" method="post">
                    @csrf
                    <div class="col-12 mb-2">
                        <lable>Name</lable>
                        <input type="text" class="form-control" required name="name"
                               placeholder="Enter account name...">
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary ">Create</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

{{-- account modal --}}


{{-- event detail modal --}}
<div class="modal fade" id="detail_modal" tabindex="-1" aria-labelledby="detail_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detail_modalLabel">Post Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body event_detail_parent">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- event detail modal --}}


{{-- event edit modal --}}

{{-- myaccount modal --}}
<div class="modal fade" id="myaccounts_modal" tabindex="-1" aria-labelledby="myaccounts_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-cross-btn">
                <h5 class="modal-title" id="myaccounts_modalLabel">Connect Accounts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body modal-social-icon">
                <form action="{{url('connect_to_facebook')}}" method="post">
                    @csrf
                    {{-- <button class="btn btn-primary  mt-2" type="submit"><i class="fa fa-facebook-square mr-2"></i>Connect with
                        Facebook
                    </button> --}}


                    <div class="row MDLsocial-iconmain">

                        <div class="col-md-6 MDLsocial-iconmainWrp">
                            <div class="MDLsocial-icon">
                                <a class="" href="{{url('connect_to_facebook')}}">
                                    <i class="fa fa-facebook-square mr-2"></i>Connect with Facebook</a>
                            </div>
                        </div>

                        <div class="col-md-6 MDLsocial-iconmainWrp">
                            <div class="MDLsocial-icon">
                                <a class="" href="{{url('connect_to_instagram')}}">
                                    <i class="fa fa-instagram mr-2"></i>Connect with Instagram</a>
                            </div>
                        </div>

                        <div class="col-md-6 MDLsocial-iconmainWrp">
                            <div class="MDLsocial-icon">
                                <a class="" href="{{url('connect_to_linkedin')}}">
                                    <i class="fa fa-linkedin-square mr-2"></i>Connect with Linkedin</a>
                            </div>
                        </div>

                        <div class="col-md-6 MDLsocial-iconmainWrp">
                            <div class="MDLsocial-icon">
                                <a class="" href="{{url('connect_to_twitter')}}">
                                    <i class="fa fa-twitter-square mr-2"></i>Connect with Twitter</a></div>
                        </div>

                    </div>
                </form>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- myaccount modal --}}

{{-- pages_modal --}}

<div class="modal fade" id="pages_modal" tabindex="-1" aria-labelledby="pages_modalLabel" aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pages_modalLabel">Select Your Page To Post On Facebook</h5>
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                <!--  <span aria-hidden="true">&times;</span>-->
                <!--</button>-->
            </div>
            <form action="{{url('set_page')}}" method="post">
                @csrf
                <div class="modal-body">

                    <select required name="page" class="form-control">
                        <option value="">-select--</option>
                        @foreach($all_pages as $page)
                            <option value="{{$page->access_token}}">{{$page->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>


        </div>
    </div>
</div>


{{-- pages_modal --}}

{{-- pages_modal for instagram --}}

<div class="modal fade" id="instagram_pages_modal" tabindex="-1" aria-labelledby="pages_modalLabel" aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pages_modalLabel">Select Your Page To Post On Connected Instagram
                    Account</h5>
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                <!--  <span aria-hidden="true">&times;</span>-->
                <!--</button>-->
            </div>
            <form action="{{url('set_page_for_instagram')}}" method="post">
                @csrf
                <div class="modal-body">

                    <select required name="page" class="form-control instapage_selection">
                        <option value="">-select--</option>
                        @foreach($all_pages_for_insta as $page)
                            <option value="{{$page->id}}">{{$page->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>


        </div>
    </div>
</div>


{{-- pages_modal for instagram --}}


{{--    modal for pages linked--}}
<div class="modal fade" id="linkedin_pages_modal" tabindex="-1" aria-labelledby="pages_modalLabel" aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pages_modalLabel">Select Your Page To Post On Connected Linkedin
                    Account</h5>
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                <!--  <span aria-hidden="true">&times;</span>-->
                <!--</button>-->
            </div>
            <form action="{{url('set_page_for_linkedin')}}" method="post">

                @csrf
                <div class="modal-body">

                    <select required name="page" class="form-control">
                        <option value="">-select--</option>
                        @foreach($instapages as $page)
                            <option value="{{$page['$URN']}}">{{$page['localizedName']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>


        </div>
    </div>
</div>


<!--===== Markup For "Footer" Starts Here =====-->
<footer class="footer_outer">
    <div class="footer_inner">
        <div class="container">
            <div class="footer">
                <div class="site_links grid_item">
                    <ul>
                        <li><a href="javascript:void(0)" class="myaccounts">My Account</a></li>
                        <li><a href="javascript:void(0)">Add New Social Profile</a></li>
                        <li><a href="javascript:void(0)">Privacy Policy</a></li>
                        <li><a href="javascript:void(0)">Support</a></li>
                        <li><a href="javascript:void(0)">Public Profile</a></li>
                        <li><a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>


                    </ul>
                </div>

                <div class="logo_wrap grid_item">
                    <div class="logo">
                        <a href="{{url('index')}}"><img src="{{asset('')}}images/YouPost_Logo.png" class="img-fluid"
                                                        alt=""/></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--===== Markup For "Footer" Ends Here =====-->


<!--jQuery Main Libraty Latest Version-->

{{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}

<script src="{{asset('js/inputEmoji.js')}}"></script>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<!--Pignose Calendar JS File-->
<script type="text/javascript" src="{{asset('js/pignose.calendar.full.min.js')}}"></script>
<!--SimpleChart JS File-->
<script type="text/javascript" src="{{asset('js/SimpleChart.js')}}"></script>

<!--Full Calendar JS File-->
{{--<script type="text/javascript" src="{{asset('js/index.global.min.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>

<script>
    var pignoseCalendar = null;
    $(function () {
        pignoseCalendar = $('.calendar').pignoseCalendar({
            select: function (date, context) {
                selectedDate = date; // store selected date value in variable
                settime();
                $('#timeModal').modal('show');
            }
        });

        // $('.pignose-calendar-unit-active').removeClass('pignose-calendar-unit-active');

    });
</script>


<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
<!--Custom JavaScript-->

{{-- toaster cdn --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
      integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- toaster cdn --}}
<script>

    $(document).ready(function () {

        setTimeout(function () {
            videoThumnail();
        }, 100);
        $(document).on('click', '.fc-more', function () {
            videoThumnail();
        })
        var eventDates =@json(collect($allPosts)->pluck('event_date'));

        var calendar = $('#postManagerCalendar').fullCalendar({
            selectable: true,
            businessHours: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: @json(collect($allPosts)),
            views: {
                month: {
                    eventLimit: 2
                }
            },
            eventClick: function (event, jsEvent, view) {
                var id = event.id;
                get_detail(id);

            },
            dayRender: function (date, cell) {
                var today = moment().startOf('day');
                var currentDay = moment(date).startOf('day');

                if (currentDay.isSameOrAfter(today)) {
                    if ($.inArray(moment(currentDay).format('YYYY-MM-DD'), eventDates) === -1) {
                        var plusIcon = $('<span class="plus-icon-calender">+</span>');
                        cell.append(plusIcon);
                    }
                }
            },
            dayClick: function (date, jsEvent, view) {
                $('html, body').animate({scrollTop: 0}, 'slow');
                selectedDate = date;
                pignoseCalendar.pignoseCalendar('destroy');
                var newDate = moment(date).format("YYYY-MM-DD"); // Specify your desired date in the format 'YYYY-MM-DD'
                pignoseCalendar.pignoseCalendar({
                    date: newDate,
                    select: function (date, context) {
                        selectedDate = date; // store selected date value in variable
                        settime();
                        $('#timeModal').modal('show');
                    }
                });
                $('#timeModal').modal('show');
                settime();

            },
            eventRender: function (event, element) {
                element.find('.fc-title').text(event.title);
                element.find('.fc-time').text(''); // remove start time
                if (event.imageUrl) {
                    element.find('.fc-content').prepend('<img src="' + event.imageUrl + '" class="thumbnail" />');
                }
                if (event.videoURL) {
                    element.find('.fc-content').prepend(`<img src="${event.videoURL}" class="video-thumnailmain thumbnail"  > `);
                }
            },
        });
    })

    function videoThumnail() {

        $('.video-thumnailmain').each(function () {
            var $obj = $(this);
            var videoPath = $(this).attr('src');

            var video = document.createElement('video');
            video.src = videoPath;
            video.currentTime = 3;
            video.addEventListener('loadeddata', function () {
                var canvas = document.createElement('canvas');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;

                // Draw the first frame of the video onto the canvas
                var context = canvas.getContext('2d');
                context.drawImage(video, 0, 0, canvas.width, canvas.height);

                // Convert the canvas image data to a data URL
                var thumbnail = canvas.toDataURL('image/png');
                $obj.attr('src', thumbnail)
            });


        });
    }

    function getVideoThumbnail(videoPath, obj) {
        // Replace the videoURL with the correct path to your video directory

    }


    @if (Session::has('success'))
    toastr.success('{{ Session::get('success') }}');
    @elseif (Session::has('error'))
    toastr.error('{{ Session::get('error') }}');
    @endif

        @if ($errors->any())
        @foreach ($errors->all() as $error)
        toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.error('{{ $error }}');
    @endforeach
    @endif

    function get_detail(id) {
        $.ajax({
            type: "get",
            url: "{{ url('get_event_detail') }}",
            data: {
                'id': id
            },
            success: function (response) {
                $('.event_detail_parent').empty().append(response);
                $('.fc-popover').css('display', 'none');
                $('#detail_modal').modal('show');
            }
        });
    }

    // Initialize Full Calendar


    $(document).on('click', '.plateform', function () {
        var all_plateform = $("input[name='plateform[]']:checked");
        var plateform_val = [];
        all_plateform.each(function () {
            plateform_val.push($(this).val());
        });
        $.ajax({
            type: "get",
            url: "{{ url('update_user_platforms') }}",
            data: {
                'plateform_val': plateform_val
            },
            success: function (response) {
                window.location.reload();
            },
            error: function (xhr, status, error) {
                var errorData = JSON.parse(xhr.responseText);

                if (errorData.message == 'fb_error') {
                    $('#socialFB').prop('checked', false);
                    $('#socialFB').closest('.single_platform').removeClass('active_social');
                    toastr.error('Please Connect Your Facebook Account');
                } else if (errorData.message == 'twiter_error') {

                    $('#socialTwitter').prop('checked', false);
                    $('#socialTwitter').closest('.single_platform').removeClass('active_social');
                    toastr.error('Please Connect Your Twitter Account');
                } else if (errorData.message == 'insta_error') {
                    $('#socialInstagram').prop('checked', false);
                    $('#socialInstagram').closest('.single_platform').removeClass('active_social');

                    toastr.error('Please Connect Your instagram Account');
                } else if (errorData.message == 'linkedin_error') {
                    $('#socialLinkedin').prop('checked', false);
                    $('#socialLinkedin').closest('.single_platform').removeClass('active_social');

                    toastr.error('Please Connect Your Linkedin Account');
                }
            }
        });


    });
    $(document).on('click', '.edit_post', function () {

        $('#detail_modal').modal('hide');
        var tag = $(this).attr('data-tag');
        var contact = $(this).attr('data-contact');
        var id = $(this).attr('data-id');
        $('.edit_content').val(contact);
        $('.edit_tag').val(tag);

        $('.edit_id').val(id);

        $('#edit_modal').modal('show');
    });

</script>
<script>
    $(function () {
        $('.emojiarea').emoji({place: 'after'});
    });


    $(document).ready(function () {


        var authuser = "{{auth()->user()}}";
        if (authuser != null) {
            var insta_access_token = "{{auth()->user()->account->insta_access_token}}";
            var insta_user_id = "{{auth()->user()->account->insta_user_id}}";
            var fb_access_token = "{{auth()->user()->account->fb_access_token}}";
            var fb_page_token = "{{auth()->user()->account->fb_page_token}}";
            var linkedin = "{{auth()->user()->account->linkedin_page_id}}";
            var linkedinAcces = "{{auth()->user()->account->linkedin_accesstoken}}";


            if (insta_access_token != '' && insta_user_id == '') {
                $('#instagram_pages_modal').modal('show');

                $.ajax({
                    type: "get",
                    url: "{{ url('get_page_for_instagram')}}",
                    success: function (response) {
                        $('.instapage_selection').empty().append(response);
                    }
                });

            } else if (fb_access_token != '' && fb_page_token == '') {
                $('#pages_modal').modal('show');
            } else if (!linkedin && linkedinAcces) {
                $('#linkedin_pages_modal').modal('show');
            }

        }

    });



</script>


<script>
    function updateDiv($obj) {
        var inputText = $($obj).val();
        document.getElementById("mypostresult").textContent = inputText;
    }

    function Namechangefun($obj) {
        var inputText = $($obj).val();
        document.getElementById("mynameresult").textContent = '#' + inputText;
    }

    function suggested_text($obj) {
$('.preview_post .loader').removeClass('d-none');
        var contentData=$($obj).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{ url('preferred-text')}}',
            type: 'POST',
            data: {'contentData': contentData},
            success: function (result) {
                $('.preview_post .loader').addClass('d-none');
                document.getElementById("mypostresult_gpt").textContent = result['content'];
                document.getElementById("mynameresult_gpt").textContent = '#'+result['tags'];
            }
        });

    }
</script>
@yield('js')
</body>

</html>
