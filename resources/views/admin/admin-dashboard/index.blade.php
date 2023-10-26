@extends('admin.layouts.master')
@section('dashboard')
active
@endsection
@section('Main-Container')
<style>
.dashboard-card{
    position: relative;
}
.dashboard-card .card-img{
    /* border-radius: 7px;
box-shadow: 0px 0px 7px 1px rgba(0, 0, 0, 0.25); */
height: 223px;
}
.dashboard-card .card-img img{
    width:100%;
    height:100%;
}
.dashboard-card .card-content h3{
  display:flex;
  align-items:center;
    color: #000;
font-family: 'Sora', sans-serif;
font-size: 14px;
font-style: normal;
font-weight: 400;
line-height: normal;
}
.dashboard-card .card-content p{
    color: #9B9B9B;
font-family: 'Sora', sans-serif;
font-size: 14px;
font-style: normal;
font-weight: 400;
line-height: normal;
}
.dashboard-card .card-content{
    padding-left: 10px;
    padding-top: 5px;
}
.card-col{
    padding:10px 6px !important;
}
.star-img{
position: absolute;
top: 10px;
right: 10px;
}
.main-heading h2{
    color: #000;
font-family: 'Sora', sans-serif;
font-size: 15px;
font-style: normal;
font-weight: 300;
line-height: normal;
padding:8px 16px;
border-radius: 31px;
background: #EFEFEF;
width: max-content;
}

