
    // (1) when page is loading
    $(document).ready(function(){
        $(".single_platform").each(function(index) {
            if($(this).find('input[type="checkbox"]').is(':checked')){
                $(this).addClass('active_social');
            }
        });
    });

    //(2) change it later while user will click something on my list.
    $(document).on('change',".single_platform input[type=checkbox]",function(){
        $(this).parent().toggleClass('active_social');
    });

    // Initialize Pignose Calendar
    var selectedDate=new Date();
    function settime()
    {
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

    $('#shares_tab').on("shown.bs.tab",function(){
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

    $('#rePosted_tab').on("shown.bs.tab",function(){
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

    $('#comments_tab').on("shown.bs.tab",function(){
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

    $('#favorited_tab').on("shown.bs.tab",function(){
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

    $('#friendsFollow_tab').on("shown.bs.tab",function(){
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

    $( document ).ready(function() {
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
        function apend_current_time()
        {
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

        $(document).on('change', '.select_time', function() {
            settime();
        });
        $(document).on('click', '.post_now_btn', function() {
            $('.posttime').val('now');
            apend_current_time();

        });
        $(document).on('click', '.post_later_now_btn', function() {
            $('.posttime').val('later');
            //apend_current_time();
        });

        $(document).on('click', '.open_emoji', function() {
            $('.emoji_parent > span').click();
        });

        $(document).on('click', '.myaccounts', function() {
            $('#myaccounts_modal').modal('show');
        });


        $(document).on('click', '.image_or_video', function() {

            if($(this).attr('typpe') == 'image')
            {
                $('#'+$(this).attr('fordata')).attr('accept', 'image/*');
            }else{
                $('#'+$(this).attr('fordata')).attr('accept', 'video/*');
            }
            $('#media_type_'+$(this).attr('social')).val($(this).attr('typpe'));
        });
// my code
        $(document).on('click', '.image_or_video_div', function() {

         if($(this).attr('social') == 'fb')
            {
                         $('#image_div').toggleClass('d-none');

            }else if($(this).attr('social') == 'insta'){
                $('#image_div_ins').toggleClass('d-none');
            }else if($(this).attr('social') == 'linkedin'){
                $('#image_div_linked').toggleClass('d-none');
            }


           
           
        });

// my code end
      $(document).on("click","#cnad",function() {
      
       
        $(this).closest('input').remove();

    });



        $('.file_image_video').change(function (e) {

        // my code
                 var file, img,imgwidh,imgheight;
                 var _URL = window.URL || window.webkitURL;
                 var file_size = e.target.files[0].size;
                 var ext = e.target.files[0].type;
                     ext=  String(ext).split('/');
                     ext = ext[1];
                 var socialicon=$(this).attr('id');

                   $("#file_error_fb").html("");
                   $("#file_error_ins").html("");
                   $("#file_error_link").html("");


                if ((file = this.files[0])) {
                    img = new Image();
                    var objectUrl = _URL.createObjectURL(file);
                    img.onload = function ()
                    {
                            imgwidh=this.width;
                            imgheight= this.height;

//////********************************//**************Valiation of Facebook dimension start**************//****************//****************//

                             if (socialicon == 'image_or_videofb')
                            {
                                if((imgwidh > '2000') || (imgheight > '2000')) 
                                  {

                                     $("#file_error_fb").html("<p style='color:#FF0000'>Dimension should be 100x100</p>");
                                   return false;
                                  }
                            }
//////********************************//**************Valiation of Insta dimension start**************//****************//****************//

                      else if (socialicon=='image_or_video_insta')
                            {
                                if(imgwidh>'1000' || imgheight > '1000') 
                                  {
                                     $("#file_error_ins").html("<p style='color:#FF0000'>Dimension should be 100x100</p>");
                                    return false;
                                  }
                            }
//////********************************//**************Valiation of Linked dimension start**************//****************//****************//

                     else if (socialicon=='image_or_video_linkedin')
                            {
                                if(imgwidh>'1000' || imgheight>'1000') 
                                  {
                                     $("#file_error_link").html("<p style='color:#FF0000'>Dimension should be 100x100</p>");
                                    return false;
                                  }
                            }
                   };
                    img.src = objectUrl;
                }    

//////********************************//**************Valiation of Facebook start**************//****************//****************//

                  if (socialicon=='image_or_videofb')
                     {
                      
// size validation
                    if(file_size>300000) 
                          {
                             $("#file_error_fb").html("<p style='color:#FF0000'>Image size is greater than 300kb</p>");
                            return false;
                         }
//  extension valiation
                    if((ext != 'png') && (ext != 'jpeg') && (ext !='gif') && (ext != 'jpg') ) 
                          {
                            $("#file_error_fb").html("<p style='color:#FF0000'>Image should be png</p>");
                            return false;
                          }
                    }

//////********************************//**************Valiation of Insta start**************//****************//****************//

                  else if (socialicon=='image_or_video_insta')
                    {

// size validation
                  if(file_size>300000) 
                          {
                              $("#file_error_ins").html("<p style='color:#FF0000'>Image size is greater than 300kb</p>");
                              return false;
                         }
//  extension valiation
                    if((ext != 'png') && (ext != 'jpeg') && (ext !='gif') && (ext != 'jpg') ) 
                          {
                             $("#file_error_ins").html("<p style='color:#FF0000'>Image should be jpeg</p>");
                            return false;
                          }

                   }
//////********************************//**************Valiation of linkedIN start**************//****************//****************//

                 else if (socialicon=='image_or_video_linkedin')
                    {
// size validation
                    if(file_size>300000) {
                          $("#file_error_link").html("<p style='color:#FF0000'>Image size is greater than 300kb</p>");
                          return false;
                    }
//  extension valiation
                    if((ext != 'png') && (ext != 'jpeg') && (ext !='gif') && (ext != 'jpg') ) 
                          {
                             $("#file_error_link").html("<p style='color:#FF0000'>Image should be jpeg</p>");
                            return false;
                          }
                   }
                   


                  
// my code end






            if($(this).attr('id')=='image_or_video_insta'){
                $('.must_add_image').addClass('d-none');
            }

            var file = e.target.files[0];

            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var mediaType = file.type.split('/')[0];
                    var img_con = `<div class="cross_img_con"> <img name='image/*' id="teting" src="${e.target.result}" width="50" height="50"/> <a href="#" id='cnad'> <i class='fa-solid fa-xmark cancel_mark'></i></a>  </div>`;
                    if (mediaType === 'image') {
                        $('.preview_image').removeClass('d-none');
                        $('.preview_image_my').removeClass('d-none');
                        $('.video_preview').addClass('d-none');
                        $('.preview_image').attr('src',e.target.result);
                        // my code

                        // $('.preview_image_my').attr('src',e.target.result);


                        if(socialicon=='image_or_videofb')                      
                            {
                                $("#image_or_videofb").parent().append(img_con);
                            //    $("#image_or_videofb").parent().append($("",{name:"pic",accept:'image/*',id:'teting',width:50,height:50,'src':e.target.result})).append("<a href='#' id='cnad'><i class='fa-solid fa-xmark cancel_mark'></i></a>");
                               $("#image_or_videofb").parent().append($("<input/>",{name:"myfile[]",id:'myfile',type:'file','src':e.target.result}).addClass('d-none')).append("");
                       
                            }else if(socialicon=='image_or_video_insta')                    

                            {
                              $("#image_or_video_insta").parent().append($("<img/>",{name:"pic",accept:'image/*',id:'teting',width:50,height:50,'src':e.target.result})).append("");
                              $("#image_or_video_insta").parent().append($("<input/>",{name:"myfile[]",id:'myfile',type:'file','src':e.target.result}).addClass('d-none')).append("");
                       
                            }
                            else if (socialicon=='image_or_video_linkedin') {
                                $("#image_or_video_linkedin").parent().append($("<img/>",{name:"pic",accept:'image/*',id:'teting',width:50,height:50,'src':e.target.result})).append("");
                              $("#image_or_video_linkedin").parent().append($("<input/>",{name:"myfile[]",id:'myfile',type:'file','src':e.target.result}).addClass('d-none')).append("");
                       
                            }

                        
                      
                        // end my code

                    } else if (mediaType === 'video') {
                        // Create a video element and set its source
                        $('.video_preview').removeClass('d-none');
                        $('.preview_image').addClass('d-none');
                        $('.preview_image_my').addClass('d-none');
                        // Append the video to the media container
                        var video = $('<video controls class="video_preview w-100">').attr('src', e.target.result);
                        // Append the video to the media container
                        $('#mediaContainervideo').html(video);
                    }
                };
                reader.readAsDataURL(file);
            }
        });



        var timezone_name = Intl.DateTimeFormat().resolvedOptions().timeZone;
        $('.timezone').val(timezone_name);
return true;

    });
