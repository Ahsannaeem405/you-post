<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <!--Metatags-->
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatble" content="ie=edge"/>
    <!--Website Title-->
    <title>YOUPOST</title>
    <!--Calling Favicon-->
    <link rel="icon" href="{{asset('')}}images/favicon.png" />
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" />
    <!--FontAwesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <!--Normalize v8.0.1 CSS FILE-->
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}"/>
    <!--Bootstrap v4.6.0 CSS FILE-->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <!--Fonts Are Loads From Here-->
    <link rel="stylesheet" href="{{asset('fonts/fonts.css')}}"/>
    <!--Pignose Calendar CSS File-->
    <link rel="stylesheet" href="{{asset('css/pignose.calendar.min.css')}}"/>
    <!--Main Stylesheet-->
    <link rel="stylesheet" href="{{asset('style.css')}}"/>
    <!--Stylesheet For The Responsiveness-->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}"/>
    <script src="https://kit.fontawesome.com/4366d6f846.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
</head>

<body>

<!--===== Markup For "Header" Starts Here =====-->
<header class="header">
    <div class="container">
        <div class="top">
            <div class="logo_wrap">
                <div class="logo">
                    <a href="{{url('/')}}"><img src="{{asset('')}}images/YouPost_Logo.png" class="img-fluid" alt="" /></a>
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
                        <img src="{{asset('images/FB_Color.png')}}" class="color_icon" alt="" />
                        <img src="{{asset('images/FB_Black.png')}}" class="black_icon" alt="" />
                    </div>
                    <input type="checkbox" class="plateform" name="plateform[]" value="Facebook" id="socialFB"
                    {{ in_array('Facebook', auth()->user()->platforms) ? 'checked' : '' }}>
                    <label for="socialFB"></label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Instagram_Color.png')}}" class="color_icon" alt="" />
                        <img src="{{asset('images/Instagram_Black.png')}}" class="black_icon" alt="" />
                    </div>
                    <input type="checkbox" class="plateform" name="plateform[]" value="Instagram" id="socialInstagram"
                    {{ in_array('Instagram', auth()->user()->platforms) ? 'checked' : '' }}>
                    <label for="socialInstagram"></label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Twitter_Color.png')}}" class="color_icon" alt="" />
                        <img src="{{asset('images/Twitter_Black.png')}}" class="black_icon" alt="" />
                    </div>

                    <input type="checkbox" class="plateform" name="plateform[]" value="Twitter" id="socialTwitter"
                    {{ in_array('Twitter', auth()->user()->platforms) ? 'checked' : '' }}>
                    <label for="socialTwitter"></label>
                </div>
                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Linkedin_Color.png')}}" class="color_icon" alt="" />
                        <img src="{{asset('images/Linkedin_Black.png')}}" class="black_icon" alt="" />
                    </div>

                    <input type="checkbox" class="plateform" name="plateform[]" value="Linkedin" id="socialLinkedin"
                    {{ in_array('Linkedin', auth()->user()->platforms) ? 'checked' : '' }}>
                    <label for="socialLinkedin"></label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Tiktok_Color.png')}}" class="color_icon" alt="" />
                        <img src="{{asset('images/Tiktok_Black.png')}}" class="black_icon" alt="" />
                    </div>

                    <input type="checkbox" name="" id="socialTiktok" disabled>
                    <label for="socialTiktok"></label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Youtube_Color.png')}}" class="color_icon" alt="" />
                        <img src="{{asset('images/Youtube_Black.png')}}" class="black_icon" alt="" />
                    </div>

                    <input type="checkbox" name="" id="socialYoutube" disabled>
                    <label for="socialYoutube"></label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Telegram_Color.png')}}" class="color_icon" alt="" />
                        <img src="{{asset('images/Telegram_Black.png')}}" class="black_icon" alt="" />
                    </div>

                    <input type="checkbox" name="" id="socialTelegram" disabled>
                    <label for="socialTelegram"></label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/WhatsApp_Color.png')}}" class="color_icon" alt="" />
                        <img src="{{asset('images/WhatsApp_Black.png')}}" class="black_icon" alt="" />
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
        <div class="modal-header">
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
<div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="detail_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detail_modalLabel">Post Detail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
            <form action="{{url('update_post')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group emoji_parent">
                        <textarea required name="content" id="emojiarea" cols="30" rows="3" class="form-control edit_content" placeholder="Write your post...">{{old('content')}}</textarea>
                    </div>

                    <div class="icon_buttons_tags d-flex">
                        <div class="icon_buttons grid_item">
                            <ul class='d-flex mb-0' style="list-style-type: none;">
                                <li style="width: 20%;">
                                    <a href="javascript:void(0)" class="image_or_video" typpe="image"><label for="image_or_video">
                                        <img src="{{asset('')}}images/Camera_Icon.png" class="img-fluid" alt=""/>
                                    </label>
                                    </a>
                                </li>
                                <li style="width: 20%;">
                                    <a href="javascript:void(0)" class="image_or_video" typpe="video"><label for="image_or_video">
                                        <img src="{{asset('')}}images/Video_Player_Icon.png" class="img-fluid" alt="" />
                                    </label>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <input type="file" name="media" class="image d-none" id="image_or_video" accept="image/*,video/*">
                        <input type="hidden" name="media_type" id="type_input">
                        <input type="hidden" name="timezone" class="timezone">
                        <input type="hidden" name="id" class="edit_id">

                        <div class="tags_input_wrap grid_item ml-auto">
                            <div class="tags_input">
                                <input required name="tag" type="text" class="form-control edit_tag" placeholder="#tags" value="{{old('tag')}}">
                            </div>
                        </div>
                    </div>

                    <div class="post_now_button">
                        <input type="submit" class="btn btn-primary post_now_btn" value="Post Now" style="text-align: end;margin-top: 4%;">
                    </div>




                </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
{{-- event edit modal --}}

