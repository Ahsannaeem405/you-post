@extends('admin.layouts.master')
@section('users')
    active
@endsection
@section('Main-Container')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@900&family=Playfair+Display&family=Poppins:wght@200;300;400;500;600;700;800;900&family=Raleway:wght@200;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,500&family=Work+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap');

        .dashboard-card {
            position: relative;
        }

        .dashboard-card .card-img {
            /* border-radius: 7px;
        box-shadow: 0px 0px 7px 1px rgba(0, 0, 0, 0.25); */
            height: 223px;
        }

        .dashboard-card .card-img img {
            width: 100%;
            height: 100%;
        }

        .dashboard-card .card-content h3 {
            display: flex;
            align-items: center;
            color: #000;
            font-family: 'Sora', sans-serif;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .dashboard-card .card-content p {
            color: #9B9B9B;
            font-family: 'Sora', sans-serif;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .dashboard-card .card-content {
            padding-left: 10px;
            padding-top: 5px;
        }

        .card-col {
            padding: 10px 6px !important;
        }

        .star-img {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .main-heading h2 {
            color: #000;
            font-family: 'Sora', sans-serif;
            font-size: 15px;
            font-style: normal;
            font-weight: 300;
            line-height: normal;
            padding: 8px 16px;
            border-radius: 31px;
            background: #EFEFEF;
            width: max-content;
        }

        .modal-img {
            height: 457px;
        }

        .modal-img img {
            width: 100%;
            height: 100%;
        }

        .modal-content-main {
            display: flex;
            justify-content: space-between;
            padding: 7px;
        }

        .modal-content-main .modal-btn a {
            border-radius: 10px;
            border: 0.5px solid #A4A4A4;
            padding: 8px 30px;
            color: #000;
            font-family: 'Sora', sans-serif;
            font-size: 20px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .modal-content-main .modal-edit-btn {
            background: #648FFF;
            color: white !important;
            margin-left: 8px;
        }

        .modal-btn {
            align-self: center;
        }

        /* second modal */
        .modal-main-sections {
            display: flex;
        }

        .modal-form-section {
            width: 47%;
            /* height:673px; */
            border-radius: 0px 20px 20px 0px;
            background: #FFF6F6;
            box-shadow: -5px 0px 10px 0px rgba(0, 0, 0, 0.20);
            padding: 42px;
        }

        .modal-form-section label {
            color: #676767;
            font-family: 'Sora', sans-serif;
            font-size: 20px;
            font-style: normal;
            font-weight: 300;
            line-height: normal;
        }

        .modal-form-section .name {
            border-radius: 0px 20px 20px 0px;
            background: #FFF6F6;
            box-shadow: -5px 0px 10px 0px rgba(0, 0, 0, 0.20);
        }

        .form-control {
            color: #5F5F5F;
            background: transparent !important;
        }

        .add-notes {
            color: #AAA;
            font-family: 'Sora', sans-serif;
            font-size: 12px;
            font-style: normal;
            font-weight: 300;
            line-height: normal;
            float: right;
            display: inline-block;
            margin-bottom: 3px;
        }

        .modal2-btn a {
            color: #000;
            font-family: 'Sora', sans-serif;
            font-size: 20px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            border-radius: 10px;
            border: 0.5px solid #A4A4A4;
            padding: 8px 30px;
        }

        .modal2-create-btn {
            background: #648FFF;
            color: white !important;
            margin-left: 8px;
        }

        .modal2-btn {
            float: right;
            padding-top: 102px;
        }

        .modal-thumbnails {
            width: 53%;
            text-align: center;
            padding: 50px;
        }

        .modal-thumbnails h3 {
            color: #000;
            font-family: 'Sora', sans-serif;
            font-size: 20px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            margin-bottom: 50px;
        }

        .main-books {
            display: flex;
            justify-content: space-between;
        }

        .common-books {
            width: 100%;
        }

        .or-content {
            color: #757575;
            font-family: 'Sora', sans-serif;
            font-size: 14.914px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            margin: 40px 0 50px;
        }

        .upload-file {
            width: 404px;
            margin: auto;
            border-radius: 5px;
            border: 0.5px solid #8F8F8F;
        }

        .upload-file img {
            width: 110px;
            display: block;
            margin: auto;
            margin-top: 20px;
            margin-bottom: 40px;
        }

        .dropdown-img {
            position: absolute;
            bottom: 15px;
            right: 25px;
        }


        /* right click css */
        li a {
            text-decoration: none !important;
        }

        /* Thumbnail only */
        .thumb {
            /* margin-bottom: 30px; */
            cursor: pointer;
        }

        .thumb:hover a,
        .thumb:active a,
        .thumb:focus a {
            border: 1px solid purple;
        }

        /************** For Context menu ***********/
        /* context menu */
        li,
        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .context-menu__item {
            display: block;
            margin-bottom: 4px;
        }

        .context-menu__link {
            display: block;
            padding: 4px 12px;
            padding-left: 20px;
            color: #000;
            text-decoration: none;
        }

        .color-button {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin: 0 3px;
            background: black;
            border-radius: 50%;
            cursor: pointer;
            margin: 5px;
            border: none;
        }

        .context-menu {
            display: none;
            position: absolute;
            background-color: white;
            padding: 12px 0;
            width: 180px;
            border-radius: 15px;
            background: #FFF;
            box-shadow: 0px 0px 22px 1px rgba(0, 0, 0, 0.35);
        }

        .context-menu__link:hover {
            color: #000;
            background: #F0F0F0;
        }

        .rightclick-arrow {
            float: right;
            display: inline-block;
            margin-top: 4px;
        }

        a.context-menu__link {
            color: black;
            text-decoration: none;
        }

        .context-menu__item.has-submenu ul {
            display: none;
            position: absolute;
            left: 100%;
            top: 0;
            background-color: white;
            border: 1px solid #ccc;
            padding: 5px;
        }

        .context-menu__item.has-submenu:hover ul {
            display: block;
        }


        .context-menu__items ul {
            position: absolute;
            white-space: nowrap;
            z-index: 1;
            left: -99999em;
        }

        .context-menu__items > li:hover > ul {
            left: auto;
            padding-top: 5px;
            min-width: 100%;
        }

        .context-menu__items > li li ul {
            border-left: 1px solid #fff;
        }

        .context-menu__items > li li:hover > ul {
            left: 100%;
            top: -1px;
        }

        .context-menu__item ul {
            background-color: #ffffff;
            padding: 7px 0px;
            list-style-type: none;
            text-decoration: none;
            margin-left: 180px;
            width: 100px;
            margin-top: -18px;
            border-radius: 5px;
            background: #FFF;
            box-shadow: 0px 0px 15px 1px rgba(0, 0, 0, 0.30);
        }

        /*  */
        .index-card1 {
            background-image: url(assets/images/writingapp/card-img1.png);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .index-card2 {
            background-image: url(assets/images/writingapp/card-img2.png);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .index-card3 {
            background-image: url(assets/images/writingapp/card-img3.png);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* qa */
        .modal-dialog .content-wrapper {
            margin-top: 30px !important;
            margin-bottom: 10px;
        }

        .color-box {
            width: 25px;
            border-radius: 50%;
            height: 25px;
            margin: 5px;
            display: inline-block;
            outline: none;
            border: none;
        }

        .postcont {
            font-family: 'Poppins', sans-serif;
            margin-top: 3px !important;

        }

        .postuser {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <style>
        .post-card {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s;
            cursor: pointer;
        }

        .post-card:hover {
            transform: scale(1.05);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
        }

        .timer-style {
            font-size: 16px;
        }

        .profile-icon img {
            height: 24px;
            width: 24px;
        }

        .card-body {
            padding: 20px;
        }

        .post-content h5 {
            margin: 0;
            font-size: 18px;
        }

        .post-content p {
            margin: 10px 0;
            font-size: 14px;
            color: #333;
        }

        .published-post {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: #333;
        }

        .published-post img {
            margin-right: 5px;
        }

        .approved {
            margin-left: 5px;
        }

        .post-container {
            max-height: 100px;
            /* Set a maximum height for the container */
            overflow-y: auto;
            /* Enable vertical scrolling */
        }

        .post-card {
            /* Existing styles for the post card */
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s;
            cursor: pointer;
            margin-bottom: 10px;
            /* Add margin between posts */
        }

        /* ms */
        /* #dashboard-analytics table tr th:first-child,
        #dashboard-analytics table tr td:first-child {
            padding-left: 1rem;
        } */
        #dashboard-analytics table tr th:first-child,
        #dashboard-analytics table tr td:first-child,
        #dashboard-analytics table tr th:first-child ~ th,
        #dashboard-analytics table tr td:first-child ~ td {
            padding-left: 16px;
        }

        table.dataTable.display > tbody > tr.odd > .sorting_1 {
            box-shadow: inset 0 0 0 9999px rgba(0, 0, 0, 0.023) !important;
        }

        table.dataTable tr {
            background-color: transparent !important;
        }

        div#specialdel1_wrapper {
            border: none;
            padding-top: 20px;
        }

        table.dataTable {
            border: none !important;
            padding-top: 20px;
        }

        #dashboard-analytics table td {
            padding: 0.75rem;
            box-shadow: none !important;
        }

        #special1 .form-check {
            padding-left: 3.25rem;
        }

        div.dataTables_wrapper div.dataTables_length select {
            padding: 5px 0.8rem;
        }

        .fa-ellipsis-v {
            cursor: pointer;
        }

        .modal-dialog {
            display: block;
        }

        .modal .modal-header {
            padding: 1.5rem 2.3rem !important;
        }

        .modal-btn {
            background: #648FFF;
            color: white;
        }

        /*  */
        .fb-post {
            background-color: #fff;
            border-radius: 5px;
            border: 0.5px solid #bfbfbf;
            cursor: pointer;
            margin: auto;
            width: 98%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 10px
        }

        .timer_style {
            font-family: 'Poppins', sans-serif;
            text-align: right;
        }

        .post_detailWrap {
            padding: 15px;
            padding-top: 20px;
            gap: 20px;
        }

        /* .sidebar_post{
            display:flex;
            align-items:center;

        } */
        .sidebar_post {
            background-repeat: no-repeat;
            height: 86px;
            background-size: contain;
            width: 68px;
            background-position: center;
        }

        .publishedpost {
            margin: unset;
            border-radius: 5px;
            /* width: 65%; */
            background: rgba(137, 197, 127, 0.62);
            display: flex;
            align-items: center;
        }

        .approved {
            color: #007b40;
            font-family: "Poppins", sans-serif;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .modal-dialog.post-h {
            height: 92vh;
            overflow: auto;
            border-radius: 10px;
        }

        .modal-title {
            font-family: 'Poppins', sans-serif;
        }

        .accounts-bgimg {
            position: relative;
            background-repeat: no-repeat;
            /* height: 28px; */
            /* background-image: url('
        {{ asset('images/roundcount.png') }} '); */
            background-size: contain;
            background-position: left;
        }

        .user_accounts {
            /* font-family: "Poppins", sans-serif;
            font-weight: 600;
            position: absolute;
            top: -1px;
            left: 6px;
            padding: 5px;
            color: green; */
            font-family: "Poppins", sans-serif;
            font-weight: 600;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .table-wraper-1 {
            overflow-x: auto;
        }

        .card-body {
            overflow-x: auto;
        }

        .show-link {
            padding: 0px !important;
        }

        .counter_circle {
            height: 40px;
            width: 40px;
            background: #e4e2e2;
            border-radius: 50px;
            padding-top: 10px;
        }

        /* loader */
        .three-body {
            --uib-size: 35px;
            --uib-speed: 0.8s;
            --uib-color: #5D3FD3;
            position: relative;
            position: absolute;
            left: 67px;
            display: none;
            height: var(--uib-size);
            width: var(--uib-size);
            animation: spin78236 calc(var(--uib-speed) * 2.5) infinite linear;
        }

        .three-body__dot {
            position: absolute;
            height: 100%;
            width: 30%;
        }

        .three-body__dot:after {
            content: '';
            position: absolute;
            height: 0%;
            width: 100%;
            padding-bottom: 100%;
            background-color: var(--uib-color);
            border-radius: 50%;
        }

        .three-body__dot:nth-child(1) {
            bottom: 5%;
            left: 0;
            transform: rotate(60deg);
            transform-origin: 50% 85%;
        }

        .three-body__dot:nth-child(1)::after {
            bottom: 0;
            left: 0;
            animation: wobble1 var(--uib-speed) infinite ease-in-out;
            animation-delay: calc(var(--uib-speed) * -0.3);
        }

        .three-body__dot:nth-child(2) {
            bottom: 5%;
            right: 0;
            transform: rotate(-60deg);
            transform-origin: 50% 85%;
        }

        .three-body__dot:nth-child(2)::after {
            bottom: 0;
            left: 0;
            animation: wobble1 var(--uib-speed) infinite calc(var(--uib-speed) * -0.15) ease-in-out;
        }

        .three-body__dot:nth-child(3) {
            bottom: -5%;
            left: 0;
            transform: translateX(116.666%);
        }

        .three-body__dot:nth-child(3)::after {
            top: 0;
            left: 0;
            animation: wobble2 var(--uib-speed) infinite ease-in-out;
        }

        @keyframes spin78236 {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes wobble1 {
            0%,
            100% {
                transform: translateY(0%) scale(1);
                opacity: 1;
            }

            50% {
                transform: translateY(-66%) scale(0.65);
                opacity: 0.8;
            }
        }

        @keyframes wobble2 {
            0%,
            100% {
                transform: translateY(0%) scale(1);
                opacity: 1;
            }

            50% {
                transform: translateY(66%) scale(0.65);
                opacity: 0.8;
            }
        }

        .disable-click {
            pointer-events: none !important;
        }

        /* loader */
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
            <script>
                // Display toastr success message
                toastr.success("{{ session('message') }}");
            </script>
        </div>
    @endif


    <div class="content-wrapper">

        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
            <section id="dashboard-analytics">
                <div class="row">
                    <div class="col-12 main-heading">
                        <!-- <h2>Recent</h2> -->
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">


                                    <!--  -->
                                    <div class="table-wraper-1">

                                        <table id="special1" class="display nowrap" style="width:100%">
                                            <thead class=''>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Organization</th>
                                                <th>No of Organizations</th>
                                                <th>Joining Date</th>
                                                <th>Action</th>
                                                <th>Disable</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                                <tr>

                                                    <td class="font-weight-bold">
                                                        {{$user->name}}
                                                    </td>

                                                    <td>
                                                        {{$user->email}}
                                                    </td>
                                                    <td>
                                                        <a href="#" class="dropdown-item show-link" data-toggle="modal"
                                                           data-target="#acModal" data-record-id="{{ $user->id }}">
                                                            View Details</a>
                                                    </td>
                                                    <td>
                                                        <div class="accounts-bgimg">
                                                            <div class="counter_circle">
                                                            <span class="user_accounts">
                                                                {{ $user->account_list_count }}
                                                            </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{$user->created_at->format('m-d-Y')}}
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                        <span class="dropdown-toggle" id="dropdownMenuIconButton3"
                                              data-toggle="dropdown" aria-haspopup="true"
                                              aria-expanded="false">Actions</span>
                                                            <i class="fa fa-ellipsis-v d-none" class="dropdown-toggle"
                                                               id="dropdownMenuIconButton3" data-toggle="dropdown"
                                                               aria-haspopup="true"
                                                               aria-expanded="false"></i>
                                                            <div class="dropdown-menu"
                                                                 aria-labelledby="dropdownMenuIconButton3"
                                                                 x-placement="bottom-start"
                                                                 style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">

                                                                <a href="#" class="dropdown-item edit-link"
                                                                   data-toggle="modal"
                                                                   data-target="#editModal"
                                                                   data-record-id="{{ $user->id }}"><i
                                                                        class="fa fa-edit text-primary"
                                                                        aria-hidden="true"></i>Edit</a>

                                                                <a class="dropdown-item delete delete-item" href="#"
                                                                   data-url="{{ route('admin.delete', ['user' => encrypt($user->id)]) }}">
                                                                    <i class="fa fa-trash-o text-danger"
                                                                       aria-hidden="true"></i> Delete
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input disabled" type="checkbox"
                                                                   role="switch"
                                                                   data-record-id="{{ $user->id }}" {{ $user->disabled ? 'checked' : '' }} />
                                                        </div>

                                                        <!-- <input type="checkbox" class="js-switch disabled"
                                                        data-record-id="{{ $user->id }}" {{ $user->disabled ? 'checked' : '' }}/> -->
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </section>
            <!-- Dashboard Analytics end -->

        </div>
    </div>
    </div>

    <!-- edit -->
    <div class="modal fade editModal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="color:red" id="errorText"></p>

                    <!-- Form to edit the record -->
                    <form id="editForm">
                        @csrf
                        <!-- Your form fields here -->
                        <div class="form-group">
                            <input id="user_id" type="hidden" name="user_id" value="">
                            <label for="edit_name"> Name</label>
                            <input id="edit_name" type="name"
                                   class="name_field form-control @error('name') is-invalid @enderror" name="edit_name"
                                   value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="edit_email">Email</label>
                            <input id="edit_email" type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="edit_email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="field_name">New Password</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password"
                                   autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="field_name">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation"
                                   autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <div class="three-body" id="loader">
                                <div class="three-body__dot"></div>
                                <div class="three-body__dot"></div>
                                <div class="three-body__dot"></div>
                            </div>
                            <div class="disabledit">
                                <a href="#" id="sendPasswordResetLink">Send Password Reset Link</a>
                                <span id="timer" style="display:none;"></span>

                            </div>
                        </div>
                        <!-- Add more form fields as needed -->
                        <button type="submit" class="btn modal-btn" id="udpatebtn">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- show a.c modal -->
    <div class="modal fade acModal" id="acModal" tabindex="-1" role="dialog" aria-labelledby="acModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acModalLabel">User Accounts</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body body-ac">
                    <p style="color:red" id="errorText"></p>

                    <!-- Form to edit the record -->

                </div>
            </div>
        </div>
    </div>
    <!-- post view modal -->
    <div class="modal fade postModal" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel"
         aria-hidden="true">
        <div class="modal-dialog post-h" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalLabel">Posts</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body body-post calendarmain">
                    <p style="color:red" id="errorText"></p>

                    <!-- Form to edit the record -->

                </div>
            </div>
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
                        <input type="hidden" value="user" name="role" id="role"/>
                        <input type="hidden" value="user" name="type" id="type"/>

                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text"
                                   class="name_field form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('Email Address') }}</label>

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
                                       required
                                       autocomplete="new-password">

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


        @endsection

        @section('js')
            <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
            <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
            <script src='https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js'></script>

            <!-- color btn -->

            <script>
                new DataTable('#special1', {});
            </script>
            <!-- color btn -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
            <script>
$(document).ready(function() {
    $("#sendPasswordResetLink").on("click", function() {
        sendPasswordResetLink();
    });
});

function sendPasswordResetLink() {   
    $("#sendPasswordResetLink").attr('disabled', true).css('pointer-events', 'none');    
    // $("#timer").show();  
    startTimer(120,'send');

    saveTimeInDatabase();   
   
}

function saveTimeInDatabase() {   
    var userId = $('#user_id').val();
    var currentTime = new Date();
        var formattedTime = currentTime.toLocaleTimeString();
                    $.ajax({
                            url: "{{ route('password.sendlink') }}",
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: { 
                                'user_id': userId,
                                // 'formattedTime': formattedTime,

                               
                            },
                            beforeSend: function () {
                                // Additional code if needed before sending the AJAX request
                            },
                            success: function (response) {
                                $('#editModal').modal('hide');
                                 response.resend_time; 
                                
                                 toastr.success(response.message);
                            },
                            error: function (error) {
                                toastr.error(error.responseJSON.error);
                                link.data('disabled', false);
                                link.removeClass('disabled');
                                $('#timer').hide();
                            }
                       
                      });
}




                // Handle click event for the edit link
                $(document).on('click','.edit-link',function (e) {
                    e.preventDefault();
                    $('#errorText').text('');
                    $('#udpatebtn').prop('disabled', false);

                    // Get the record ID from the data attribute
                    var recordId = $(this).data('record-id');

                    // Fetch record data using AJAX
                    $.ajax({
                        url: '/admin/get-user/' + recordId, // Define a route to fetch record data
                        method: 'GET',
                        success: function (data) {
                            $('#edit_name').val(data.name);
                            $('#edit_email').val(data.email);                           
                            $('#user_id').val(data.id);

                            var currentTime = new Date();
                            var utcTimeString = currentTime.toUTCString();
                            var dbTimeString = data.resend_time;                         
                            var dateObject = new Date(dbTimeString);
                            var utcString = dateObject.toUTCString();   
                            var time1 = new Date(utcTimeString);
                            var time2 = new Date(utcString);
                            var timeDifferenceInSeconds = Math.abs((time2 - time1) / 1000);   
                            // alert(timeDifferenceInSeconds);                         
                            if (timeDifferenceInSeconds < 60) {
                                $("#timer").show();
                                $("#sendPasswordResetLink").attr('disabled', true).css('pointer-events', 'none');    
                                startTimer(timeDifferenceInSeconds,'edit');
                            } else {                               
                                startTimer(timeDifferenceInSeconds,'edit');
                                $("#sendPasswordResetLink").attr('disabled', false).css('pointer-events', 'auto');    
                            }
                        }
                    });
                });

     var countdown; 
    function startTimer(duration, text) {        
         var timer =  0 ;
                 if(text == 'edit'){
                      timer =  60 - duration ;
                   }else{
                     timer =  duration - 60 ;
                  }       
     
     clearInterval(countdown);  
        $("#timer").show();
         countdown = setInterval(function () {
            if (timer > 0 && timer<= 60) {
                $('#sendPasswordResetLink').text('Resend link in ' + timer + ' seconds');               
                timer--;
            } else {               
                $('#sendPasswordResetLink').text('Send Password Reset Link').removeAttr('disabled').css('pointer-events', 'auto');
                $("#timer").hide();
                clearInterval(countdown);  
            }
        }, 1000);
    }

     $(document).on('click','.show-link',function (e) {
                    e.preventDefault();
                    // Get the record ID from the data attribute
                    var recordId = $(this).data('record-id');
                    // Fetch record data using AJAX
                    $.ajax({
                        url: '/admin/get-accounts/' + recordId, // Define a route to fetch record data
                        method: 'GET',
                        success: function (data) {
                            $('.body-ac').empty().append(data);

                        }
                    });
                });

                // Handle form submission
                $('#editForm').submit(function (e) {
                    e.preventDefault();
                    // Get form data
                    var formData = $(this).serialize();
                    $.ajax({
                        url: '{{route('update-user')}}',
                        method: 'GET',
                        data: formData,
                        success: function (response) {
                            toastr.success('Record updated successfully');

                            // Reload the page after a delay (for the user to see the toast message)
                            setTimeout(function () {
                                location.reload();
                            }, 1000);

                        },
                        error: function (error) {
                            // Handle error response here
                            var errorMessage = error.responseJSON;
                            $('#errorText').text(errorMessage.message);

                        }
                    });
                });


                $(document).on('click', '.disabled', function (e) {

                    var isChecked = $(this).prop('checked');
                    var recordId = $(this).data('record-id');


                    $.ajax({
                        url: '{{ route("disable-user") }}', // Use the named route
                        method: 'POST',
                        data: {
                            isChecked: isChecked,
                            recordId: recordId
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            // Handle the response from the server
                            toastr.success(response.message);

                        },
                        error: function (error) {
                            // Handle errors
                            console.error(error);
                        }
                    });
                });
            </script>



@endsection
