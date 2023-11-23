<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Post;
use App\Models\PostDetail;
use App\Models\User;
use App\Services\CreatePostService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Facebook\Facebook;
use GuzzleHttp\Client;
use HttpClient;
use DateTime;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use League\OAuth2\Client\Provider\LinkedIn;
use App\Services\Facebookservice;
use App\Services\TwitterService;
use App\Services\Instagramservice;
use App\Services\Linkedinservice;
use League\OAuth2\Client\Provider\Twitter;
use Intervention\Image\Facades\Image;
use getID3\getID3;
use Abraham\TwitterOAuth\TwitterOAuth;
use DB;

class UserController extends Controller
{

    public $createPostService;

    public function __construct(CreatePostService $createPostService)
    {

        $this->createPostService = $createPostService;
        set_time_limit(8000000);
    }

    public function dashbaord()
    {
        // dd(auth()->user()->email)

        $platforms = session('platforms');
        $imageUrl = 'images/admin.png';
        $posts = Post::select(
            DB::raw('DATE_FORMAT(posted_at, "%Y-%m-%d %H:%i:%s") as formatted_posted_at'),
            DB::raw('COUNT(*) as total_count'),
            DB::raw('SUM(CASE WHEN posted_at_moment = "now" THEN 1 ELSE 0 END) as published_count'),
            DB::raw('SUM(CASE WHEN posted_at_moment != "now" THEN 1 ELSE 0 END) as not_published_count')
        )
        ->where('user_id', auth()->id())
        ->where('account_id', auth()->user()->account_id)
        ->groupBy(DB::raw('DATE(posted_at)'))
        ->get();
        $todayPost = Post::select('*')->where('user_id', auth()->id())->where('account_id', auth()->user()->account_id)->whereDate('posted_at', Carbon::now())->groupBy('group_id')->get();
        $accounts = Account::where('user_id', auth()->id())->get();
        $allPosts = [];

        foreach ($posts as $post) {
            $title = '';

            if ($post->published_count > 0) {
                $title .= $post->published_count . ' Published <br> ';
            }

            if ($post->not_published_count > 0) {
                $title .= $post->not_published_count . ' Scheduled';
            }
            $allPosts[] = [
                'id' => $post->id,
                'title' =>  $title,
                'start' => $post->formatted_posted_at,
                'event_date' => Carbon::parse($post->formatted_posted_at)->format('Y-m-d'),
                'ac_id' => auth()->user()->account_id,
            ];
        }
    //   dd($allPosts);
        $response = $this->createPostService->InitilizeData();
        $stattistics = $this->createPostService->Statisics();
        $instapages = $response['linkedin'];
        $all_pages = $response['facebook'];
        $all_pages_for_insta = [];

        return view('user.index', compact('allPosts', 'accounts', 'all_pages', 'all_pages_for_insta', 'stattistics', 'instapages', 'todayPost', 'platforms'));

    }

    public function report_bug(Request $request )
    {
              $request->validate([
                'name' => 'required',
                'subject' => 'required',
                'message' => 'required',

            ]);
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            file_put_contents(public_path('images/' . $filename), file_get_contents($file));
            $imagePath = 'images/' . $filename;
            $logPath =   'images/YouPost_Logo.png';
            $details = [
                'title' => 'Mail from User',
                'subject' => $request->subject,
                'body' => $request->message,
                'imagePath' => $imagePath,
                'logPath' => $logPath,
            ];
            \Mail::to('raja.waleed21@gmail.com')->send(new \App\Mail\BugMail($details));
            return redirect()->back()->with('message', 'Email sent successfully!');
        }

