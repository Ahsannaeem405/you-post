@extends('admin.layouts.master')
@section('addUser')
active
@endsection
@section('Main-Container')
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
                            <div class="col-md-12 col-sm-12  tile_stats_count">
                                <h5 class="modal-title" id="editModalLabel">Add User</h5>

                                <div class="add-new-data-sidebar request-form-s">
                                    <form method="POST" action="{{ route('admin.user') }}">
                                        @csrf
                                        <input type="hidden" value="user" name="role" id="role" />
                                        <input type="hidden" value="user" name="type" id="type" />
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input id="name" type="name"
                                                class="name_field form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" required autocomplete="name"
                                                autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label for="email">{{ __('Email Address') }}</label>


                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label for="password">{{ __('Password') }}</label>


                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password">

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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()