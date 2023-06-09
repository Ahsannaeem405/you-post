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
        @foreach ($platforms as $platform)

               <div class="col-12 my-2">
                   <span class="social_forms">{{$platform->plateform}}</span>
        <a class="text-decoration-none" onclick="return confirm('Are you sure you want to delete this post?');" href="{{url('post_delete/' .encrypt($platform->id))}}"> <i class="fa fa-trash text-danger"></i> </a>
    </div>
        @endforeach


</div>
