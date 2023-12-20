@extends('admin.layouts.master')
@section('dashboard')
active
@endsection
@section('Main-Container')

<style>
  .title_stats_count-inner{
    display:flex;
    gap:10px;
    padding: 20px 10px 20px 15px;
    margin-bottom: 2.2rem;
    border: none;
    border-radius: 0.5rem;
    box-shadow: 0 4px 25px 0 rgba(0, 0, 0, 0.1);
    min-height:135px;
  }
  .title_stats_count-inner h2{
    font-size:16px;
    margin-bottom:15px;
  }
  .title_stats_count-inner p{
    font-size:40px;
    font-weight:bold;
  }
  .title_stats_count-inner i.fa{
    font-size:35px;
  }
  .title_stats_count-inner img{
    width:28px;
  }
  .title_stats_count-inner .fa-user{
    color:#648FFF;
  }
  .title_stats_count-inner img.dash-img {
    width: 35px;
}
  .modal-dialog{
    display:block;
  }
  .modal .modal-header{
    padding: 1.5rem 2.3rem !important;
  }
  .modal-btn{
    background: #648FFF;
  }
 /* Apply different background colors to each tile_stats_count */
.tile_stats_count .title_stats_count-inner {
  border: 1px solid #00CFE8;
}


</style>

<div class="content-wrapper">

        <div class="content-header row">
@if(session('message'))

        <script>
            // Display toastr success message
            toastr.success("{{ session('message') }}");
        </script>
@endif
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <!-- <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a> -->
            </div>
           </div>
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->

                <div class="container">
                <!-- top tiles -->
                <div class="row">
                        <div class="col-md-3 col-sm-6  tile_stats_count">
                            <div class="title_stats_count-inner">
                              <div class="count-icon"><img class='dash-img' src="{{asset('assets/images/writingapp/postusers.png')}}" alt="card-img" ></div>
                              <div class="count-content">
                                <h2 class=''>Total Users</h2>
                                <p class='m-0'>{{$totalUsersCount}}</p>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6  tile_stats_count">
                        <div class="title_stats_count-inner">
                        <div class="count-icon"><img class='dash-img' src="{{asset('assets/images/writingapp/posttickmark.png')}}" alt="card-img" ></div>
                              <div class="count-content">
                                <h2 class=''>Active Users</h2>
                                <p class='m-0'>{{$totalEnabledUsersCount}}</p>
                              </div>
</div>
                        </div>
                        <div class="col-md-3 col-sm-6  tile_stats_count">
                        <div class="title_stats_count-inner">
                              <div class="count-icon"><img class='dash-img' src="{{asset('assets/images/writingapp/postchangeuser.png')}}" alt="card-img" ></div>
                              <div class="count-content">
                                <h2 class=''>Inactive Users</h2>
                                <p class='m-0'>{{$totalDisabledUsersCount}}</p>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6  tile_stats_count">
                        <div class="title_stats_count-inner">
                              <div class="count-icon"><img class='dash-img' src="{{asset('assets/images/writingapp/potssview.png')}}" alt="card-img" ></div>
                              <div class="count-content">
                                <h2 class=''>Total Posts</h2>
                                <p class='m-0'>{{$totalPost}}</p>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6  tile_stats_count">
                        <div class="title_stats_count-inner">
                              <div class="count-icon"><img class='dash-img' src="{{asset('assets/images/writingapp/scheduleposts.png')}}" alt="card-img" ></div>
                              <div class="count-content">
                                <h2 class=''>Scheduled Posts</h2>
                                <p class='m-0'>{{$totalPostScheduled}}</p>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6  tile_stats_count">
                        <div class="title_stats_count-inner">
                              <div class="count-icon"><img class='dash-img' src="{{asset('assets/images/writingapp/postmail.png')}}" alt="card-img" ></div>
                              <div class="count-content">
                                <h2 class=''>Posted Post</h2>
                                <p class='m-0'>{{$totalPostPosted}}</p>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6  tile_stats_count">
                        <div class="title_stats_count-inner">
                              <div class="count-icon"><img class='dash-img' src="{{asset('assets/images/writingapp/webaccount.png')}}" alt="card-img" ></div>
                              <div class="count-content">
                                <h2 class=''>Total Organizations</h2>
                                <p class='m-0'>{{$totalAc}}</p>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6  tile_stats_count">
                        <div class="title_stats_count-inner">
                              <div class="count-icon"><img class='dash-img' src="{{asset('assets/images/writingapp/fbicon.png')}}" alt=" Logo"></div>
                              <div class="count-content">
                                <h2 class=''>Facebook Accounts</h2>
                                <p class='m-0'>{{$facebookCount}}</p>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6  tile_stats_count">
                        <div class="title_stats_count-inner">
                              <div class="count-icon"><img class='dash-img' src="{{asset('assets/images/writingapp/instaicon.png')}}" alt=" Logo"></div>
                              <div class="count-content">
                                <h2 class=''>Instagram Accounts</h2>
                                <p class='m-0'>{{$instagramCount}}</p>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6  tile_stats_count">
                        <div class="title_stats_count-inner">
                              <div class="count-icon"><img class='dash-img' src="{{asset('assets/images/writingapp/twiitericon.png')}}" alt=" Logo"></div>
                              <div class="count-content">
                                <h2 class=''>Twitter Accounts</h2>
                                <p class='m-0'>{{$twitterCount}}</p>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6  tile_stats_count">
                        <div class="title_stats_count-inner">
                              <div class="count-icon"><img class='dash-img' src="{{asset('assets/images/writingapp/linkedinicon.png')}}" alt=" Logo"></div>
                              <div class="count-content">
                                <h2 class=''>Linkedin Accounts</h2>
                                <p class='m-0'>{{$linkedInCount}}</p>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6  tile_stats_count">
                        <div class="title_stats_count-inner">
                        <div class="count-icon"><img class='dash-img' src="{{asset('assets/images/writingapp/accountnoattach.png')}}" alt=" Logo"></div>
                              <div class="count-content">
                                <h2 class=''>Organizations With No Platform Attached</h2>
                                <p class='m-0'>{{$acWithoutPlateFormAttached}}</p>
                              </div>
</div>
                        </div>
                </div>
                <!-- /top tiles -->

            </div>
            <!-- /page content -->


        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style='background:white'>
                    <h5 class="modal-title" id="editModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="add-new-data-sidebar request-form-s">
                        <form method="POST" action="{{ route('admin.user') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text"
                                    class="name_field form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="email">{{ __('Email Address') }}</label>


                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>


                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>


                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">

                            </div>

                            <div class="form-group">

                                <button type="submit" class="btn modal-btn sb_btn">
                                    {{ __('Add User') }}
                                </button>

                            </div>
                        </form>

                    </div>
            </div>
        </div>

        @endsection()
