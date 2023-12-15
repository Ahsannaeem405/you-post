<div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                          
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th>Account Name</th>
                                        <th>Plateform Attached</th>
                                        <th># Of Schuduled Post</th>
                                        <th># Of Posted Post</th>
                                        <th>View Posts</th>
                                        <!-- <th>Action</th> -->
                                       
                                   </tr>
                                    @foreach($accounts as $ac)
                                        <tr>
                                           
                                            <td class="font-weight-bold">
                                                {{$ac->name}}
                                            </td>
                                            <td> 
                                            @if (!empty($ac->platforms))
                                                @foreach ($ac->platforms as $platform)
                                                    @if (array_key_exists($platform, $platformLogos))
                                                        <img src="{{ asset('images/' . $platformLogos[$platform]) }}" alt="{{ $platform }} Logo">
                                                    @else
                                                        {{ $platform }}
                                                    @endif

                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            @else
                                            No account attached
                                            @endif

                                          </td>
                                            <th>
                                            <div class="accounts-bgimg2">
                                            <span class="posted_now">
                                                            {{ $ac->posts->where('posted_at_moment', '=', 'later')->count() }}
                                                        </span>
                                               </th>
                                            <th>
                                            <div class="accounts-bgimg3">
                                            <span class="scheduled_posts">
                                                            {{ $ac->posts->where('posted_at_moment', '=', 'now')->count() }}
                                                        </span>    
                                            </th>

                                            <td>  @if( ($ac->posts->where('posted_at_moment', '=', 'now')->count()) > 0)
        <a href="#" class="dropdown-item post-link" data-toggle="modal" data-target="#postModal" data-record-id="{{ $ac->id }}">View Posts</a>
    @else
        <a href="#" class="dropdown-item post-link" disabled>View Posts</a>
    @endif</td>
                                            <!-- <th>pending</th> -->


                                          
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<script>
 $('.post-link').click(function(e) {      
      

      e.preventDefault();
    
      // Get the record ID from the data attribute
      var recordId = $(this).data('record-id');
      // Fetch record data using AJAX
      $.ajax({
          url: '/admin/get-posts/' + recordId, // Define a route to fetch record data
          method: 'GET',
          success: function(data) {
            if (data.trim() !== '') {
                $('.body-post').empty().append(data);
            } else {
                // Display a message in the modal when there are no posts
                $('.body-post').html('<p style="color: red">No posts available for this account.</p>');
            }
          }
      });
  });
</script>