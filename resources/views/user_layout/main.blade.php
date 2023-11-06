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
    <!-- Full Calendar -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.1.0/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.1.0/main.min.js"></script> -->

    <!-- google_font_poppin -->

    <!-- google_font_poppin -->


    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <!-- style.css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive2.css')}}">
    <link rel="icon" href="{{asset('')}}images/favicon.png"/>
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}"/>
    <!--FontAwesome CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
          <link href="https://fonts.cdnfonts.com/css/arial" rel="stylesheet">

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
    {{-- -------------------------- --}}
    <link rel="stylesheet" href="{{asset('css/slider/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/slider/owl.theme.default.min.css')}}"/>
    {{-- -------------------------- --}}
    <!--Stylesheet For The Responsiveness-->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}"/>
    <script src="https://kit.fontawesome.com/4366d6f846.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

        /* sidebar */
        .sidebar:hover {
            z-index: 1;
        }

        /* sidebar */
        .select2-container {
            width: 100% !important;
        }
    </style>
</head>

<body>

@include('user_layout.sidebar')

<section class="home" style="background: var(--grayColor);">
    <section class="create_preview_post_wrap">
        <div class="container test_con  px-0">
            <!--===== Markup For "Header" Starts Here =====-->
            @include('user_layout.header')
            <!--===== Markup For "Header" Ends Here =====-->
            @yield('content')
            @include('user_layout.footer')
        </div>
    </section>
</section>

@include('user.component.modals')
<!--===== Markup For "Footer" Starts Here =====-->
<!--===== Markup For "Footer" Ends Here =====-->
<!--jQuery Main Libraty Latest Version-->

