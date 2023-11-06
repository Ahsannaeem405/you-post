    
    @foreach($posts as $post)

    @php
        
        $publishedAt = \Carbon\Carbon::parse($post->posted_at);
    @endphp
    <div class="fb-post mb-2" data-id="{{$post->id}}">
                     <div class="post-time"   >
                         <span>{{ $publishedAt->format('H:i') }}</span>

                            </div>
                    <div class="d-flex post-detail">
                        <div class="post-img">
                        <img src="{{asset('images/fbposticon.png')}}" alt="">
                        @if($post->plateform === 'Facebook' && auth()->check() && auth()->user()->account && auth()->user()->account->fb_image)
                            <img src="{{auth()->user()->account->fb_image}}" alt="">
                        @elseif($post->plateform === 'Instagram' && auth()->check() && auth()->user()->account && auth()->user()->account->fb_image)                            
                            <img src="{{auth()->user()->account->inst_image}}" alt="">
                        @elseif($post->plateform === 'Twitter' && auth()->check() && auth()->user()->account && auth()->user()->account->fb_image)
                            <img src="{{auth()->user()->account->twt_image}}" alt="">
                        @elseif($post->plateform === 'Linkedin' && auth()->check() && auth()->user()->account && auth()->user()->account->fb_image)
                            <img src="{{auth()->user()->account->link_image}}" alt="">
                        @endif
                        </div>
                        <div class="pt-2 ps-2" style="width:100%;">
                            <div class="pb-2 account-detail">
                                <span class=" ">
                                    <img src="{{asset('images/fbposticon.png')}}" alt="">
                                </span>
                                <span class="post_username">
                                 {{auth()->user()->account->fb_page_name}}
                                </span>
                            </div>
                            <div class="pt-2">
                                <span class="content_post">{{$post->content}} <span class="post_quiz"></span></span>
                                <div class="publishedpost mt-2">
                                    <span>
                                        <img src="{{asset('images/approvodpost2.png')}}" alt="">
                                    </span>
                                    <span class="approved">                                      

                                        @if($post->posted_at_moment == 'now')
                                         Posted
                                    @else
                                         Scheduled
                                    @endif
                                    </span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>  

                @endforeach
