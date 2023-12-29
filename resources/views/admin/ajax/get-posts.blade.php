<style>
    .posts_content {
        width: 400px;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 2;
        text-overflow: ellipsis;
    }

    .publishedpost {
        width: fit-content;
    }

    @media (min-width: 320px) and (max-width: 576px) {
        .get_platform_posts {
            overflow-x: auto;
        }

        .post_detailWrap {
            flex-direction: column;
        }
    }

    @media (min-width: 577px) and (max-width: 767px) {
        .get_platform_posts {
            overflow-x: auto;
        }

        .post_detailWrap {
            flex-direction: column;
        }
    }

    @media (min-width: 768px) and (max-width: 1000px) {
        .get_platform_posts {
            overflow-x: auto;
        }

        .post_detailWrap {
            flex-direction: column;
        }
    }
</style>
@foreach ($posts as $post)
    @php
        $publishedAt = \Carbon\Carbon::parse($post->posted_at);
        $timeOnly = $publishedAt->format('h:i A');
    @endphp
    <div class="fb-post mb-2 get_platform_posts">
        <div class="timer_style">{{ $timeOnly }}</div>

        <div style="border-radius:20px">
            <div class="d-flex post-detail post_detailWrap">
                <div class="sidebar_post" style="background-image: url('{{ asset('images/tx_icon.png') }}');">

                </div>
                <div class="DetailText">
                    <div class="d-flex align-items-center gap-1 post_card_detail">

                        @if ($post->plateform === 'Facebook')
                            <img src="{{ asset('images/fbposticon.png') }}" alt="" class="mr-1 ProfileIcon">

                        @elseif($post->plateform === 'Instagram')
                            <img src="{{ asset('images/instapost.png') }}" alt="" class="mr-1 ProfileIcon">

                        @elseif($post->plateform === 'Twitter')
                            <img src="{{ asset('images/twitterpost.png') }}" alt="" class="mr-1 ProfileIcon">

                        @elseif($post->plateform === 'Linkedin')
                            <img src="{{ asset('images/linkpost.png') }}" alt="" class="mr-1 ProfileIcon">
                        @endif


                        <h5 class="m-0">
                            @if ($post->plateform === 'Facebook')
                                {{ $account->fb_page_name }}
                            @elseif($post->plateform === 'Instagram')
                                {{ $account->inst_name }}
                            @elseif($post->plateform === 'Twitter')
                                {{$account->tw_name }}
                            @elseif($post->plateform === 'Linkedin')
                                {{ $account->link_page_name }}
                            @endif</h5>
                    </div>
                    <p class="mt-1 posts_content">{!! nl2br($post->content) !!}</p>

                    <div class="publishedpost mt-2">
                    <span>
                        <img src="{{ asset('images/approvodpost2.png') }}" alt="">
                    </span>
                        <span class="approved" style="padding-right: 45px;">
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
@endforeach
