<!-- @foreach($todayPost as $today)
    <div class="div3">
        <div>
            <span class="{{$today->posted_at_moment=='now' ? 'clr4' : 'clr2'}}"></span>
        </div>
        <div class="d-flex">
            {!! $today->getPlatformGroupImages() !!}
        </div>
        <div class="myspan">
            <span class="sp1">{{$today->content}} </span>
            <p class="sp2">{{$today->posted_at_moment=='now' ? 'Posted' : 'Scheduled'}}</p>
        </div>
        <div class="Edit" onclick="get_detail({{$today->id}});" style="cursor:pointer;">
            <i class='fas fa-edit'></i>
            <a href="#"> <span>Edit</span></a>
        </div>
    </div>
@endforeach -->
@foreach($todayPost as $today)
<div class="div3 row Posts-calendar">
    <div class="col-4">
        <div class="d-flex post_thumb ">
            <div>
                <span class="{{$today->posted_at_moment=='now' ? 'clr4' : 'clr2'}}"></span>
            </div>
            <div class="d-flex social_icon_posts">
                {!! $today->getPlatformGroupImages() !!}
            </div>
        </div>
    </div>
    <div class="col-md-8 ">
        <div class="d-flex">
            <div class="myspan post_title">
                <span class="sp1">{{$today->content}} </span>
                <p class="sp2">{{$today->posted_at_moment=='now' ? 'Posted' : 'Scheduled'}}</p>
            </div>
            <div class="Edit" onclick="get_detail({{$today->id}});">
                <i class='fas fa-edit'></i>
                <a href="javascript:(void(0);"> <span>Edit</span></a>
            </div>
        </div>
    </div>
</div>
@endforeach
