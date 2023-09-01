<style>
*=====Sidebar=====*/
/* Google Font Import - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

:root {
    /* ===== Colors ===== */
    --body-color: #E4E9F7;
    --sidebar-color: #FFF;
    --primary-color: #AA94FF;
    --primary-color-light: #F6F5FF;
    --toggle-color: #DDD;
    --text-color: #707070;

    /* ====== Transition ====== */
    --tran-03: all 0.2s ease;
    --tran-03: all 0.3s ease;
    --tran-04: all 0.3s ease;
    --tran-05: all 0.3s ease;
}

/* body{
    min-height: 100vh;
    background-color: var(--body-color);
    transition: var(--tran-05);
} */

/* ::selection{
    background-color: var(--primary-color);
    color: #fff;
} */

/* body.dark {
    --body-color: #18191a;
    --sidebar-color: #242526;
    --primary-color: #3a3b3c;
    --primary-color-light: #3a3b3c;
    --toggle-color: #fff;
    --text-color: #ccc;
} */

.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 150px;
    padding: 10px 14px;
    background: var(--sidebar-color);
    transition: var(--tran-05);
    z-index: 100;
}

.sidebar.close {
    width: 88px;

    .image-text.image_text {
        padding: 20px 0px 5px 0px;
    }
}

/* ===== Reusable code - Here ===== */
.sidebar li {
    height: 50px;
    list-style: none;
    display: flex;
    align-items: center;
    margin-top: 10px;
}

.sidebar header .image,
.sidebar .icon {
    min-width: 60px;
    border-radius: 6px;
}