    public function getUpdatedPosts()
    {
        $posts = Post::select(
            DB::raw('DATE_FORMAT(posted_at, "%Y-%m-%d %H:%i:%s") as formatted_posted_at'),
            DB::raw('COUNT(*) as total_count'),
            DB::raw('SUM(CASE WHEN posted_at_moment = "now" THEN 1 ELSE 0 END) as published_count'),
            DB::raw('SUM(CASE WHEN posted_at_moment != "now" THEN 1 ELSE 0 END) as not_published_count')
        )
        ->where('user_id', auth()->id())
        ->where('account_id', auth()->user()->account_id)
        ->groupBy(DB::raw('DATE(posted_at)'))
        ->get();

        $updatedPosts = [];

        foreach ($posts as $post) {
            $title = '';

            if ($post->published_count > 0) {
                $title .= $post->published_count . ' Published <br> ';
            }

            if ($post->not_published_count > 0) {
                $title .= $post->not_published_count . ' Scheduled';
            }
            $updatedPosts[] = [
                'id' => $post->id,
                'title' =>  $title,
                'start' => $post->formatted_posted_at,
                'event_date' => Carbon::parse($post->formatted_posted_at)->format('Y-m-d'),
                'ac_id' => auth()->user()->account_id,
            ];
        }

        return response()->json($updatedPosts);
    }
    public function dashbaord2()
    {


        //linked in search user
//        $accesstoken = auth()->user()->account->linkedin_accesstoken;
//        $linkedin = Http::withHeaders([
//            'Authorization' => 'Bearer ' . $accesstoken,
//        ])->get('https://api.linkedin.com/v2/companySearch?q=search')->json();
//        dd($linkedin);

//         $bearerToken = auth()->user()->account->twiter_access_token;
//        $api= Http::withToken($bearerToken)->get('https://api.twitter.com/2/users/me');
//        dd($api->body(),$api->status());


//        $connection = new TwitterOAuth(
//            'igtttF6G2FPKOfoX000FUSWcD',
//            '7iJdN74BN6GjNaddaaVgklbJnOOg1SbufzZekfzlcUl5N3YEVT',
//        );
//        $token = $connection->oauth('oauth/request_token', ['oauth_callback' => url('/connect_to_twitter/calback')]);
//        dd($token);

//        $connection = new TwitterOAuth(
//            'aSQRkFaVlvQDPRjDXgMlYVVmD',
//            'WD4j6rY3azsxlTQPI1kuAXiCmHw2vDbAzY3oYClzziAmvSd5VL',
//            '869138965298806785-ur34Qxmt5fkkb3JViwX4U7XN9I9Eb45',
//            'X28xPqd42dfxeyKwlvczV84qlgPFvTfmO6oiRuj1xsmEO'
//        );
//
//
//        $connection->setApiVersion('1.1');
//        $status = $connection->upload("media/upload", ["media" => public_path('content_media/650a8a2c97a42.png')]);
//        $status2 = $connection->upload("media/upload", ["media" => public_path('content_media/650a8a28f2252.png')]);
//        $connection->setApiVersion('2');
//        $post = $connection->post("tweets", [
//            'text' => "test 1",
//            'media' => array(
//                'media_ids' => [$status->media_id_string,$status2->media_id_string]
//            )
//        ], true);
        // dd($post);

//        $connection = new TwitterOAuth(
//            'zdJ9xLCWzub5fTrHekheVih4e',
//            'AEuHtEF1iXafGFxIsXE8RDSqePm90VKeAocQROz7oM0bQihsp6',
//            '940303773922152449-DfUhPtvEkBqm72WgHGRMnxnxwKGhs3Q',
//            'NRGA42pj0iANrGBM9LzNBYp9gZgxfyUacovAxb0zmMel3'
//        );
//        $connection->setApiVersion('2');
//        $search = $connection->get("tweets/search/recent");
//        dd($search);


    }

    public function saveImageAndVideo(Request $request)
    {


        if ($request->type == "video") {

            $base64Data = $request->input('video');
            $filename = uniqid() . '.mp4';
            $videoData = base64_decode($base64Data);
            file_put_contents(public_path('content_media/' . $filename), $videoData);
            $videoPath = $filename;
            return response()->json(['path' => $videoPath]);
        } else {
            // Get the base64-encoded image data from the request
                $base64Image = $request->input('image');

                // Decode the base64 image data and create an Intervention Image instance
                $img = Image::make(base64_decode($base64Image));

                // Define desired aspect ratios for landscape and portrait orientations
                $desiredAspectRatioLandscape = 16 / 5;
                $desiredAspectRatioPortrait = 4 / 5;

                // Get the original width and height of the image
                $originalWidth = $img->width();
                $originalHeight = $img->height();

                // Define minimum and maximum resolutions, as well as minimum width and height
                $minResolution = 0.8;
                $maxResolution = 1.91;
                $minWidth = 6000;
                $minHeight = 6000;

                // Determine the desired aspect ratio based on the image orientation

                    if ($originalWidth > $originalHeight) {
                        $desiredAspectRatio = $desiredAspectRatioLandscape;
                    } else {
                        $desiredAspectRatio = $desiredAspectRatioPortrait;
                    }

                // Check if the image meets certain criteria for resizing

                    if (
                        $originalWidth / $originalHeight < $minResolution ||
                        $originalWidth / $originalHeight > $maxResolution ||
                        $originalWidth >= $minWidth ||
                        $originalHeight >= $minHeight
                    ) {
                        // Image meets the criteria, resize it
                        if ($originalWidth / $originalHeight > $desiredAspectRatio) {

                            // Calculate new dimensions for landscape-oriented images
                            $newHeight = $originalWidth / $desiredAspectRatio;
                            $topPadding = ($originalHeight - $newHeight) / 2;
                            $bottomPadding = $topPadding;
                            $newWidth = $originalWidth;
                        } else {
                            // Calculate new dimensions for portrait-oriented images
                            $newWidth = $originalHeight * $desiredAspectRatio;
                            $leftPadding = ($originalWidth - $newWidth) / 2;
                            $rightPadding = $leftPadding;
                            $newHeight = $originalHeight;
                        }

                        // Resize the image
                        $img->resize($newWidth, $newHeight);

                        // Generate a unique filename for the resized image
                        $filename = uniqid() . '.jpg';

                        // Save the resized image to the specified path
                        $img->save('content_media/' . $filename);

                        return response()->json(['path' => $filename]);
                    } else {
                        // Image does not meet the criteria

                        // Get the base64-encoded image data from the request

                        $base64Data = $request->input('image');

                        // Generate a unique filename for the original image
                        $filename = uniqid() . '.png';

                        // Decode the base64 image data
                        $imageData = base64_decode($base64Data);

                       // Save the original image to the specified path
                        file_put_contents(public_path('content_media/' . $filename), $imageData);
                        $imagePath = $filename;

                      // Return the path to the original image in the response
                        return response()->json(['path' => $imagePath]);
                    }

        }
    }

