{{-- account modal --}}


{{-- event detail modal --}}
<div class="modal fade" id="detail_modal" tabindex="-1" aria-labelledby="detail_modalLabel" aria-hidden="true">
    <!-- <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detail_modalLabel">Post Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body event_detail_parent">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div> -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header  mymodalheader">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Modal with 4 Tabs</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="post-detail">
                <h5 class="modal-title detail_modalLabel2" id="detail_modalLabel"><a href=""><img
                            src="{{asset('')}}images/Info.png" class="" alt="" /></a>Post Details</h5>
            </div>
            <div class="modal-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav_tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active mytabactive" id="tab1-tab" data-bs-toggle="tab" href="#tab1"
                            role="tab" aria-controls="tab1" aria-selected="true"><img
                                src="{{asset('')}}images/FB_Color.png" class="" alt="" /></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab"
                            aria-controls="tab2" aria-selected="false"><img
                                src="{{asset('')}}images/Instagram_Color.png" class="" alt="" /></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab3-tab" data-bs-toggle="tab" href="#tab3" role="tab"
                            aria-controls="tab3" aria-selected="false"><img src="{{asset('')}}images/Twitter_Color.png"
                                class="" alt="" /></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab4-tab" data-bs-toggle="tab" href="#tab4" role="tab"
                            aria-controls="tab4" aria-selected="false"><img src="{{asset('')}}images/Linkedin_Color.png"
                                class="" alt="" /></a>
                    </li>
                </ul>
                <!-- Tab content -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">

                        <div class="nav_card1 mt-3">
                            <div class="row p-3">

                                <div class="col-7">
                                    <div class="d-flex">
                                        <div>
                                            <img src="{{asset('')}}images/elp2.png" class="img-fluid" alt="" />
                                        </div>

                                        <div class="Evano">
                                            <h3 class="mb-0">Evano <img src="{{asset('')}}images/offical.png" class=""
                                                    alt="" height="14" /></h3>
                                            <span class="text-secondary">Scheduled at</span>: <span
                                                class="text-primary">23
                                                Aug 2023 07:15 AM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div>
                                        <a href="" style="font-size:14px;"><img src="{{asset('')}}images/copy.png"
                                                class="" alt="" /> View post
                                            in live feed</a>
                                        <p class="text-warning text-center" style="font-size:12px;"> (In case of
                                            published)</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p class="">psum has been the industry's standard dummy text ever since the 1500s,
                                        when an unknown printer
                                        took a galley of type and scrambled it to make a type specimen book mbled it to
                                        make a type specimen book. It has survived not only five centuries, but also the
                                        leap.</p>
                                </div>
                                <div class="col-12">
                                    <div>
                                        <img src="{{asset('')}}images/Rectangle 33.png" class="img-fluid" alt="" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-between ">
                                        <div class="d-flex align-item-center pt-2">
                                            <div> <img src="{{asset('')}}images/fb_thumb.png" class="" alt=""
                                                    height="14" /></div>
                                            <div> <img src="{{asset('')}}images/smile.png" class="" alt=""
                                                    height="14" /></div>
                                            <div class="eleven_k">
                                                <p class="mb-0">11k</p>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="d-flex gap-2">
                                                <div class="d-flex">
                                                    <p class="mb-0 two_point">2.3k</p>
                                                    <img src="http://localhost:8000/images/m2.png" alt="" height="15"
                                                        style="margin-top:6px;">
                                                </div>
                                                <div class="d-flex">
                                                    <p class="mb-0 two_point">2.3k</p>
                                                    <img src="http://localhost:8000/images/m1.png" class="mt-1" alt=""
                                                        height="18">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div
                                        class="actions-buttons-list d-flex p-0 justify-content-between border_top mt-3">

                                        <div class="actions-buttons-button">

                                            <img src="{{asset('')}}images/t1.png" class="img-fluid" alt=""
                                                height="20" />
                                            <span class="text text3">Like</span>
                                        </div>


                                        <div class="actions-buttons-button">

                                            <!-- <img src="{{asset('')}}images/mes.png" class="img-fluid" alt=""
                                                height="20" /> -->
                                            <i class="fa-regular fa-message"
                                                style="color:#9DA1A5; padding-top:4px;"></i>
                                            <span class="text text3">Comment</span>
                                        </div>


                                        <div class="actions-buttons-button">
                                            <img src="{{asset('')}}images/tt3.png" class="img-fluid" alt=""
                                                height="20" />
                                            <span class="text text3">Share</span>
                                        </div>

                                        <div class="actions-buttons-button d-flex">
                                            <div><img src="{{asset('')}}images/admn.png" class="img-fluid" alt=""
                                                    height="13" style="height:25px;" /></div>
                                            <div class="mt-1">
                                                <img src="{{asset('')}}images/drop.png" class="img-fluid" alt=""
                                                    height="13" style="height:14px;" />
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                        <!-- Content for Tab 2 -->
                        <!-- <p>Content for Tab 2 goes here.</p> -->
                        <div class="nav_card1 mt-3">
                            <div class="row p-3">
                                <div class="col-7">
                                    <div class="d-flex">
                                        <div>
                                            <img src="{{asset('')}}images/elp2.png" class="img-fluid" alt="" />
                                        </div>

                                        <div class="Evano">
                                            <h3 class="mb-0">Evano <img src="{{asset('')}}images/offical.png" class=""
                                                    alt="" height="14" /></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div>
                                        <a href="" style="font-size:14px;"><img src="{{asset('')}}images/copy.png"
                                                class="" alt="" /> View post
                                            in live feed</a>
                                        <p class="text-warning text-center" style="font-size:12px;"> (In case of
                                            published)</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p class="">psum has been the industry's standard dummy text ever since the 1500s,
                                        when an unknown printer
                                        took a galley of type and scrambled it to make a type specimen book mbled it to
                                        make a type specimen book. It has survived not only five centuries, but also the
                                        leap.</p>
                                </div>
                                <div class="col-12">
                                    <div>
                                        <img src="{{asset('')}}images/Rectangle 33.png" class="img-fluid" alt="" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-between ">
                                        <div>

                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex gap-2">
                                            <div class="d-flex">
                                                <p class="mb-0 two_point">2.3k</p>
                                                <!-- <img src="http://localhost:8000/images/m2.png" alt="" height="15"
                                                        style="margin-top:6px;"> -->
                                                <img src="{{asset('')}}images/Rectangle m2.png" class="img-fluid" alt=""
                                                    height="15" />
                                            </div>
                                            <div class="d-flex">
                                                <p class="mb-0 two_point">2.3k</p>
                                                <img src="http://localhost:8000/images/m1.png" class="mt-1" alt=""
                                                    height="18">
                                            </div>
                                        </div>
                                        <!-- <div class="actions-buttons-button">
                                                <span class="text text2" style="opacity: 1;">Share</span>
                                                <img src="http://localhost:8000/images/share.png" class="" alt=""
                                                    height="18">
                                            </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="actions-buttons-list d-flex p-0 justify-content-between border_top mt-3">

                                    <div class="actions-buttons-button">

                                        <img src="{{asset('')}}images/t1.png" class="img-fluid" alt="" height="20" />
                                        <span class="text text3">Like</span>
                                    </div>


                                    <div class="actions-buttons-button">

                                        <img src="{{asset('')}}images/t1.png" class="img-fluid" alt="" height="20" />
                                        <span class="text text3">Comment</span>
                                    </div>


                                    <div class="actions-buttons-button">
                                        <img src="{{asset('')}}images/tt3.png" class="img-fluid" alt="" height="20" />
                                        <span class="text text3">Share</span>
                                    </div>

                                    <div class="actions-buttons-button d-flex">
                                        <div><img src="{{asset('')}}images/admn.png" class="img-fluid" alt=""
                                                height="13" style="height:25px;" /></div>
                                        <div class="mt-1">
                                            <img src="{{asset('')}}images/drop.png" class="img-fluid" alt="" height="13"
                                                style="height:14px;" />
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                        <!-- Content for Tab 3 -->
                        <!-- <p>Content for Tab 3 goes here.</p> -->
                        <div class="nav_card1 mt-3">
                            <div class="row p-3">
                                <div class="col-2">
                                    <img src="{{asset('')}}images/elp2.png" class="" alt="" />
                                </div>
                                <div class="col-10">
                                    <div class="Evano">
                                        <h3 class>Evano</h3>
                                        <span class="text-dark">Scheduled at</span>: <span class="text-primary">FRIDAY
                                            21/8/2023</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p class="">psum has been the industry's standard dummy text ever since the 1500s,
                                        when an unknown printer
                                        took a galley of type and scrambled it to make a type specimen book mbled it to
                                        make a type specimen book. It has survived not only five centuries, but also the
                                        leap.</p>
                                </div>
                                <div class="col-12">
                                    <div>
                                        <img src="{{asset('')}}images/Rectangle 33.png" class="img-fluid" alt="" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-between ">
                                        <div class="d-flex align-item-center pt-2">
                                            <div> <img src="{{asset('')}}images/fb_thumb.png" class="" alt=""
                                                    height="14" />
                                            </div>
                                            <div> <img src="{{asset('')}}images/smile.png" class="" alt=""
                                                    height="14" />
                                            </div>
                                            <div class="eleven_k">
                                                <p class="mb-0">11k</p>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="d-flex gap-2">
                                                <div class="d-flex">
                                                    <p class="mb-0 two_point">2.3k</p>
                                                    <img src="http://localhost:8000/images/m2.png" alt="" height="15"
                                                        style="margin-top:6px;">
                                                </div>
                                                <div class="d-flex">
                                                    <p class="mb-0 two_point">2.3k</p>
                                                    <img src="http://localhost:8000/images/m1.png" class="mt-1" alt=""
                                                        height="18">
                                                </div>
                                            </div>
                                            <!-- <div class="actions-buttons-button">
                                                <span class="text text2" style="opacity: 1;">Share</span>
                                                <img src="http://localhost:8000/images/share.png" class="" alt=""
                                                    height="18">
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div
                                        class="actions-buttons-list d-flex p-0 justify-content-between border_top mt-3">

                                        <div class="actions-buttons-button">
                                            <!-- <i class="fa-solid fa-thumbs-up"></i> -->
                                            <!-- <img src="http://localhost:8000/t1.png" class="" alt=""
                                                    height="20">  -->
                                            <img src="{{asset('')}}images/t1.png" class="img-fluid" alt=""
                                                height="20" />
                                            <span class="text text3">Like</span>
                                        </div>


                                        <div class="actions-buttons-button">
                                            <!-- <i
                                                        class="fa-solid fa-comment"></i> -->
                                            <img src="{{asset('')}}images/t1.png" class="img-fluid" alt=""
                                                height="20" />
                                            <span class="text text3">Comment</span>
                                        </div>


                                        <div class="actions-buttons-button">
                                            <img src="{{asset('')}}images/tt3.png" class="img-fluid" alt=""
                                                height="20" />
                                            <span class="text text3">Share</span>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
                        <!-- Content for Tab 4 -->
                        <!-- <p>Content for Tab 4 goes here.</p> -->
                        <div class="nav_card1 mt-3">
                            <div class="row p-3">
                                <div class="col-2">
                                    <img src="{{asset('')}}images/elp2.png" class="" alt="" />
                                </div>
                                <div class="col-10">
                                    <div class="Evano">
                                        <h3 class>Evano</h3>
                                        <span class="text-dark">Scheduled at</span>: <span class="text-primary">FRIDAY
                                            21/8/2023</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p class="">psum has been the industry's standard dummy text ever since the 1500s,
                                        when an unknown printer
                                        took a galley of type and scrambled it to make a type specimen book mbled it to
                                        make a type specimen book. It has survived not only five centuries, but also the
                                        leap.</p>
                                </div>
                                <div class="col-12">
                                    <div>
                                        <img src="{{asset('')}}images/Rectangle 33.png" class="img-fluid" alt="" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-between ">
                                        <div class="d-flex align-item-center pt-2">
                                            <div> <img src="{{asset('')}}images/fb_thumb.png" class="" alt=""
                                                    height="14" />
                                            </div>
                                            <div> <img src="{{asset('')}}images/smile.png" class="" alt=""
                                                    height="14" />
                                            </div>
                                            <div class="eleven_k">
                                                <p class="mb-0">11k</p>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="d-flex gap-2">
                                                <div class="d-flex">
                                                    <p class="mb-0 two_point">2.3k</p>
                                                    <img src="http://localhost:8000/images/m2.png" alt="" height="15"
                                                        style="margin-top:6px;">
                                                </div>
                                                <div class="d-flex">
                                                    <p class="mb-0 two_point">2.3k</p>
                                                    <img src="http://localhost:8000/images/m1.png" class="mt-1" alt=""
                                                        height="18">
                                                </div>
                                            </div>
                                            <!-- <div class="actions-buttons-button">
                                                <span class="text text2" style="opacity: 1;">Share</span>
                                                <img src="http://localhost:8000/images/share.png" class="" alt=""
                                                    height="18">
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div
                                        class="actions-buttons-list d-flex p-0 justify-content-between border_top mt-3">

                                        <div class="actions-buttons-button">
                                            <!-- <i class="fa-solid fa-thumbs-up"></i> -->
                                            <!-- <img src="http://localhost:8000/t1.png" class="" alt=""
                                                    height="20">  -->
                                            <img src="{{asset('')}}images/t1.png" class="img-fluid" alt=""
                                                height="20" />
                                            <span class="text text3">Like</span>
                                        </div>


                                        <div class="actions-buttons-button">
                                            <!-- <i
                                                        class="fa-solid fa-comment"></i> -->
                                            <img src="{{asset('')}}images/t1.png" class="img-fluid" alt=""
                                                height="20" />
                                            <span class="text text3">Comment</span>
                                        </div>


                                        <div class="actions-buttons-button">
                                            <img src="{{asset('')}}images/tt3.png" class="img-fluid" alt=""
                                                height="20" />
                                            <!-- <i
                                                        class="fa-solid fa-share"></i> -->
                                            <span class="text text3">Share</span>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
        </div>
        </div>
        
    </div>