{{-- myaccount modal --}}
<div class="modal fade" id="myaccounts_modal" tabindex="-1" aria-labelledby="myaccounts_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myaccounts_modalLabel">Connect Accounts</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

            <div class="modal-body">
                <form action="{{url('connect_to_facebook')}}" method="post">
                @csrf
                    <button class="btn btn-primary" type="submit"> <i class="fa fa-facebook-square mr-2"></i>Connect with Facebook</button><br>
                </form>

                <a class="btn btn-primary  mt-2" href="{{url('connect_to_instagram')}}"> <i class="fa fa-instagram mr-2"></i>Connect with Instagram</a><br>
                <a class="btn btn-primary  mt-2" href="{{url('connect_to_linkedin')}}"> <i class="fa fa-linkedin-square mr-2"></i>Connect with Linkedin</a><br>
                <a class="btn btn-primary  mt-2" href="{{url('connect_to_twitter')}}"> <i class="fa fa-twitter-square mr-2"></i>Connect with Twitter</a>
            </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
{{-- myaccount modal --}}

{{-- pages_modal --}}

<div class="modal fade" id="pages_modal" tabindex="-1" aria-labelledby="pages_modalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pages_modalLabel">Select Your Page To Post On</h5>
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

<div class="modal fade" id="instagram_pages_modal" tabindex="-1" aria-labelledby="pages_modalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pages_modalLabel">Select Your Page To Post On Connected Instagram Account</h5>
          <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
          <!--  <span aria-hidden="true">&times;</span>-->
          <!--</button>-->
        </div>
        <form action="{{url('set_page_for_instagram')}}" method="post">
            @csrf
            <div class="modal-body">

                <select required name="page" class="form-control">
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
                        </form></li>


                    </ul>
                </div>

                <div class="logo_wrap grid_item">
                    <div class="logo">
                        <a href="{{url('index')}}"><img src="{{asset('')}}images/YouPost_Logo.png" class="img-fluid" alt="" /></a>
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


<!--Bootstrap v4.5.3 JS File-->
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<!--Pignose Calendar JS File-->
<script type="text/javascript" src="{{asset('js/pignose.calendar.full.min.js')}}"></script>
<!--Full Calendar JS File-->
<script type="text/javascript" src="{{asset('js/index.global.min.js')}}"></script>
<!--SimpleChart JS File-->
<script type="text/javascript" src="{{asset('js/SimpleChart.js')}}"></script>