    public function getTimeDifference($post)
    {
        $currentTime = Carbon::now()->timezone($post->timezone);
        $timeAfter60Seconds = $currentTime->copy()->addSeconds(60);
        $postTime = Carbon::parse($post->posted_at, $post->timezone);
        $isWithin60Seconds = $postTime->lte($timeAfter60Seconds);

        return $isWithin60Seconds;

        // $timeNow = now()->timezone($post->timezone);
        // $postedTime = Carbon::parse($post->posted_at, $post->timezone);
        // $timeNowFormatted = $timeNow->format('Y-m-d H:i');
        // $timeDifference = abs($timeNow->getTimestamp() - $postedTime->getTimestamp());
        // return $timeDifference;
        // $timeNow = now()->timezone($post->timezone);
        // $postedTime = Carbon::parse($post->posted_at, $post->timezone);
        // $timeNowFormatted = $timeNow->format('Y-m-d H:i');
        // $timeDifference = abs($timeNow->getTimestamp() - $postedTime->getTimestamp());
        // return $timeDifference;

    }

    public function create_post(Request $req)
    {
        //    dd( $req->all());
        $platforms = auth()->user()->account->platforms;
        // dd($platforms);
        if (count($platforms) == 0) {
            return back()->with('error', 'Please select platform to post.');
        }

        $mediaDatafb = $mediaDataInsta = $mediaDataLinkedin = $mediaDataTw = [];

        //*****************facebook validation******************//
        if (in_array('Facebook', $platforms)) {
            if ($req->media_type_facebook == 'image') {

                foreach ($req->fb_image as $media) {
                    $mediaDatafb[] = $media;
                }

            } else if ($req->media_type_facebook == 'video') {

                $mediaDatafb[] = $req->fb_video;

            }

        }


        //****************end facebook validation**************//

        //****************instagram validation****************//
        if (in_array('Instagram', $platforms)) {
            if ($req->media_type_instagram == 'image') {
                foreach ($req->inst_image as $media) {
                    $mediaDataInsta[] = $media;
                }

            } else if ($req->media_type_instagram == 'video') {

                $mediaDataInsta[] = $req->inst_video;

            }


        }


        if (in_array('Linkedin', $platforms)) {

            if ($req->media_type_linkedin == 'image') {
                foreach ($req->lin_image as $media) {
                    $mediaDataLinkedin[] = $media;
                }

            } else if ($req->media_type_linkedin == 'video') {

                $mediaDataLinkedin[] = $req->link_video;

            }
        }


        //****************end linkedin validation****************//



  //*****************twitter validation******************//

            if (in_array('Twitter', $platforms)) {
                if ($req->media_type_twitter == 'image') {

                    foreach ($req->tw_image as $media) {
                        $mediaDataTw[] = $media;
                    }

                } else if ($req->media_type_twitter == 'video') {

                    $mediaDataTw[] = $req->twitter_video;

                }

            }

//****************end twitter validation**************//





        //****************posting code****************//
        $group_id = Str::random(40);
        foreach ($platforms as $i => $platform) {
            $content = Str::lower($platforms[$i]) . '_content';
            $tag = Str::lower($platforms[$i]) . '_tag';


            $mediatype = 'media_type_' . Str::lower($platforms[$i]);
            $media = null;
            if ($platforms[$i] == 'Facebook')
                $media = implode(',', $mediaDatafb);
            elseif ($platforms[$i] == 'Instagram')
                $media = implode(',', $mediaDataInsta);
            elseif ($platforms[$i] == 'Linkedin')
                $media = implode(',', $mediaDataLinkedin);
            elseif ($platforms[$i] == 'Twitter')
                $media = implode(',', $mediaDataTw);

            $post = new Post();

            $firstPostOrNot = Post::where('user_id', auth()->user()->id)->count();
            $scheduled = 'no';
            if ($firstPostOrNot > 0) {
                session(['check_first_post' => $firstPostOrNot]);
            }
            $post->account_id = auth()->user()->account_id;
            $post->user_id = auth()->user()->id;
            $post->content = $req->$content;
            $post->tag = $req->$tag ? '#' . implode(' #', $req->$tag) : '';
            $post->posted_at_moment = $req->posttime;
            $post->posted_at = date_format(new DateTime($req->time), "Y-m-d H:i");
            $post->plateform = $platforms[$i];
            $post->timezone = $req->timezone;
            $post->media = $media;
            $post->media_type = $req->$mediatype;
            $post->group_id = $group_id;
            // dd( $post->content);
            $post->save();


            //****************get time difference in seconds ****************//


            $timeDiffLessTennOneMnt = $this->getTimeDifference($post);
            if ($timeDiffLessTennOneMnt) {
                $platformServiceMap = [
                    'Facebook' => '\App\Services\Facebookservice',
                    'Instagram' => '\App\Services\Instagramservice',
                    'Twitter' => '\App\Services\TwitterService',
                    'Linkedin' => '\App\Services\Linkedinservice',
                ];

                $platform = $platforms[$i];


                if (array_key_exists($platform, $platformServiceMap)) {
                    $serviceClassName = $platformServiceMap[$platform];
                    $run = new $serviceClassName();
                    $arr['post'] = $post;
                    $result = $run->create_post($arr);
                    if ($result['status'] == true) {
                        $up = Post::find($post->id);
                        $up->posted_at_moment = 'now';
                        $up->update();
                    }
                }
            } else {
                $scheduled = 'yes';
                session(['IsScheduled' => $scheduled]);

            }

        }

        return back()->with(['success-post' => 'Post Created Successfully', 'platforms' => $platforms, 'firstPostOrNot' => $firstPostOrNot, 'scheduled' => $scheduled]);
        //****************end posting code****************//

    }


