@foreach ($posts as $post)
    @php
        $publishedAt = \Carbon\Carbon::parse($post->posted_at);
        $timeOnly = $publishedAt->format('h:i A');
    @endphp

    <div class="post-card mb-2" data-id="{{ $post->id }}" data-platform="{{ $post->plateform }}">
        <div class="card-header">
        <div class="sidebar_post" style="background-image: url('{{ $post->getPostImgSrc($post) }}');">



</div>
            <div class="timer-style">{{ $timeOnly }}</div>
            <div class="profile-icon">
                @if ($post->plateform === 'Facebook')
                    <img src="{{ asset('images/fbposticon.png') }}" alt="" class="mr-1 ProfileIcon">
                @elseif($post->plateform === 'Instagram')
                    <img src="{{ asset('images/instapost.png') }}" alt="" class="mr-1 ProfileIcon">
                @elseif($post->plateform === 'Twitter')
                    <img src="{{ asset('images/twitterpost.png') }}" alt="" class="mr-1 ProfileIcon">
                @elseif($post->plateform === 'Linkedin')
                    <img src="{{ asset('images/linkpost.png') }}" alt="" class="mr-1 ProfileIcon">
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="post-content">
                <h5 class="account-name">
                    @if ($post->plateform === 'Facebook')
                        {{ $account->fb_page_name }}
                    @elseif($post->plateform === 'Instagram')
                        {{ $account->inst_name }}
                    @elseif($post->plateform === 'Twitter')
                        {{$account->tw_name }}
                    @elseif($post->plateform === 'Linkedin')
                        {{ $account->link_page_name }}
                    @endif
                </h5>
                <p>{!! nl2br($post->content) !!}</p>
            </div>
            <div class="published-post mt-2">
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
@endforeach
