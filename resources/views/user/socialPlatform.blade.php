@extends('user_layout.subMain')


@section('content')

    @include('user.component.modals')

    <section class="all_social_platformWrp">

        <div class="all_social_platformLogo">
            <div class="all_social_platformLogoImg">
                <a href="{{ url('/') }}">
                    <img src="{{asset('images/YouPost_Logo.png')}}" class="" alt=""/>
                </a>
            </div>
            <p>
                Thanks forsigning up Doug, <br>
                Let’s add your first account and connectit’s social platforms
            </p>
        </div>


         @if (Session::has('success'))
            <div id="elementToEmbed">
                <div class="all_social_platformMain">

                    <div class="all_social_platformCnt successFullyAdded">
                        <h4>{{Session::get('success')}}: <span>“{{auth()->user()->account->name}}” </span> </h4>
                        <div>
                            <i class="fa-solid fa-check"></i>
                        </div>

                    </div>


                </div>
            </div>
        @endif


        <div class="account_result">

        </div>

        <div class="addOtherAccountMain">
            <h5>Add Another Account</h5>
            <div>
                <i class="fa-solid fa-plus" style="cursor: pointer" id="addAccount"></i>
            </div>
        </div>
        <div class="platformBtn">
            <a href="{{ url('/dashboard') }}" class="">Dashboard</a>
        </div>


    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
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
        $('#addAccount').click(function () {
            $.ajax({
                type: "post",
                url: "{{ route('store-acount')}}",
                success: function (response) {
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

        $(document).on('click', '.plateform', function () {
            var account_id=$(this).data('account');
            var all_plateform = $("input[name='plateform["+account_id+"]']:checked");
            var plateform_val = [];
            all_plateform.each(function () {
                plateform_val.push($(this).val());
            });
            $.ajax({
                type: "get",
                url: "{{ url('update_user_platforms') }}",
                data: {
                    'plateform_val': plateform_val,
                    'account_id':account_id
                },
                success: function (response) {
                    window.location.reload();
                },
                error: function (xhr, status, error) {
                    var errorData = JSON.parse(xhr.responseText);
                    RefresehAccounts();
                    if (errorData.message == 'fb_error') {

                        toastr.error(`Please Connect Your Facebook Account.
                    <div class="MDLsocial-icon p-2">
                                <a class="p-2" href="{{url('connect_to_facebook')}}/${account_id}" style="background:#3b5998 !important">
                                    <i class="fa fa-facebook-square me-2"></i> <span> Connect with Facebook</span> </a>
                            </div>

                    `);
                    } else if (errorData.message == 'twiter_error') {

                        toastr.error(`Please Connect Your Twitter Account
                     <div class="MDLsocial-icon p-2" style="background-color: #343434 !important;">
                                <a class="p-2" href="{{url('connect_twitter')}}/${account_id}">
                                <img src="{{asset('images/Twitter_Color.png')}}" class="me-2" alt="" height="14"/>Connect with X</a></div>
                        </div>
                    `);
                    } else if (errorData.message == 'insta_error') {
                        toastr.error(`Please Connect Your instagram Account
                     <div class="MDLsocial-icon p-2" style="background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%) !important;">
                                <a class="p-2" href="{{url('connect_to_instagram')}}/${account_id}">
                                    <i class="fa fa-instagram me-2"></i>Connect with Instagram</a>
                            </div>

                    `);
                    } else if (errorData.message == 'linkedin_error') {
                        toastr.error(`Please Connect Your Linkedin Account
                     <div class="MDLsocial-icon p-2" style="background-color: #0072b1 !important;">
                                <a class="p-2" href="{{url('connect_to_linkedin')}}/${account_id}">
                                    <i class="fa fa-linkedin-square me-2"></i>Connect with Linkedin</a>
                            </div>
                    `);
                    }
                }
            });


        });


    </script>
@endsection