.modal-img{
    height: 457px;
}
.modal-img img{
    width:100%;
    height:100%;
}
.modal-content-main{
    display:flex;
    justify-content:space-between;
    padding: 7px;
}
.modal-content-main .modal-btn a{
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
.modal-content-main .modal-edit-btn{
    background: #648FFF;
    color: white !important;
    margin-left: 8px;
}
.modal-btn{
    align-self:center;
}
/* second modal */
.modal-main-sections{
    display:flex;
}

.modal-form-section{
    width:47%;
    /* height:673px; */
    border-radius: 0px 20px 20px 0px;
background: #FFF6F6;
box-shadow: -5px 0px 10px 0px rgba(0, 0, 0, 0.20);
padding:42px;
}
.modal-form-section label{
    color: #676767;
font-family: 'Sora', sans-serif;
font-size: 20px;
font-style: normal;
font-weight: 300;
line-height: normal;
}
.modal-form-section .name{
    border-radius: 0px 20px 20px 0px;
background: #FFF6F6;
box-shadow: -5px 0px 10px 0px rgba(0, 0, 0, 0.20);
}
.form-control {
    color: #5F5F5F;
    background: transparent !important;
}
.add-notes{
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
.modal2-btn a{
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
.modal2-create-btn{
    background: #648FFF;
    color: white !important;
    margin-left: 8px;
}
.modal2-btn{
    float:right;
    padding-top: 102px;
}
.modal-thumbnails{
    width:53%;
    text-align:center;
    padding:50px;
}
.modal-thumbnails h3{
    color: #000;
font-family: 'Sora', sans-serif;
font-size: 20px;
font-style: normal;
font-weight: 400;
line-height: normal;
margin-bottom:50px;
}
.main-books{
    display:flex;
    justify-content:space-between;
}
.common-books{
    width:100%;
}
.or-content{
    color: #757575;
font-family: 'Sora', sans-serif;
font-size: 14.914px;
font-style: normal;
font-weight: 400;
line-height: normal;
margin:40px 0 50px;
}
.upload-file{
    width: 404px;
    margin:auto;
    border-radius: 5px;
    border: 0.5px solid #8F8F8F;
}
.upload-file img{
    width: 110px;
    display:block;
    margin:auto;
    margin-top:20px;
    margin-bottom:40px;
}
.dropdown-img{
    position: absolute;
    bottom: 15px;
    right: 25px;
}


/* right click css */
li a { text-decoration: none !important; }

/* Thumbnail only */
.thumb {
  /* margin-bottom: 30px; */
  cursor: pointer;
}
.thumb:hover a, .thumb:active a, .thumb:focus a {
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

        .context-menu__items>li:hover>ul {
            left: auto;
            padding-top: 5px;
            min-width: 100%;
        }

        .context-menu__items>li li ul {
            border-left: 1px solid #fff;
        }

        .context-menu__items>li li:hover>ul {
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
.index-card1{
  background-image:url(assets/images/writingapp/card-img1.png);
  background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
.index-card2{
  background-image:url(assets/images/writingapp/card-img2.png);
  background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
.index-card3{
  background-image:url(assets/images/writingapp/card-img3.png);
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
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <div class="content-wrapper">
      
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
            <section id="dashboard-analytics">
                <div class="row">
                    <div class="col-12 main-heading">
                        <h2>Recent</h2>
                    </div>
                </div>
                <div class="container">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                          
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                   </tr>
                                    @foreach($users as $user)
                                        <tr>
                                           
                                            <td class="font-weight-bold">
                                                {{$user->name}}
                                            </td>

                                            <td>
                                                {{$user->email}}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <i class="fas fa-ellipsis-v" class="dropdown-toggle"
                                                       id="dropdownMenuIconButton3" data-toggle="dropdown"
                                                       aria-haspopup="true" aria-expanded="false"></i>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton3"
                                                         x-placement="bottom-start"
                                                         style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                        
                                                            <a href="#" class="dropdown-item edit-link" data-toggle="modal" data-target="#editModal" data-record-id="{{ $user->id }}"><i class="fa fa-edit text-primary"
                                                                                             aria-hidden="true"></i>Edit</a>

                                                            <a class="dropdown-item delete delete-item" 
                                                        href="#" data-url="{{ route('admin.delete', ['user' => encrypt($user->id)]) }}">
                                                        <i class="fa fa-trash-o text-danger" aria-hidden="true"></i> Delete
                                                        </a>
                                                   </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
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
<div class="modal fade editModal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
                      <input id="user_id" type="hidden"  name="user_id" value="">
                        <label for="edit_name"> Name</label>
                        <input id="edit_name" type="text" class="name_field form-control @error('name') is-invalid @enderror" name="edit_name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="edit_email">Email</label>
                        <input id="edit_email" type="email" class="form-control @error('email') is-invalid @enderror" name="edit_email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                 
                       </div>
                    <div class="form-group">
                        <label for="field_name">Old Password </label>
                        <input id="old_password" type="password" class="form-control @error('password') is-invalid @enderror" name="old_password" value="{{ old('password') }}" required autocomplete="password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                  
                      </div>
                    <div class="form-group">
                        <label for="field_name">New Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                   
                 </div>
                    <div class="form-group">
                        <label for="field_name">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                    <!-- Add more form fields as needed -->
                    <button type="submit" class="btn btn-primary" id="udpatebtn">Update</button>
                </form>
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
      <div class="content-wrapper">
       <div class="add-new-data-sidebar request-form-s">
       <form method="POST" action="{{ route('admin.user') }}">
                        @csrf
                       
                    <div class="form-group">
                            <label for="name" >{{ __('Name') }}</label>
                            <input id="name" type="text" class="name_field form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                    </div>
                    <div class="form-group">
                            <label for="email" >{{ __('Email Address') }}</label>

                          
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          
                    </div>                      

                    <div class="form-group">
                            <label for="password" >{{ __('Password') }}</label>

                        
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                           
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                          
                        </div>

                        <div class="form-group">
                          
                                <button type="submit" class="btn btn-primary sb_btn">
                                    {{ __('Add User') }}
                                </button>
                           
                        </div>
                    </form>
                
       </div>
     </div>
   </div>
 </div>






@endsection

@section('js')
<!-- color btn -->
Copy code
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    // Handle click event for the edit link
    $('.edit-link').click(function(e) {
        
      

        e.preventDefault();
        $('#errorText').text('');
        $('#udpatebtn').prop('disabled', false);

        // Get the record ID from the data attribute
        var recordId = $(this).data('record-id');

        // Fetch record data using AJAX
        $.ajax({
            url: '/admin/get-user/' + recordId, // Define a route to fetch record data
            method: 'GET',
            success: function(data) {
                $('#edit_name').val(data.name); 
                $('#edit_email').val(data.email); 
                $('#old_password').val(data.password); 
                $('#user_id').val(data.id); 


            }
        });
    });

    // Handle form submission
    $('#editForm').submit(function(e) {
       
      
        e.preventDefault();

        // Get form data
        var formData = $(this).serialize();

      
        $.ajax({
            url: 'update-user', 
            method: 'GET',
            data: formData,
            success: function(response) {
                toastr.success('Record updated successfully');

                // Reload the page after a delay (for the user to see the toast message)
                setTimeout(function(){
                    location.reload();
                }, 1000); 
                

              
            },
            error: function(error) {
                // Handle error response here
                var errorMessage = error.responseText; 
                $('#errorText').text(errorMessage); 
              
            }
        });
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    document.querySelectorAll('.delete-item').forEach(deleteBtn => {
        deleteBtn.addEventListener('click', function(event) {
            event.preventDefault();

            const deleteUrl = this.getAttribute('data-url');

            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the delete URL
                    window.location.href = deleteUrl;
                }
            });
        });
    });
</script>

@endsection()