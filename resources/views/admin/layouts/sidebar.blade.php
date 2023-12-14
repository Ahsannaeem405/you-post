<style>

.brand-logo img {
    width: 75px;
    display: block;
}
.main-menu .navbar-header {
    height: 8rem;
    padding: 0.35rem 1rem 0.3rem 1rem;
}
.badge.badge-up {
    top: -10px;
    padding: 4px;
    font-size: 10px;
}
.main-menu-content.ps{
    background: #23282D;
box-shadow: 1px 0px 1px 0px rgba(0, 0, 0, 0.20);
}
.main-menu.menu-fixed.menu-light.menu-accordion.menu-shadow.expanded {
    background: #23282D;
}

.main-menu-content.ps {
    height: 100vh !important;
}
.side-search-bar {
    padding: 20px 22px 15px;
    border-bottom: 1px solid white;
}
.sidebar-logo{
    width:200px;
}
.sidebar-img{
    width:35px;
}
input[type="text"] {
    width: 100%;
    border-radius: 5px;
    border: 1px solid #CCC;
    box-shadow: 0px 0px 2px 0px rgba(0, 0, 0, 0.20);
    padding: 12px;
    background:transparent;
    color:white;
}
input[type="text"]:focus{
    z-index: 1000;
}
input[type="search"]:active{
    z-index: 1000;
}
i.feather.icon-search {
    position: absolute;
    top: 32px;
    right: 37px;
    font-size: 18px;
}
.icon-search:before {
    content: "\e8bd";
    color: white;
}
img.sidebar-drop {
    margin-left: 10px;
}
::placeholder {
  color: white;
}


.drop-content {
    display: none;
    position: absolute;
    background-color: transparent;
    width: 100%;
    overflow: auto;
    z-index: 1;
}

.drop-content a {
    width: 100%;
    color: black;
    padding: 6px 75px;
    text-decoration: none;
    color: white;
    display: block;
}

.drop a:hover {
    background: #0073AA;
box-shadow: 0px 0px 2px 0px rgba(0, 0, 0, 0.30);
}

.show {display: block;}
/*  */

button#applyStylesButton {
    z-index: 2222;
    position: fixed;
    left: 20px;
    padding: 0;
    top: 28px;
    border: 0;
    outline: 0;
    background:transparent;
}
button#removeStylesButton {
    position: absolute;
    right: 7px;
    top: 8px;
    border: 0;
    outline: 0;
    background:transparent;
}
.main-menu {
    z-index: 22222;
}

.fa-bars:before {
    content: "\f0c9";
    font-size: 25px;
}
#applyStylesButton,
    #removeStylesButton{
        display:none;
    }
    img.sidebar-cross {
    width: 29px;
    z-index: 222;
    position: relative;
}
.main-menu.menu-native-scroll .main-menu-content {
    overflow-y: unset;
}
@media (max-width: 1200.98px) {
    #applyStylesButton,
    #removeStylesButton{
        display:block;
    }
    .main-menu-content {
    margin-top: 30px !important;
}
}
</style>

<!-- <button id="open-sidebar">Open Sidebar</button>
    <div id="sidebar mobile-sidebar">
        <button id="close-sidebar">Close</button>
        <div class="main-menu-content">
        <div class="side-search-bar">
        <input type="search" placeholder='Search files, Boards'>
        <i class="feather icon-search"></i>
        </div>

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" nav-item @yield('dashboard')">
                <a href="{{url('/')}}">
                    <span style='margin: 0 15px;'><img class='sidebar-img' src="{{asset('assets/images/writingapp/project-icon.svg')}}" alt="card-img" ></span>
                <span class="menu-title" data-i18n="Dashboard">Your Projects</span></a>
            </li>
            <li class=" nav-item @yield('adminview')">
                <a href="">
                <span style='margin: 0 15px;'><img class='sidebar-img' src="{{asset('assets/images/writingapp/draft-icon.svg')}}" alt="card-img" ></span>
                    <span class="menu-title" data-i18n="Admin">Drafts</span></a>
            </li>
            <li class=" nav-item @yield('trash')">
                <a href="">
                <span style='margin: 0 15px;'><img class='sidebar-img' src="{{asset('assets/images/writingapp/draft-icon.svg')}}" alt="card-img" ></span>
                    <span class="menu-title" data-i18n="Admin">Trash</span></a>
            </li>
            <li style='border-bottom: 1px solid white'>
           </li>

            {{-- <li class=" nav-item drop-btn" onclick="myFunction()">
                <a href="#" >
                <span style='margin: 0 15px;'><img class='sidebar-img' src="{{asset('assets/images/writingapp/chapter-icon.svg')}}" alt="card-img" ></span>
                    <span class="menu-title" data-i18n="Users">Chapters</span>
                    <img class='sidebar-drop' src="{{asset('assets/images/writingapp/sidebar-arrow.svg')}}" alt="card-img" >
                </a>

            </li> --}}

            <div class="drop">
        <div id="myDrop" class="drop-content">
            <a href="{{url('chapters')}}">Chapter# 1</a>
            <a href="#">Chapter# 2</a>
            <a href="#">Chapter# 3</a>
            <a href="#">Chapter# 4</a>
            <a href="#">Chapter# 5</a>
        </div>
        </div>


        </ul>
    </div>