{{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}

<script src="{{asset('js/inputEmoji.js')}}"></script>
{{-- ------------------ --}}
<script src="{{asset('js/slider/owl.carousel.js')}}"></script>
{{-- ------------------ --}}

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

<


<script>
    var owl = $('.owl-carousel');
    var pignoseCalendar = null;
    $(function () {
        pignoseCalendar = $('.calendar').pignoseCalendar({
            select: function (date, context) {
                selectedDate = date;
                // store selected date value in variable
                settime();
                //$('#TimetoUploadPost').modal('show');
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
        $('.selectmultiple').select2({
            tags: true,
            placeholder: 'Add Tags',
            tokenSeparators: [',', ' ']
        });
        $('.selectmultiple1').select2({
            tags: true,
            placeholder: 'Add Tags',
            tokenSeparators: [',', ' ']
        });
        setTimeout(function () {
            videoThumnail();
        }, 100);
        $(document).on('click', '.fc-more', function () {
            videoThumnail();
        })
        var eventDates =@json(collect($allPosts)->pluck('event_date'));

        var calendar = $('#postManagerCalendar').fullCalendar({

            defaultView: 'month',
            selectable: true,
            businessHours: true,
            displayEventTime: true,
            eventLimit: true,
            schedulerLicenseKey: 'YOUR_LICENSE_KEY',
            dayMaxEvents: true,
            selectOverlap: false,
            allDay:true,
            slotDuration: '01:00',
            events: @json(collect($allPosts)),


            views: {
                month: {
                    eventLimit: 2,

                }

            },
            views: {
                agendaWeek: {
                    columnFormat: 'ddd\nD' ,
                    slotLabelFormat: [
                        'h A',
                        'h A',
                    ],
                }

            },


            header: {
                center: 'month,agendaWeek,timelineCustom,agendaDay,Year',
            },
            fixedWeekCount: false,
            contentHeight: 850,
            // salman new code calendar 7/9/23

            eventClick: function (event, jsEvent, view) {
                // var id = event.id;
                var date = event.event_date;
                get_detail(date);

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
                    }
                });
                $('#TimetoUploadPost').modal('show');
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

            viewRender: function (view, element) {
                // Get the active view name
                var activeView = view.type;

                // Remove active class from all tabs
                $('.calendar-tab').removeClass('active');

                // Add active class to the currently active tab
                $('.calendar-tab[data-view="' + activeView + '"]').addClass('active');

                $('#calendar').fullCalendar('changeView', 'agendaDay');

            }
        });

    });

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





    @if (Session::has('success'))
    toastr.success('{{ Session::get('success') }}');
    @endif
    @if (Session::has('error'))
    toastr.error('{{ Session::get('error') }}');
    @endif
    @if(Session::has('success-post'))
    $(document).ready(function () {
        setTimeout(function () {
            $('#postSuccessModal').modal('show')
        },1500)

    })
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

    function get_detail(date) {
        $.ajax({
            type: "get",
            url: "{{ url('get_event_detail') }}",
            data: {
                'date': date
            },
            success: function (response) {
                $('.event_detail_parent').empty().append(response);
                $('.calendarmain').empty().append(response);

                $('.fc-popover').css('display', 'none');
              
                $('.calendar2').css('padding-left', '29.8%');
               
                $(".calendar_overflo").css('left', '0');
                $(".Today-post-detail").hide();
            
                $('.calendar_overflo').css({
                'display': 'block','width':'29.8%'});

                // for sidebar show calendar

                // $('#detail_modal').modal('show');
                $('.post-detail-tab li:first-child').find('a').addClass('active mytabactive');
                $('.post-detail-tab-content div:first-child').addClass('show active');
                checkScreenSize();
            }
        });
    }
    var isSidebarVisible = false; // Initialize a flag to track sidebar visibility

    // Check the screen size and show/hide the sidebar button
    function checkScreenSize() {
        if ($("body").innerWidth() < 1550) {
            $(".sidebar-button").show();
            // $(".calendar_overflo").css('display', 'none');
            // $('.calendar2').css('padding-left', '0px');
        } else {
            $(".sidebar-button").hide();
            // $(".calendar_overflo").css('display', 'block');

        }
    }


    // Initialize Full Calendar


    $(document).on('click', '.plateform', function () {
      

        var account_id = $(this).data('account');
        var all_plateform = $("input[name='plateform[]']:checked");
        var plateform_val = [];
        all_plateform.each(function () {
            plateform_val.push($(this).val());
        });
        $.ajax({
            type: "get",
            url: "{{ url('update_user_platforms') }}",
            data: {
                'plateform_val': plateform_val,
                'account_id': account_id
            },
            success: function (response) {
                window.location.reload();
            },
            error: function (xhr, status, error) {
                var errorData = JSON.parse(xhr.responseText);

                if (errorData.message == 'fb_error') {
                    $('#socialFB').prop('checked', false);
                    $('#socialFB').closest('.single_platform').removeClass('active_social');
                    toastr.error(`Please Connect Your Facebook Account.
                    <div class="MDLsocial-icon">
                                <a class="" href="{{url('connect_to_facebook')}}" style="background:#3b5998 !important">
                                    <i class="fa fa-facebook-square me-2"></i> <span> Connect with Facebook</span> </a>
                            </div>

                    `);
                } else if (errorData.message == 'twiter_error') {

                    $('#socialTwitter').prop('checked', false);
                    $('#socialTwitter').closest('.single_platform').removeClass('active_social');
                    toastr.error(`Please Connect Your X Account
                     <div class="MDLsocial-icon" style="background-color: #343434 !important;">
                            <div class="twitter_error">

                                        <a class="" href="{{url('connect_twitter')}}">
                                        <img src="{{asset('images/Twitter_Color.png')}}" class="me-2" alt="" height="14"/>Connect with X</a>
                            </div>
                     </div>
                    `);
                } else if (errorData.message == 'insta_error') {
                    $('#socialInstagram').prop('checked', false);
                    $('#socialInstagram').closest('.single_platform').removeClass('active_social');

                    toastr.error(`Please Connect Your instagram Account
                     <div class="MDLsocial-icon" style="background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%) !important;">
                                <a class="" href="{{url('connect_to_instagram')}}">
                                    <i class="fa fa-instagram me-2"></i>Connect with Instagram</a>
                            </div>

                    `);
                } else if (errorData.message == 'linkedin_error') {
                    $('#socialLinkedin').prop('checked', false);
                    $('#socialLinkedin').closest('.single_platform').removeClass('active_social');

                    toastr.error(`Please Connect Your Linkedin Account
                     <div class="MDLsocial-icon" style="background-color: #0072b1 !important;">
                                <a class="" href="{{url('connect_to_linkedin')}}">
                                    <i class="fa fa-linkedin-square me-2"></i>Connect with Linkedin</a>
                            </div>
                    `);
                }
            }
        });


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
        $("#facebook_content").attr("attr_of_text_area", "fb");
        $("#instagram_content").attr("attr_of_text_area", "insta");
        $("#twitter_content").attr("attr_of_text_area", "twitter");
        $("#linkedin_content").attr("attr_of_text_area", "linkedin");
        $("#youpost_content").attr("attr_of_text_area", "youpost");


    });


</script>


<script>
        function getString($val){

        const colors = ['blue'];
        var ne_va ="";
        var selectedString = "";

            if ($val) {
                $.each($val, function(index, value) {
                            selectedString += " #";
                            selectedString += value;
                           });

            }

            return ne_va =  selectedString;


      }

      function updatePreview_And_textArea(inputText,textareaAttr, existingTextFB) {




                if (textareaAttr === 'youpost') {

                var updatedText_fb =  existingTextFB +inputText ;




                $("#facebook_content").val(updatedText_fb);
            }






            }


            function updateDiv_other($obj) {

                   var inputText = $($obj).val();
                    $("#mypostresult_fb").empty().append(inputText);
                    $("#mypostresult_insta").empty().append(inputText);
                    $("#mypostresult_twitter").empty().append(inputText);
                    $("#mypostresult_linkedin").empty().append(inputText);


                    $("#facebook_content, #instagram_content, #twitter_content, #linkedin_content").val('');
                    $("#facebook_content, #instagram_content, #twitter_content, #linkedin_content").val(inputText);

                }

            function updateDiv($obj) {
                var textareaAttr = $($obj).attr("attr_of_text_area");
                var inputText = $($obj).val();
                var lart= inputText.slice(-1);
                if(lart.trim() == ''){
                       return;
                }


                if (textareaAttr == 'youpost') {
                    $("#mypostresult_youpost").empty().append(inputText);

                }else if (textareaAttr == 'fb') {

                var selectedValues = $('#facebook_tag').val();
                var new_str= getString(selectedValues);
                $("#mypostresult_fb").empty().append(inputText) ;
                $("#mynameresult").empty().append(new_str) ;

          }else if(textareaAttr == 'insta'){

            var selectedValues = $('#instagram_tag').val();
            var new_str= getString(selectedValues);
             $("#mypostresult_insta").empty().append(inputText) ;
               $("#mynameresult_insta").empty().append(new_str) ;

          }else if(textareaAttr == 'twitter'){

            var selectedValues = $('#twitter_tag').val();
            var new_str= getString(selectedValues);

            $("#mypostresult_twitter").empty().append(inputText) ;
               $("#mynameresult_twitter").empty().append(new_str) ;

          }else if(textareaAttr == 'linkedin'){

            var selectedValues = $('#linkedin_tag').val();
            var new_str= getString(selectedValues);

            $("#mypostresult_linkedin").empty().append(inputText) ;
               $("#mynameresult_linkedin").empty().append(new_str) ;
          }
        }

    function Namechangefun($obj) {
        var inputText = $($obj).val();
        document.getElementById("mynameresult").textContent = inputText;
    }

    function suggested_text($obj) {

        $('.loader').removeClass('d-none');
        var contentData = $($obj).val();

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
                $('.loader').addClass('d-none');
                $('#gpt_content').html(result['content']);
                $('#gpt_tags').html(result['tags']);
                $('.AIgeneratedCarousel').empty();
                for (let i = 0; i < result['images'].length; i++) {
                    $('.AIgeneratedCarousel').append(`

                     <div class="item">
                                            <div class="itemCnt">
                                                <div class="itemCntImg">
                                                    <img src="data:image/png;base64,${result['images'][i]['base64']}" class="img-fluid" alt="">
                                                </div>
                                                <div class="itemCntPlusWrp">
                                                    <i class="fa-solid fa-plus itemCntPlus"></i>
                                                </div>
                                            </div>
                                        </div>

                    `);
                }
                owl.trigger('destroy.owl.carousel');
                $('.owl-carousel').owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: true,
                    dots: false,
                    onTranslated: setActiveItem,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 2
                        }
                    }
                });

            }
        });

    }
    // for facebook

    $('.selectmultiple1').change(function () {

        var selectid = $(this).attr("id");
        var selectedValues = $(this).val();
        var selectedString = "";

        if (selectedValues) {
            $.each(selectedValues, function(index, value) {
                        selectedString += " #";
                        selectedString += value;
                    });
            if (selectid == 'facebook_tag') {


                var tex_cont= $('#facebook_content').val();
                // var new_cont= tex_cont +  selectedString;
               $("#mypostresult_fb").empty().append(tex_cont) ;
               $("#mynameresult").empty().append(selectedString) ;
             }
         }

    });

    $('.selectmultiple').change(function () {

        var selectid = $(this).attr("id");
        var selectedValues = $(this).val();
        var selectedString = "";

    if (selectedValues) {

    $.each(selectedValues, function(index, value) {
                selectedString += " #";
                selectedString += value;
            });

          if (selectid == 'instagram_tag') {

            var tex_cont= $('#instagram_content').val();

                $("#mypostresult_insta").empty().append(tex_cont) ;
               $("#mynameresult_insta").empty().append(selectedString) ;



          }else if (selectid == 'twitter_tag') {

            var tex_cont= $('#twitter_content').val();

                $("#mypostresult_twitter").empty().append(tex_cont) ;
               $("#mynameresult_twitter").empty().append(selectedString) ;

          }else  if (selectid == 'linkedin_tag') {
            var tex_cont= $('#linkedin_content').val();

                $("#mypostresult_linkedin").empty().append(tex_cont) ;
               $("#mynameresult_linkedin").empty().append(selectedString) ;
          }

}

});

    $('.save_prompt').click(function () {
        var obj = $('.edit_promotedtext');
        suggested_text(obj);
        $('#edit_prompt').modal('hide');
    });

