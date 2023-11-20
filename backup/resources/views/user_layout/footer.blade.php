
<!-- <footer class="footer_outer">
    <div class="footer_inner">
        <div class="container">
            <div class="footer">
                <div class="site_links grid_item">
                    <ul>
                        <li><a href="javascript:void(0)" >My Account</a></li>
                        <li><a href="javascript:void(0)" class="myaccounts">Add Social Account</a></li>
                        <li><a href="javascript:void(0)">Privacy Policy</a></li>
                        <li><a href="javascript:void(0)">Support</a></li>
                        <li><a href="javascript:void(0)">Public Profile</a></li>
                        <li><a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>


                    </ul>
                </div>

                <div class="logo_wrap grid_item">
                    <div class="logo">
                        <a href="{{url('index')}}"><img src="{{asset('')}}images/YouPost_Logo.png" class="img-fluid"
                                                        alt=""/></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer> -->