    public function get_event_detail(Request $request)
    {
        // $post = Post::find($request->id);
        // $platforms = Post::with('user')->where('group_id', $post->group_id)->get();
        // $platformsName = $platforms->pluck('plateform')->toArray();
        // $platforms = $platforms->groupBy('plateform');

// dd($request->all());
        $parsedDate = Carbon::parse($request->date);

        $posts = Post::with('user')->where('account_id', '=', $request->id)->whereDate('posted_at', '=', $parsedDate->toDateString())->get();


        return view('user.component.allday_post', compact('posts'));
    }


    public function get_single_detail(Request $request)
    {

        $post = Post::find($request->id);
        // $platforms = Post::with('user')->where('group_id', $post->group_id)->get();
        // $platformsName = $platforms->pluck('plateform')->toArray();
        // $platforms = $platforms->groupBy('plateform');

        return view('user.component.single_postdetail', compact('post'));
    }

    public function get_events(Request $request)
    {

        $date = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
        $todayPost = Post::select('*')->where('user_id', auth()->id())->where('account_id', auth()->user()->account_id)->whereDate('posted_at', $date)->groupBy('group_id')->get();
        return view('user.component.ajax.todayEvents', compact('todayPost'));
    }

    public function post_delete($id, Facebookservice $facebookservice, Instagramservice $Instagramservice, Linkedinservice $Linkedinservice, TwitterService $TwitterService)
    {
        $get_post = Post::find(decrypt($id));
        if ($get_post->posted_at_moment == 'later') {
            $get_post->delete();
            return redirect('/dashboard')->with('success', 'Post Deleted Successfully!');
        } else {
            if ($get_post->plateform == 'Linkedin') {
                $get_data = $Linkedinservice->delete_post($get_post->plateforms->social_id);
            }
            if ($get_post->plateform == 'Instagram') {
                $get_data = $Instagramservice->delete_post($get_post->plateforms->social_id);
            }
            if ($get_post->plateform == 'Twitter') {
                $get_data = $TwitterService->delete_post($get_post->plateforms->social_id);
            }
            if ($get_post->plateform == 'Facebook') {
                $get_data = $facebookservice->delete_post($get_post->plateforms->social_id);
            }
            if ($get_data['status'] == true) {
                $get_post->delete();
                return redirect('/dashboard')->with('success', 'Post Deleted Successfully!');
            } else {
                return redirect('/dashboard')->with('error', 'Post cannot be Deleted');
            }
        }


    }