</script>
<script>
    const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle"),
        searchBtn = body.querySelector(".search-box"),
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");


    toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    })

    searchBtn.addEventListener("click", () => {
        sidebar.classList.remove("close");
    })

    modeSwitch.addEventListener("click", () => {
        body.classList.toggle("dark");

        if (body.classList.contains("dark")) {
            modeText.innerText = "Light mode";
        } else {
            modeText.innerText = "Dark mode";

        }
    });
</script>

<!-- <script>

    function draw() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      };
       document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      initialDate: '2023-07-07',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      events: [
        {
          title: 'All Day Event',
          start: '2023-07-01'
        },
        {
          title: 'Long Event',
          start: '2023-07-07',
          end: '2023-07-10'
        },
        {
          groupId: '999',
          title: 'Repeating Event',
          start: '2023-07-09T16:00:00'
        },
        {
          groupId: '999',
          title: 'Repeating Event',
          start: '2023-07-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2023-07-11',
          end: '2023-07-13'
        },
        {
          title: 'Meeting',
          start: '2023-07-12T10:30:00',
          end: '2023-07-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2023-07-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2023-07-12T14:30:00'
        },
        {
          title: 'Birthday Party',
          start: '2023-07-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'https://google.com/',
          start: '2023-07-28'
        }
      ]
    });

    calendar.render();
  });

</script> -->


@yield('js')
</body>

</html>
