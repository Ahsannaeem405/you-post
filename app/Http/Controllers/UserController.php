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

        $platforms = session('platforms');

        $posts = Post::select('*')->where('user_id', auth()->id())->where('account_id', auth()->user()->account_id)->groupBy('group_id')->get();
        $todayPost = Post::select('*')->where('user_id', auth()->id())->where('account_id', auth()->user()->account_id)->whereDate('posted_at', Carbon::now())->groupBy('group_id')->get();
        $accounts = Account::where('user_id', auth()->id())->get();
        $allPosts = [];
        foreach ($posts as $post) {
            $allPosts[] = [
                'id' => $post->id,
                'title' => $post->content,
                'start' => $post->posted_at,
//                'imageUrl' => $post->media_type == 'image' ? asset('content_media/' . $post->media) : null,
//                'videoURL' => $post->media_type == 'video' ? asset('content_media/' . $post->media) : null,
                'event_date' => Carbon::parse($post->posted_at)->format('Y-m-d')
            ];
        }
        $response = $this->createPostService->InitilizeData();
        $stattistics = $this->createPostService->Statisics();
        $instapages = $response['linkedin'];
        $all_pages = $response['facebook'];
        $all_pages_for_insta = [];

        return view('user.index', compact('allPosts', 'accounts', 'all_pages', 'all_pages_for_insta', 'stattistics', 'instapages', 'todayPost','platforms'));

    }

    public function dashbaord2()
    {
//        $accesstoken = auth()->user()->account->linkedin_accesstoken;
//        $linkedin = Http::withHeaders([
//            'Authorization' => 'Bearer ' . $accesstoken,
//        ])->get('https://api.linkedin.com/v2/companySearch?q=search')->json();
//        dd($linkedin);

//         $bearerToken = auth()->user()->account->twiter_access_token;
//        $api= Http::withToken($bearerToken)->get('https://api.twitter.com/2/users/by?usernames=reh');
//        dd($api->body(),$api->status());
        $connection = new TwitterOAuth(
            'JxLliRfEO3ts7mivk6ZQfgPrX',
            'DAAtIK4sE7YGJLT870HTlAyN5QbukYqfLaCnDIamQCeR7opSgu',
            '26968990-Y5SIkP6EiBJBPNzBDh8NPd7grtnBzLAtxqiH23Hd7',
            'V9X1ktJhqYIJUygMS3NulZX8utKGbpbF8We3MFmqcwEGv'
        );

        $status = $connection->get("statuses/show", ["screen_name" => 'Rehman211']);
        dd($status, $connection->getLastHttpCode());


        $posts = Post::select('*')->where('user_id', auth()->id())->where('account_id', auth()->user()->account_id)->groupBy('content')->get();
        $accounts = Account::where('user_id', auth()->id())->get();
        $allPosts = [];
        foreach ($posts as $post) {
            $allPosts[] = [
                'id' => $post->id,
                'title' => $post->content,
                'start' => $post->posted_at,
                'imageUrl' => $post->media_type == 'image' ? asset('content_media/' . $post->media) : null,
                'videoURL' => $post->media_type == 'video' ? asset('content_media/' . $post->media) : null,
                'event_date' => Carbon::parse($post->posted_at)->format('Y-m-d')
            ];
        }
        $response = $this->createPostService->InitilizeData();
        $stattistics = $this->createPostService->Statisics();
        $instapages = $response['linkedin'];
        $all_pages = $response['facebook'];
        $all_pages_for_insta = [];

        return view('user.index2', compact('allPosts', 'accounts', 'all_pages', 'all_pages_for_insta', 'stattistics', 'instapages'));

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
            $base64Data = $request->input('image');
            $filename = uniqid() . '.png';
            $imageData = base64_decode($base64Data);
            file_put_contents(public_path('content_media/' . $filename), $imageData);
            $imagePath = $filename;
            return response()->json(['path' => $imagePath]);

        }


    }

    public function create_post(Request $req)
    {

        $platforms = auth()->user()->account->platforms;
        if (count($platforms) == 0) {
            return back()->with('error', 'Please select platform to post.');
        }

        $mediaDatafb = $mediaDataInsta = $mediaDataLinkedin = [];

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

        //****************posting code****************//
        $group_id = Str::random(40);
        for ($i = 0; $i < count($platforms); $i++) {
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

            $post = new Post();
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
            $post->save();
        }
        
        return back()->with(['success-post'=> 'Post Created Successfully','platforms'=>$platforms]);
        //****************end posting code****************//

    }


    public function get_event_detail(Request $request)
    {
        $post = Post::find($request->id);
        $platforms = Post::with('user')->where('group_id', $post->group_id)->get();
        $platformsName = $platforms->pluck('plateform')->toArray();
        $platforms = $platforms->groupBy('plateform');

        return view('user.event_detail', compact('post', 'platforms', 'platformsName'));
    }

    public function get_events(Request $request)
    {

        $date = Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d');
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
        $permissions = ['pages_read_engagement', 'pages_manage_posts', 'pages_read_user_content', 'read_insights', 'pages_manage_metadata'];
        $helper->getPersistentDataHandler()->set('state', 'abcdefsss');
        $loginUrl = $helper->getLoginUrl(url('connect_facebook/calback'), $permissions);
        return redirect()->away($loginUrl);
    }

    public function connect_facebook_calback(Request $request)
    {
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

        $platforms = $user->platforms;

        array_push($platforms, 'Facebook');


        $user->fb_page_token = $req->page;
        $user->platforms = $platforms;
        $user->update();
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
        $permissions = ['instagram_basic', 'publish_video', 'pages_show_list', 'ads_management', 'business_management', 'instagram_content_publish', 'pages_read_engagement'];
        $helper->getPersistentDataHandler()->set('state', 'abcdef');
        $loginUrl = $helper->getLoginUrl($insta['redirect'], $permissions);
        return redirect()->away($loginUrl);

    }

    public function connect_instagram_calback(Request $request)
    {
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
            $user->update();
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

        try {
            $twitter = config('services.twitter');
            $client_id = $twitter['client_id'];


            // $client_secret = $twitter['client_secret'];
            $redirect_uri = $twitter['redirect'];
            $auth_url = "https://twitter.com/i/oauth2/authorize?response_type=code&client_id=$client_id&redirect_uri=$redirect_uri&scope=tweet.read%20tweet.write%20users.read%20like.read%20offline.access&state=state&code_challenge=challenge&code_challenge_method=plain";
            return redirect()->away($auth_url);
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }


    }

    public function connect_twitter_calback(Request $request)
    {
        try {
            $twitter = config('services.twitter');

            $client_id = $twitter['client_id'];
            $client_secret = $twitter['client_secret'];
            $redirect_uri = $twitter['redirect'];
            // with curl
            $basee = base64_encode($client_id . ':' . $client_secret);
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.twitter.com/2/oauth2/token',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => "code=$request->code&grant_type=authorization_code&client_id=$client_id&code_verifier=challenge&redirect_uri=$redirect_uri",
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/x-www-form-urlencoded',
                    "Authorization: Basic $basee",
                ),
            ));
            $response = curl_exec($curl);

            curl_close($curl);
            $response2 = json_decode($response);
            //dd($response2);
            if (isset($response2->error)) {
                return redirect('/index')->with('error', $response2->error_description);
            }
            $access_token = $response2->access_token;
            $refresh_token = $response2->refresh_token;
            $accountUser = User::find(auth()->user()->id);
            $platforms = $accountUser->account->platforms;
            array_push($platforms, 'Twitter');


            $accountUser->account()->update([
                'twiter_access_token' => $access_token,
                'twiter_refresh_token' => $refresh_token,
                'platforms' => $platforms,
            ]);
            return redirect('/index')->with('success', 'Twitter, Successfully Added');
        } catch (\Throwable $e) {
            dd($e);
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