    public function reconnect_user__accounts(Request $req)
    {
        $account = Account::find($req->account_id);

        if ($req->plateform_val != null) {
            $platformsArray = $account->platforms;
            $valueToRemove = $req->plateform_val;
            if (in_array($valueToRemove, $platformsArray)) {
                $platformsArray = array_diff($platformsArray, [$valueToRemove]);
                $indexedArray = array_values($platformsArray);
                $account->platforms = $indexedArray;
                $account->save();
                $response = [
                    'message' => $req->plateform_val,
                    'conet_or_not' => 'yes'
                ];
                return response()->json($response, 200);
            } else {
                $newValue = $req->plateform_val;
                $platformsArray[] = $newValue;
                $account->platforms = $platformsArray;
                $account->save();
                $response = [
                    'message' => $req->plateform_val,
                    'conet_or_not' => 'no'
                ];
                return response()->json($response, 200);
            }

        }


    }


    public function update_user_platforms_accounts(Request $req)
    {
        $account = Account::find($req->account_id);

        if ($req->plateform_val != null) {
            if (($req->plateform_val == 'Facebook') && ($account->fb_access_token == null || $account->fb_page_token == null)) {
                $error = ['message' => 'fb_error',
                    'status' => $req->isChecked];
                return response()->json($error, 404);
            }
            if (($req->plateform_val == 'Twitter') && ($account->twiter_access_token == null || $account->twiter_refresh_token == null)) {
                $error = ['message' => 'twiter_error',
                    'status' => $req->isChecked];
                return response()->json($error, 404);
            }
            if (($req->plateform_val == 'Instagram') && ($account->insta_access_token == null || $account->insta_user_id == null)) {
                $error = ['message' => 'insta_error',
                    'status' => $req->isChecked];
                return response()->json($error, 404);
            }
            if (($req->plateform_val == 'Linkedin') && ($account->linkedin_accesstoken == null || $account->linkedin_user_id == null || $account->linkedin_page_id == null)) {
                $error = ['message' => 'linkedin_error',
                    'status' => $req->isChecked];
                return response()->json($error, 404);
            }
        }
        if ($req->plateform_val != null) {
            $platformsArray = $account->platforms;
            $valueToRemove = $req->plateform_val;
               if (in_array($valueToRemove, $platformsArray)) {
                // if (($req->isChecked == 'false')) {

                $platformsArray = array_diff($platformsArray, [$valueToRemove]);
                $indexedArray = array_values($platformsArray);
                $account->platforms = $indexedArray;
                $account->save();
                $response = [
                    'message' => $req->plateform_val,
                    'status' => 'off'
                ];
                return response()->json($response, 200);
            }else{
                $newValue = $req->plateform_val;
                $platformsArray[] = $newValue;
                $account->platforms = $platformsArray;
                $account->save();
                $response = [
                    'message' => $req->plateform_val,
                    'status' => 'on'
                ];
                return response()->json($response, 200);
            }

        }


    }


    public function update_user_platforms(Request $req)
    {
        $account = Account::find($req->account_id);

        if ($req->plateform_val != null) {
            if (in_array('Facebook', $req->plateform_val) && ($account->fb_access_token == null || $account->fb_page_token == null)) {
                $error = ['message' => 'fb_error'];
                return response()->json($error, 404);
            } elseif (in_array('Twitter', $req->plateform_val) && ($account->twiter_access_token == null || $account->twiter_refresh_token == null)) {
                $error = ['message' => 'twiter_error'];
                return response()->json($error, 404);
            } elseif (in_array('Instagram', $req->plateform_val) && ($account->insta_access_token == null || $account->insta_user_id == null)) {
                $error = ['message' => 'insta_error'];
                return response()->json($error, 404);
            } elseif (in_array('Linkedin', $req->plateform_val) && ($account->linkedin_accesstoken == null || $account->linkedin_user_id == null || $account->linkedin_page_id == null)) {
                $error = ['message' => 'linkedin_error'];
                return response()->json($error, 404);
            }
        }

        $req->plateform_val ? $account->platforms = $req->plateform_val : $account->platforms = [];
        $account->update();

        $response = ['message' => 'success'];

        return response()->json($response, 200);
    }

