{{--<div class="social_forms">--}}
{{--    <h5>Post Content :</h5>--}}
{{--    <p >{{$post->content}}</p>--}}
{{--</div>--}}

{{--<div class="social_forms">--}}
{{--    <h5>Tag :</h5>--}}
{{--    <p>{{$post->tag}}</p>--}}
{{--</div>--}}

{{--<div class="social_forms">--}}
{{--    <h5>Posting Time :</h5>--}}
{{--    <p>{{$post->posted_at}}</p>--}}
{{--</div>--}}

{{--<div class="social_forms">--}}
{{--    <h5>Social Media Platforms :</h5>--}}
{{--    <p>--}}
{{--        @foreach ($platforms as $platform)--}}

{{--               <div class="col-12 my-2">--}}
{{--                   <span class="social_forms">{{$platform->plateform}}</span>--}}
{{--        <a class="text-decoration-none" onclick="return confirm('Are you sure you want to delete this post?');" href="{{url('post_delete/' .encrypt($platform->id))}}"> <i class="fa fa-trash text-danger"></i> </a>--}}
{{--    </div>--}}
{{--        @endforeach--}}


{{--</div>--}}



<!-- Nav tabs -->
<ul class="nav nav-tabs nav_tabs post-detail-tab" id="myTab" role="tablist">
    @if(in_array('Facebook',$platformsName))
        <li class="nav-item" role="presentation">
            <a class="nav-link " id="tab1-tab" data-bs-toggle="tab" href="#tab1"
               role="tab" aria-controls="tab1" aria-selected="true"><img src="{{asset('images/FB_Color.png')}}" class="socialfb" alt=""/></a>
        </li>
    @endif

        @if(in_array('Instagram',$platformsName))
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab"
           aria-controls="tab2" aria-selected="false"><img
                src="{{asset('images/Instagram_Color.png')}}" class="socialinsta" alt=""/></a>
    </li>
        @endif

            @if(in_array('Twitter',$platformsName))
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="tab3-tab" data-bs-toggle="tab" href="#tab3" role="tab"
           aria-controls="tab3" aria-selected="false"><img src="{{asset('images/Twitter_Color.png')}}"
                                                           class="socialtwitter" alt=""/></a>
    </li>
        @endif

                @if(in_array('Linkedin',$platformsName))
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="tab4-tab" data-bs-toggle="tab" href="#tab4" role="tab"
           aria-controls="tab4" aria-selected="false"><img src="{{asset('images/Linkedin_Color.png')}}"
                                                           class="sociallinkedin" alt=""/></a>
    </li>
        @endif