</div> -->



<button id="applyStylesButton">
    <i class="fa fa-bars" ></i>
    <i class="fa fa-xmark"></i>
    </button>
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
<button id="removeStylesButton">
<img class='sidebar-cross' src="{{asset('assets/images/writingapp/sidebar-cross.png')}}" alt="card-img" >
</button>
    <div class="main-menu-content">
        <div class="side-search-bar">
        <img class='sidebar-logo' src="{{ asset('images/youpostlogo2.png' ) }}" alt="card-img" >
        </div>

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

           <!-- <h2 style='padding: 10px 32px 0;font-weight: 900;'>Admin</h2> -->
            <li class=" nav-item @yield('dashboard')">
                <a href="{{ route('admin.dashboard') }}">
               
                    <span style='margin: 0 15px;'><img class='sidebar-img' src="{{asset('assets/images/writingapp/monitor.png')}}" alt="card-img" ></span>
                <span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
            </li>
            <li class=" nav-item @yield('users')">
                <a href="{{ route('admin.showusers') }}">
                    <span style='margin: 0 15px;'><img class='sidebar-img' src="{{asset('assets/images/writingapp/project-icon.svg')}}" alt="card-img" ></span>
                <span class="menu-title" data-i18n="Dashboard">Users</span></a>
            </li>
            @if(auth()->user()->type=="superAdmin")

            <li class=" nav-item @yield('admins')">
                <a href="{{ route('admin.showAdmins') }}">
                    <span style='margin: 0 15px;'><img class='sidebar-img' src="{{asset('assets/images/writingapp/project-icon.svg')}}" alt="card-img" ></span>
                <span class="menu-title" data-i18n="Dashboard">Admins</span></a>
            </li>
            @endif
            <!-- <li class=" nav-item @yield('adminview')">
                <a href="">
                <span style='margin: 0 15px;'><img class='sidebar-img' src="{{asset('assets/images/writingapp/draft-icon.svg')}}" alt="card-img" ></span>
                    <span class="menu-title" data-i18n="Admin">Drafts</span></a>
            </li> -->
            <!-- <li class=" nav-item @yield('trash')">
                <a href="">
                <span style='margin: 0 15px;'><img class='sidebar-img' src="{{asset('assets/images/writingapp/draft-icon.svg')}}" alt="card-img" ></span>
                    <span class="menu-title" data-i18n="Admin">Trash</span></a>
            </li> -->
            <!-- <li style='border-bottom: 1px solid white'> -->
                <!-- <a href="{{url('employes')}}"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Admin">Drafts</span></a> -->
            <!-- </li> -->
            <!-- <li class=" nav-item @yield('employes')">
                <a href="{{url('employes')}}">
                <span style='margin: 0 15px;'><img class='sidebar-img' src="{{asset('assets/images/writingapp/board-icon.svg')}}" alt="card-img" ></span>
                    <span class="menu-title" data-i18n="Roles">Boards</span></a>
            </li> -->

            {{-- <li class=" nav-item drop-btn" onclick="myFunction()">
                <a href="#" >
                <span style='margin: 0 15px;'><img class='sidebar-img' src="{{asset('assets/images/writingapp/chapter-icon.svg')}}" alt="card-img" ></span>
                    <span class="menu-title" data-i18n="Users">Chapters</span>
                    <img class='sidebar-drop' src="{{asset('assets/images/writingapp/sidebar-arrow.svg')}}" alt="card-img" >
                </a>

            </li> --}}

            <div class="drop">
            <!-- <button onclick="myFunction()" class="drop-btn">Dropdown</button> -->
        <div id="myDrop" class="drop-content">
            <a href="{{url('chapters')}}">Chapter# 1</a>
            <a href="#">Chapter# 2</a>
            <a href="#">Chapter# 3</a>
            <a href="#">Chapter# 4</a>
            <a href="#">Chapter# 5</a>
        </div>
        </div>


        </ul>


        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <!-- <h2 style='padding: 10px 32px 0;font-weight: 900;'>Admin</h2> -->
      @if(request()->is('user/chapter-detail/*'))

        @if(isset($relatedChapters))
           <p style="margin-top:10px; padding: 0 17px;"><img class='sidebar-img' src="{{asset('assets/images/connect.png')}}" alt="card-img" style="width: 40px;">Connected Chapters</p>

        @foreach ($relatedChapters as $chapter)
         <li class=" nav-item ">
         <a href="javascript:void(0)">
                    <span style='margin: 0 15px;'><img class='sidebar-img' src="{{asset('assets/images/writingapp/myconecticon.png')}}" alt="card-img" ></span>
                <span class="menu-title" data-i18n="Dashboard">{{$chapter->name}} </span></a>
            </li>

       @endforeach
       @endif
       @endif
       </ul>


    </div>