    public function connect_to_facebook($account = null)
    {
        if ($account) {
            auth()->user()->update([
                'account_id' => $account
            ]);
        }

        $platform = auth()->user()->account->platforms;
        $valueToRemove = 'Facebook';
        foreach (array_keys($platform, $valueToRemove) as $key) {
            unset($platform[$key]);
        }

        auth()->user()->account()->update([
            'fb_access_token' => null,
            'fb_page_token' => null,
            'platforms' => $platform
        ]);

        $fb = new Facebook([
            'app_id' => env('app_id'),
            'app_secret' => env('app_secret'),
            'default_graph_version' => 'v16.0',
        ]);
        $helper = $fb->getRedirectLoginHelper();
        //$permissions = ['pages_read_engagement', 'pages_manage_posts', 'pages_read_user_content', 'read_insights', 'pages_manage_metadata', 'pages_show_list'];
        $permissions = ['pages_read_engagement', 'pages_read_user_content', 'pages_manage_posts', 'read_insights', 'pages_show_list'];
        $helper->getPersistentDataHandler()->set('state', 'abcdefsss');
        $loginUrl = $helper->getLoginUrl(url('connect_facebook/calback'), $permissions);
        return redirect()->away($loginUrl);
    }

    public function connect_facebook_calback(Request $request)
    {
        if ($request->has('error')) {
            // User chose not to authorize the application
            return redirect('/dashboard')->with('error', 'Facebook Authorization Declined.');
        }

        $fb = new Facebook([
            'app_id' => env('app_id'),
            'app_secret' => env('app_secret'),
            'default_graph_version' => 'v16.0',
        ]);
        $accessToken = $fb->getOAuth2Client()->getAccessTokenFromCode($request->code, url('connect_facebook/calback'));
        $token = $accessToken->getValue();

        $account = Account::find(auth()->user()->account_id);
        $account->fb_access_token = $token;
        $account->update();
        return redirect('/index')->with('success', 'Facebook, Successfully Added');
    }

    public function set_page(Request $req)
    {

        $req->validate([
            'page' => 'required',
        ]);
        $user = Account::find(auth()->user()->account_id);
        // dd(auth()->user()->account_id);
        $platforms = $user->platforms;

        array_push($platforms, 'Facebook');


        $user->fb_page_token = $req->page;
        $user->platforms = $platforms;
        $user->update();

        $run = new Facebookservice();
        $imageUrl = $run->get_fb_image();
        $pageName = $run->get_fb_page_name();
        $user = auth()->user();
        $user->account->fb_image = $imageUrl;
        $user->account->fb_page_name = $pageName;
        $user->account->save();


        return back()->with('success', 'Facebook, Successfully Added');
    }

    public function connect_to_instagram($account = null)
    {
        if ($account) {
            auth()->user()->update([
                'account_id' => $account
            ]);
        }
        $platform = auth()->user()->account->platforms;
        $valueToRemove = 'Instagram';
        foreach (array_keys($platform, $valueToRemove) as $key) {
            unset($platform[$key]);
        }

        auth()->user()->account()->update([
            'insta_access_token' => null,
            'insta_user_id' => null,
            'platforms' => $platform
        ]);
        $insta = config('services.instagram');

        $fb = new Facebook([
            'app_id' => $insta['client_id'],
            'app_secret' => $insta['client_secret'],
            'default_graph_version' => 'v16.0',
        ]);
        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['instagram_basic', 'publish_video', 'pages_show_list', 'ads_management','business_management', 'instagram_content_publish', 'pages_read_engagement'];
        $helper->getPersistentDataHandler()->set('state', 'abcdef');
        $loginUrl = $helper->getLoginUrl($insta['redirect'], $permissions);
        return redirect()->away($loginUrl);

    }

    public function connect_instagram_calback(Request $request)
    {
        if ($request->has('error')) {
            // User chose not to authorize the application
            return redirect('/dashboard')->with('error', 'Instagram Authorization Declined.');
        }


        $insta = config('services.instagram');
        $fb = new Facebook([
            'app_id' => $insta['client_id'],
            'app_secret' => $insta['client_secret'],
            'default_graph_version' => 'v12.0',
        ]);
        $accessToken = $fb->getOAuth2Client()->getAccessTokenFromCode($request->code, $insta['redirect']);


        $user = Account::find(auth()->user()->account_id);
        $user->insta_access_token = $accessToken;
        $user->update();

        return redirect('/index')->with('success', 'Instagram, Successfully Added');

    }

