<input type="hidden" name="datge" id="date" value ="{{$posts[0]->posted_at}}">
<input type="hidden" name="ac_id" id="ac_id" value="{{$posts[0]->account_id }}">
@foreach ($posts as $post)

    @php
        $publishedAt = \Carbon\Carbon::parse($post->posted_at);
        $timeOnly = $publishedAt->format('h:i A');
    @endphp
    <div class="fb-post mb-2" data-id="{{ $post->id }}" data-plateform="{{ $post->plateform === 'Facebook'
            ? 'Facebook'
            : ($post->plateform === 'Twitter'
                ? 'Twitter'
                : ($post->plateform === 'Instagram'
                    ? 'Instagram'
                    : ($post->plateform === 'Linkedin'
                        ? 'Linkedin'
                        : ''))) }}">
        <div class="timer_style">{{$timeOnly}}</div>

        <div style="border-radius:0px">
            <div class="d-flex post-detail post_detailWrap">
                <div class="sidebar_post" style="background-image: url('{{ $post->getPostImgSrc($post) }}');">


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


                        @if ($post->plateform === 'Facebook')
                            <h5 class="m-0"> {{ $post->account_info['fb_page_name'] }}</h5>
                        @elseif($post->plateform === 'Instagram')
                            <h5 class="m-0">{{ $post->account_info['inst_name'] }}</h5>
                        @elseif($post->plateform === 'Twitter')
                            <h5 class="m-0">{{ $post->account_info['tw_name'] }}</h5>
                        @elseif($post->plateform === 'Linkedin')
                            <h5 class="m-0"> {{ $post->account_info['link_page_name'] }}</h5>
                        @endif
                    </div>
                    <!-- <p class="m-0">{!! nl2br(e($post->content)) !!}</p> -->
                    <p class="m-0">{!! nl2br($post->content) !!}</p>

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
@endforeach