</ul>
<!-- Tab content -->
<div class="tab-content post-detail-tab-content" id="myTabContent">
    @if(in_array('Facebook',$platformsName))
    <div class="tab-pane fade " id="tab1" role="tabpanel" aria-labelledby="tab1-tab">

        <div class="nav_card1 mt-3">
            <div class="row p-3">

                <div class="col-7">
                    <div class="d-flex">
                        <div>
                            <img src="{{asset('')}}images/fb_p.png" class="img-fluid" alt=""/>
                        </div>

                        <div class="Evano">
                            <h3 class="mb-0">John Doe <img src="{{asset('')}}images/offical2.png"
                                                           class="" alt="" height=""/></h3>
                            <span class="text-secondary">Scheduled at:</span> <span
                                class="text-primary">23
                                                Aug 2023 07:15 AM</span>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div>
                        <a href="" style="font-size:12px;"><img src="{{asset('')}}images/copy.png"
                                                                class="" alt=""/> View post
                            in live feed</a>
                        <p class="text-warning text-center" style="font-size:12px; padding-right:26px;">
                            (In case of
                            published)</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="post_text pb-2">
                        <p class="mb-0">Ready for the next ride?</p>
                        <a href="">#MercedesBenz #MercedesAMG #Sportscar</a>
                    </div>
                </div>
                <div class="col-12">
                    <div>
                        <img src="{{asset('')}}images/Rectangle 33.png" class="img-fluid" alt=""/>
                    </div>
                </div>

                <div class="col-12">
                    <div
                        class="actions-buttons-list d-flex p-0 justify-content-between border_top mt-3">

                        <div class="actions-buttons-button">

                            <img src="{{asset('')}}images/t1.png" class="img-fluid" alt=""
                                 height="20"/>
                            <span class="text text3">Like</span>
                        </div>
                        <div class="actions-buttons-button">
                            <i class="fa-regular fa-message"
                               style="color:#9DA1A5; padding-top:4px;"></i>
                            <span class="text text3">Comment</span>
                        </div>
                        <div class="actions-buttons-button">
                            <img src="{{asset('')}}images/tt3.png" class="img-fluid" alt=""
                                 height="20"/>
                            <span class="text text3">Share</span>
                        </div>
                        <div class="actions-buttons-button d-flex">
                            <div><img src="{{asset('')}}images/admn.png" class="img-fluid" alt=""
                                      height="13" style="height:25px;"/></div>
                            <div class="mt-1">
                                <img src="{{asset('')}}images/drop.png" class="img-fluid" alt=""
                                     height="13" style="height:14px;"/>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    @endif

        @if(in_array('Instagram',$platformsName))
    <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">

        <div class="nav_card1 mt-3">
            <div class="row p-3">
                <div class="col-7">
                    <div class="d-flex">
                        <div>
                            <img src="{{asset('')}}images/insta_elp.png" class="img-fluid" alt=""/>
                        </div>

                        <div class="Evano">
                            <h3 class="mb-0">Evano <img src="{{asset('')}}images/offical.png" class=""
                                                        alt="" height="14"/></h3>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div>
                        <a href="" style="font-size:12px;"><img src="{{asset('')}}images/copy.png"
                                                                class="" alt=""/> View post
                            in live feed</a>
                        <p class="text-warning text-center" style="font-size:12px; padding-right:26px;">
                            (In case of
                            published)</p>
                    </div>
                </div>

                <div class="col-12">
                    <div>
                        <img src="{{asset('')}}images/Rectangle 33.png" class="img-fluid" alt=""/>
                    </div>
                </div>

                <div class="col-12">
                    <div class="d-flex justify-content-between ">
                        <div>

                        </div>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
            <div class="col-12 px-3">
                <div class="actions-buttons-list d-flex p-0 justify-content-between border_top mt-3">

                    <div class="actions-buttons-button">

                        <img src="{{asset('')}}images/t1.png" class="img-fluid" alt="" height="20"/>
                        <span class="text text3">Like</span>
                    </div>


                    <div class="actions-buttons-button">

                        <img src="{{asset('')}}images/t1.png" class="img-fluid" alt="" height="20"/>
                        <span class="text text3">Comment</span>
                    </div>


                    <div class="actions-buttons-button">
                        <img src="{{asset('')}}images/tt3.png" class="img-fluid" alt="" height="20"/>
                        <span class="text text3">Share</span>
                    </div>

                    <div class="actions-buttons-button d-flex">
                        <div><img src="{{asset('')}}images/admn.png" class="img-fluid" alt=""
                                  height="13" style="height:25px;"/></div>
                        <div class="mt-1">
                            <img src="{{asset('')}}images/drop.png" class="img-fluid" alt="" height="13"
                                 style="height:14px;"/>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
        @endif

        @if(in_array('Twitter',$platformsName))
    <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">

        <div class="nav_card1 mt-3 navcard_3">
            <div class="row p-3">
                <div class="col-2 ">
                    <img src="{{asset('')}}images/elp2.png" class="navcard_3_img1" alt=""/>
                </div>
                <div class="col-10">
                    <div class="Evano">
                        <h3 class>Evano</h3>
                        <span class="text-dark">Scheduled at</span>: <span class="text-primary">FRIDAY
                                            21/8/2023</span>
                    </div>
                </div>
                <div class="col-12">
                    <p class="">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias,
                        quos?</p>
                </div>
                <div class="col-12 navcard_3mainimg">
                    <div>
                        <img src="{{asset('')}}images/Rectangle 33.png" class="img-fluid navcard_3_img2"
                             alt=""/>
                    </div>
                </div>

                <div class="col-12 bottom-content">
                    <div
                        class="actions-buttons-list d-flex p-0 justify-content-between border_top border-card3 mt-3">
                        <div class="actions-buttons-button">

                            <i class="fa-regular fa-comment myicon"></i>
                            <span class="text text3"></span>
                        </div>
                        <div class="actions-buttons-button">

                            <i class="fa-solid fa-retweet myicon"></i>
                            <span class="text text3"></span>
                        </div>
                        <div class="actions-buttons-button">

                            <i class="fa-regular fa-heart myicon"></i>
                            <span class="text text3"></span>
                        </div>
                        <div class="actions-buttons-button">

                            <i class="fa-solid fa-chart-simple myicon"></i>
                            <span class="text text3"></span>
                        </div>
                        <div class="actions-buttons-button">

                            <i class="fa-solid fa-arrow-up-from-bracket myicon"></i>
                            <span class="text text3"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @endif

        @if(in_array('Linkedin',$platformsName))
    <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">

        <div class="nav_card1 mt-3">
            <div class="row">
                <div class="col-2">
                    <img src="{{asset('')}}images/elp2.png" class="" alt=""/>
                </div>
                <div class="col-10">
                    <div class="Evano">
                        <h3 class>Evano</h3>
                        <span class="text-dark">Scheduled at</span>: <span class="text-primary">FRIDAY
                                            21/8/2023</span>
                    </div>
                </div>
                <div class="col-12 ">
                    <p class=" px-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae eos
                        perspiciatis quibusdam dolore quis possimus necessitatibus recusandae debitis
                        ipsam nam?</p>
                </div>
                <div class="col-12">
                    <div>
                        <img src="{{asset('')}}images/Rectangle 33.png" class="img-fluid card4_mainimg"
                             alt=""/>
                    </div>
                    <div class="background-card4"></div>
                </div>

                <div class="col-12">
                    <div
                        class="actions-buttons-list d-flex  justify-content-between border_top  mt-3 bottom_padd">
                        <div class="dropimg">
                            <img src="{{asset('')}}images/elp2.png" class="dropimg1" alt=""/>


                            <i class="fa-solid fa-caret-down myicon dropimg2"></i>
                        </div>
                        <div class="actions-buttons-button">

                            <i class="fa-regular fa-thumbs-up myicon"></i>
                            <span class="text text3">Like</span>
                        </div>
                        <div class="actions-buttons-button">

                            <i class="fa-solid fa-comments myicon"></i>
                            <span class="text text3">Comment</span>
                        </div>
                        <div class="actions-buttons-button">
                            <i class="fa-solid fa-retweet myicon"></i>
                            <span class="text text3">Repost</span>
                        </div>
                        <div class="actions-buttons-button">
                            <i class="fa-solid fa-paper-plane myicon"></i>
                            <span class="text text3">Send</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            @endif
</div>