    public function get_page_for_instagram()
    {

        $insta_access_token = auth()->user()->account->insta_access_token;
        $insta_user_id = auth()->user()->account->insta_user_id;

        if ($insta_access_token != null && $insta_user_id == null) {
            $insta = config('services.instagram');
            $insta = new Facebook([
                'app_id' => $insta['client_id'],
                'app_secret' => $insta['client_secret'],
                'default_graph_version' => 'v16.0',
                'default_access_token' => $insta_access_token,
            ]);
            $insta_response = $insta->get('/me/accounts');
            $all_pages_for_insta = json_decode($insta_response->getbody())->data;
        } else {
            $all_pages_for_insta = [];
        }

        $insta = config('services.instagram');
        $instagram = new Facebook([
            'app_id' => $insta['client_id'],
            'app_secret' => $insta['client_secret'],
            'default_graph_version' => 'v16.0',
        ]);
        $options = null;
        foreach ($all_pages_for_insta as $page) {
            $response = $instagram->get("/$page->id?fields=instagram_business_account", auth()->user()->account->insta_access_token);
            $result = $response->getDecodedBody();
            if (isset($result['instagram_business_account'])) {
                $options .= "<option value=" . $page->id . ">$page->name</option>";
            } else {
                $options .= "<option disabled value=" . $page->id . ">$page->name</option>";
            }
        }
        return response()->json($options);
    }

    public function set_page_for_instagram(Request $req)
    {
        $req->validate([
            'page' => 'required',
        ]);

        $insta = config('services.instagram');
        $instagram = new Facebook([
            'app_id' => $insta['client_id'],
            'app_secret' => $insta['client_secret'],
            'default_graph_version' => 'v16.0',
        ]);
        $response = $instagram->get("/$req->page?fields=instagram_business_account", auth()->user()->account->insta_access_token);


        $result = $response->getDecodedBody();
        // dd($result);
        if (isset($result['instagram_business_account'])) {
            $instagram_business_account_id = $result['instagram_business_account']['id'];
            $user = Account::find(auth()->user()->account_id);

            $platforms = $user->platforms;
            array_push($platforms, 'Instagram');


            $user->insta_user_id = $instagram_business_account_id;
            $user->platforms = $platforms;
            $user->save();

            $run = new Instagramservice();
            $instData = $run->get_inst_data($instagram_business_account_id);
            $user = Account::find(auth()->user()->account_id);
            $user->inst_name = $instData['name'];
            $user->inst_page_name = $instData['username'];
            $user->inst_image = $instData['local_profile_image_path'];
            $user->save();
            return back()->with('success', 'instagram Connected Successfully!');
        } else {
            return back()->with('error', 'Sorry! no instagram account is connected with this page');
        }

    }


    public function connect_to_linkedin($account = null)
    {
        if ($account) {
            auth()->user()->update([
                'account_id' => $account
            ]);
        }
        $platform = auth()->user()->account->platforms;
        $valueToRemove = 'Linkedin';
        foreach (array_keys($platform, $valueToRemove) as $key) {
            unset($platform[$key]);
        }

        auth()->user()->account()->update([
            'linkedin_accesstoken' => null,
            'linkedin_user_id' => null,
            'linkedin_page_id' => null,
            'platforms' => $platform
        ]);
        try {
            $linkedin = config('services.linkedin');
            $client_id = $linkedin['client_id'];
            $client_secret = $linkedin['client_secret'];
            $redirect_uri = $linkedin['redirect'];

            $authorization_url = 'https://www.linkedin.com/oauth/v2/authorization?' . http_build_query(array(
                    'response_type' => 'code',
                    'client_id' => $client_id,
                    'redirect_uri' => $redirect_uri,
                    'state' => 'us',
                    'scope' => 'w_member_social r_organization_social w_organization_social r_liteprofile r_emailaddress rw_organization_admin rw_ads r_ads'
                ));
            return redirect($authorization_url);
        } catch (\Throwable $e) {

            return back()->with('error', $e->getMessage());
        }
    }

