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
    var select_time = $('.select_time').val();
    var hours = parseInt(select_time.split(':')[0]); // extract hours from custom time string
    var minutes = parseInt(select_time.split(':')[1]); // extract minutes from custom time string
    var new_date_time = new Date(selectedDate);
    new_date_time.setHours(hours, minutes)
    // new_date_time = new Date(new_date_time);

    new_date_time = new Intl.DateTimeFormat('en-US', {
        year: 'numeric', month: 'numeric',
        day: 'numeric', hour: 'numeric',
        minute: 'numeric', hour12: true
    }).format(new_date_time);


    $('#browsertime').text(new_date_time);
    $('#browsertime2').text(new_date_time);
    $('.browsertimeinput').val(new_date_time);
    $('.posttime').val('later');
}

var graphdata1 = {
    linecolor: "#000000",
    title: "TikTok",
    values: [
        {X: "6:00", Y: 10.00},
        {X: "7:00", Y: 20.00},
        {X: "8:00", Y: 500.00},
        {X: "9:00", Y: 34.00},
        {X: "10:00", Y: 40.25},
        {X: "11:00", Y: 28.56},
        {X: "12:00", Y: 18.57},
        {X: "13:00", Y: 34.00},
        {X: "14:00", Y: 40.89},
        {X: "15:00", Y: 12.57},
        {X: "16:00", Y: 28.24},
        {X: "17:00", Y: 18.00},
        {X: "18:00", Y: 34.24},
        {X: "19:00", Y: 40.58},
        {X: "20:00", Y: 12.54},
        {X: "21:00", Y: 28.00},
        {X: "22:00", Y: 18.00},
        {X: "23:00", Y: 34.89},
        {X: "0:00", Y: 40.26},
        {X: "1:00", Y: 28.89},
        {X: "2:00", Y: 18.87},
        {X: "3:00", Y: 34.00},
        {X: "4:00", Y: 40.00}
    ]
};
var graphdata2 = {
    linecolor: "#CF2872",
    title: "Instagram",
    values: [
        {X: "6:00", Y: 100.00},
        {X: "7:00", Y: 120.00},
        {X: "8:00", Y: 140.00},
        {X: "9:00", Y: 134.00},
        {X: "10:00", Y: 140.25},
        {X: "11:00", Y: 128.56},
        {X: "12:00", Y: 118.57},
        {X: "13:00", Y: 134.00},
        {X: "14:00", Y: 140.89},
        {X: "15:00", Y: 112.57},
        {X: "16:00", Y: 128.24},
        {X: "17:00", Y: 118.00},
        {X: "18:00", Y: 134.24},
        {X: "19:00", Y: 140.58},
        {X: "20:00", Y: 112.54},
        {X: "21:00", Y: 128.00},
        {X: "22:00", Y: 118.00},
        {X: "23:00", Y: 134.89},
        {X: "0:00", Y: 140.26},
        {X: "1:00", Y: 128.89},
        {X: "2:00", Y: 118.87},
        {X: "3:00", Y: 134.00},
        {X: "4:00", Y: 180.00}
    ]
};
var graphdata3 = {
    linecolor: "#26C6DA",
    title: "Twitter",
    values: [
        {X: "5:00", Y: 230.00},
        {X: "10:00", Y: 210.00},
        {X: "15:00", Y: 214.00},
        {X: "9:00", Y: 234.00},
        {X: "10:00", Y: 247.25},
        {X: "11:00", Y: 218.56},
        {X: "12:00", Y: 268.57},
        {X: "13:00", Y: 274.00},
        {X: "14:00", Y: 280.89},
        {X: "15:00", Y: 242.57},
        {X: "16:00", Y: 298.24},
        {X: "17:00", Y: 208.00},
        {X: "18:00", Y: 214.24},
        {X: "19:00", Y: 214.58},
        {X: "20:00", Y: 211.54},
        {X: "21:00", Y: 248.00},
        {X: "22:00", Y: 258.00},
        {X: "23:00", Y: 234.89},
        {X: "0:00", Y: 210.26},
        {X: "1:00", Y: 248.89},
        {X: "2:00", Y: 238.87},
        {X: "3:00", Y: 264.00},
        {X: "4:00", Y: 270.00}
    ]
};
var graphdata4 = {
    linecolor: "#1976D2",
    title: "Facebook",
    values: [
        {X: "6:00", Y: 300.00},
        {X: "7:00", Y: 410.98},
        {X: "8:00", Y: 310.00},
        {X: "9:00", Y: 314.00},
        {X: "10:00", Y: 310.25},
        {X: "11:00", Y: 318.56},
        {X: "12:00", Y: 318.57},
        {X: "13:00", Y: 314.00},
        {X: "14:00", Y: 310.89},
        {X: "15:00", Y: 512.57},
        {X: "16:00", Y: 318.24},
        {X: "17:00", Y: 318.00},
        {X: "18:00", Y: 314.24},
        {X: "19:00", Y: 310.58},
        {X: "20:00", Y: 312.54},
        {X: "21:00", Y: 318.00},
        {X: "22:00", Y: 318.00},
        {X: "23:00", Y: 314.89},
        {X: "0:00", Y: 310.26},
        {X: "1:00", Y: 318.89},
        {X: "2:00", Y: 518.87},
        {X: "3:00", Y: 314.00},
        {X: "4:00", Y: 310.00}
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

    const now_time = new Date();
    const current_hours = now_time.getHours().toString().padStart(2, '0'); // add leading zero if necessary
    const current_minutes = now_time.getMinutes().toString().padStart(2, '0'); // add leading zero if necessary
    $('.select_time').val(`${current_hours}:${current_minutes}`);

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
    });

    $(document).on('click', '.open_emoji', function () {
        $('.emoji_parent > span').click();
    });

    $(document).on('click', '.myaccounts', function () {
        $('#myaccounts_modal').modal('show');
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

        var id = $(this).attr('id');
        $(this).closest(".create_preview_post").find('.'+ id).remove();

        var id_of_div = $(this).closest(".sm_container").find('input[type=hidden]:first').attr('id');
        var parent = $(this).closest('.sm_container');
        $(this).closest('.cross_img_con').remove();
        var img = parent.find('.cross_img_con').find("img");
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
            }

        }
    });