</div>
</div>
{{-- event detail modal --}}


{{-- event edit modal --}}

{{-- myaccount modal --}}
<div class="modal fade" id="myaccounts_modal" tabindex="-1" aria-labelledby="myaccounts_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-cross-btn">
                <h5 class="modal-title" id="myaccounts_modalLabel">Connect Accounts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body modal-social-icon">


                <div class="row MDLsocial-iconmain">

                    <div class="col-md-6 MDLsocial-iconmainWrp">
                        <div class="MDLsocial-icon">
                            <a class="" href="{{url('connect_to_facebook')}}">
                                <i class="fa fa-facebook-square me-2"></i>Connect with Facebook</a>
                        </div>
                    </div>

                    <div class="col-md-6 MDLsocial-iconmainWrp">
                        <div class="MDLsocial-icon">
                            <a class="" href="{{url('connect_to_instagram')}}">
                                <i class="fa fa-instagram me-2"></i>Connect with Instagram</a>
                        </div>
                    </div>

                    <div class="col-md-6 MDLsocial-iconmainWrp">
                        <div class="MDLsocial-icon">
                            <a class="" href="{{url('connect_to_linkedin')}}">
                                <i class="fa fa-linkedin-square me-2"></i>Connect with Linkedin</a>
                        </div>
                    </div>

                    <div class="col-md-6 MDLsocial-iconmainWrp">
                        <div class="MDLsocial-icon">
                            <a class="" href="{{url('connect_twitter')}}">
                                <i class="fa fa-twitter-square me-2"></i>Connect with Twitter</a>
                        </div>
                    </div>

                </div>

            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- myaccount modal --}}

