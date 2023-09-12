@foreach($todayPost as $today)
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
        <div class="Edit" onclick="get_detail({{$today->id}});">
            <i class='fas fa-edit'></i>
            <a href="#"> <span>Edit</span></a>
        </div>
    </div>
@endforeach
