// (1) when page is loading
$(document).ready(function () {
    $(".single_platform").each(function (index) {
        if ($(this).find('input[type="checkbox"]').is(':checked')) {
            $(this).addClass('active_social');
        }
    });
});



//(2) change it later while user will click something on my list.
$(document).on('change', ".single_platform input[type=checkbox]", function () {
    $(this).parent().toggleClass('active_social');
});

// Initialize Pignose Calendar
var selectedDate = new Date();

function settime() {
    // var select_time = $('.select_time').val();
    // var hours = parseInt(select_time.split(':')[0]); // extract hours from custom time string
    // var minutes = parseInt(select_time.split(':')[1]); // extract minutes from custom time string


    var selectedHour = $('#hour').val();
    var selectedMinute = $('#minute').val();
    var ampm = $('#ampm').val();


    // var ampm = selectedDate.getHours() >= 12 ? 'PM' : 'AM';


    var hours = parseInt(selectedHour);
    var minutes = parseInt(selectedMinute);


    var new_date_time = new Date(selectedDate);
    new_date_time.setHours(hours, minutes)

    var formattedDateTime = formatDateTime(new_date_time, ampm);

    // new_date_time = new Date(new_date_time);



    $('#browsertime').text(formattedDateTime);
    $('#browsertime2').text(formattedDateTime);
    $('.browsertimeinput').val(formattedDateTime);
    $('.posttime').val('later');
}


function formatDateTime(date, ampm) {
    var month = date.getMonth() + 1; // Months are zero-based, so add 1
    var day = date.getDate();
    var year = date.getFullYear();
    var hours = date.getHours();
    var minutes = date.getMinutes();

    // Convert hours to 12-hour format and handle 12 AM/PM cases
    hours = hours % 12;
    hours = hours || 12; // Handle 0 hours (midnight)

    // Ensure minutes are displayed with leading zeros
    var formattedDateTime = month + '/' + day + '/' + year + ', ' + hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0') + ' ' + ampm;

    return formattedDateTime;
}

var graphdata1 = {
    linecolor: "#000000",
    title: "TikTok",
    values: [
        { X: "6:00", Y: 10.00 },
        { X: "7:00", Y: 20.00 },
        { X: "8:00", Y: 500.00 },
        { X: "9:00", Y: 34.00 },
        { X: "10:00", Y: 40.25 },
        { X: "11:00", Y: 28.56 },
        { X: "12:00", Y: 18.57 },
        { X: "13:00", Y: 34.00 },
        { X: "14:00", Y: 40.89 },
        { X: "15:00", Y: 12.57 },
        { X: "16:00", Y: 28.24 },
        { X: "17:00", Y: 18.00 },
        { X: "18:00", Y: 34.24 },
        { X: "19:00", Y: 40.58 },
        { X: "20:00", Y: 12.54 },
        { X: "21:00", Y: 28.00 },
        { X: "22:00", Y: 18.00 },
        { X: "23:00", Y: 34.89 },
        { X: "0:00", Y: 40.26 },
        { X: "1:00", Y: 28.89 },
        { X: "2:00", Y: 18.87 },
        { X: "3:00", Y: 34.00 },
        { X: "4:00", Y: 40.00 }
    ]
};
var graphdata2 = {
    linecolor: "#CF2872",
    title: "Instagram",
    values: [
        { X: "6:00", Y: 100.00 },
        { X: "7:00", Y: 120.00 },
        { X: "8:00", Y: 140.00 },
        { X: "9:00", Y: 134.00 },
        { X: "10:00", Y: 140.25 },
        { X: "11:00", Y: 128.56 },
        { X: "12:00", Y: 118.57 },
        { X: "13:00", Y: 134.00 },
        { X: "14:00", Y: 140.89 },
        { X: "15:00", Y: 112.57 },
        { X: "16:00", Y: 128.24 },
        { X: "17:00", Y: 118.00 },
        { X: "18:00", Y: 134.24 },
        { X: "19:00", Y: 140.58 },
        { X: "20:00", Y: 112.54 },
        { X: "21:00", Y: 128.00 },
        { X: "22:00", Y: 118.00 },
        { X: "23:00", Y: 134.89 },
        { X: "0:00", Y: 140.26 },
        { X: "1:00", Y: 128.89 },
        { X: "2:00", Y: 118.87 },
        { X: "3:00", Y: 134.00 },
        { X: "4:00", Y: 180.00 }
    ]
};
var graphdata3 = {
    linecolor: "#26C6DA",
    title: "Twitter",
    values: [
        { X: "5:00", Y: 230.00 },
        { X: "10:00", Y: 210.00 },
        { X: "15:00", Y: 214.00 },
        { X: "9:00", Y: 234.00 },
        { X: "10:00", Y: 247.25 },
        { X: "11:00", Y: 218.56 },
        { X: "12:00", Y: 268.57 },
        { X: "13:00", Y: 274.00 },
        { X: "14:00", Y: 280.89 },
        { X: "15:00", Y: 242.57 },
        { X: "16:00", Y: 298.24 },
        { X: "17:00", Y: 208.00 },
        { X: "18:00", Y: 214.24 },
        { X: "19:00", Y: 214.58 },
        { X: "20:00", Y: 211.54 },
        { X: "21:00", Y: 248.00 },
        { X: "22:00", Y: 258.00 },
        { X: "23:00", Y: 234.89 },
        { X: "0:00", Y: 210.26 },
        { X: "1:00", Y: 248.89 },
        { X: "2:00", Y: 238.87 },
        { X: "3:00", Y: 264.00 },
        { X: "4:00", Y: 270.00 }
    ]
};
var graphdata4 = {
    linecolor: "#1976D2",
    title: "Facebook",
    values: [
        { X: "6:00", Y: 300.00 },
        { X: "7:00", Y: 410.98 },
        { X: "8:00", Y: 310.00 },
        { X: "9:00", Y: 314.00 },
        { X: "10:00", Y: 310.25 },
        { X: "11:00", Y: 318.56 },
        { X: "12:00", Y: 318.57 },
        { X: "13:00", Y: 314.00 },
        { X: "14:00", Y: 310.89 },
        { X: "15:00", Y: 512.57 },
        { X: "16:00", Y: 318.24 },
        { X: "17:00", Y: 318.00 },
        { X: "18:00", Y: 314.24 },
        { X: "19:00", Y: 310.58 },
        { X: "20:00", Y: 312.54 },
        { X: "21:00", Y: 318.00 },
        { X: "22:00", Y: 318.00 },
        { X: "23:00", Y: 314.89 },
        { X: "0:00", Y: 310.26 },
        { X: "1:00", Y: 318.89 },
        { X: "2:00", Y: 518.87 },
        { X: "3:00", Y: 314.00 },
        { X: "4:00", Y: 310.00 }
    ]
};

