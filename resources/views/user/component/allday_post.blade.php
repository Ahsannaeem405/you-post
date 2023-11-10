@foreach ($posts as $post)
    @php
        $publishedAt = \Carbon\Carbon::parse($post->posted_at);
    @endphp
    <div class="fb-post mb-2" data-id="{{ $post->id }}">
        <div style="border-radius:20px">
            <div class="d-flex post-detail p-2">
                @if ($post->plateform === 'Facebook' && auth()->check() && auth()->user()->account && auth()->user()->account->fb_image)
                    <div class="post-img" style="background-image: url('{{ auth()->user()->account->fb_image }}');">
                    </div>
                @elseif(
                    $post->plateform === 'Instagram' &&
                        auth()->check() &&
                        auth()->user()->account &&
                        auth()->user()->account->inst_image)
                    <div class="post-img" style="background-image: url('{{ auth()->user()->account->inst_image }}');">
                    </div>
                @elseif($post->plateform === 'Twitter' && auth()->check() && auth()->user()->account && auth()->user()->account->twt_image)
                    <div class="post-img" style="background-image: url('{{ auth()->user()->account->twt_image }}');">
                    </div>
                @elseif(
                    $post->plateform === 'Linkedin' &&
                        auth()->check() &&
                        auth()->user()->account &&
                        auth()->user()->account->link_image)
                    <div class="post-img" style="background-image: url('{{ auth()->user()->account->link_image }}');">
                    </div>
                @endif
                <!--  -->
                <div class="p-0" style="width:100%;">
                    <div class="post-time p-1">
                        <span>{{ $publishedAt->format('H:i') }}</span>
                    </div>
                    <div class="pb-2 pt-3 account-detail">
                        <span class=" ">

                            @if ($post->plateform === 'Facebook' && auth()->check() && auth()->user()->account && auth()->user()->account->fb_image)
                                <img src="{{ asset('images/fbposticon.png') }}" alt="">
                            @elseif(
                                $post->plateform === 'Instagram' &&
                                    auth()->check() &&
                                    auth()->user()->account &&
                                    auth()->user()->account->inst_image)
                                <img src="{{ asset('images/instapost.png') }}" alt="">
                            @elseif($post->plateform === 'Twitter' && auth()->check() && auth()->user()->account && auth()->user()->account->twt_image)
                                <img src="{{ asset('images/twitterpost.png') }}" alt="">
                            @elseif(
                                $post->plateform === 'Linkedin' &&
                                    auth()->check() &&
                                    auth()->user()->account &&
                                    auth()->user()->account->link_image)
                                <img src="{{ asset('images/linkpost.png') }}" alt="">
                            @endif
                        </span>
                        <span class="post_username">
                            @if ($post->plateform === 'Facebook')
                                {{ auth()->user()->account->fb_page_name }}
                            @elseif($post->plateform === 'Instagram')
                                {{ auth()->user()->account->inst_name }}
                            @elseif($post->plateform === 'Twitter')
                                {{ auth()->user()->account->tw_name }}
                            @elseif($post->plateform === 'Linkedin')
                                {{ auth()->user()->account->link_page_name }}
                            @endif

                        </span>
                    </div>
                    <div class="pt-2 content_main">
                        <span class="content_post">{{ $post->content }} <span class="post_quiz"></span></span>
                        <div class="publishedpost mt-2">
                            <span>
                                <img src="{{ asset('images/approvodpost2.png') }}" alt="">
                            </span>
                            <span class="approved">
                                @if ($post->posted_at_moment == 'now')
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
    </div>
@endforeach