{{-- pages_modal --}}

<div class="modal fade" id="pages_modal" tabindex="-1" aria-labelledby="pages_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pages_modalLabel">Select Your Page To Post On Facebook Account
                    {{auth()->user()->account->name}}</h5>
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                <!--  <span aria-hidden="true">&times;</span>-->
                <!--</button>-->
            </div>
            <form action="{{url('set_page')}}" method="post">
                @csrf
                <div class="modal-body">

                    <select required name="page" class="form-control">
                        <option value="">-select--</option>
                        @foreach($all_pages as $page)
                        <option value="{{$page->access_token}}">{{$page->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>


        </div>
    </div>
</div>


{{-- pages_modal --}}

{{-- pages_modal for instagram --}}

<div class="modal fade" id="instagram_pages_modal" tabindex="-1" aria-labelledby="pages_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pages_modalLabel">Select Your Page To Post On Connected Instagram Account
                    {{auth()->user()->account->name}}</h5>
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                <!--  <span aria-hidden="true">&times;</span>-->
                <!--</button>-->
            </div>
            <form action="{{url('set_page_for_instagram')}}" method="post">
                @csrf
                <div class="modal-body">

                    <select required name="page" class="form-control instapage_selection">
                        <option value="">-select--</option>
                        @foreach($all_pages_for_insta as $page)
                        <option value="{{$page->id}}">{{$page->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>


        </div>
    </div>
</div>


{{-- pages_modal for instagram --}}


{{--    modal for pages linked--}}
<div class="modal fade" id="linkedin_pages_modal" tabindex="-1" aria-labelledby="pages_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pages_modalLabel">Select Your Page To Post On Connected Linkedin Account
                    {{auth()->user()->account->name}} </h5>
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                <!--  <span aria-hidden="true">&times;</span>-->
                <!--</button>-->
            </div>
            <form action="{{url('set_page_for_linkedin')}}" method="post">

                @csrf
                <div class="modal-body">

                    <select required name="page" class="form-control">
                        <option value="">-select--</option>
                        @foreach($instapages as $page)
                        <option value="{{$page['$URN']}}">{{$page['localizedName']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>


        </div>
    </div>
</div>

<!-- Main modals -->
{{-- time modal --}}
<!-- Modal -->
<div class="modal fade" id="timeModal" tabindex="-1" aria-labelledby="timeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-cross-btn">
                <h5 class="modal-title" id="timeModalLabel">Time to upload post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary change_time" data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>
{{-- time modal --}}
{{-- account modal --}}
<!-- Modal -->
<div class="modal fade" id="addAccount" tabindex="-1" aria-labelledby="timeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-cross-btn">
                <h5 class="modal-title" id="timeModalLabel">Add Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-bs-toggle="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('store_acount')}}" method="post">
                    @csrf
                    <div class="col-12 mb-2">
                        <lable>Name</lable>
                        <input type="text" class="form-control" required name="name"
                            placeholder="Enter account name...">
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary ">Create</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>



<div class="modal fade" id="addAccount" tabindex="-1" aria-labelledby="timeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-cross-btn">
                <h5 class="modal-title" id="timeModalLabel">Add Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('store_acount')}}" method="post">
                    @csrf
                    <div class="col-12 mb-2">
                        <lable>Name</lable>
                        <input type="text" class="form-control" required name="name"
                            placeholder="Enter account name...">
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary ">Create</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="edit_prompt" tabindex="-1" aria-labelledby="edit_prompt" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-cross-btn">
                <h5 class="modal-title" id="timeModalLabel">Prompt</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="col-12 mb-2">
                    <input type="text" class="form-control edit_promotedtext" required name="name"
                        placeholder="Prompt text">
                </div>

                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary save_prompt">Save</button>
                </div>


            </div>

        </div>
    </div>
</div>