<script>
$(function() {
    $('.calendar').pignoseCalendar({
        select: function(date, context) {
        selectedDate = date; // store selected date value in variable
        settime();
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
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- toaster cdn --}}



<script>

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

    function get_detail(id)
    {
        $.ajax({
                type: "get",
                url: "{{ url('get_event_detail') }}",
                data: {
                    'id': id
                },
                success: function(response) {
                    $('.event_detail_parent').empty().append(response);
                    $('.fc-popover').css('display','none');
                    $('#detail_modal').modal('show');
                }
            });
    }

    // Initialize Full Calendar
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('postManagerCalendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            editable: true,
            selectable: true,
            businessHours: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: <?php echo json_encode($allPosts); ?>,
            eventClick: function(calEvent, jsEvent, view) {

                var id = calEvent.event._def.publicId;
                get_detail(id);

            },
            eventRender: function(info) {
                alert(1);
                var today = new Date().setHours(0, 0, 0, 0);
                var currentDay = info.date.setHours(0, 0, 0, 0);

                // Compare current day with today
                if (currentDay >= today) {
                    var plusIcon = $("<span>", {
                        class: "plus-icon",
                        text: "+"
                    });

                    // Append the plus icon to the day cell
                    $(info.el).append(plusIcon);
                }
            }

        });
        calendar.render();
    });

    $(document).on('click', '.plateform', function() {
        $('.plateform').prop('checked', false);
        $('.plateform').closest('.single_platform').removeClass('active_social');
        $(this).prop('checked', true);
        var all_plateform = $("input[name='plateform[]']:checked");
        var plateform_val = [];
        all_plateform.each(function() {
        plateform_val.push($(this).val());
        });
        $.ajax({
                type: "get",
                url: "{{ url('update_user_platforms') }}",
                data: {
                    'plateform_val': plateform_val
                },
                success: function(response) {

                },
                error: function(xhr, status, error) {
                    var errorData = JSON.parse(xhr.responseText);

                    if(errorData.message == 'fb_error')
                    {
                        $('#socialFB').prop('checked', false);
                        $('#socialFB').closest('.single_platform').removeClass('active_social');
                        toastr.error('Please Connect Your Facebook Account');
                    }else if(errorData.message == 'twiter_error')
                    {

                        $('#socialTwitter').prop('checked', false);
                        $('#socialTwitter').closest('.single_platform').removeClass('active_social');
                        toastr.error('Please Connect Your Twitter Account');
                    }else if(errorData.message == 'insta_error')
                    {
                        $('#socialInstagram').prop('checked', false);
                        $('#socialInstagram').closest('.single_platform').removeClass('active_social');

                        toastr.error('Please Connect Your instagram Account');
                    }
                    else if(errorData.message == 'linkedin_error')
                    {
                        $('#socialLinkedin').prop('checked', false);
                        $('#socialLinkedin').closest('.single_platform').removeClass('active_social');

                        toastr.error('Please Connect Your Linkedin Account');
                    }
                }
        });


    });
    $(document).on('click', '.edit_post', function() {

            $('#detail_modal').modal('hide');
            var tag=$(this).attr('data-tag');
            var contact=$(this).attr('data-contact');
            var id=$(this).attr('data-id');
            $('.edit_content').val(contact);
            $('.edit_tag').val(tag);

            $('.edit_id').val(id);

            $('#edit_modal').modal('show');
        });

</script>
<script>
    $(function () {
			$('#emojiarea').emoji({place: 'after'});
		});



        $( document ).ready(function() {
            var authuser = "{{auth()->user()}}";
            if(authuser != null)
            {
                var insta_access_token = "{{auth()->user()->insta_access_token}}";
                var insta_user_id = "{{auth()->user()->insta_user_id}}";
                var fb_access_token = "{{auth()->user()->fb_access_token}}";
                var fb_page_token = "{{auth()->user()->fb_page_token}}";

                if(insta_access_token != '' && insta_user_id == '')
                {
                    $('#instagram_pages_modal').modal('show');

                }else if(fb_access_token != '' && fb_page_token == ''){
                    $('#pages_modal').modal('show');
                }

            }

        });

</script>

</body>

</html>
