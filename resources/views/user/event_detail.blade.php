<div class="social_forms">
    <h5>Post Content :</h5>
    <p >{{$post->content}}</p>
</div>

<div class="social_forms">
    <h5>Tag :</h5>
    <p>{{$post->tag}}</p>
</div>

<div class="social_forms">
    <h5>Posting Time :</h5>
    <p>{{$post->posted_at}}</p>
</div>

<div class="social_forms">
    <h5>Social Medail Plateforms :</h5>
    <p> 
        @foreach ($post->plateforms as $platform)
            <span class="social_forms">{{$platform->plateform}}</span>
        @endforeach 
    </p>
</div>
