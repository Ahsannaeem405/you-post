@extends('user_layout.subMain')


@section('content')

    @include('user.component.modals')
    <style>
    .empty-input {
            border: 1px solid red !important;
        }
        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 160px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
        .loading_account{
            opacity:0.3;
        }
</style>
<div class="platformBtn">
            <a href="{{ url('/dashboard') }}" id="checkAndFocus" class="checkAndFocus">Dashboard</a>
        </div>
    <section class="all_social_platformWrp">
        <div class="all_social_platformLogo">
            <div class="all_social_platformLogoImg mt-4">
                <a href="{{ url('/') }}">
                    <img src="{{asset('images/YouPost_Logo.png')}}" class="" alt=""/>
                </a>
            </div>
            <p style="color: #2F2F2F; text-align: center;font-size: 18px;font-style: normal;font-weight: 300;line-height: normal; margin-top:20px;">
                Thanks for signing up, <br>
                Let’s add your first account and connect it’s social platforms
            </p>

        </div>


        @if (Session::has('success'))
            <div id="elementToEmbed ">
                <div class="all_social_platformMain">

                    <div class="all_social_platformCnt successFullyAdded">
                        <h4>{{Session::get('success')}}: <span>“{{ session('accname') }}” </span></h4>
                        <div>
                            <i class="fa-solid fa-check"></i>
                        </div>

                    </div>


                </div>
            </div>
            <script>
             
  
        setTimeout(function() {
            
            $('.all_social_platformMain').fadeOut(500); 
        }, 1000); 

        </script>
        @endif


        <div class="account_result">

        </div>



        <div style="text-align:center; margin-top:
           30px"  class="addOtherAccountMain" id="addAccount">
            <button class="btn btn-primary add_account"><img src="{{asset('images/sum-icon.svg')}}" style="    padding-right: 5px; width: 17px;
            height: 13px;;"  id="addAccount">Add New
                Account</button>

         </div>



        <!-- <div class="platformBtn">
            <a href="{{ url('/dashboard') }}" id="checkAndFocus" class="checkAndFocus">Dashboard</a>
        </div> -->


    </section>
@endsection

