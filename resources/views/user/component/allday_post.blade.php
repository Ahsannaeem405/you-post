@foreach ($posts as $post)
    @php
        $publishedAt = \Carbon\Carbon::parse($post->posted_at);
    @endphp
    <div class="fb-post mb-2" data-id="{{ $post->id }}"
        data-plateform="{{ $post->plateform === 'Facebook'
            ? 'Facebook'
            : ($post->plateform === 'Twitter'
                ? 'Twitter'
                : ($post->plateform === 'Instagram'
                    ? 'Instagram'
                    : ($post->plateform === 'Linkedin'
                        ? 'Linkedin'
                        : ''))) }}">
        <div style="border-radius:20px">
            <div class="d-flex post-detail post_detailWrap">
                <div class="">
                    @if ($post->plateform === 'Facebook' && auth()->check() && auth()->user()->account && auth()->user()->account->fb_image)
                        <img src="{{ auth()->user()->account->fb_image }}" alt="" class="ProfileImg">
                    @elseif(
                        $post->plateform === 'Instagram' &&
                            auth()->check() &&
                            auth()->user()->account &&
                            auth()->user()->account->inst_image)
                        <img src="{{ auth()->user()->account->inst_image }}" alt="" class="ProfileImg">
                    @elseif($post->plateform === 'Twitter' && auth()->check() && auth()->user()->account && auth()->user()->account->twt_image)
                        <img src="{{ auth()->user()->account->twt_image }}" alt="" class="ProfileImg">
                    @elseif(
                        $post->plateform === 'Linkedin' &&
                            auth()->check() &&
                            auth()->user()->account &&
                            auth()->user()->account->link_image)
                        <img src="{{ auth()->user()->account->link_image }}" alt="" class="ProfileImg">
                    @endif
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
                            <h5 class="m-0"> {{ auth()->user()->account->fb_page_name }}</h5>
                        @elseif($post->plateform === 'Instagram')
                            <h5 class="m-0">{{ auth()->user()->account->inst_name }}</h5>
                        @elseif($post->plateform === 'Twitter')
                            <h5 class="m-0">{{ auth()->user()->account->tw_name }}</h5>
                        @elseif($post->plateform === 'Linkedin')
                            <h5 class="m-0"> {{ auth()->user()->account->link_page_name }}</h5>
                        @endif
                    </div>
                    <p class="m-0">{{ $post->content }}</p>
                    <div class="publishedpost mt-2">
                        <span>
                            <img src="http://localhost:8000/images/approvodpost2.png" alt="">
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
