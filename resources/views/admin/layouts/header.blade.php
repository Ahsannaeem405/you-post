<style>
    .selected-book {
    border: 2px solid blue !important;
    }



    .header-navbar.floating-nav {
        margin: 0 !important;
        border-radius: 0 !important;
        position: fixed;
        /* width: calc(100vw - (100vw - 100%) - calc(2.2rem * 2) - 195px); */
        width:100%;
        z-index: 12;
        right: 0;
        padding: 0 20px;
    }
    ul.nav.navbar-nav{
        gap:10px;
    }
    .header-navbar.navbar-shadow {
        box-shadow: none !important;
        border-bottom: 1px solid #C3C3C3;
        height: 83px;
    }

    .header-btn a {
        color: #FFF;
        /* font-family: Sora; */
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        border-radius: 5px;
        background: #648FFF;
        padding: 6px 14px;
    }

    .header-navbar .navbar-container ul.nav li a.dropdown-user-link img {
        box-shadow: none !important;
        width: 48px;
        height: 48px;
    }

    li.header-btn.nav-item {
        align-self: center;
    }

    .navbar-container.content .user-nav.d-sm-flex.d-none {
        margin-left: 20px;
        cursor: pointer;
    }

    /* new board modal */

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
        line-height: 30px;
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

    .upload-file img{
        width: 120px;
        height: 80px;
        overflow: hidden;
        margin: 10px 10px;
    }

    .dropdown-img {
        position: absolute;
        bottom: 15px;
        right: 25px;
    }

    .ps {
        overflow: visible !important;
    }

    .upload-label {
        color: #7875FF;
        text-decoration-line: underline;
        cursor: pointer;
    }

    .common-books img {
        height: 90px;
    }

    .common-books span {
        display: block;
        margin-top: 10px;
        color: black;
    }

    .modal-dialog{
    display:block;
  }
  .modal .modal-header{
    padding: 1.5rem 2.3rem !important;
  }
  .modal-btn{
    background: #648FFF;
    color: white;
  }
    .project-heading{
        padding-left: 259px;
    margin-bottom: 0;
    }
    /* modal end */
    .header-navbar .navbar-container ul.nav li.dropdown-user .dropdown-menu-right .dropdown-item:hover, .header-navbar .navbar-container ul.nav li.dropdown-user .dropdown-menu-right .dropdown-item:active {
    background:#7367f0 !important;;
    color: #FFFFFF !important;
}
.header-navbar .navbar-container ul.nav li.dropdown-user .dropdown-menu-right{
    padding: 5px 0px 5px 0px;
}
@media (max-width: 1200px) {/* For 1024 */
    .common-books img {
    height: 42px;
    width: 42px;
}
.project-heading {
    padding-left: 25px;
}
.upload-file {
    width: 90% !important;
}
div#navbar-mobile {
    display: flex;
    justify-content: space-between;
}
}
@media (max-width: 1023.98px) {/* For 992 */
}
@media (max-width: 991.98px) {/* For 768 */
    .modal-form-section label {
    font-size: 14px !important;
}
.modal-form-section {
    width: 100% !important;
    padding: 28px 0 !important;
    padding-top:0px !important;
    border-radius:0px !important;
}
.modal-thumbnails {
    width: 100% !important;
    padding: 15px 10px !important;
}
.modal-main-sections {
    display: flex;
    width: 100% ;
    height: 535px;
    flex-wrap: wrap !important;
}
.modal-thumbnails h3 {
    font-size: 16px !important;
    margin-bottom: 15px !important;
}
.common-books span {
    font-size: 10px !important;
}
.or-content {
    margin: 9px 0 14px !important;
}
.upload-file img {
    width: 77px !important;
    height: 49px !important;
}
div#exampleModal {
    padding-left: 1rem !important;
}
.project-heading{
        font-size:30px;
    }
}
@media (max-width: 767.98px) {/* For 576 */
    .header-navbar .navbar-container ul.nav li.dropdown-user .dropdown-menu-right {
    left: -45px !important;
    padding: 0.5rem;
}
}
@media (max-width: 575.98px) {/* For 414 */
.header-navbar.floating-nav {
    /* width: calc(100vw - (100vw - 100%) - 2.4rem) !important; */
    width:100% !important;

}
.project-heading{
        font-size:18px;
    }
    .header-navbar .navbar-container ul.nav li.dropdown-user .dropdown-menu-right {
    left: -45px !important;
    padding: 0.5rem;
}

}
@media (max-width: 413.98px) {/* For 375 */
    .header-btn a {
    font-size: 12px;
    padding: 4px 7px;
}
}
@media (max-width: 374.98px) {/* For 360 */
    .header-navbar .navbar-container ul.nav li.dropdown-user .dropdown-menu-right {
     left: -45px !important;
    padding: 0.5rem;
}
}
@media (max-width: 359.98px) {/* For 320 */
    .header-navbar .navbar-container ul.nav li.dropdown-user .dropdown-menu-right {
    left: -45px !important;
    padding: 0.5rem;
}
}
.color-picker-container {
    margin-top: 20px;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <h1 class='project-heading' style='font-weight: 600;'></h1>
                </div>
                <ul class="nav navbar-nav float-right">

                    <li class="header-btn nav-item d-none">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2">+ New User</a>
                    </li>
                    @if(auth()->user()->type=="superAdmin")
                    <li class="header-btn nav-item d-none">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#adminModal">+ New Admin</a>
                    </li>
                    @endif
                    <li class="dropdown dropdown-user nav-item">
                        <!-- <a class="dropdown-toggle nav-link dropdown-user-link" href="#" > -->
                        <div class="user-nav d-sm-flex">





                      @if(auth()->user())
                        @if(auth()->user()->profile_img)

                               <img class="round dropdown-toggle dropdown-user-link" data-toggle="dropdown"style="margin-left: 20px" src="{{asset('assets/images/profile/'.auth()->user()->profile_img)}}" alt="avatar" height="40" width="40" style="cursor: pointer">

                            @else
                            <img class="round dropdown-toggle dropdown-user-link" data-toggle="dropdown"
                            src="{{ asset('assets/images/writingapp/user.png') }}" alt="avatar" style="margin-left: 20px; cursor: pointer; width: 30px;">

                        @endif
                        @endif




                            <!-- </a> -->
                            <div class="dropdown-menu dropdown-menu-right dropdown_mb">

{{--                                    <a class="dropdown-item" href="{{ route('admin.profile') }}"> --}}
{{--                                    {{ __('Profile') }}--}}
{{--                                </a>--}}
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                {{-- <div class="dropdown-divider"></div><a class="dropdown-item" href="auth-login.html"><i class="feather icon-power"></i> Logout</a> --}}
                            </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- <ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center"><a class="pb-25" href="#">
            <h6 class="text-primary mb-0">Files</h6>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="{{ asset('assets/images/icons/xls.png') }}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
                </div>
            </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="{{ asset('assets/images/icons/jpg.png') }}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
                </div>
            </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="{{ asset('assets/images/icons/pdf.png') }}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
                </div>
            </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="{{ asset('assets/images/icons/doc.png') }}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                </div>
            </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small>
        </a></li>
    <li class="d-flex align-items-center"><a class="pb-25" href="#">
            <h6 class="text-primary mb-0">Members</h6>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="{{ asset('assets/images/portrait/small/avatar-s-8.jpg') }}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="{{ asset('assets/images/portrait/small/avatar-s-1.jpg') }}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="{{ asset('assets/images/portrait/small/avatar-s-14.jpg') }}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="{{ asset('assets/images/portrait/small/avatar-s-6.jpg') }}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                </div>
            </div>
        </a></li>
</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>No results found.</span></div>
        </a></li>
</ul> -->


<!-- Modal admin -->
<div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog" >
        <div class="modal-content">
            <!-- <div class="modal-header" style='background:white'>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> -->
            <div class="modal-header" style='background:white'>
               <h5 class="modal-title" id="editModalLabel">Add Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

       <div class="add-new-data-sidebar request-form-s">
       <form method="POST" action="{{ route('admin.user') }}">
                        @csrf
                        <input type="hidden" value= "admin" name="role" id ="role"/>
                        <input type="hidden" value= "admin" name="type" id ="type"/>


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

                                <button type="submit" class="btn modal-btn sb_btn">
                                    {{ __('Add Admin') }}
                                </button>

                        </div>
                    </form>

       </div>
        </div>
    </div>
</div>





<script>


        const backgroundSelect = document.getElementById('background_type');
        const colorPickerContainer = document.getElementById('colorPickerContainer');
        const hiddenColorField = document.getElementById('hiddenColor');
        const hiddenColorField_front = document.getElementById('hiddenColor_front');

        const colorPicker = document.getElementById('colorPicker');
        $(('#colorPicker')).css('display', 'none');
        // Event listener for the select element
        backgroundSelect.addEventListener('change', function() {
            const selectedOption = backgroundSelect.value;
            colorPickerContainer.style.display = 'none';
            if (selectedOption === 'plain') {

                colorPickerContainer.style.display = 'block';
                $(('#colorPicker')).css('display', 'block');

             }else if (selectedOption === 'chalboard') {
                       hiddenColorField.value = 'black';
                       hiddenColorField_front.value = 'green';

            } else if (selectedOption === 'dry') {
                        hiddenColorField.value = 'white';

            } else if (selectedOption === 'corkboard') { }
        });


        colorPicker.addEventListener('input', function() {
            var selectedColor = $(this).val();
            hiddenColorField.value = colorPicker.value;

                });


</script>
<script>

    function showImagePreview() {
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');
        const imageNameDisplay = document.getElementById('image-name');

        if (imageInput.files && imageInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imageNameDisplay.textContent = imageInput.files[0].name;
            };


            reader.readAsDataURL(imageInput.files[0]);
        }
    }

    function selectBookadd(element, bookName) {
        document.querySelectorAll('.common-books').forEach(book => {
            book.classList.remove('selected-book');
        });

        var image =  document.querySelector('.file-upload-input').value = '';
        element.classList.add('selected-book');
        element.closest('.add-new-data-sidebar').querySelector('.selectedBookName').value = bookName;

        document.getElementById('image-preview').src = "{{ asset('assets/images/writingapp/upload-img.png') }}";
        document.getElementById('image-name').textContent = '';

        console.log('addThumbnails value:', bookName); // Log the bookName value
    }

    function clearBookSelection() {
        document.querySelectorAll('.common-books').forEach(book => {
            book.classList.remove('selected-book');
        });
        document.querySelector('.selectedBookName').value = '';

        document.getElementById('image-preview').src = "{{ asset('assets/images/writingapp/upload-img.png') }}";
        document.getElementById('image-name').textContent = '';
    }
    function validateForm() {
    const selectedBookName = document.querySelector('.selectedBookName').value;
    const selectedImage = document.querySelector('#image').value;

    const errorMessageContainer = document.querySelector('.error-message');

    if (selectedBookName === '' && selectedImage === '') {
        errorMessageContainer.textContent = 'Please select a book or upload an image.';
        return false;
    }

    errorMessageContainer.textContent = ''; // Clear previous error messages
    return true;
}


  </script>