    public function connect_linkedin_calback(Request $request)
    {
        try {
            $linkedin = config('services.linkedin');
            $provider = new LinkedIn([
                'clientId' => $linkedin['client_id'],
                'clientSecret' => $linkedin['client_secret'],
                'redirectUri' => $linkedin['redirect'],
                'response_type' => 'code',
                'grant_type' => 'authorization_code',
                'scope' => 'w_member_social r_liteprofile r_emailaddress'
            ]);
            $accessToken = $provider->getAccessToken('authorization_code', [
                'code' => $_GET['code']
            ]);
            // dd($accessToken);

            $http = new Client();
            // Create an authenticated request for the /me endpoint
            $request = $provider->getAuthenticatedRequest(
                'GET',
                'https://api.linkedin.com/v2/me',
                $accessToken->getToken()
            );
            // Send the request and receive the response
            $response = $http->sendRequest($request);
            $userData = json_decode($response->getBody(), true);
            $userId = $userData['id'];
            // save userid and user access token into database for future use
            $user = Account::find(auth()->user()->account_id);
            $user->linkedin_accesstoken = $accessToken->getToken();
            $user->linkedin_user_id = $userId;
            $user->update();
            return redirect('/index')->with('success', 'Linkedin, Successfully Added');

        } catch (\Throwable $e) {

            return redirect('/index')->with('error', $e->getMessage());
        }


    }

    public function set_page_for_linkedin(Request $req)
    {
        $req->validate([
            'page' => 'required',
        ]);

        $user = Account::find(auth()->user()->account_id);

        $platforms = $user->platforms;
        array_push($platforms, 'Linkedin');


        $user->linkedin_page_id = $req->page;
        $user->platforms = $platforms;
        $user->update();

        $run = new Linkedinservice();
        $imageUrl = $run->get_linkedin_image();
        // dd($imageUrl);
        $pageName = $run->get_linkedin_pageName();
        $user = auth()->user();
        $user->account->link_image = $imageUrl;
        $user->account->link_page_name = $pageName;
        $user->account->save();

        return back()->with('success', 'Linkedin  Connected Successfully!');


    }

    public function connect_to_twitter($account = null)
    {
        if ($account) {
            auth()->user()->update([
                'account_id' => $account
            ]);
        }
        $platform = auth()->user()->account->platforms;
        $valueToRemove = 'Twitter';
        foreach (array_keys($platform, $valueToRemove) as $key) {
            unset($platform[$key]);
        }

        auth()->user()->account()->update([
            'twiter_access_token' => null,
            'twiter_refresh_token' => null,
            'platforms' => $platform
        ]);


        $twitter = config('services.twitter');
        $connection = new TwitterOAuth(
            $twitter['client_id'],
            $twitter['client_secret'],
        );
        $token = $connection->oauth('oauth/request_token', ['oauth_callback' => $twitter['redirect']]);
        session()->put('oauth_token', $token['oauth_token']);
        session()->put('oauth_token_secret', $token['oauth_token_secret']);
        return redirect()->away('https://api.twitter.com/oauth/authorize?oauth_token=' . $token['oauth_token']);


    }

    public function connect_twitter_calback(Request $request)
    {


        $twitter = config('services.twitter');
        $connection = new TwitterOAuth(
            $twitter['client_id'],
            $twitter['client_secret'],
            session()->get('oauth_token'),
            session()->get('oauth_token_secret'),
        );
        $accessToken = $connection->oauth("oauth/access_token", ["oauth_verifier" => $request->oauth_verifier]);

        try {

            $run = new TwitterService();
            $userData = $run->get_tw_data($accessToken);
            $accountUser = User::find(auth()->user()->id);
            $platforms = $accountUser->account->platforms;
            array_push($platforms, 'Twitter');


            $accountUser->account()->update([
                'twiter_access_token' => json_encode($accessToken),
                'twiter_refresh_token' => 1,
                'platforms' => $platforms,
                'tw_name' => $userData->name ?? '',
                'tw_user_name' => $userData->username ?? '',
                'twt_image' => $userData->profile_image_url ?? '',

            ]);
            return redirect('/index')->with('success', 'Twitter, Successfully Added');
        } catch (\Throwable $e) {
            return redirect('/index')->with('error', $e->getMessage());
        }


    }

    public function get_facebook_likes(Facebookservice $facebookservice, Instagramservice $instagramservice, TwitterService $twitterService)
    {


        $posts = Post::withWhereHas('post_dt')->get();
        foreach ($posts as $post) {
            if ($post->plateform == 'Facebook')
                $facebookservice->stats($post);
            elseif ($post->plateform == 'Instagram')
                $instagramservice->stats($post);
            elseif ($post->plateform == 'Twitter')
                $twitterService->stats($post);
            elseif ($post->plateform == 'Linkedin')
                true;// $twitterService->stats($post);
        }


    }
}