$(function () {
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

$('#shares_tab').on("shown.bs.tab", function () {
    $(function () {
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

$('#rePosted_tab').on("shown.bs.tab", function () {
    $(function () {
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

$('#comments_tab').on("shown.bs.tab", function () {
    $(function () {
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

$('#favorited_tab').on("shown.bs.tab", function () {
    $(function () {
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

$('#friendsFollow_tab').on("shown.bs.tab", function () {
    $(function () {
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

$(document).ready(function () {
    // $(document).on('click', '.calendar .pignose-calendar-row div', function() {
    // $(".calendar .pignose-calendar-unit").on("click", function(){
    //     if($(this).hasClass('pignose-calendar-unit-active'))
    //     {
    //       //  $('#timeModal').modal('show');
    //     }
    // });

    // set current time


    // Attach a click event handler to the cancel button
    //  $('#cancelButton').on('click', function() {

    //     const now_time = new Date();
    //     const current_hours = now_time.getHours() > 12 ? (now_time.getHours() - 12).toString().padStart(2, '0') : now_time.getHours().toString().padStart(2, '0');
    //     const current_minutes = now_time.getMinutes().toString().padStart(2, '0');
    //     $('#hour').val(`${current_hours}`);
    //     $('#minute').val(`${current_minutes}`);
    //     const ampm = now_time.getHours() >= 12 ? 'PM' : 'AM';
    //      $('#ampm').val(ampm);
    //      apend_current_time();
    //     $('#TimetoUploadPost').modal('hide');
    // });


    // $('#TimetoUploadPost').on('hide.bs.modal', function (e) {


    //          const now_time = new Date();
    //     const current_hours = now_time.getHours() > 12 ? (now_time.getHours() - 12).toString().padStart(2, '0') : now_time.getHours().toString().padStart(2, '0');
    //     const current_minutes = now_time.getMinutes().toString().padStart(2, '0');
    //     $('#hour').val(`${current_hours}`);
    //     $('#minute').val(`${current_minutes}`);
    //     const ampm = now_time.getHours() >= 12 ? 'PM' : 'AM';
    //      $('#ampm').val(ampm);
    //      apend_current_time();


    // });

    const now_time = new Date();
    // const current_hours = now_time.getHours().toString().padStart(2, '0'); // add leading zero if necessary
    const current_hours = now_time.getHours() > 12 ? (now_time.getHours() - 12).toString().padStart(2, '0') : now_time.getHours().toString().padStart(2, '0');
    const current_minutes = now_time.getMinutes().toString().padStart(2, '0'); // add leading zero if necessary
    // $('.select_time').val(`${current_hours}:${current_minutes}`);

    $('#hour').val(`${current_hours}`);
    $('#minute').val(`${current_minutes}`);
    const ampm = now_time.getHours() >= 12 ? 'PM' : 'AM';
    $('#ampm').val(ampm);

    // set current time

    // set curent date and time
    function apend_current_time() {
        const now = new Date();
        const browserTime = new Intl.DateTimeFormat('en-US', {
            year: 'numeric', month: 'numeric',
            day: 'numeric', hour: 'numeric',
            minute: 'numeric', hour12: true
        }).format(now);

        $('#browsertime').text(browserTime);
        $('#browsertime2').text(browserTime);
        $('.browsertimeinput').val(browserTime);
    }

    apend_current_time();
    // set curent date and time

    $(document).on('change', '.select_time', function () {
        settime();
    });
    $(document).on('click', '.post_now_btn', function () {

        $('.posttime').val('now');
        apend_current_time();

    });
    $(document).on('click', '.post_later_now_btn', function () {

        $('.posttime').val('later');
        //apend_current_time();
        $('#TimetoUploadPost').modal('hide');
    });


    //
    $(document).ready(function () {
        // Add input event listeners to input fields
        $("#facebook_content, #instagram_content, #twitter_content, #linkedin_content").on('input', function () {
            var error_input = $('#file_error_all');
            var data_id = $(this).attr('data-id');
            var error_data_id = $('#file_error_all').attr('data-id');
            if (data_id == error_data_id) {
                error_input.addClass('d-none');
            }
        });

        // Add input event listener to image input field
        $("#image_or_video_insta").on('input', function () {
            var error_input = $('#file_error_all');
            // Check if a file is selected, and if so, hide the error message
            if (this.files.length > 0) {
                error_input.addClass('d-none');
            }
        });

        $("#post_form").submit(function (event) {
            event.preventDefault();
            $("#posted_now").prop("disabled", true);
            var facebook_content = $("#facebook_content").val();
            var instagram_content = $("#instagram_content").val();
            var twitter_content = $("#twitter_content").val();
            var linkedin_content = $("#linkedin_content").val();
            // var image_or_video_insta_file = $("#image_or_video_insta")[0];
            var imgElement = $('#image_div_ins img');
           var vidLen= $('#image_div_ins').find('.cross_img_con_video ').length;

            imgElement.length

            var data_id = "";
            var error_input = '';

            if ($("li[section='fb']").length > 0 && facebook_content === "") {
                error_input = "Facebook content can not be empty";
                data_id = "facebok_error";
            } else if ($("li[section='insta']").length > 0 && (instagram_content === "" ||(imgElement.length <= 0  && vidLen <= 0 ))) {

                error_input = "Insta content and image can not be empty";
                data_id = "insta_error";
            } else if ($("li[section='twitter']").length > 0 && twitter_content === "") {
                error_input = "Twitter content can not be empty";
                data_id = "twitter_error";
            } else if ($("li[section='linkedin']").length > 0 && linkedin_content === "") {
                error_input = "Linkedin content can not be empty";
                data_id = "link_error";
            }

            if (error_input !== "") {
                $('#file_error_all').removeClass('d-none').text(error_input);
                $('#file_error_all').attr('data-id', data_id);
                setTimeout(function () {
                $("#posted_now").prop("disabled", false);
                }, 500);
            } else {

                $('#file_error_all').addClass('d-none');
                $('.uplaod-gif-video').removeClass('d-none');
                setTimeout(function () {
                    $("#posted_now").prop("disabled", false);
                    }, 1000);
                $(this).unbind('submit').submit();



            }
        });
    });


    //

    $(document).on('click', '.open_emoji', function () {
        $('.emoji_parent > span').click();

    });




    $(document).ready(function () {
        $('.emoji_parent div span').on('click', function () {

            var parentDiv = $(this).closest('.emoji_parent').find('textarea').attr('id');
            var emoji = $(this).text();

            if (parentDiv == 'youpost_content') {

                $('#' + parentDiv).trigger('keyup');

                $("#mypostresult_fb").append(emoji);
                $("#mypostresult_insta").append(emoji);
                $("#mypostresult_twitter").append(emoji);
                $("#mypostresult_linkedin").append(emoji);

                var textareaIds = ['#facebook_content', '#instagram_content', '#twitter_content', '#linkedin_content'];

                // Loop through the textarea IDs and append the emoji to their content
                textareaIds.forEach(function (textareaId) {
                    var currentContent = $(textareaId).val();
                    var updatedContent = currentContent + emoji;
                    $(textareaId).val(updatedContent);
                });

            } else {

                $('#' + parentDiv).trigger('keyup');
            }


        });
    });

    $(document).on('click', '.myaccounts', function () {
        $('#myaccounts_modal').modal('show');
    });

    $(document).on('click', '.image_or_video_youpost_all', function () {


        if ($(this).attr('typpe') == 'image') {
            $('#image_or_videofb').attr('accept', 'image/*');
            $('#image_or_video_insta').attr('accept', 'image/*');
            $('#image_or_video_linkedin').attr('accept', 'image/*');
            $('#' + $(this).attr('fordata')).attr('accept', 'image/*');
        } else {
            $('#image_or_videofb').attr('accept', 'video/*');
            $('#image_or_video_insta').attr('accept', 'video/*');
            $('#image_or_video_linkedin').attr('accept', 'video/*');
            $('#' + $(this).attr('fordata')).attr('accept', 'video/*');
        }

    });






    $(document).on('click', '.image_or_video', function () {


        if ($(this).attr('typpe') == 'image') {
            $('#' + $(this).attr('fordata')).attr('accept', 'image/*');
        } else {
            $('#' + $(this).attr('fordata')).attr('accept', 'video/*');
        }

    });
    // my code
    $(document).on('click', '.image_or_video_div', function () {

        if ($(this).attr('social') == 'fb') {
            // $('#image_div').toggleClass('d-none');

        } else if ($(this).attr('social') == 'insta') {

            // $('#image_div_ins').toggleClass('d-none');

        } else if ($(this).attr('social') == 'linkedin') {

            // $('#image_div_linked').toggleClass('d-none');
        }


    });


    $(document).on("click", ".cancel_mark", function () {
        var randomDelay = Math.floor(Math.random() * (5000 - 700 + 1)) + 700; // Random delay between 1 and 5 seconds
        setTimeout(function() {
            var columnCount = $('.Preview_ImagesSetup').css('column-count');

            if (columnCount === '1') {
                $('.mobile_post_img').addClass('SetUp_PreviewImg');
            }else{
                $('.mobile_post_img').removeClass('SetUp_PreviewImg');
            }
        }, randomDelay);

        setTimeout(function() {
            var columnCount = $('.Preview_ImagesSetupFB').css('column-count');
            if (columnCount === '1') {
                $('.mobile_post_img, .mobile_post_img_link, .mobile_post_img_tw').addClass('SetUp_PreviewImg');
            } else {
                $('.mobile_post_img, .mobile_post_img_link, .mobile_post_img_tw').removeClass('SetUp_PreviewImg');
            }
        }, randomDelay);
        setTimeout(function() {
            var columnCount = $('.Preview_ImagesSetupTwitter').css('column-count');
            if (columnCount === '1') {
                $('.mobile_post_img_tw').addClass('SetUp_PreviewImg');
            } else {
                $('.mobile_post_img_tw').removeClass('SetUp_PreviewImg');
            }
        }, randomDelay);
        setTimeout(function() {
            var columnCount = $('.Preview_ImagesSetupLinkedin').css('column-count');
            if (columnCount === '1') {
                $('.mobile_post_img_link').addClass('SetUp_PreviewImg');
            } else {
                $('.mobile_post_img_link').removeClass('SetUp_PreviewImg');
            }
        }, randomDelay);
        var id = $(this).attr('id');
        $(this).closest(".create_preview_post").find('.' + id).remove();
        var length = $('.mobile_post_img').length;
        var gran_par = $(this).closest(".create_preview_post");

        var id_of_div = $(this).closest(".sm_container").find('input[type=hidden]:first').attr('id');
        var socialicon = $(this).closest(".sm_container").find('input[type=file]:first').attr('id');

        if (socialicon == 'image_or_video_youpost') {
            var remove = $(this).closest('.cross_img_con').data('remove');
            $('.' + remove).remove();
        } else {
            $(this).closest('.cross_img_con').remove();
        }

        var parent = $(this).parent().parent();
        var img = parent.find("img");
        var len = img.length;

        if (len <= 0) {
            if (id_of_div == 'media_type_fb') {
                $('#media_type_fb').val('');
                $('.prv_div').html('');

            } else if (id_of_div == 'media_type_insta') {
                $('#media_type_insta').val('');
                $('.prv_div_isnt').html('');

            } else if (id_of_div == 'media_type_linkedin') {
                $('#media_type_linkedin').val('');
                $('.prv_div_link').html('');
            } else if (id_of_div == 'media_type_twitter') {
                $('#media_type_twitter').val('');
                $('.prv_div_tw').html('');
            }else if (id_of_div == 'media_type_youpost') {
                   $('#media_type_youpost').val('');
                    $('#youpost_video').val('');

                    $('#media_type_fb').val('');
                    $('#fb_video').val('');

                    $('#media_type_insta').val('');
                    $('#inst_video').val('');

                    $('#media_type_twitter').val('');
                    $('#twitter_video' ).val('');

                    $('#media_type_linkedin').val('');
                    $('#link_video').val('');
            }

        }

        if (socialicon == 'image_or_video_youpost') {

            var ids = ['image_or_video_youpost', 'image_or_videofb', 'image_or_video_insta', 'image_or_video_linkedin', 'image_or_video_twiter'];
            ids.forEach(function (socialicon) {
                setPreview(socialicon);
            });
        } else {
            setPreview(socialicon);
        }
    });



    $(document).on("click", ".cancel_mark_video", function () {

        var id = $(this).attr('id');

        var id_of_div = $(this).closest(".sm_container").find('input[type=hidden]:first').attr('id');
        var socialicon = $(this).closest(".sm_container").find('input[type=file]:first').attr('id');

        if (socialicon == 'image_or_video_youpost') {

            $('#media_type_youpost').val('');
            $('#youpost_video').val('');

            $('#media_type_fb').val('');
            $('#fb_video').val('');

            $('#media_type_insta').val('');
            $('#inst_video').val('');

            $('#media_type_twitter').val('');
            $('#twitter_video' ).val('');

            $('#media_type_linkedin').val('');
            $('#link_video').val('');

            $(this).closest(".create_preview_post").find('.' + id).remove();
            var ids = ['image_or_video_youpost', 'image_or_videofb', 'image_or_video_insta', 'image_or_video_linkedin', 'image_or_video_twiter'];
            ids.forEach(function (socialicon) {
                setPreview(socialicon);
            });

        } else {
            $(this).closest(".sm_container").find('.' + id).remove();
            $(this).closest(".sm_container").find('input[type=hidden]').val('');
            setPreview(socialicon);
        }

    });


    // validation  ********************************** ********************************* validation//
    function validateDimenstionImage(file, socialicon) {


            $("#posted_now").prop("disabled", true);


        if (socialicon == 'image_or_videofb') {
            appendImage(file, socialicon, true);
        } else {
            var response = true;
            img = new Image();
            img.onload = function () {
                imgwidh = this.width;
                imgheight = this.height;

                var aspectRatio = (imgwidh / imgheight).toFixed(2);
                var fourByfive = (4 / 5).toFixed(2);
                var sixteenBynine = (16 / 9).toFixed(2);


                if ((aspectRatio != fourByfive && aspectRatio != sixteenBynine)) {
                    appendImage(file, socialicon, false);
                    // toastr.error("Can't post image required 4:5 or 16:9 ratio image.", 'Sorry', {timeOut: 5000})
                    // response = false;
                } else {
                    appendImage(file, socialicon, true);
                }
            };

            img.src = _URL.createObjectURL(file);
        }
    }

    function validateDimenstionVideo(file, socialicon) {

        $("#posted_now").prop("disabled", true);

        if (socialicon == 'image_or_videofb') {
            appendVideo(file, socialicon);
        } else {
            var videoEl = document.createElement("video");
            videoEl.onloadedmetadata = event => {
                window.URL.revokeObjectURL(videoEl.src);
                var { name, type } = file;

                var { videoWidth, videoHeight } = videoEl;

                var aspectRatio = (videoWidth / videoHeight).toFixed(2);


                var fourByfive = (4 / 5).toFixed(2);

                var sixteenBynine = (16 / 9).toFixed(2);


                if ((aspectRatio != fourByfive && aspectRatio != sixteenBynine)) {

                    toastr.error("Can't post video required 4:5 or 16:9 ratio video.", 'Sorry', { timeOut: 5000 })
                    return false;
                } else {

                    appendVideo(file, socialicon);

                }

            };

            videoEl.src = window.URL.createObjectURL(file);
        }
    }

    function validateFileImageVideo(file, socialicon) {


        var file, img, imgwidh, imgheight;
        var file_size = file.size;
        var ext = file.type;
        ext = String(ext).split('/');
        ext = ext[1];
        var mediaType = file.type.split('/')[0];

        var response = true;
        if (mediaType === 'image') {



            if (file_size >= 8000000) {
                toastr.error('size should be less than 8MB.', 'Image', { timeOut: 5000 })
                response = false;
            }
            if ((ext != 'png') && (ext != 'jpeg') && (ext != 'gif') && (ext != 'jpg')) {
                toastr.error('type should be jpeg,jpg,png,gif.', 'Image', { timeOut: 5000 })
                response = false;
            }

            if (response) {
                validateDimenstionImage(file, socialicon);
            }
        } else if (mediaType === 'video') {
            var total_size = getMB(file_size);
            if (total_size > 4) {
                toastr.error('size should be less than 4MB.', 'Video', { timeOut: 5000 })
                response = false;
            }


            if (response) {
                validateDimenstionVideo(file, socialicon);
            }
        }
        //************************** Video Validatoin End *********************************
        //**************************Appedn to all using youpot div ***********************
    }
    function appendtoall(file, dimention, dimention_error, getRandomClass) {

        var getRandomID = getRandomClassName();

        var img_con = `<div class="cross_img_con  ${getRandomClass}" id="remove_id" data-remove="${getRandomClass}" >
        <img name='image/*' id="teting" src="${file}"/>
         <a href="javascript:void(0);" id='cnad'> <i class='fa-solid fa-xmark cancel_mark' id="${getRandomID}"></i></a>
         <textarea id="removeit_file_id" name=youpost_image[] class="removeit_file d-none"></textarea>
         <img class="uplaod-gif" src="images/newimages/loader.gif" alt="">
         </div>`;
        $("#image_or_video_youpost").parent().append(img_con);
        $('#media_type_youpost').val('image');
        if (!dimention) {

            $('#file_error_youpost').removeClass('d-none').text(dimention_error)
        }
        else {

            $('#file_error_youpost').addClass('d-none')
        }
        var img_con = `<div class=" cross_img_con  ${getRandomClass}" id="remove_id" data-div="${getRandomClass}">
        <img name='image/*' id="teting" src="${file}"/>
         <a href="javascript:void(0);" id='cnad'> <i class='fa-solid fa-xmark cancel_mark' id="${getRandomID}"></i></a>
         <textarea id="removeit_file_id" name=fb_image[] class="removeit_file d-none"></textarea>
         <img class="uplaod-gif" src="images/newimages/loader.gif" alt="">
         </div>`;
        $("#image_or_videofb").parent().append(img_con);
        $('#media_type_fb').val('image');
        if (!dimention) {

            $('#file_error_fb').removeClass('d-none').text(dimention_error)
        }
        else {

            $('#file_error_fb').addClass('d-none')
        }

        var img_con_ins = `<div class="cross_img_con ${getRandomClass}" id="remove_id" data-div="${getRandomClass}">
                          <img name='image/*' id="teting" src="${file}"/>
                          <a href="javascript:void(0);" id='cnad'> <i class='fa-solid fa-xmark cancel_mark' id="${getRandomID}"></i></a>
                          <textarea id="removeit_file_id" name=inst_image[] class="removeit_file d-none"></textarea>
                             <img class="uplaod-gif" src="images/newimages/loader.gif" alt="">
                          </div>`;
        $("#image_or_video_insta").parent().append(img_con_ins);
        $('#media_type_insta').val('image');
        if (!dimention) {
            $('#file_error_insta').removeClass('d-none').text(dimention_error)
        } else {
            $('#file_error_insta').addClass('d-none')
        }
        var img_con_lin = `<div class=" cross_img_con  ${getRandomClass}" id="remove_id" data-div="${getRandomClass}">
                      <img name='image/*' id="teting" src="${file}"/>
                         <a href="javascript:void(0);" id='cnad'> <i class='fa-solid fa-xmark cancel_mark' id="${getRandomID}"></i></a>
                           <textarea id="removeit_file_id" name=lin_image[] class="removeit_file d-none">}</textarea>
                             <img class="uplaod-gif" src="images/newimages/loader.gif" alt="">
                                </div>`;
        $("#image_or_video_linkedin").parent().append(img_con_lin);
        $('#media_type_linkedin').val('image');
        if (!dimention) {
            $('#file_error_linkedin').removeClass('d-none').text(dimention_error)
        } else {
            $('#file_error_linkedin').addClass('d-none')
        }

        var img_con_tw = `<div class=" cross_img_con  ${getRandomClass}" id="remove_id" data-div="${getRandomClass}">
                           <img name='image/*' id="teting" src="${file}"/>
                             <a href="javascript:void(0);" id='cnad'> <i class='fa-solid fa-xmark cancel_mark' id="${getRandomID}"></i></a>
                             <textarea id="removeit_file_id" name=tw_image[] class="removeit_file d-none">}</textarea>
                            <img class="uplaod-gif" src="images/newimages/loader.gif" alt="">
                          </div>`;
        $("#image_or_video_twiter").parent().append(img_con_tw);
        $('#media_type_twitter').val('image');
        if (!dimention) {
            $('#file_error_twiiter').removeClass('d-none').text(dimention_error)
        } else {
            $('#file_error_twiiter').addClass('d-none')
        }

    }
    //**************************Appedn to all using youpot div end **************************
    function appendImage(file, socialicon, dimention) {

        var dimention_error = "Image resolution falls outside of Instagram’s preferred ratio 4:5 and 16:9. The image may be scaled by Instagram."

        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {

                var base64Data = e.target.result.split(',')[1]; // Remove the "data:image/jpeg;base64," prefix
                var getRandomClass = getRandomClassName();
                var getRandomID = getRandomClassName();


                if (socialicon == 'image_or_videofb') {

                    var img_con = `<div class=" cross_img_con  ${getRandomClass}" id="remove_id">
                    <img name='image/*' id="teting" src="${e.target.result}"/>
                    <a href="javascript:void(0);" id='cnad'> <i class='fa-solid fa-xmark cancel_mark' id="${getRandomID}"></i></a>
                    <textarea id="removeit_file_id" name=fb_image[] class="removeit_file d-none"></textarea>
                    <img class="uplaod-gif" src="images/newimages/loader.gif" alt="">
                    </div>`;
                    $("#image_or_videofb").parent().append(img_con);
                    $('#media_type_fb').val('image');
                    $("#image_or_videofb").parent().find('.cross_img_con_video').remove();
                    $('#fb_video').val('');



                    if (!dimention) {

                        $('#file_error_fb').removeClass('d-none').text(dimention_error)
                    }
                    else {

                        $('#file_error_fb').addClass('d-none')
                    }

                }

                else if (socialicon == 'image_or_video_insta') {
                    var img_con_ins = `<div class="cross_img_con ${getRandomClass}" id="remove_id">
                    <img name='image/*' id="teting" src="${e.target.result}"/>
                    <a href="javascript:void(0);" id='cnad'> <i class='fa-solid fa-xmark cancel_mark' id="${getRandomID}"></i></a>
                    <textarea id="removeit_file_id" name=inst_image[] class="removeit_file d-none"></textarea>
                        <img class="uplaod-gif" src="images/newimages/loader.gif" alt="">
                    </div>`;
                    $("#image_or_video_insta").parent().append(img_con_ins);
                    $('#media_type_insta').val('image');
                    $("#image_or_video_insta").parent().find('.cross_img_con_video').remove();
                    $('#inst_video').val('');



                    if (!dimention) {
                        $('#file_error_insta').removeClass('d-none').text(dimention_error)
                    } else {
                        $('#file_error_insta').addClass('d-none')
                    }
                }
                else if (socialicon == 'image_or_video_linkedin') {
                    var img_con_lin = `<div class=" cross_img_con  ${getRandomClass}" id="remove_id">
                    <img name='image/*' id="teting" src="${e.target.result}"/>
                    <a href="javascript:void(0);" id='cnad'> <i class='fa-solid fa-xmark cancel_mark' id="${getRandomID}"></i></a>
                    <textarea id="removeit_file_id" name=lin_image[] class="removeit_file d-none">}</textarea>
                        <img class="uplaod-gif" src="images/newimages/loader.gif" alt="">
                    </div>`;
                    $("#image_or_video_linkedin").parent().append(img_con_lin);
                    $('#media_type_linkedin').val('image');



                    $("#image_or_video_linkedin").parent().find('.cross_img_con_video').remove();
                    $('#link_video').val('');

                    if (!dimention) {
                        $('#file_error_linkedin').removeClass('d-none').text(dimention_error)
                    } else {
                        $('#file_error_linkedin').addClass('d-none')
                    }
                } else if (socialicon == 'image_or_video_twiter') {

                    var img_con_lin = `<div class=" cross_img_con  ${getRandomClass}" id="remove_id">
                    <img name='image/*' id="teting" src="${e.target.result}"/>
                    <a href="javascript:void(0);" id='cnad'> <i class='fa-solid fa-xmark cancel_mark' id="${getRandomID}"></i></a>
                    <textarea id="removeit_file_id" name=tw_image[] class="removeit_file d-none">}</textarea>
                        <img class="uplaod-gif" src="images/newimages/loader.gif" alt="">
                    </div>`;
                    $("#image_or_video_twiter").parent().append(img_con_lin);
                    $('#media_type_twitter').val('image');
                    $("#image_or_video_twiter").parent().find('.cross_img_con_video').remove();
                    $('#twitter_video').val('');
                    if (!dimention) {
                        $('#file_error_twiiter').removeClass('d-none').text(dimention_error)
                    } else {
                        $('#file_error_twiiter').addClass('d-none')
                    }
                }

                else if (socialicon == 'image_or_video_youpost') {
                    $("#image_or_video_twiter").parent().find('.cross_img_con_video').remove();
                    $("#image_or_video_linkedin").parent().find('.cross_img_con_video').remove();
                    $("#image_or_video_insta").parent().find('.cross_img_con_video').remove();
                    $("#image_or_videofb").parent().find('.cross_img_con_video').remove();
                    $("#image_or_video_youpost").parent().find('.cross_img_con_video').remove();


                    appendtoall(e.target.result, dimention, dimention_error, getRandomClass);
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({

                    url: '/save-image-video', // Replace with your server-side route to handle image saving
                    type: 'POST',
                    data: { image: base64Data, 'dimention': dimention },

                    success: function (response) {

                        $('.' + getRandomClass).find('textarea').val(response.path);
                        $('.' + getRandomClass).find('.uplaod-gif').remove();

                        if (socialicon == 'image_or_video_youpost') {
                            var ids = ['image_or_video_youpost', 'image_or_videofb', 'image_or_video_insta', 'image_or_video_linkedin','image_or_video_twiter'];

                            ids.forEach(function (socialicon) {
                                setPreview(socialicon, response.path);
                            });
                        } else {
                            setPreview(socialicon, response.path);
                        }
                        $("#posted_now").prop("disabled", false);

                    },
                });
                var mediaType = file.type.split('/')[0];
            };
            reader.readAsDataURL(file);
        }
    }

    function handleVideoUpload(socialicon, path, imgOrVideo) {
        // Function to handle video upload within the 'setPreview' function

        var videoPath = 'content_media/' + path;
        // Create new video elements for each platform and set their sources
        var video_youpost = $('<video controls class="w-100" loading="lazy" autoplay="autoplay">').attr('src', videoPath);
        var video_fb = $('<video controls class="video_preview w-100" loading="lazy" autoplay="autoplay">').attr('src', videoPath);
        var video_inst = $('<video controls class="video_preview_inst w-100" loading="lazy" autoplay="autoplay">').attr('src', videoPath);
        var video_link = $('<video controls class="video_preview_link w-100" loading="lazy" autoplay="autoplay">').attr('src', videoPath);
        var video_twitter = $('<video controls class="video_preview_twitter w-100" loading="lazy" autoplay="autoplay">').attr('src', videoPath);

        // Display the videos on different platform sections
        $('#mediaContainervideo_youpost').html(video_youpost);
        $('#mediaContainervideo_fb').html(video_fb);
        $('#mediaContainervideo_inst').html(video_inst);
        $('#mediaContainervideo_link').html(video_link);
        $('#mediaContainervideo_twitter').html(video_twitter);

    }


    function setPreview(socialicon, path) {
        //  alert("onetime");
        path = path || "DefaultParam2";

        if (socialicon == 'image_or_video_youpost') {
            var imgOrVideo = $('#media_type_youpost').val();
            //  var imgCount = $(".prv_div img").length;
            var imgCount = $(".prv_div_youpost .mobile_post_img").length;
            var add_imge = $('#image_div_youpost .cross_img_con').length;
            if (imgCount == 0 || add_imge == 1) {
                $('.prv_div_youpost').css('column-count', '1');
            } else {
                $('.prv_div_youpost').css('column-count', '2');
            }
            if (imgOrVideo == 'image') {
                $('.prv_div_youpost').empty();
                var parentElement = $("#media_type_youpost").closest(".sm_container");
                var img = parentElement.find("img");
                // var img = parentElement.find("div");
                var imgCount = 0;
                $(img).each(function (index) {
                    imgCount++;

                    // if (imgCount >= 6) {
                    //    if ($("div.div_in_div_youpost").length === 0) {
                    //        var lastImg = $(".prv_div_youpost").find($(".mobile_post_img:last"));
                    //         lastImg.wrap("<div class='div_in_div_youpost'></div>");

                    //     //    $(".div_in_div_youpost").append(`<span id= 'my_value_youpost' class='fb_counter_youpost'> <i class='fa-solid fa-plus plus_fb_icon'></i>${imgCount-5}</span> <div class='div_in_div_you_bg'> </div>`);
                    //     $(".div_in_div_youpost").append(`<span id= 'my_value_youpost' class='fb_counter_youpost'> <i class='fa-solid fa-plus plus_fb_icon'></i>${imgCount-5}</span> <div class='div_in_div_you_bg'> </div>`);

                    //    }
                    if (imgCount >= 6) {
                        if ($("div.div_in_div_youpost").length === 0) {
                            var lastImg = $(".prv_div_youpost").find(".mobile_post_img:last");
                            lastImg.wrap("<div class='div_in_div_youpost'></div>");

                            // Add the new span element with the class 'fb_counter_youpost'
                            $(".div_in_div_youpost").append(`<span id='my_value_youpost' class='fb_counter_youpost'><i class='fa-solid fa-plus plus_fb_icon'></i> ${imgCount - 5}</span><div class='div_in_div_you_bg'></div>`);
                        }
                        else {

                            const iconElement = $('<i>').addClass('fa-solid fa-plus plus_fb_icon');
                            var spanElement = $('#my_value_youpost');
                            var currentValue = parseInt(spanElement.text());
                            newValue = currentValue + 1;
                            $('#my_value_youpost').empty();
                            $('#my_value_youpost').append(iconElement, newValue);
                        }
                    }
                    else {
                        //  var src=   $(this).attr("src");
                        //  var newImage = `<div class="mobile_post_img"><img  src="${src}"/></div>`;
                        //  $('.prv_div').append(newImage);

                        var src = $(this).attr("src");
                        //  var newImage = `<div class="mobile_post_img"><img  src="${src}"/></div>`;
                        var newImage = `<div class="mobile_post_img"></div>`;
                        $('.prv_div_youpost').append(newImage);
                        $('.prv_div_youpost .mobile_post_img').last().css('background-image', 'url(' + src + ')');
                    }
                    if (add_imge == 1 || add_imge == 2) {
                        $('.prv_div_youpost .mobile_post_img').addClass('max_height');
                    } else {
                        $('.prv_div_youpost .mobile_post_img').removeClass('max_height');
                    }
                    if (add_imge == 3) {
                        $('.prv_div_youpost .mobile_post_img:nth-child(1)').addClass('first_child_img1');
                        $('.prv_div_youpost .mobile_post_img:nth-child(2)').addClass('first_child_img_2');
                    }
                    else {
                        $('.prv_div_youpost .mobile_post_img:nth-child(1)').removeClass('first_child_img1');
                        $('.prv_div_youpost .mobile_post_img:nth-child(3)').removeClass('first_child_img_3');
                    }
                    if (add_imge == 4) {
                        $('.prv_div_youpost .mobile_post_img:nth-child(3)').addClass('first_child_img4');
                    }
                    else {
                        $('.my_value_youpost .mobile_post_img:nth-child(3)').removeClass('first_child_img4');
                    }
                    if (add_imge == 6) {
                        $('.prv_div_youpost .mobile_post_img:nth-child(5)').addClass('first_child_img5');
                    }
                    else {
                        $('.prv_div_youpost .mobile_post_img:nth-child(5)').addClass('first_child_img5');
                    }
                });

                $('#mediaContainervideo_youpost').html('');

            } else if (imgOrVideo == 'video') {
                handleVideoUpload(imgOrVideo, path, socialicon);
                // var BaseUrl = 'http://localhost:8000/';
                // var video_youpost = $('<video controls class="w-100" loading="lazy" autoplay="autoplay">').attr('src', BaseUrl + 'content_media/' + path);
                // var video_fb = $('<video controls class="video_preview w-100" loading="lazy" autoplay="autoplay">').attr('src', BaseUrl + 'content_media/' + path);
                // var video_ins = $('<video controls class=" video_preview_inst w-100" loading="lazy" autoplay="autoplay">').attr('src', BaseUrl + 'content_media/' + path);

                // $('#mediaContainervideo_link').html(video_youpost.clone());
                // $('#mediaContainervideo_fb').html(video_youpost.clone());
                // $('#mediaContainervideo_youpost').html(video_youpost);
                // $('#mediaContainervideo_inst').html(video_ins);
                // $('#mediaContainervideo_twitter').html(video_youpost);

            } else {
                $('.prv_div_youpost').html('');
                $('#mediaContainervideo_youpost').html('');
            }
        }
        else if (socialicon == 'image_or_videofb') {

            var imgOrVideo = $('#media_type_fb').val();
            //  var imgCount = $(".prv_div img").length;
            var imgCount = $(".prv_div .mobile_post_img").length;
            var add_imge = $('#image_div .cross_img_con ').length;
            if (imgCount == 0 || add_imge == 1) {
                $('.prv_div').css('column-count', '1');
            } else {
                $('.prv_div').css('column-count', '2');
            }
            if (imgOrVideo == 'image') {
                $('.prv_div').empty();
                var parentElement = $("#media_type_fb").closest(".sm_container");
                var img = parentElement.find("img");
                // var img = parentElement.find("div");
                var imgCount = 0;
                $(img).each(function (index) {
                    imgCount++;
                    if (imgCount >= 6) {
                        if ($("div.div_in_div").length === 0) {
                            var lastImg = $(".prv_div").find($(".mobile_post_img:last"));
                            // var spanElement = $("<span id= 'my_value' class='fb_counter'> <i class='fa-solid fa-plus plus_fb_icon'></i>"+1+"</span>");
                            //  lastImg.after(spanElement);
                            lastImg.wrap("<div class='div_in_div'></div>");
                            //  var newDiv = $("<div class='div_in_div_bg'> </div>");
                            //    $(".div_in_div").after(newDiv);
                            $(".div_in_div").append(`<span id= 'my_value' class='fb_counter'> <i class='fa-solid fa-plus plus_fb_icon'></i>${imgCount - 5}</span> <div class='div_in_div_bg'> </div>`);
                        } else {
                            const iconElement = $('<i>').addClass('fa-solid fa-plus plus_fb_icon');
                            var spanElement = $('#my_value');
                            var currentValue = parseInt(spanElement.text());
                            newValue = currentValue + 1;
                            $('#my_value').empty();
                            $('#my_value').append(iconElement, newValue);
                        }
                    }
                    else {
                        //  var src=   $(this).attr("src");
                        //  var newImage = `<div class="mobile_post_img"><img  src="${src}"/></div>`;
                        //  $('.prv_div').append(newImage);
                        var src = $(this).attr("src");
                        //  var newImage = `<div class="mobile_post_img"><img  src="${src}"/></div>`;
                        var newImage = `<div class="mobile_post_img"></div>`;
                        $('.prv_div').append(newImage);
                        $('.prv_div .mobile_post_img').last().css('background-image', 'url(' + src + ')');
                    }
                    if (add_imge == 1 || add_imge == 2) {
                        $('.prv_div .mobile_post_img').addClass('max_height');
                    } else {
                        $('.prv_div .mobile_post_img').removeClass('max_height');
                    }
                    if (add_imge == 3) {
                        $('.prv_div .mobile_post_img:nth-child(1)').addClass('first_child_img1');
                        $('.prv_div .mobile_post_img:nth-child(2)').addClass('first_child_img_2');
                    }
                    else {
                        $('.prv_div .mobile_post_img:nth-child(1)').removeClass('first_child_img1');
                        $('.prv_div .mobile_post_img:nth-child(3)').removeClass('first_child_img_3');
                    }
                    if (add_imge == 4) {
                        $('.prv_div .mobile_post_img:nth-child(3)').addClass('first_child_img4');
                    }
                    else {
                        $('.prv_div .mobile_post_img:nth-child(3)').removeClass('first_child_img4');
                    }
                });
                $('#mediaContainervideo_fb').html('');

            } else if (imgOrVideo == 'video') {
                var video = $('<video controls class="video_preview w-100">').attr('src', 'content_media/' + path);
                $('.prv_div').html('');
                $('#mediaContainervideo_fb').html(video);
            } else {
                $('.prv_div').html('');
                $('#mediaContainervideo_fb').html('');
            }
        } else if (socialicon == 'image_or_video_insta') {

            var imgOrVideo = $('#media_type_insta').val();

            // var imgCount = $(".prv_div_isnt img").length;
            var imgCount = $(".prv_div_isnt .mobile_post_img_inst").length;
            var add_imge2 = $('#image_div_ins .cross_img_con ').length;

            if (imgOrVideo == 'image') {
                $('.prv_div_isnt').empty();
                var parentElement = $("#media_type_insta").closest(".sm_container");
                var img = parentElement.find("img:last");
                var src = $(img).attr("src");
                var newImage = `<div class="mobile_post_img_inst"></div>`;
                $('.prv_div_isnt').append(newImage);
                $('#mediaContainervideo_inst').html('');
                $('.prv_div_isnt .mobile_post_img_inst').last().css('background-image', 'url(' + src + ')');

            } else if (imgOrVideo == 'video') {
                var video = $('<video controls class="video_preview_inst w-100">').attr('src', 'content_media/' + path);
                $('.prv_div_isnt').html('');
                $('#mediaContainervideo_inst').html(video);
            } else {
                $('.prv_div_isnt').html('');
                $('#mediaContainervideo_inst').html('');
            }
        } else if (socialicon == 'image_or_video_linkedin') {

            var imgOrVideo = $('#media_type_linkedin').val();
            // var imgCount = $(".prv_div_link img").length;
            var imgCount = $(".prv_div_link .mobile_post_img_link").length;
            var add_imge3 = $('#image_div_linked .cross_img_con ').length;
            if (imgCount == 0 || add_imge3 == 1) {
                $('.prv_div_link').css('column-count', '1');
            } else {
                $('.prv_div_link').css('column-count', '2');
            }
            if (imgOrVideo == 'image') {

                $('.prv_div_link').empty();
                var parentElement = $("#media_type_linkedin").closest(".sm_container");
                var img = parentElement.find("img");
                var imgCount = 0;

                $(img).each(function (index) {
                    imgCount++; if (imgCount >= 6) {
                        if ($("div.div_in_div_link").length === 0) {
                            var lastImg = $(".prv_div_link").find($(".mobile_post_img_link:last"));
                            // var spanElement = $("<span id= 'my_value_link' class='linkedin_counter'> <i class='fa-solid fa-plus plus_linkedin_icon'></i>"+1+"</span>");
                            //  lastImg.after(spanElement);
                            lastImg.wrap("<div class='div_in_div_link'> </div>");
                            //  var newDiv = $("<div class='div_in_div_linkedin_bg'></div>");
                            //    $(".div_in_div_link").after(newDiv);
                            $(".div_in_div_link").append(`<span id= 'my_value_link' class='linkedin_counter'> <i class='fa-solid fa-plus plus_linkedin_icon'></i>${imgCount - 5}</span> <div class='div_in_div_linkedin_bg'> </div>`);
                        } else {
                            const iconElement = $('<i>').addClass('fa-solid fa-plus plus_linkedin_icon');
                            var spanElement = $('#my_value_link');
                            var currentValue = parseInt(spanElement.text());
                            newValue = currentValue + 1;
                            $('#my_value_link').empty();
                            $('#my_value_link').append(iconElement, newValue);
                        }
                    } else {
                        var src = $(this).attr("src");
                        var newImage = `<div class="mobile_post_img_link"></div>`;
                        $('.prv_div_link').append(newImage);
                        $('.prv_div_link .mobile_post_img_link').last().css('background-image', 'url(' + src + ')');
                    }
                    if (add_imge3 == 1 || add_imge3 == 2) {
                        $('.prv_div_link .mobile_post_img_link').addClass('max_height_linkedin');
                    } else {
                        $('.prv_div_link .mobile_post_img_link').removeClass('max_height_linkedin');

                    }
                    if (add_imge3 == 3) {
                        $('.prv_div_link .mobile_post_img_link:nth-child(1)').addClass('third_child_img1');
                        $('.prv_div_link .mobile_post_img_link:nth-child(2)').addClass('third_child_img2');
                    }
                    else {
                        $('.prv_div_link .mobile_post_img_link:nth-child(1)').removeClass('third_child_img1');
                    }
                    if (add_imge3 == 4) {
                        $('.prv_div_link .mobile_post_img_link:nth-child(3)').addClass('third_child_img3');
                    }
                    else {
                        $('.prv_div_link .mobile_post_img_link:nth-child(3)').removeClass('third_child_img3');
                    }
                });
                $('#mediaContainervideo_link').html('');

            } else if (imgOrVideo == 'video') {
                var video = $('<video controls class="video_preview_link w-100">').attr('src', 'content_media/' + path);
                $('.prv_div_link').html('');
                $('#mediaContainervideo_link').html(video);
            } else {
                $('.prv_div_link').html('');
                $('#mediaContainervideo_link').html('');
            }
        }
        else if (socialicon == 'image_or_video_twiter') {

            var imgOrVideo = $('#media_type_twitter').val();
            // var imgCount = $(".prv_div_link img").length;
            var imgCount = $(".prv_div_tw .mobile_post_img_tw").length;
            var add_imge3 = $('#image_div_twi .cross_img_con ').length;
            if (imgCount == 0 || add_imge3 == 1) {
                $('.prv_div_tw').css('column-count', '1');
            } else {
                $('.prv_div_tw').css('column-count', '2');
            }
            if (imgOrVideo == 'image') {

                $('.prv_div_tw').empty();
                var parentElement = $("#media_type_twitter").closest(".sm_container");
                var img = parentElement.find("img");
                var imgCount = 0;

                $(img).each(function (index) {
                    imgCount++; if (imgCount >= 6) {

                        if ($("div.div_in_div_tw").length === 0) {
                            var lastImg = $(".prv_div_tw").find($(".mobile_post_img_tw:last"));
                            // var spanElement = $("<span id= 'my_value_link' class='linkedin_counter'> <i class='fa-solid fa-plus plus_linkedin_icon'></i>"+1+"</span>");
                            //  lastImg.after(spanElement);
                            lastImg.wrap("<div class='div_in_div_tw'> </div>");
                            //  var newDiv = $("<div class='div_in_div_linkedin_bg'></div>");
                            //    $(".div_in_div_link").after(newDiv);
                            $(".div_in_div_tw").append(`<span id= 'my_value_tw' class='twitter_counter'> <i class='fa-solid fa-plus plus_twitter_icon'></i>${imgCount - 5}</span> <div class='div_in_div_twitter_bg'> </div>`);
                        } else {
                            const iconElement = $('<i>').addClass('fa-solid fa-plus plus_twitter_icon');
                            var spanElement = $('#my_value_tw');
                            var currentValue = parseInt(spanElement.text());
                            newValue = currentValue + 1;
                            $('#my_value_tw').empty();
                            $('#my_value_tw').append(iconElement, newValue);
                        }
                    } else {
                        var src = $(this).attr("src");
                        var newImage = `<div class="mobile_post_img_tw"></div>`;
                        $('.prv_div_tw').append(newImage);
                        $('.prv_div_tw .mobile_post_img_tw').last().css('background-image', 'url(' + src + ')');
                    }
                    if (add_imge3 == 1 || add_imge3 == 2) {
                        $('.prv_div_tw .mobile_post_img_tw').addClass('max_height_twitter');
                    } else {
                        $('.prv_div_tw .mobile_post_img_tw').removeClass('max_height_twitter');
                    }

                    if (add_imge3 == 3) {
                        $('.prv_div_tw .mobile_post_img_tw:nth-child(1)').addClass('fourth_child_img1');
                        $('.prv_div_tw .mobile_post_img_tw:nth-child(2)').addClass('fourth_child_img2');
                    }
                    else {
                        $('.prv_div_tw .mobile_post_img_tw:nth-child(1)').removeClass('fourth_child_img1');
                    }

                    if (add_imge3 == 4) {
                        $('.prv_div_tw .mobile_post_img_tw:nth-child(3)').addClass('fourth_child_img3');
                        $('.prv_div_tw .mobile_post_img_tw:nth-child(1)').addClass('fourth_child_img4');
                    }
                    else {
                        $('.prv_div_tw .mobile_post_img_tw:nth-child(3)').removeClass('fourth_child_img3');
                        $('.prv_div_tw .mobile_post_img_tw:nth-child(1)').removeClass('fourth_child_img4');
                    }
                    if (add_imge3 >= 5) {
                        $('.prv_div_tw .mobile_post_img_tw:nth-child(1)').addClass('fourth_child_img5');
                        $('.prv_div_tw .mobile_post_img_tw:nth-child(3)').addClass('fourth_child_img6');
                        $('.prv_div_tw .mobile_post_img_tw:nth-child(4)').addClass('fourth_child_img6');
                        $('.prv_div_tw .mobile_post_img_tw:nth-child(5)').addClass('fourth_child_img6');
                    }
                    else {
                        $('.prv_div_tw .mobile_post_img_tw:nth-child(1)').removeClass('fourth_child_img5');
                        $('.prv_div_tw .mobile_post_img_tw:nth-child(3)').removeClass('fourth_child_img6');
                        $('.prv_div_tw .mobile_post_img_tw:nth-child(4)').removeClass('fourth_child_img6');
                        $('.prv_div_tw .mobile_post_img_tw:nth-child(5)').removeClass('fourth_child_img6');

                    }
                    if (add_imge3 >= 6) {
                        $('.prv_div_tw .mobile_post_img_tw:nth-child(3)').addClass('fourth_child_img7');
                        $('.prv_div_tw .mobile_post_img_tw:nth-child(4)').addClass('fourth_child_img7');
                        $('.prv_div_tw .mobile_post_img_tw:nth-child(5)').addClass('fourth_child_img7');

                    } else {
                        $('.prv_div_tw .mobile_post_img_tw:nth-child(3)').removeClass('fourth_child_img7');
                        $('.prv_div_tw .mobile_post_img_tw:nth-child(4)').removeClass('fourth_child_img7');
                        $('.prv_div_tw .mobile_post_img_tw:nth-child(5)').removeClass('fourth_child_img7');
                    }
                });
                $('#mediaContainervideo_twitter').html('');

            } else if (imgOrVideo == 'video') {
                var video = $('<video controls class="video_preview_twitter w-100">').attr('src', 'content_media/' + path);
                $('.prv_div_tw').html('');
                $('#mediaContainervideo_twitter').html(video);

            } else {
                $('.prv_div_tw').html('');
                $('#mediaContainervideo_twitter').html('');

            }
        }
    }

    function appendVideo(file, socialicon) {

        if (file) {
            $('.uplaod-gif-video').removeClass('d-none');
            var reader = new FileReader();

            reader.onload = function (e) {
                var base64Data = e.target.result.split(',')[1];
                var type = "video";


                var getRandomClass = getRandomClassName();
                var img_con = `<div class=" cross_img_con_video  ${getRandomClass}" id="remove_id">
                <a href="javascript:void(0);" id='cnad'> <i class='fa-solid fa-xmark cancel_mark_video' id="${getRandomClass}"></i></a>
                    <h1 class="video_play_head"><i class="fa-sharp fa-solid fa-play video_play"></i></h1>
                </div>`;

                if (socialicon == 'image_or_video_youpost') {

                    $("#image_or_video_youpost").parent().find('.cross_img_con_video').remove();
                    $("#image_or_video_twiter").parent().find('.cross_img_con_video').remove();
                    $("#image_or_video_insta").parent().find('.cross_img_con_video').remove();
                    $("#image_or_video_linkedin").parent().find('.cross_img_con_video').remove();
                    $("#image_or_videofb").parent().find('.cross_img_con_video').remove();

                    $("#image_or_video_youpost").parent().find('.cross_img_con').remove();
                    $("#image_or_videofb").parent().find('.cross_img_con').remove();
                    $("#image_or_video_twiter").parent().find('.cross_img_con').remove();
                    $("#image_or_video_insta").parent().find('.cross_img_con').remove();
                    $("#image_or_video_linkedin").parent().find('.cross_img_con').remove();


                    $("#image_or_video_youpost").parent().append(img_con);
                    $("#image_or_video_twiter").parent().append(img_con);
                    $("#image_or_video_insta").parent().append(img_con);
                    $("#image_or_video_linkedin").parent().append(img_con);
                    $("#image_or_videofb").parent().append(img_con);

                }else if (socialicon == 'image_or_videofb') {
                    $("#image_or_videofb").parent().find('.cross_img_con_video').remove();
                    $("#image_or_videofb").parent().append(img_con);

                }else if (socialicon == 'image_or_video_insta') {
                    $("#image_or_video_insta").parent().find('.cross_img_con_video').remove();
                    $("#image_or_video_insta").parent().append(img_con);

                }else if (socialicon == 'image_or_video_twiter') {
                    $("#image_or_video_twiter").parent().find('.cross_img_con_video').remove();
                    $("#image_or_video_twiter").parent().append(img_con);

                }else if (socialicon == 'image_or_video_linkedin') {
                    $("#image_or_video_linkedin").parent().find('.cross_img_con_video').remove();
                    $("#image_or_video_linkedin").parent().append(img_con);

                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/save-image-video', // Replace with your server-side route to handle image saving
                    type: 'POST',
                    data: {
                        video: base64Data,
                        type: type
                    },
                    success: function (response) {

                        $('.uplaod-gif-video').addClass('d-none');
                        var mediaType = file.type.split('/')[0];
                        if (socialicon == 'image_or_videofb') {

                            $('#fb_video').val(response.path);
                            $('#media_type_fb').val('video');
                            //  $('#image_div').addClass('d-none');
                            $("#image_or_videofb").parent().find('.cross_img_con').remove();

                            $('.video_preview').removeClass('d-none');
                            $('.preview_image').addClass('d-none');
                            setPreview(socialicon, response.path);

                        } else if (socialicon == 'image_or_video_insta') {

                            $('#inst_video').val(response.path);
                            $('#media_type_insta').val('video');
                            //  $('#image_div_ins').addClass('d-none');
                            $("#image_or_video_insta").parent().find('.cross_img_con').remove();

                            $('.video_preview_inst').removeClass('d-none');
                            $('.preview_image_inst').addClass('d-none');
                            setPreview(socialicon, response.path);

                        } else if (socialicon == 'image_or_video_linkedin') {

                            $('#link_video').val(response.path);
                            $('#media_type_linkedin').val('video');
                            $("#image_or_video_linkedin").parent().find('.cross_img_con').remove();

                            $('.video_preview_link').removeClass('d-none');
                            $('.preview_image_link').addClass('d-none');
                            setPreview(socialicon, response.path);

                        }
                        else if (socialicon == 'image_or_video_twiter') {

                            $('#twitter_video').val(response.path);
                            $('#media_type_twitter').val('video');
                            $("#image_or_video_twiter").parent().find('.cross_img_con').remove();

                            $('.video_preview_twitter').removeClass('d-none');
                            $('.preview_image_twitter').addClass('d-none');
                            setPreview(socialicon, response.path);

                        }
                        else if (socialicon == 'image_or_video_youpost') {




                            $('#youpost_video').val(response.path);
                            $('#media_type_youpost').val('video');
                            $("#image_or_video_youpost").parent().find('.cross_img_con').remove();
                            $('.video_preview_youpost').removeClass('d-none');
                            $('.prv_div_youpost').html('');

                            $('#fb_video').val(response.path);
                            $('#media_type_fb').val('video');
                            $("#image_or_videofb").parent().find('.cross_img_con').remove();
                            $('.video_preview').removeClass('d-none');
                            $('.preview_image').addClass('d-none');
                            $('.prv_div').html('');

                            $('#inst_video').val(response.path);
                            $('#media_type_insta').val('video');
                            $("#image_or_video_insta").parent().find('.cross_img_con').remove();
                            $('.video_preview_inst').removeClass('d-none');
                            $('.preview_image_inst').addClass('d-none');
                            $('.prv_div_isnt').html('');

                            $('#link_video').val(response.path);
                            $('#media_type_linkedin').val('video');
                            $("#image_or_video_linkedin").parent().find('.cross_img_con').remove();
                            $('.video_preview_link').removeClass('d-none');
                            $('.preview_image_link').addClass('d-none');
                            $('.prv_div_link').html('');


                            $('#twitter_video').val(response.path);
                            $('#media_type_twitter').val('video');
                            $("#image_or_video_twiter").parent().find('.cross_img_con').remove();
                            $('.prv_div_tw').html('');

                            setPreview(socialicon, response.path);
                        }
                        $("#posted_now").prop("disabled", false);

                    },
                    error: function () {
                        alert('Error saving the video.');
                    }

                });
            };
            reader.readAsDataURL(file);
        }
    }

    //*************************** calculate MB ****************************

    function getMB(bytes) {

        var fileSizeInMB = bytes / (1024 * 1024);
        return fileSizeInMB;
    }
    function getRandomClassName() {
        const characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        const length = 6; // You can adjust the length of the random class name
        let className = '';
        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * characters.length);
            className += characters.charAt(randomIndex);
        }
        return className;
    }

    //*************************** calculate MB End ****************************

    var _URL = window.URL;

    $('.file_image_video').change(function (e) {

        $('#file_error_all').addClass('d-none');
        var socialicon = $(this).attr('id');
        var file = e.target.files[0];

        var randomDelay = Math.floor(Math.random() * (5000 - 700 + 1)) + 700; // Random delay between 1 and 5 seconds
        setTimeout(function() {
            var columnCount = $('.Preview_ImagesSetupFB').css('column-count');
            if (columnCount === '1') {
                $('.mobile_post_img, .mobile_post_img_link, .mobile_post_img_tw').addClass('SetUp_PreviewImg');
            } else {
                $('.mobile_post_img, .mobile_post_img_link, .mobile_post_img_tw').removeClass('SetUp_PreviewImg');
            }
        }, randomDelay);
        setTimeout(function() {
            var columnCount = $('.Preview_ImagesSetupTwitter').css('column-count');
            if (columnCount === '1') {
                $('.mobile_post_img_tw').addClass('SetUp_PreviewImg');
            } else {
                $('.mobile_post_img_tw').removeClass('SetUp_PreviewImg');
            }
        }, randomDelay);
        setTimeout(function() {
            var columnCount = $('.Preview_ImagesSetupLinkedin').css('column-count');
            if (columnCount === '1') {
                $('.mobile_post_img_link').addClass('SetUp_PreviewImg');
            } else {
                $('.mobile_post_img_link').removeClass('SetUp_PreviewImg');
            }
        }, randomDelay);

        var mediaType = file.type.split('/')[0];

        if (mediaType === 'image') {

        function getImageDimensions(file) {
            return new Promise((resolve) => {
                var img = new Image();
                var width = 0;
                var height = 0;

                img.onload = function () {
                    width = this.width;
                    height = this.height;
                    resolve({ width, height });
                };

                img.src = URL.createObjectURL(file);
            });
        }

        getImageDimensions(file)
        .then(({ width, height }) => {
            if (width < 350 || height < 350) {
                toastr.error('The media you have selected has very low resolution. Please choose media greater than 350px.', { timeOut: 5000 })
                return;
            }
            var reader = new FileReader();
            reader.onload = function (e) {
                var mediaType = file.type.split('/')[0];
                validateFileImageVideo(file, socialicon);
            };
            reader.readAsDataURL(file);
        })
        .catch(error => {
            // Handle errors if any
            console.error('Error getting image dimensions:', error);
        });
    }else{

        validateFileImageVideo(file, socialicon);
    }

        var fileInput = $(this);
        fileInput.val('');
        fileInput.val(fileInput.val());
    });

    $('.file_image_video_youpost').change(function (e) {
        $('#file_error_all').addClass('d-none');
        var socialicon = $(this).attr('id');
        var file = e.target.files[0];

        var randomDelay = Math.floor(Math.random() * (5000 - 500 + 1)) + 500; // Random delay between 1 and 5 seconds
        setTimeout(function() {
            var columnCount = $('.Preview_ImagesSetup').css('column-count');
            if (columnCount === '1') {
                $('.mobile_post_img, .mobile_post_img_link, .mobile_post_img_tw').addClass('SetUp_PreviewImg');
            } else {
                $('.mobile_post_img, .mobile_post_img_link, .mobile_post_img_tw').removeClass('SetUp_PreviewImg');
            }
        }, randomDelay);

        var mediaType = file.type.split('/')[0];
        if (mediaType === 'image') {
        function getImageDimensions(file) {
            return new Promise((resolve) => {
                var img = new Image();
                var width = 0;
                var height = 0;
                img.onload = function () {
                    width = this.width;
                    height = this.height;
                    resolve({ width, height });
                };
                img.src = URL.createObjectURL(file);
            });
        }
        getImageDimensions(file)
        .then(({ width, height }) => {
            if (width < 350 || height < 350) {
                toastr.error('The media you have selected has very low resolution. Please choose media greater than 350px.', { timeOut: 5000 })
                return;
            }
            var reader = new FileReader();
            reader.onload = function (e) {
                var mediaType = file.type.split('/')[0];
                validateFileImageVideo(file, socialicon);
            };
            reader.readAsDataURL(file);
        })
        .catch(error => {
            // Handle errors if any
            console.error('Error getting image dimensions:', error);
        });
    }else{
        validateFileImageVideo(file, socialicon);
    }
        var fileInput = $(this);
        fileInput.val('');
        fileInput.val(fileInput.val());
    });
    $('.preview_div').click(function (e) {
        if ($(this).attr('data-value') == 'fb') {
            var parent = $(".create_preview_post ");
            parent.find('#fb_preview').addClass("active");
            parent.find('#ins_preview').addClass("d-none");
            parent.find('#tw_preview').addClass("d-none");
            parent.find('#link_preview').addClass("d-none");
            parent.find('#fb_preview').removeClass("d-none");
            parent.find('#ins_preview').removeClass("active");
            parent.find('#tw_preview').removeClass("active");
            parent.find('#link_preview').removeClass("active");
        } else if ($(this).attr('data-value') == 'insta') {
            var parent = $(".create_preview_post ");
            parent.find('#fb_preview').addClass("d-none");
            parent.find('#ins_preview').addClass("active");
            parent.find('#tw_preview').addClass("d-none");
            parent.find('#link_preview').addClass("d-none");
            parent.find('#fb_preview').removeClass("active");
            parent.find('#ins_preview').removeClass("d-none");
            parent.find('#tw_preview').removeClass("active");
            parent.find('#link_preview').removeClass("active");
        } else if ($(this).attr('data-value') == 'twitter') {
            var parent = $(".create_preview_post ");
            parent.find('#fb_preview').addClass("d-none");
            parent.find('#ins_preview').addClass("d-none");
            parent.find('#tw_preview').addClass("active");
            parent.find('#link_preview').addClass("d-none");
            parent.find('#fb_preview').removeClass("active");
            parent.find('#ins_preview').removeClass("active");
            parent.find('#tw_preview').removeClass("d-none");
            parent.find('#link_preview').removeClass("active");
        } else if ($(this).attr('data-value') == 'linkedin') {
            var parent = $(".create_preview_post ");
            parent.find('#fb_preview').addClass("d-none");
            parent.find('#ins_preview').addClass("d-none");
            parent.find('#tw_preview').addClass("d-none");
            parent.find('#link_preview').addClass("active");
            parent.find('#fb_preview').removeClass("active");
            parent.find('#ins_preview').removeClass("active");
            parent.find('#tw_preview').removeClass("active");
            parent.find('#link_preview').removeClass("d-none");
        }
    });
    // set each tab image preview on load
    var timezone_name = Intl.DateTimeFormat().resolvedOptions().timeZone;
    $('.timezone').val(timezone_name);
    return true;
});
