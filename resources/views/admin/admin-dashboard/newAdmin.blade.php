

@extends('admin.layouts.master')
@section('addadmin')
active
@endsection
@section('Main-Container')


<h5 class="modal-title" id="editModalLabel">Add Admin</h5>
<div class="add-new-data-sidebar request-form-s">
        <form method="POST" action="{{ route('admin.user') }}">
            @csrf
            <input type="hidden" value="admin" name="role" id="role"/>
            <input type="hidden" value="admin" name="type" id="type"/>

            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input id="name" type="text" class="name_field form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Include the rest of your form fields here -->

            <div class="form-group">
                <button type="submit" class="btn modal-btn sb_btn">
                    {{ __('Add Admin') }}
                </button>
            </div>
        </form>
    </div>
    @endsection()