@section('js')
    <!-- Include SweetAlert CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function () {
            $(document).on('click', '.checkAndFocus', function () {
                event.preventDefault();
                var inputs = $(".all_social_platformCnt input");
                var isEmpty = false;
                inputs.each(function() {
                    var tooltip = this.nextElementSibling; // Get the tooltip span
                    if ($(this).val().trim() === "") {
                        isEmpty = true;
                        $(this).addClass("empty-input");
                       } else {
                        $(this).removeClass("empty-input");
                        }
                });
                if (isEmpty) {
                    inputs.each(function() {
                        if ($(this).val().trim() === "") {
                            $(this).focus();
                            return false; // Stop after focusing on the first empty input
                        }
                    });
                }else{
                    window.location.href = "{{ url('/dashboard') }}";
                }
             });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            RefresehAccounts();
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

        var checkboxes = document.querySelectorAll('.customCheckbox');
        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                var grandparentElement = checkbox.parentNode.parentNode;

                if (checkbox.checked) {
                    grandparentElement.classList.add('showColorIcon');
                } else {
                    grandparentElement.classList.remove('showColorIcon');
                }
            });
        });


        //update account
        $(document).on('change', '.account_name', function () {
            var account_id = $(this).data('account');
            var account_name = $(this).val();
            $.ajax({
                type: "post",
                url: "{{ route('update-account-name')}}",
                data: {account_id, account_name},
                success: function (response) {
                    RefresehAccounts();
                }
            });
        });

        //creating new account
        $(document).on('click', '#addAccount', function () {
            $(this).prop('disabled', true);
            $('.add_account').addClass('loading_account');
            var test=  $(this);

            $.ajax({
                type: "post",
                url: "{{ route('store-acount')}}",
                success: function (response) { 
                    setTimeout(function () {
                        test.prop('disabled', false);
                $('.add_account').removeClass('loading_account');
            }, 500);
                    RefresehAccounts();
                   
                }
            });
        });
   
        //refresh all accounts ui
        function RefresehAccounts() {
            $.ajax({
                type: "post",
                url: "{{ route('refresh-accounts')}}",
                success: function (response) {
                    $('.account_result').empty().append(response);
                }
            });
        }


        $(document).on('click', '.plateform_btn', function () {           
           
            var account_id = $(this).data('account');
            var plateform_val= $(this).val();    
           
            $.ajax({
                type: "get",
                url: "{{ url('reconnect_user__accounts') }}",
                data: {
                    'plateform_val': plateform_val,
                    'account_id': account_id
                },
                success: function (response) {    

                 
                    if(response.conet_or_not=='no' ){
                        $('#' +response.message + 'btn' ).text('Disconnect'); 
                        toastr.success(`${response.message} connected successfully!                   
                    `);
                    }
                    else{
                        toastr.success(`${response.message} Disconnected successfully!                   
                    `);
                    $('#' +response.message + 'btn' ).text('Reconncet'); 
                    } 

               

                },
                error: function (xhr, status, error) {
                   
                   
                }
            });


        });
      

        $(document).on('click', '.plateform', function () {
            var isChecked = $(this).prop('checked');
            var currentclick= $(this);
            var account_id = $(this).data('account');
            var plateform_val= $(this).val();
        //    alert(plateform_val);
            // var all_plateform = $("input[name='plateform[" + account_id + "]']:checked");         

            // var plateform_val = [];
            // plateform_val.push($(this).val());
            // all_plateform.each(function () {
            //     plateform_val.push($(this).val());
            // });

            $.ajax({
                type: "get",
                url: "{{ url('update_user_platforms_accounts') }}",
                data: {
                    'plateform_val': plateform_val,
                    'account_id': account_id,
                    'isChecked':isChecked
                },
                success: function (response) {
                    var message = response.message;
                     var status = response.status;  



                     if (message == 'Facebook') { 

                                if(status =='on'){
                                         var closestLabel = currentclick.closest('label'); 
                                         closestLabel= closestLabel.parent().find('.fb-recont_btn');               
                                         var newHref = "{{ url('connect_to_facebook') }}";                    
                                         closestLabel.attr('href', newHref);  
                                         closestLabel.removeClass('d-none').show();                                       
                                }else{                                  
                                    var closestLabel = currentclick.closest('label'); 
                                    closestLabel_conne= closestLabel.parent().find('.fb-conect_btn'); 
                                    closestLabel_conne.removeClass('show').hide();                                  
                                    closestLabel= closestLabel.parent().find('.fb-recont_btn');  
                                    closestLabel.removeClass('show').hide();                                       
                                }             
                          
                        } else if (message == 'Twitter') {

                                if(status =='on'){
                                         var closestLabel = currentclick.closest('label'); 
                                         closestLabel= closestLabel.parent().find('.T-recont_btn');               
                                         var newHref = "{{ url('connect_twitter') }}";                    
                                         closestLabel.attr('href', newHref);  
                                         closestLabel.removeClass('d-none').show();
                                                                             
                                }else{       
                                    var closestLabel = currentclick.closest('label'); 
                                    closestLabel_conne= closestLabel.parent().find('.T-conect_btn'); 
                                    closestLabel_conne.removeClass('show').hide();                                  
                                    closestLabel= closestLabel.parent().find('.T-recont_btn');  
                                    closestLabel.removeClass('show').hide();
                                }  


                        } else if (message == 'Instagram') {
                                if(status =='on'){
                                        var closestLabel = currentclick.closest('label'); 
                                         closestLabel= closestLabel.parent().find('.instrecont_btn');               
                                         var newHref = "{{ url('connect_to_instagram') }}";                    
                                         closestLabel.attr('href', newHref);  
                                         closestLabel.removeClass('d-none').show();                                              
                                      
                                }else{
                                    var closestLabel = currentclick.closest('label'); 
                                    closestLabel_conne= closestLabel.parent().find('.instconect_btn'); 
                                    closestLabel_conne.removeClass('show').hide();                                  
                                    closestLabel= closestLabel.parent().find('.instrecont_btn');  
                                    closestLabel.removeClass('show').hide();                                                                  
                                }  

                        } else if (message == 'Linkedin') {                          
               
                                if(status =='on'){
                                        var closestLabel = currentclick.parent();
                                         closestLabel= closestLabel.siblings('.l_recont_btn');               
                                         var newHref = "{{ url('connect_to_linkedin') }}";                    
                                         closestLabel.attr('href', newHref);  
                                         closestLabel.removeClass('d-none').css('display','block');
                                         
                                }else{                                   
                                         var closestLabel = currentclick.closest('label');                                       
                                         closestLabel_conne= closestLabel.parent().find('.l-conect_btn'); 
                                         closestLabel_conne.removeClass('show').hide();                                         
                                         closestLabel= closestLabel.parent().find('.l_recont_btn');
                                         closestLabel.removeClass('show').hide();                                    
                                                                            
                                }  

                        }                              
                 
                },
                error: function (xhr, status, error) {
                   
                    var errorData = JSON.parse(xhr.responseText);                 
                

                    if (errorData.message == 'fb_error') {

                               var closestLabel = currentclick.closest('label'); 
                               closestRecon= closestLabel.parent().find('.fb-recont_btn'); 
                               closestCon= closestLabel.parent().find('.fb-conect_btn'); 

                        if(errorData.status == 'false'){                           
                               closestRecon.removeClass('show').hide(); 
                               closestCon.removeClass('d-none').hide();        
                        }else{                                                             
                               var closestLabel = currentclick.closest('label'); 
                                closestLabel= closestLabel.parent().find('.fb-conect_btn');               
                                var newHref = "{{ url('connect_to_facebook') }}" + '/' + account_id;                    
                                closestLabel.attr('href', newHref);   

                               closestRecon.removeClass('show').hide(); 
                               closestCon.removeClass('d-none').show();
                        }                     
                   
                               

                    } else if (errorData.message == 'twiter_error') {
                              var closestLabel = currentclick.closest('label'); 
                               closestRecon= closestLabel.parent().find('.T-recont_btn'); 
                               closestCon= closestLabel.parent().find('.T-conect_btn'); 

                        if(errorData.status == 'false'){                           
                            closestRecon.removeClass('show').hide(); 
                               closestCon.removeClass('d-none').hide();
        
                        }else{
                             var closestLabel = currentclick.closest('label'); 
                            closestLabel= closestLabel.parent().find('.T-conect_btn');               
                            var newHref = "{{ url('connect_twitter') }}" + '/' + account_id;                    
                            closestLabel.attr('href', newHref);    

                             closestRecon.removeClass('show').hide(); 
                               closestCon.removeClass('d-none').show(); 

                        }

                   

                        
                    //     toastr.error(`Please Connect Your Twitter Account
                    //  <div class="MDLsocial-icon p-2" style="background-color: #343434 !important;">
                    //             <a class="p-2" href="{{url('connect_twitter')}}/${account_id}">
                    //             <img src="{{asset('images/Twitter_Color.png')}}" class="me-2" alt="" height="14"/>Connect with X</a></div>
                    //     </div>
                    // `);

                    
                    } else if (errorData.message == 'insta_error') {

                              var closestLabel = currentclick.closest('label'); 
                               closestRecon= closestLabel.parent().find('.instrecont_btn'); 
                               closestCon= closestLabel.parent().find('.instconect_btn');

                        if(errorData.status == 'false'){                           
                            closestRecon.removeClass('show').hide(); 
                               closestCon.removeClass('d-none').hide();
        
                        }else{
                                   var closestLabel = currentclick.closest('label'); 
                                    closestLabel= closestLabel.parent().find('a');               
                                    var newHref = "{{ url('connect_to_instagram') }}" + '/' + account_id;                    
                                    closestLabel.attr('href', newHref);  
                                    closestRecon.removeClass('show').hide(); 
                                    closestCon.removeClass('d-none').show();
                        }                     
                                     
                   
                    } else if (errorData.message == 'linkedin_error') {

                            var closestLabel = currentclick.closest('label'); 
                               closestRecon= closestLabel.parent().find('.l_recont_btn'); 
                               closestCon= closestLabel.parent().find('.l-conect_btn');
                        
                        if(errorData.status == 'false'){                           
                               closestRecon.removeClass('show').hide(); 
                               closestCon.removeClass('d-none').hide();
        
                        }else{                                              
                                var newHref = "{{ url('connect_to_linkedin') }}" + '/' + account_id;                    
                                closestCon.attr('href', newHref); 
                               closestRecon.removeClass('show').hide(); 
                               closestCon.removeClass('d-none').show();

                        }

                      
                    //     toastr.error(`Please Connect Your Linkedin Account
                    //  <div class="MDLsocial-icon p-2" style="background-color: #0072b1 !important;">
                    //             <a class="p-2" href="{{url('connect_to_linkedin')}}/${account_id}">
                    //                 <i class="fa fa-linkedin-square me-2"></i>Connect with Linkedin</a>
                    //         </div>
                    // `);
                  
                    }
                }
            });


        });
        $(document).on('click', '.index_delete', function () {
            var $obj=$(this);
            Swal.fire({
                title: 'Are you sure?',
                text: 'This action cannot be undone!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                  $obj.closest('form').submit();
                }
            });
        })

    </script>

@endsection


