
@extends('user_layout.main')
@section('content')

<!--===== Markup For "Create & Preview Post" Starts Here =====-->

<!--===== Markup For "Post Manager" Ends Here =====-->


<!--===== Markup For "States Viewer" Starts Here =====-->
<section class="stats_viewer_wrap">
    <div class="title_bar_wrap">
        <div class="container">
            <div class="title_bar">
                <div class="tabs_type_heading">
                    <h3>Stats Viewer</h3>
                </div>

                <div class="right_contents">
                    <ul>
                        <li class="total_amount">
                            Total Posts: 1
                        </li>
                        <li class="total_amount">
                            Total Platforms: 5
                        </li>
                        <li class="month_name">
                            <span>December 2nd 2022</span>
                            <a href="javascript:void(0)"><img src="{{asset('images/V_Icon.png')}}" class="img-fluid" alt="" /></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="view_social_stats">
        <div class="container">
            <div class="stats_viewer">
                <section id="tabs">
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="likes_tab" data-toggle="tab" href="#likes" role="tab" aria-controls="likes" aria-selected="true">
                            <h4>Likes</h4>
                            <ul>
                                <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt="" /> 1748</li>
                            </ul>
                        </a>

                        <a class="nav-item nav-link" id="shares_tab" data-toggle="tab" href="#shares" role="tab" aria-controls="shares" aria-selected="false">
                            <h4>Shares</h4>
                            <ul>
                                <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt="" /> 1748</li>
                            </ul>
                        </a>

                        <a class="nav-item nav-link" id="rePosted_tab" data-toggle="tab" href="#rePosted" role="tab" aria-controls="rePosted" aria-selected="false">
                            <h4>RePosted</h4>
                            <ul>
                                <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt="" /> 1748</li>
                            </ul>
                        </a>

                        <a class="nav-item nav-link" id="comments_tab" data-toggle="tab" href="#comments" role="tab" aria-controls="comments" aria-selected="false">
                            <h4>Comments</h4>
                            <ul>
                                <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt="" /> 1748</li>
                            </ul>
                        </a>

                        <a class="nav-item nav-link" id="favorited_tab" data-toggle="tab" href="#favorited" role="tab" aria-controls="favorited" aria-selected="false">
                            <h4>Favorited</h4>
                            <ul>
                                <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt="" /> 1748</li>
                            </ul>
                        </a>

                        <a class="nav-item nav-link" id="friendsFollow_tab" data-toggle="tab" href="#friendsFollow" role="tab" aria-controls="friendsFollow" aria-selected="false">
                            <h4>Friends / Follow</h4>
                            <ul>
                                <li><img src="{{asset('')}}images/FB_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Instagram_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Twitter_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Linkedin_Color.png" class="img-fluid" alt="" /> 1748</li>
                                <li><img src="{{asset('')}}images/Tiktok_Color.png" class="img-fluid" alt="" /> 1748</li>
                            </ul>
                        </a>
                    </div>


                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="likes" role="tabpanel" aria-labelledby="likes_tab">

                            <div class="states_graph">
                                <div id="likesGraph" style="width: 100%; height: 500px">

                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="shares" role="tabpanel" aria-labelledby="shares_tab">

                            <div class="states_graph">
                                <div id="sharesGraph" style="width: 100%; height: 500px">

                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="rePosted" role="tabpanel" aria-labelledby="rePosted_tab">

                            <div class="states_graph">
                                <div id="repostedGraph" style="width: 100%; height: 500px">

                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments_tab">

                            <div class="states_graph">
                                <div id="commentsGraph" style="width: 100%; height: 500px">

                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="favorited" role="tabpanel" aria-labelledby="favorited_tab">

                            <div class="states_graph">
                                <div id="favoritedGraph" style="width: 100%; height: 500px">

                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="friendsFollow" role="tabpanel" aria-labelledby="friendsFollow_tab">

                            <div class="states_graph">
                                <div id="friendsFollowGraph" style="width: 100%; height: 500px">

                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
<!--===== Markup For "States Viewer" Ends Here =====-->


{{-- myaccount modal --}}

{{-- myaccount modal --}}
<script>
$( document ).ready(function() {
    
    
});
</script>
@endsection