// validation  ********************************** ********************************* validation//
    function validateDimenstionImage(file, socialicon) {

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

        if (socialicon == 'image_or_videofb') {
            appendVideo(file, socialicon);
        } else {
            var videoEl = document.createElement("video");
            videoEl.onloadedmetadata = event => {
                window.URL.revokeObjectURL(videoEl.src);
                var {name, type} = file;

                var {videoWidth, videoHeight} = videoEl;

                var aspectRatio = (videoWidth / videoHeight).toFixed(2);


                var fourByfive = (4 / 5).toFixed(2);

                var sixteenBynine = (16 / 9).toFixed(2);


                if ((aspectRatio != fourByfive && aspectRatio != sixteenBynine)) {

                    toastr.error("Can't post video required 4:5 or 16:9 ratio video.", 'Sorry', {timeOut: 5000})
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
                toastr.error('size should be less than 8MB.', 'Image', {timeOut: 5000})
                response = false;
            }
            if ((ext != 'png') && (ext != 'jpeg') && (ext != 'gif') && (ext != 'jpg')) {
                toastr.error('type should be jpeg,jpg,png,gif.', 'Image', {timeOut: 5000})
                response = false;
            }

            if (response) {
                validateDimenstionImage(file, socialicon);
            }
        } else if (mediaType === 'video') {
            var total_size = getMB(file_size);
            if (total_size > 4) {
                toastr.error('size should be less than 4MB.', 'Video', {timeOut: 5000})
                response = false;
            }


            if (response) {
                validateDimenstionVideo(file, socialicon);
            }
        }
        //************************** Video Validatoin End *********************************
    }


    function appendImage(file, socialicon, dimention) {


  var dimention_error="Image resolution falls outside of Instagram’s preferred ratio 4:5 and 16:9. The image may be scaled by Instagram."

        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {

                var base64Data = e.target.result.split(',')[1]; // Remove the "data:image/jpeg;base64," prefix
                var getRandomClass=getRandomClassName();
                var getRandomID=getRandomClassName();


                if (socialicon == 'image_or_videofb') {
                    var img_con = `<div class="cross_img_con ${getRandomClass}" id="remove_id">
  <img name='image/*' id="teting" src="${e.target.result}" width="50" height="50"/>
   <a href="#" id='cnad'> <i class='fa-solid fa-xmark cancel_mark' id="${getRandomID}"></i></a>
   <textarea id="removeit_file_id" name=fb_image[] class="removeit_file d-none"></textarea>
   <img class="uplaod-gif" src="images/newimages/loader.gif" alt="">
   </div>`;
                    $("#image_or_videofb").parent().append(img_con);
                    $('#media_type_fb').val('image');
                    if (!dimention){
                        $('#file_error_fb').removeClass('d-none').text(dimention_error)
                    }
                    else {
                        $('#file_error_fb').addClass('d-none')
                    }

                }
                else if (socialicon == 'image_or_video_insta') {
                    var img_con_ins = `<div class="cross_img_con ${getRandomClass}" id="remove_id">
  <img name='image/*' id="teting" src="${e.target.result}" width="50" height="50"/>
  <a href="#" id='cnad'> <i class='fa-solid fa-xmark cancel_mark' id="${getRandomID}"></i></a>
  <textarea id="removeit_file_id" name=inst_image[] class="removeit_file d-none"></textarea>
     <img class="uplaod-gif" src="images/newimages/loader.gif" alt="">
  </div>`;
                    $("#image_or_video_insta").parent().append(img_con_ins);
                    $('#media_type_insta').val('image');
                    if (!dimention){
                        $('#file_error_insta').removeClass('d-none').text(dimention_error)
                    }else {
                        $('#file_error_insta').addClass('d-none')
                    }


                }
                else if (socialicon == 'image_or_video_linkedin') {
                    var img_con_lin = `<div class="cross_img_con ${getRandomClass}" id="remove_id">
 <img name='image/*' id="teting" src="${e.target.result}" width="50" height="50"/>
 <a href="#" id='cnad'> <i class='fa-solid fa-xmark cancel_mark' id="${getRandomID}"></i></a>
 <textarea id="removeit_file_id" name=lin_image[] class="removeit_file d-none">}</textarea>
      <img class="uplaod-gif" src="images/newimages/loader.gif" alt="">
 </div>`;
                    $("#image_or_video_linkedin").parent().append(img_con_lin);
                    $('#media_type_linkedin').val('image');
                    if (!dimention){
                        $('#file_error_linkedin').removeClass('d-none').text(dimention_error)
                    }else {
                        $('#file_error_linkedin').addClass('d-none')
                    }
                }


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/save-image-video', // Replace with your server-side route to handle image saving
                    type: 'POST',
                    data: {image: base64Data, 'dimention': dimention},
                    success: function (response) {

                        $('.'+getRandomClass).find('textarea').val(response.path);
                        $('.'+getRandomClass).find('.uplaod-gif').remove();
                            setPreview(response.path,socialicon,getRandomID);
                    },
                });

                var mediaType = file.type.split('/')[0];





            };
            reader.readAsDataURL(file);
        }
    }
    function setPreview(path,socialicon,getRandomID){

            var prv_img_app = `<div class="mobile_post_img"><img class=" ${getRandomID}" src="content_media/${path}"/></div>`;

            if (socialicon == 'image_or_videofb') {

                     var imgOrVideo= $('#media_type_fb').val();

                     var imgCount = $(".prv_div img").length;
                     if(imgCount == 0)
                     {
                         $('.prv_div').css('column-count', '1');
                     }else{
                         $('.prv_div').css('column-count', '2');
                     }
         
                     if(imgOrVideo =='image'){
                                                                      
                            var imgCount = $(".prv_div img").length;

                             if(imgCount>4){
                                    if ($("div.div_in_div").length === 0) {
                                                                                                         
                                                   var lastImg = $(".mobile_post_img img:last");
                                                   var spanElement = $("<span id= 'my_value' style=color:white>" +1+"</span>");
                                                    lastImg.after(spanElement);
                                                    lastImg.wrap("<div class='div_in_div'></div>");
                                                    lastImg.wrap("<div class='div_in_div_bg'></div>");
                                    
                                    } else {
                                        var spanElement = $('#my_value');
                                            
                                        
                                            var currentValue = parseInt(spanElement.text());

                                          
                                            var newValue = currentValue + 1;

                                           
                                            spanElement.text(newValue.toString());
                                       
                                       
                                    }

                                    $('#mediaContainervideo_fb').html('');
                            
                        }else{
                            $('.prv_div').append(prv_img_app);
                            $('#mediaContainervideo_fb').html('');
                        }
                        


                     }else if(imgOrVideo =='video'){
                        var video = $('<video controls class="video_preview w-100">').attr('src', 'content_media/'+path);

                        $('.prv_div').html('');
                        $('#mediaContainervideo_fb').html(video);
                        
                     }else{
                        // $('.mediaContainervideo_fb').append('Please select image or video');
                        $('.prv_div').html('');
                        $('#mediaContainervideo_fb').html('');

                     }
             }else if(socialicon == 'image_or_video_insta'){

                var imgOrVideo= $('#media_type_insta').val();
                if(imgOrVideo =='image'){
                   $('.prv_div_isnt').append(prv_img_app);
                   $('#mediaContainervideo_inst').html('');


                }else if(imgOrVideo =='video'){
                    var video = $('<video controls class="video_preview_inst w-100">').attr('src', 'content_media/'+path);
                            $('#mediaContainervideo_inst').html(video);
                   $('.prv_div_isnt').html('');
                   
                }else{
                   // $('.mediaContainervideo_fb').append('Please select image or video');
                   $('.prv_div_isnt').html('');
                   $('#mediaContainervideo_inst').html('');

                }
              
            }else if(socialicon == 'image_or_video_linkedin'){

                var imgOrVideo= $('#media_type_linkedin').val();

                if(imgOrVideo =='image'){
                   $('.prv_div_link').append(prv_img_app);
                   $('#mediaContainervideo_link').html('');


                }else if(imgOrVideo =='video'){
                    var video = $('<video controls class="video_preview_link w-100">').attr('src', 'content_media/'+path);
                    $('#mediaContainervideo_link').html(video);
                   $('.prv_div_link').html('');
                  
                   
                }else{
                   // $('.mediaContainervideo_fb').append('Please select image or video');
                   $('.prv_div_link').html('');
                   $('#mediaContainervideo_link').html('');

                }


                // $('.preview_image_link').removeClass('d-none');
                // $('.video_preview_link').addClass('d-none');
                // $('.preview_image_link').attr('src', e.target.result);
            }

    }
    function appendVideo(file, socialicon) {

        if (file) {
            $('.uplaod-gif-video').removeClass('d-none');
            var reader = new FileReader();
            reader.onload = function (e) {
                var base64Data = e.target.result.split(',')[1];
                var type = "video";
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
                            setPreview(response.path,socialicon);


                        } else if (socialicon == 'image_or_video_insta') {

                            $('#inst_video').val(response.path);
                            $('#media_type_insta').val('video');
                            //  $('#image_div_ins').addClass('d-none');
                            $("#image_or_video_insta").parent().find('.cross_img_con').remove();

                            $('.video_preview_inst').removeClass('d-none');
                            $('.preview_image_inst').addClass('d-none');
                              setPreview(response.path,socialicon);

                        } else if (socialicon == 'image_or_video_linkedin') {

                            $('#link_video').val(response.path);
                            $('#media_type_linkedin').val('video');
                            $("#image_or_video_linkedin").parent().find('.cross_img_con').remove();

                            $('.video_preview_link').removeClass('d-none');
                            $('.preview_image_link').addClass('d-none');
                           
                            setPreview(response.path,socialicon);


                        }
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


        var socialicon = $(this).attr('id');
        var file = e.target.files[0];


        // *********************  Validate Size and Memes ************************
        var reader = new FileReader();
        reader.onload = function (e) {
            var mediaType = file.type.split('/')[0];
            validateFileImageVideo(file, socialicon);

        };
        reader.readAsDataURL(file);


    });

    $('.preview_div').click(function (e) {

         if($(this).attr('data-value')=='fb'){

             var parent = $(".create_preview_post ");

             parent.find('#fb_preview').addClass("active");
             parent.find('#ins_preview').addClass("d-none");
             parent.find('#tw_preview').addClass("d-none");
             parent.find('#link_preview').addClass("d-none");

             parent.find('#fb_preview').removeClass("d-none");
             parent.find('#ins_preview').removeClass("active");
             parent.find('#tw_preview').removeClass("active");
             parent.find('#link_preview').removeClass("active");


         }else if($(this).attr('data-value')=='insta'){

            var parent = $(".create_preview_post ");

            parent.find('#fb_preview').addClass("d-none");
            parent.find('#ins_preview').addClass("active");
            parent.find('#tw_preview').addClass("d-none");
            parent.find('#link_preview').addClass("d-none");

            parent.find('#fb_preview').removeClass("active");
            parent.find('#ins_preview').removeClass("d-none");
            parent.find('#tw_preview').removeClass("active");
            parent.find('#link_preview').removeClass("active");

         }else if($(this).attr('data-value')=='twitter'){

                var parent = $(".create_preview_post ");
                parent.find('#fb_preview').addClass("d-none");
                parent.find('#ins_preview').addClass("d-none");
                parent.find('#tw_preview').addClass("active");
                parent.find('#link_preview').addClass("d-none");

                parent.find('#fb_preview').removeClass("active");
                parent.find('#ins_preview').removeClass("active");
                parent.find('#tw_preview').removeClass("d-none");
                parent.find('#link_preview').removeClass("active");

         }else if($(this).attr('data-value')=='linkedin'){

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

    var timezone_name = Intl.DateTimeFormat().resolvedOptions().timeZone;
    $('.timezone').val(timezone_name);
    return true;

})
;