</div>
<script>
    $(document).ready(function () {
      // Function to apply styles when the screen width is less than 1200 pixels
      function applyStyles() {
        $(".vertical-overlay-menu .main-menu").css({
          opacity: 1,
          "-webkit-transform": "translate3d(, 0, 0)",
          transform: "translate3d(260px, 0, 0)",
          "-webkit-transition": "width 0.25s, opacity 0.25s, -webkit-transform 0.25s",
          transition: "width 0.25s, opacity 0.25s, -webkit-transform 0.25s",
          width: "260px",
          left: "-260px",
        });
      }

      // Function to remove styles
      function removeStyles() {
        $(".vertical-overlay-menu .main-menu").css({
          opacity: "",
          "-webkit-transform": "",
          transform: "",
          "-webkit-transition": "",
          transition: "",
          width: "",
          left: "",
        });
      }

      // Add click event handlers for the buttons
      $("#applyStylesButton").click(function () {
        applyStyles();
        // Check screen width when Apply Styles button is clicked
        if ($(window).width() < 1200) {
          applyStyles();
        }
      });

      $("#removeStylesButton").click(function () {
        removeStyles();
      });

      // Check screen width on window resize
      $(window).resize(function () {
        if ($("#applyStylesButton").data("clicked") && $(window).width() < 1200) {
          applyStyles();
        }
      });
    });
  </script>
<!-- <script>
    // $(document).ready(function () {
      // Function to apply styles when the screen width is less than 1200 pixels
      function applyStyles() {
        // alert('helo');
        $(".vertical-overlay-menu .main-menu").css({
          opacity: 1,
          "-webkit-transform": "translate3d(0, 0, 0)",
          transform: "translate3d(260px, 0, 0)",
          "-webkit-transition": "width 0.25s, opacity 0.25s, -webkit-transform 0.25s",
          transition: "width 0.25s, opacity 0.25s, -webkit-transform 0.25s",
          width: "260px",
          left: "-260px",
        });
      }

      // Function to remove styles
      function removeStyles() {
        $(window).resize(function () {
        if ($(window).width() < 1200) {
          applyStyles();
        } else {
          removeStyles();
        }
      });
        $(".vertical-overlay-menu .main-menu").css({
          opacity: "",
          "-webkit-transform": "",
          transform: "",
          "-webkit-transition": "",
          transition: "",
          width: "",
          left: "",
        });
      }

      // Apply styles when the document is ready
      applyStyles();

      // Add click event handlers for the buttons
      $("#applyStylesButton").click(function () {
        applyStyles();
      });

      $("#removeStylesButton").click(function () {
        removeStyles();
      });

      // Check screen width on window resize

    // });
</script> -->

<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDrop").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it


// window.onclick = function(event) {
//   if (!event.target.matches('.drop-btn')) {
//     var dropdowns = document.getElementsByClassName("drop-content");
//     var i;
//     for (i = 0; i < dropdowns.length; i++) {
//       var openDropdown = dropdowns[i];
//       if (openDropdown.classList.contains('show')) {
//         openDropdown.classList.remove('show');
//       }
//     }
//   }
// }
</script>
