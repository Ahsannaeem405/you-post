{{-- account modal --}}


{{-- event detail modal --}}
<div class="modal fade" id="detail_modal" tabindex="-1" aria-labelledby="detail_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detail_modalLabel">Post Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body event_detail_parent">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- event detail modal --}}


{{-- event edit modal --}}

{{-- myaccount modal --}}
<div class="modal fade" id="myaccounts_modal" tabindex="-1" aria-labelledby="myaccounts_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-cross-btn">
                <h5 class="modal-title" id="myaccounts_modalLabel">Connect Accounts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body modal-social-icon">


                <div class="row MDLsocial-iconmain">

                    <div class="col-md-6 MDLsocial-iconmainWrp">
                        <div class="MDLsocial-icon">
                            <a class="" href="{{url('connect_to_facebook')}}">
                                <i class="fa fa-facebook-square me-2"></i>Connect with Facebook</a>
                        </div>
                    </div>

                    <div class="col-md-6 MDLsocial-iconmainWrp">
                        <div class="MDLsocial-icon">
                            <a class="" href="{{url('connect_to_instagram')}}">
                                <i class="fa fa-instagram me-2"></i>Connect with Instagram</a>
                        </div>
                    </div>

                    <div class="col-md-6 MDLsocial-iconmainWrp">
                        <div class="MDLsocial-icon">
                            <a class="" href="{{url('connect_to_linkedin')}}">
                                <i class="fa fa-linkedin-square me-2"></i>Connect with Linkedin</a>
                        </div>
                    </div>

                    <div class="col-md-6 MDLsocial-iconmainWrp">
                        <div class="MDLsocial-icon">
                            <a class="" href="{{url('connect_twitter')}}">
                                <i class="fa fa-twitter-square me-2"></i>Connect with Twitter</a></div>
                    </div>

                </div>

            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- myaccount modal --}}

{{-- pages_modal --}}

<div class="modal fade" id="pages_modal" tabindex="-1" aria-labelledby="pages_modalLabel" aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pages_modalLabel">Select Your Page To Post On Facebook Account {{auth()->user()->account->name}}</h5>
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                <!--  <span aria-hidden="true">&times;</span>-->
                <!--</button>-->
            </div>
            <form action="{{url('set_page')}}" method="post">
                @csrf
                <div class="modal-body">

                    <select required name="page" class="form-control">
                        <option value="">-select--</option>
                        @foreach($all_pages as $page)
                            <option value="{{$page->access_token}}">{{$page->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>


        </div>
    </div>
</div>


{{-- pages_modal --}}

{{-- pages_modal for instagram --}}

<div class="modal fade" id="instagram_pages_modal" tabindex="-1" aria-labelledby="pages_modalLabel" aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pages_modalLabel">Select Your Page To Post On Connected Instagram Account {{auth()->user()->account->name}}</h5>
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                <!--  <span aria-hidden="true">&times;</span>-->
                <!--</button>-->
            </div>
            <form action="{{url('set_page_for_instagram')}}" method="post">
                @csrf
                <div class="modal-body">

                    <select required name="page" class="form-control instapage_selection">
                        <option value="">-select--</option>
                        @foreach($all_pages_for_insta as $page)
                            <option value="{{$page->id}}">{{$page->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>


        </div>
    </div>
</div>


{{-- pages_modal for instagram --}}


{{--    modal for pages linked--}}
<div class="modal fade" id="linkedin_pages_modal" tabindex="-1" aria-labelledby="pages_modalLabel" aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pages_modalLabel">Select Your Page To Post On Connected Linkedin Account {{auth()->user()->account->name}} </h5>
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                <!--  <span aria-hidden="true">&times;</span>-->
                <!--</button>-->
            </div>
            <form action="{{url('set_page_for_linkedin')}}" method="post">

                @csrf
                <div class="modal-body">

                    <select required name="page" class="form-control">
                        <option value="">-select--</option>
                        @foreach($instapages as $page)
                            <option value="{{$page['$URN']}}">{{$page['localizedName']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>


        </div>
    </div>
</div>

<!-- Main modals -->
{{-- time modal --}}
<!-- Modal -->
<div class="modal fade" id="timeModal" tabindex="-1" aria-labelledby="timeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-cross-btn">
                <h5 class="modal-title" id="timeModalLabel">Time to upload post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary change_time" data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>
{{-- time modal --}}
{{-- account modal --}}
<!-- Modal -->
<div class="modal fade" id="addAccount" tabindex="-1" aria-labelledby="timeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-cross-btn">
                <h5 class="modal-title" id="timeModalLabel">Add Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-bs-toggle="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('store_acount')}}" method="post">
                    @csrf
                    <div class="col-12 mb-2">
                        <lable>Name</lable>
                        <input type="text" class="form-control" required name="name"
                               placeholder="Enter account name...">
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary ">Create</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>



<div class="modal fade" id="addAccount" tabindex="-1" aria-labelledby="timeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-cross-btn">
                <h5 class="modal-title" id="timeModalLabel">Add Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('store_acount')}}" method="post">
                    @csrf
                    <div class="col-12 mb-2">
                        <lable>Name</lable>
                        <input type="text" class="form-control" required name="name"
                               placeholder="Enter account name...">
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary ">Create</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="edit_prompt" tabindex="-1" aria-labelledby="edit_prompt" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-cross-btn">
                <h5 class="modal-title" id="timeModalLabel">Prompt</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <div class="col-12 mb-2">
                        <input type="text" class="form-control edit_promotedtext"  required name="name"
                               placeholder="Prompt text">
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary save_prompt">Save</button>
                    </div>


            </div>

        </div>
    </div>
</div>