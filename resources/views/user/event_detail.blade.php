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
    <h5>Social Media Platforms :</h5>
    <p> 
        @foreach ($post->plateforms as $platform)
            <span class="social_forms">{{$platform->plateform}}</span>
                        <a class="social_forms  btn-info" href="{{url('Linkedin_delete/' .$platform->social_id)}}">Delete</a>
                     <!--   // @if($platform->plateform =='Facebook')
                         //<a class="social_forms  btn-info" href="{{url('edit_post/' .$platform->social_id)}}">Delete</a>

                       // @endif -->

                         



        @endforeach 

    </p>
</div>