.sidebar .icon {
    min-width: 60px;
    border-radius: 6px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.sidebar .text,
.sidebar .icon {
    color: #000;
    transition: var(--tran-03);
}

.sidebar .text {
    font-size: 17px;
    font-weight: 500;
    white-space: nowrap;
    opacity: 1;
}

.sidebar.close .text {
    opacity: 0;
}

/* =========================== */

.sidebar header {
    position: relative;
}

.sidebar header .image-text {
    display: flex;
    align-items: center;
}

.sidebar header .logo-text {
    display: flex;
    flex-direction: column;
}

header .image-text .name {
    margin-top: 2px;
    font-size: 18px;
    font-weight: 600;
}

header .image-text .profession {
    font-size: 16px;
    margin-top: -2px;
    display: block;
}

.sidebar header .image {
    display: flex;
    align-items: center;
    justify-content: center;
}

.sidebar header .image img {
    width: 40px;
    border-radius: 6px;
}

.sidebar header .toggle {
    position: absolute;
    top: 50%;
    right: -25px;
    transform: translateY(-50%) rotate(180deg);
    height: 25px;
    width: 25px;
    background-color: var(--primary-color);
    color: var(--sidebar-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    cursor: pointer;
    transition: var(--tran-05);
}

body.dark .sidebar header .toggle {
    color: var(--text-color);
}

.sidebar.close .toggle {
    transform: translateY(-50%) rotate(0deg);
}

.sidebar .menu {
    margin-top: 40px;
}

.sidebar li.search-box {
    border-radius: 6px;
    background-color: var(--primary-color-light);
    cursor: pointer;
    transition: var(--tran-05);
}

.sidebar li.search-box input {
    height: 100%;
    width: 100%;
    outline: none;
    border: none;
    background-color: var(--primary-color-light);
    color: var(--text-color);
    border-radius: 6px;
    font-size: 17px;
    font-weight: 500;
    transition: var(--tran-05);
}

.sidebar li a {
    list-style: none;
    height: 100%;
    background-color: transparent;
    display: flex;
    align-items: center;
    height: 100%;
    width: 100%;
    border-radius: 6px;
    text-decoration: none;
    transition: var(--tran-03);
}

.sidebar li a:hover {
    background-color: var(--primary-color);
}

.sidebar li a:hover .icon,
.sidebar li a:hover .text {
    color: var(--sidebar-color);
}

body.dark .sidebar li a:hover .icon,
body.dark .sidebar li a:hover .text {
    color: var(--text-color);
}

.sidebar .menu-bar {
    height: calc(100% - 55px);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow-y: scroll;
}

.menu-bar::-webkit-scrollbar {
    display: none;
}

.sidebar .menu-bar .mode {
    border-radius: 6px;
    background-color: var(--primary-color-light);
    position: relative;
    transition: var(--tran-05);
}

.menu-bar .mode .sun-moon {
    height: 50px;
    width: 60px;
}

.mode .sun-moon i {
    position: absolute;
}

.mode .sun-moon i.sun {
    opacity: 0;
}

body.dark .mode .sun-moon i.sun {
    opacity: 1;
}

body.dark .mode .sun-moon i.moon {
    opacity: 0;
}

.menu-bar .bottom-content .toggle-switch {
    position: absolute;
    right: 0;
    height: 100%;
    min-width: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    cursor: pointer;
}

.toggle-switch .switch {
    position: relative;
    height: 22px;
    width: 40px;
    border-radius: 25px;
    background-color: var(--toggle-color);
    transition: var(--tran-05);
}

.switch::before {
    content: '';
    position: absolute;
    height: 15px;
    width: 15px;
    border-radius: 50%;
    top: 50%;
    left: 5px;
    transform: translateY(-50%);
    background-color: var(--sidebar-color);
    transition: var(--tran-04);
}

body.dark .switch::before {
    left: 20px;
}

.home {
    position: absolute;
    top: 0;
    top: 0;
    left: 250px;
    height: 100vh;
    width: calc(100% - 250px);
    background-color: var(--body-color);
    transition: var(--tran-05);
}

.home .text {
    font-size: 30px;
    font-weight: 500;
    color: black;
   
}

.sidebar.close~.home {
    left: 88px;
    height: 100vh;
    width: calc(100% - 88px);
}`

.sideWidth {
    width: 250px !important; */
 background-color:red;
} 

body.dark .home .text {
    color: var(--text-color);
}

/* Your existing CSS code */

/* Add a media query for tablet view */

/* Your existing CSS code */

/* Add a media query for mobile view */
/* Your existing CSS code */

/* Add a media query for mobile view */
/* Your existing CSS code */

/* Adjust sidebar for tablet view */
/* Your existing CSS code */

/* Adjust sidebar for tablet and mobile view */
/* Your existing CSS code */

/* Adjust sidebar for small screens */
/* @media (max-width: 768px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: fixed;
        top: 0;
        left: 0;
        transition: none;
        transform: translateY(-100%);
        z-index: 999;
    }

    .sidebar.close {
        transform: translateY(0);
    }

    .sidebar header .toggle {
        position: absolute;
        top: 10px;
        right: 10px;
        display: block;
    }

    .home {
        position: relative;
        top: 0;
        left: 0;
        height: 100vh;
        width: 100%;
        background-color: var(--body-color);
        transition: var(--tran-05);
        z-index: 0;
    }

    .sidebar.close ~ .home {
        left: 0;
        height: calc(100vh - 50px);
        width: 100%;
    }
} */

@media (max-width: 768px) {
   .side_bar{
    width: 100%;
    position: fixed;
    left: -100%;
}
#click:checked ~ .side_bar{
    left:0%;
}


    /* Additional styles for content adjustment */
    .content {
        width: 100%;
        /* Take full width */
        margin-left: 0;
        /* Reset margin for full width */
    }
}
</style>
<nav class="sidebar side_bar close">
    <header>
        <div class="image-text image_text">
            <a href="index.html"><img src="{{asset('')}}images/YouPost_Logo.png" class="img-fluid" alt="" /></a>

            <!-- <div class="text logo-text">
                <span class="name">Codinglab</span>
                <span class="profession">Web developer</span>
            </div> -->
        </div>

        <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
        <div class="menu">
            <!--
            <li class="search-box">
                <i class='bx bx-search icon'></i>
                <input type="text" placeholder="Search...">
            </li> -->

            <ul class="menu-links menu_links">
                <li class="nav-link nav_link2" style="background-color:#E8E8E8; border-radius:7px;">
                    <div class="user_info pl-1">
                        <a href="javascript:void(0)">
                            <div class="user_name grid_item">
                                <div class="the_name">
{{--                                    <span><span class="color">{{auth()->user()->account->name}}</span></span>--}}
                                </div>
                            </div>
                            </a>

                        <div class="dropdown">
                            <button class="dropdown-toggle bg-transparent border-0" type="button"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{asset('images/admin.png')}}" class="v_icon" alt="" width="45px" />
                                <span class="text nav-text text2" style="padding-left:12px;">{{auth()->user()->account->name}}</span>
                                <!-- <i class="fa-solid fa-caret-down"style="padding-left:35px;"></i> -->
                                <img src="{{asset('images/drop_arrow.png')}}" class="v_icon" alt="" style="padding-left:30px; " />
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @foreach($accounts as $account)
                                <li><a class="dropdown-item {{auth()->user()->account_id==$account->id ? 'active' : null}}"
                                        href="{{url("change_acount/".encrypt($account->id))}}"><i
                                            class="fa-solid fa-user"></i> {{$account->name}}</a></li>
                                @endforeach
                                <li><a class="dropdown-item" style="cursor: pointer" data-bs-toggle="modal"
                                        data-bs-target="#addAccount">Add Account <i
                                            class="fa-solid fa-plus text-success"></i></a></li>
                            </ul>
                        </div>

                    </div>
                </li>

                <li><a href="javascript:void(0)"><i class="fa-regular fa-user icon"></i> <span class="text nav-text">My
                            Account</span></a></li>
                </li>

                <!-- <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-bar-chart-alt-2 icon'></i>
                        <span class="text nav-text">Revenue</span>
                    </a>
                </li> -->
                <li><a href="javascript:void(0)" class="myaccounts"> <i class="fa-regular fa-message icon"></i><span
                            class="text nav-text">Add Social Account</span></a></li>

                <!-- <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-bell icon'></i>
                        <span class="text nav-text">Notifications</span>
                    </a>
                </li> -->
                <li><a href="javascript:void(0)"><i class="fa-regular fa-file icon"></i><span
                            class="text nav-text">Privacy
                            Policy</span></a></li>

                <!-- <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-pie-chart-alt icon'></i>
                        <span class="text nav-text">Analytics</span>
                    </a>
                </li> -->
                <li><a href="javascript:void(0)"><i class='bx bx-pie-chart-alt icon'></i><span
                            class="text nav-text">Support</span></a></li>

                <!-- <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-heart icon'></i>
                        <span class="text nav-text">Likes</span>
                    </a>
                </li> -->
                <li><a href="javascript:void(0)"><i class='bx bx-heart icon'></i> <span class="text nav-text">Public
                            Profile</span></a></li>

                <!-- <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-wallet icon'></i>
                        <span class="text nav-text">Wallets</span>
                    </a>
                </li> -->

                <li>
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

        <div class="bottom-content">
{{--            <li class="">--}}
{{--                <a href="#">--}}
{{--                    <i class='bx bx-log-out icon'></i>--}}
{{--                    <span class="text nav-text">sample</span>--}}
{{--                </a>--}}
{{--            </li>--}}
            <!-- <li class="mode">
                <div class="sun-moon">
                    <i class='bx bx-moon icon moon'></i>
                    <i class='bx bx-sun icon sun'></i>
                </div>
                <span class="mode-text text">Dark mode</span>

                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li> -->
        </div>
    </div>

</nav>
<script>


// $(document).on('mouseleave','.side_bar',function () {
//     $(this).addClass('close');
//     $(this).css('width', '88px');
//     $(this).css('z-index', '1');
//     $(".text").css('opacity', '1');
// });

// $(".toggle").click(function(){
// });
// $(".toggle").click(function(){
//     alert(1);
//     $(".side_bar").toggleClass('sideWidth');
//     $(".test_con").toggleClass("width","1040px");
//     $('nav').removeClass('close');
// // $(".create_preview_post_wrapInner").toggleClass('custom_con');
// })

var mouseLeaveEnabled = true; // Flag to enable/disable mouseleave function

$(document).on('mouseleave', '.side_bar', function() {
    if (mouseLeaveEnabled) {
        $(this).addClass('close');
        $(this).css('width', '88px');
        $(this).css('z-index', '1');
        $(".text").css('opacity', '1');
    }
});
$(document).on('mouseenter', '.side_bar', function() {

$(this).css('width', '250px');
$(".text").css('opacity', '1');
$(this).css('z-index', '9999');

});

$(".toggle").click(function() {
    $(".side_bar").toggleClass('sideWidth');
    $(".test_con").toggleClass('test_con1');

    // Toggle the mouseLeaveEnabled flag
    mouseLeaveEnabled = !mouseLeaveEnabled;
});
</script>
