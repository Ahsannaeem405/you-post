@extends('admin.layouts.master')
@section('dashboard')
active
@endsection
@section('Main-Container')


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

      

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block; margin-top: 50px" >
          <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count">{{$totalUsersCount}}</div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Active User</span>
              <div class="count">{{$totalEnabledUsersCount}}</div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Inactive User</span>
              <div class="count green">{{$totalDisabledUsersCount}}</div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i>Total Posts</span>
              <div class="count">{{$totalPost}}</div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i>Scheduled Posts</span>
              <div class="count">{{$totalPostScheduled}}</div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Posted Post</span>
              <div class="count">{{$totalPostPosted}}</div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Accounts</span>
              <div class="count">{{$totalAc}}</div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top">  <img src="{{ asset('images/fbposticon.png' ) }}" alt=" Logo"> Facebook Accounts </span>
              <div class="count">{{$facebookCount}}</div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><img src="{{ asset('images/instagram.png' ) }}" alt=" Logo"> Instagram Accounts </span>
              <div class="count">{{$instagramCount}}</div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><img src="{{ asset('images/twitterpost.png' ) }}" alt=" Logo"> Twitter Accounts </span>
              <div class="count">{{$twitterCount}}</div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><img src="{{ asset('images/linkpost.png' ) }}" alt=" Logo">Linkedin Accounts </span>
              <div class="count">{{$linkedInCount}}</div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top">Accounts with no Platform Attached</span>
              <div class="count">{{$acWithoutPlateFormAttached}}</div>
              <span class="count_bottom"></span>
            </div>


          </div>
        </div>
          <!-- /top tiles -->       
         
        </div>
        <!-- /page content -->

     
      </div>
    </div>

    @endsection()

