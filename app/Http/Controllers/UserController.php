<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Post;
use App\Models\PostDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Facebook\Facebook;
use GuzzleHttp\Client;
use HttpClient;
use DateTime;
use Illuminate\Support\Str;
use League\OAuth2\Client\Provider\LinkedIn;
use App\Services\Facebookservice;
use App\Services\TwitterService;
use App\Services\Instagramservice;
use App\Services\Linkedinservice;
use League\OAuth2\Client\Provider\Twitter;
use Intervention\Image\Facades\Image;
use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\TimeCode;
use getID3\getID3;

class UserController extends Controller
{

    public function __construct()
    {
        set_time_limit(8000000);
    }


    public function index()
    {






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
        $data = [];
        $data['total_fb_likes'] = 0;
        $data['total_fb_comments'] = 0;
        $data['total_insta_likes'] = 0;
        $data['total_insta_comments'] = 0;
        if (count(auth()->user()->posts)) {
            foreach (auth()->user()->posts as $post) {
                $fb_posts = PostDetail::where('post_id', $post->id)->where('plateform', 'Facebook')->first();
                if ($fb_posts) {
                    $data['total_fb_likes'] = $data['total_fb_likes'] + $fb_posts->likes;
                    $data['total_fb_comments'] = $data['total_fb_comments'] + $fb_posts->comments;
                }

                $insta_posts = PostDetail::where('post_id', $post->id)->where('plateform', 'Instagram')->first();
                if ($insta_posts) {
                    $data['total_insta_likes'] = $data['total_insta_likes'] + $insta_posts->likes;
                    $data['total_insta_comments'] = $data['total_insta_comments'] + $insta_posts->comments;
                }

            }
        }


        $fb_access_token = auth()->user()->account->fb_access_token;
        $fb_page_token = auth()->user()->account->fb_page_token;
        $insta_access_token = auth()->user()->account->insta_access_token;
        $insta_user_id = auth()->user()->account->insta_user_id;
        if ($fb_access_token != null && $fb_page_token == null) {
            $fb = new Facebook([
                'app_id' => env('app_id'),
                'app_secret' => env('app_secret'),
                'default_graph_version' => 'v16.0',
                'default_access_token' => $fb_access_token,
            ]);
            $response = $fb->get('/me/accounts');
            $all_pages = json_decode($response->getbody())->data;
        } else {
            $all_pages = [];
        }
        $instapages = [];
        if (!auth()->user()->account->linkedin_page_id && auth()->user()->account->linkedin_accesstoken) {
            $client = new Client();

            $response = $client->get('https://api.linkedin.com/v2/organizationalEntityAcls?q=roleAssignee', [
                'headers' => [
                    'Authorization' => 'Bearer ' . auth()->user()->account->linkedin_accesstoken,
                    'Content-Type' => 'application/json',
                    'X-Restli-Protocol-Version' => '2.0.0',
                ],
            ]);
            $pageAcls = json_decode($response->getBody(), true)['elements'];
            foreach ($pageAcls as $pageAcl) {
                $organizationalTarget = $pageAcl['organizationalTarget'];
                $pageId = explode(':', $organizationalTarget)[3];

                $pageResponse = $client->get("https://api.linkedin.com/v2/organizations/{$pageId}", [
                    'headers' => [
                        'Authorization' => 'Bearer ' . auth()->user()->account->linkedin_accesstoken,
                        'Content-Type' => 'application/json',
                        'X-Restli-Protocol-Version' => '2.0.0',
                    ],
                ]);
                $page = json_decode($pageResponse->getBody(), true);
                $instapages[] = $page;
            }
        }
        $all_pages_for_insta = [];
        return view('user.index', compact('allPosts', 'accounts', 'all_pages', 'all_pages_for_insta', 'data', 'instapages'));

    }

    public function create_post(Request $req)
    {

        $platforms = auth()->user()->account->platforms;
        if (count($platforms) == 0) {
            return back()->with('error', 'Please select platform to post.');
        }
        $mediaDatafb = $mediaDataInsta = $mediaDataLinkedin = null;

        //*****************facebook validation******************//
        if (in_array('Facebook', $platforms)) {
            $req->validate([
                'facebook_media' => 'required_if:media_type_facebook,image|required_if:media_type_facebook,video',
            ]);
            if ($req->media_type_fb == 'video') {
                $req->validate([
                    'facebook_media' => 'mimes:mp4|max:4000',
                ]);
            }
            if ($req->hasFile('facebook_media')) {
                $imageName = time() . rand(1111, 999) . '.' . $req->facebook_media->extension();
                $req->facebook_media->move('content_media', $imageName);
                $mediaDatafb = $imageName;
            }

        }
        //****************end facebook validation**************//

        //****************instagram validation****************//
        if (in_array('Instagram', $platforms)) {
            $req->validate([
                'insta_media' => 'required',
            ]);
            if ($req->media_type_insta == 'video') {
                $req->validate([
                    'insta_media' => 'mimes:mp4|max:4000',
                ]);
            }

            $imageName = time() . rand(1111, 999) . '.' . $req->insta_media->extension();
            $req->insta_media->move('content_media', $imageName);
            $mediaDataInsta = $imageName;
            $InstafilePath = 'content_media/' . $mediaDataInsta;

            if ($req->media_type_instagram == 'image') {
                $width = Image::make($InstafilePath)->width();
                $height = Image::make($InstafilePath)->height();
                $aspectRatio = sprintf("%0.2f", $width / $height);
                if (!($aspectRatio == sprintf("%0.2f", 4 / 5) || $aspectRatio == sprintf("%0.2f", 16 / 9))) {
                    return back()->with('error', "Sorry! can't post image required 4:5 or 16:9 ratio image");
                }
            }
            if ($req->media_type_instagram == 'video') {

                $getID3 = new \getID3();
                $fileInfo = $getID3->analyze($InstafilePath);
                $width = $fileInfo['video']['resolution_x'] ?? 1;
                $height = $fileInfo['video']['resolution_y'] ?? 1;
                $aspectRatio = sprintf("%0.2f", $width / $height);
                if (!($aspectRatio == sprintf("%0.2f", 4 / 5) || $aspectRatio == sprintf("%0.2f", 16 / 9))) {
                    unlink($InstafilePath);
                    return back()->with('error', "Sorry! can't post video required 4:5 or 16:9 ratio video");
                }
            }


        }
        //****************end instagram validation****************//

        //****************Linkedin validation****************//
        if (in_array('Linkedin', $platforms)) {
            $req->validate([
                'linkedin_media' => 'required_if:media_type_linkedin,image|required_if:media_type_linkedin,video',
            ]);
            if ($req->media_type_linkedin == 'video') {
                $req->validate([
                    'linkedin_media' => 'mimes:mp4|max:4000',
                ]);
            }

            if ($req->hasFile('linkedin_media')) {
                $imageName = time() . rand(1111, 999) . '.' . $req->linkedin_media->extension();
                $req->linkedin_media->move('content_media', $imageName);
                $mediaDataLinkedin = $imageName;
                $linkfilePath = 'content_media/' . $mediaDataLinkedin;
            }

            if ($req->media_type_linkedin == 'image') {
                $width = Image::make($linkfilePath)->width();
                $height = Image::make($linkfilePath)->height();
                $aspectRatio = sprintf("%0.2f", $width / $height);
                if (!($aspectRatio == sprintf("%0.2f", 4 / 5) || $aspectRatio == sprintf("%0.2f", 16 / 9))) {
                    return back()->with('error', "Sorry! can't post image required 4:5 or 16:9 ratio image");
                }
            }
            if ($req->media_type_linkedin == 'video') {

                $getID3 = new \getID3();
                $fileInfo = $getID3->analyze($linkfilePath);
                $width = $fileInfo['video']['resolution_x'] ?? 1;
                $height = $fileInfo['video']['resolution_y'] ?? 1;
                $aspectRatio = sprintf("%0.2f", $width / $height);
                if (!($aspectRatio == sprintf("%0.2f", 4 / 5) || $aspectRatio == sprintf("%0.2f", 16 / 9))) {
                    unlink($linkfilePath);
                    return back()->with('error', "Sorry! can't post video required 4:5 or 16:9 ratio video");
                }
            }


        }
        //****************end linkedin validation****************//

        //****************posting code****************//
        for ($i = 0; $i < count($platforms); $i++) {
            $content = Str::lower($platforms[$i]) . '_content';
            $tag = Str::lower($platforms[$i]) . '_tag';
            $mediatype = 'media_type_' . Str::lower($platforms[$i]);
            $media = null;
            if ($platforms[$i] == 'Facebook')
                $media = $mediaDatafb;
            elseif ($platforms[$i] == 'Instagram')
                $media = $mediaDataInsta;
            elseif ($platforms[$i] == 'Linkedin')
                $media = $mediaDataLinkedin;

            $post = new Post();
            $post->account_id = auth()->user()->account_id;
            $post->user_id = auth()->user()->id;
            $post->content = $req->$content;
            $post->tag = $req->$tag;
            $post->posted_at_moment = $req->posttime;
            $post->posted_at = date_format(new DateTime($req->time), "Y-m-d H:i");
            $post->plateform = $platforms[$i];
            $post->timezone = $req->timezone;
            $post->media = $media;
            $post->media_type = $req->$mediatype;
            $post->save();
        }
        return back()->with('success', 'Post Created Successfully');
        //****************end posting code****************//

    }

    public function get_event_detail(Request $request)
    {
        $post = Post::find($request->id);
        $platforms = Post::where('content', $post->content)->get();
        return view('user.event_detail', compact('post', 'platforms'));
    }

    public function post_delete($id, Facebookservice $facebookservice, Instagramservice $Instagramservice, Linkedinservice $Linkedinservice, TwitterService $TwitterService)
    {
        $get_post = Post::find(decrypt($id));
        if ($get_post->posted_at_moment == 'later') {
            $get_post->delete();
            return redirect('/index')->with('success', 'Post Deleted Successfully!');
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
            if ($get_data['status']== true) {
                $get_post->delete();
                return redirect('/index')->with('success', 'Post Deleted Successfully!');
            } else {
                return redirect('/index')->with('error', 'Post cannot be Deleted');
            }
        }


    }

    public function edit_post($id)
    {
        $get_post = PostDetail::where('social_id', $id)->first();

        $posts = Post::where('user_id', auth()->user()->id)->select('id', 'tag', 'posted_at')->get();
        $allPosts = [];
        foreach ($posts as $post) {
            $allPosts[] = [
                'id' => $post->id,
                'title' => $post->tag,
                'start' => $post->posted_at,
            ];
        }
        $data = [];
        $data['total_fb_likes'] = 0;
        $data['total_fb_comments'] = 0;
        $data['total_insta_likes'] = 0;
        $data['total_insta_comments'] = 0;
        if (count(auth()->user()->posts)) {
            foreach (auth()->user()->posts as $post) {
                $fb_posts = PostDetail::where('post_id', $post->id)->where('plateform', 'Facebook')->first();
                if ($fb_posts) {
                    $data['total_fb_likes'] = $data['total_fb_likes'] + $fb_posts->likes;
                    $data['total_fb_comments'] = $data['total_fb_comments'] + $fb_posts->comments;
                }

                $insta_posts = PostDetail::where('post_id', $post->id)->where('plateform', 'Instagram')->first();
                if ($insta_posts) {
                    $data['total_insta_likes'] = $data['total_insta_likes'] + $insta_posts->likes;
                    $data['total_insta_comments'] = $data['total_insta_comments'] + $insta_posts->comments;
                }

            }
        }
        $fb_access_token = auth()->user()->account->fb_access_token;
        $fb_page_token = auth()->user()->account->fb_page_token;
        $insta_access_token = auth()->user()->account->insta_access_token;
        $insta_user_id = auth()->user()->account->insta_user_id;
        if ($fb_access_token != null && $fb_page_token == null) {
            $fb = new Facebook([
                'app_id' => env('app_id'),
                'app_secret' => env('app_secret'),
                'default_graph_version' => 'v16.0',
                'default_access_token' => $fb_access_token,
            ]);
            $response = $fb->get('/me/accounts');
            $all_pages = json_decode($response->getbody())->data;
        } else {
            $all_pages = [];
        }

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

        return view('user.edit_index', compact('allPosts', 'all_pages', 'all_pages_for_insta', 'data', 'get_post'));


    }

    public function update_post(Request $req, Facebookservice $facebookservice)
    {
        $post = Post::find($req->id);

        $get_data = $facebookservice->edit_post($post, $req);


        return view('user.event_detail', compact('post'));
    }

    public function update_user_platforms(Request $req)
    {
        if ($req->plateform_val != null) {
            if (in_array('Facebook', $req->plateform_val) && (auth()->user()->account->fb_access_token == null || auth()->user()->account->fb_page_token == null)) {
                $error = ['message' => 'fb_error'];
                return response()->json($error, 404);
            } elseif (in_array('Twitter', $req->plateform_val) && (auth()->user()->account->twiter_access_token == null || auth()->user()->account->twiter_refresh_token == null)) {
                $error = ['message' => 'twiter_error'];
                return response()->json($error, 404);
            } elseif (in_array('Instagram', $req->plateform_val) && (auth()->user()->account->insta_access_token == null || auth()->user()->account->insta_user_id == null)) {
                $error = ['message' => 'insta_error'];
                return response()->json($error, 404);
            } elseif (in_array('Linkedin', $req->plateform_val) && (auth()->user()->account->linkedin_accesstoken == null || auth()->user()->account->linkedin_user_id == null || auth()->user()->account->linkedin_page_id == null)) {
                $error = ['message' => 'linkedin_error'];
                return response()->json($error, 404);
            }
        }
        $user = Account::find(auth()->user()->account_id);
        $req->plateform_val ? $user->platforms = $req->plateform_val : $user->platforms = [];
        $user->update();

        $response = ['message' => 'success'];

        return response()->json($response, 200);
    }

    public function connect_to_facebook()
    {

        auth()->user()->account()->update([
            'fb_access_token' => null,
            'fb_page_token' => null
        ]);

        $fb = new Facebook([
            'app_id' => env('app_id'),
            'app_secret' => env('app_secret'),
            'default_graph_version' => 'v16.0',
        ]);
        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['pages_read_engagement', 'pages_manage_posts', 'pages_read_user_content', 'read_insights'];
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
        return redirect('/index')->with('success', 'Facebook Connected Successfully! kindly Select Your Page');
    }

    public function select_page()
    {
        $accessToken = auth()->user()->account->fb_access_token;
        $fb = new Facebook([
            'app_id' => env('app_id'),
            'app_secret' => env('app_secret'),
            'default_graph_version' => 'v16.0',
            'default_access_token' => $accessToken,
        ]);
        $response = $fb->get('/me/accounts');
        $all_pages = json_decode($response->getbody())->data;
        return view('user.select_page', compact('all_pages'));
    }

    public function set_page(Request $req)
    {
        $req->validate([
            'page' => 'required',
        ]);
        $user = Account::find(auth()->user()->account_id);
        $user->fb_page_token = $req->page;
        $user->update();
        return redirect('/index')->with('success', 'Facebook Connected Successfully!');
    }

    //////////////////facebook////////////////////////////


    /////////////////////instagram////////////////////////

    public function connect_to_instagram()
    {
        auth()->user()->account()->update([
            'insta_access_token' => null,
            'insta_user_id' => null
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
        return redirect('/index')->with('success', 'Please Select page that you have connected with you instagram business account');

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
            $user->insta_user_id = $instagram_business_account_id;
            $user->update();
            return redirect('/index')->with('success', 'instagram Connected Successfully!');
        } else {
            return redirect('/index')->with('error', 'Sorry! no instagram account is connected with this page');
        }

    }


    public function set_page_for_linkedin(Request $req)
    {
        $req->validate([
            'page' => 'required',
        ]);

        $user = Account::find(auth()->user()->account_id);
        $user->linkedin_page_id = $req->page;
        $user->update();
        return redirect('/index')->with('success', 'Linkedin  Connected Successfully!');


    }


    ////////////////////instagram/////////////////////////

    ////////////////////linkedin/////////////////////////
    public function connect_to_linkedin()
    {
        auth()->user()->account()->update([
            'linkedin_accesstoken' => null,
            'linkedin_user_id' => null,
            'linkedin_page_id' => null
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

            return redirect('/index')->with('error', $e->getMessage());
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
            return redirect('/index')->with('success', 'linkedin Connected Successfully');

        } catch (\Throwable $e) {

            return redirect('/index')->with('error', $e->getMessage());
        }


    }

    ////////////////////linkedin/////////////////////////

    public function connect_to_twitter()
    {
        auth()->user()->account()->update([
            'twiter_access_token' => null,
            'twiter_refresh_token' => null,
        ]);

        try {
            $twitter = config('services.twitter');
            $client_id = $twitter['client_id'];


            // $client_secret = $twitter['client_secret'];
            $redirect_uri = $twitter['redirect'];
            $auth_url = "https://twitter.com/i/oauth2/authorize?response_type=code&client_id=$client_id&redirect_uri=$redirect_uri&scope=tweet.read%20tweet.write%20users.read%20offline.access&state=state&code_challenge=challenge&code_challenge_method=plain";
            return redirect()->away($auth_url);
        } catch (\Throwable $e) {
            return redirect('/index')->with('error', $e->getMessage());
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
            User::find(auth()->user()->id)->account()->update([
                'twiter_access_token' => $access_token,
                'twiter_refresh_token' => $refresh_token
            ]);
            return redirect('/index')->with('success', 'Twitter Connected Successfully');
        } catch (\Throwable $e) {
            return redirect('/index')->with('error', $e->getMessage());
        }


        // dd(123, $access_token);


// $client_id = 'your_client_id';
// $client_secret = 'your_client_secret';
// $redirect_uri = 'https://yourapp.com/callback';
// $code = $_GET['code'];

// $client = new Client([
//     'base_uri' => 'https://api.twitter.com/',
//     'headers' => [
//         'Authorization' => 'Basic ' . base64_encode($client_id . ':' . $client_secret),
//         'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8',
//     ],
// ]);

        // //////////////


        // $oauth_verifier = filter_input(INPUT_GET, 'oauth_verifier');

    }


    public function get_facebook_likes()
    {


        // $client_id = 'dUtBam5mcWlrVW00LVE5V0JtLUY6MTpjaQ';
        // // $redirect_uri = env('consumer_secret');
        // $redirect_uri = url('/connect_to_twitter/calback');

        // // https://twitter.com/i/oauth2/authorize?response_type=code&client_id=M1M5R3BMVy13QmpScXkzTUt5OE46MTpjaQ&redirect_uri=https://www.example.com&scope=tweet.read%20tweet.write%20users.read&state=state&code_challenge=challenge&code_challenge_method=plain
        // $auth_url = "https://twitter.com/i/oauth2/authorize?response_type=code&client_id=$client_id&redirect_uri=$redirect_uri&scope=tweet.read%20tweet.write%20users.read%20offline.access&state=state&code_challenge=challenge&code_challenge_method=plain";
        // // header("Location: $auth_url");
        // return redirect()->away($auth_url);
        // exit();


        // $twiter_oauth_token = auth()->user()->twiter_oauth_token;
        // $twiter_secret_token = auth()->user()->twiter_secret_token;

        // $client = new Client([
        //     'base_uri' => 'https://api.twitter.com/2/',
        //     'auth' => [
        //         env('consumer_key'),
        //         env('consumer_secret'),
        //         $twiter_oauth_token,
        //         $twiter_secret_token
        //     ]
        // ]);

        // $response = $client->post('tweets', [
        //     'form_params' => [
        //         'status' => 'Hello, Twitter! This is my first tweet from Laravel.'
        //     ]
        // ]);
        // dd($client, $response);

        // echo $response->getBody();


        // ///////////////////////

        $urn = 'urn:li:activity:7059887884065026049'; // replace with your post URN
        $accessToken = auth()->user()->account->linkedin_accesstoken; // replace with your access token

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.linkedin.com/rest/reactions/$urn/likes",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",

            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $accessToken",
                "cache-control: no-cache",
                "Linkedin-Version: 202206"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
        dd($response, 'new one');


        // $activity_id = "7059887884065026049";
        // $accesstoken = auth()->user()->linkedin_accesstoken;

        // $curl = curl_init();
        // curl_setopt_array($curl, [
        //     // CURLOPT_URL => "https://api.linkedin.com/v2/socialActions/urn:li:activity:$activity_id?projection=(likes)",
        //     CURLOPT_URL => "https://api.linkedin.com/v2/socialActions/urn:li:activity:$activity_id/likes",
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_HTTPHEADER => [        "Authorization: Bearer " . $accesstoken,        "Content-Type: application/json"    ],
        // ]);
        // $response = curl_exec($curl);
        // curl_close($curl);

        // // $likes = json_decode($response, true)["likes"]["summary"]["total"];
        // dd($response, 992);


        // $activity_id = '7059887884065026049'; // Replace with the ID(s) of the comment(s) you want to retrieve likes for
        // $access_token = auth()->user()->linkedin_accesstoken; // Replace with your LinkedIn access token
        // $linkedin_version = '202205'; // Replace with the version number in the format YYYYMM

        // $url = "https://api.linkedin.com/rest/v2/reactions/(actor:urn:li:person:123456,entity:urn:li:post:(activity:$activity_id))";
        // $headers = [
        //     "Authorization: Bearer $access_token",
        //     "Linkedin-Version: $linkedin_version",
        //     "X-Restli-Protocol-Version: 2.0.0"
        // ];

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // $response = curl_exec($ch);
        // $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // if ($http_code == 200) {
        //     $likes = json_decode($response, true);
        //     echo "Number of likes: " . count($likes['elements']);
        // } else {
        //     echo "Error: " . $response;
        // }

        // curl_close($ch);

        // dd($response,$http_code, 22);


//
        $client = new Client();
        // $response = $client->request('GET', 'https://api.linkedin.com/v2/me', [
        //     'headers' => [
        //         'Authorization' => 'Bearer ' . auth()->user()->linkedin_accesstoken
        //     ]
        // ]);
        // $response = $client->request('GET', 'https://api.linkedin.com/v2/socialActions/urn:li:activity:7059887884065026049?projection=(likes,comments)', [
        //     'headers' => [
        //         'Authorization' => 'Bearer ' . auth()->user()->linkedin_accesstoken
        //     ]
        // ]);
        // dd('34');
        $response = $client->request('GET', 'https://api.linkedin.com/v2/socialActions/7059887884065026049', [
            'headers' => [
                'Authorization' => 'Bearer ' . auth()->user()->account->linkedin_accesstoken,
                "Linkedin-Version" => "202208",
            ]
        ]);
        $me = json_decode($response->getBody()->getContents(), true);

        dd($me, 'meeee');

        //
        $client = new Client([
            'base_uri' => 'https://api.linkedin.com/v2/',
            'headers' => [
                'Authorization' => 'Bearer ' . auth()->user()->account->linkedin_accesstoken,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ]
        ]);

        $response = $client->request('GET', 'https://api.linkedin.com/v2/socialActions/urn:li:activity:7059887884065026049?projection=(likes,comments)');
        $likes = json_decode($response->getBody()->getContents(), true);

        dd($response, $likes);


        // facebook likes and comments
        $facebook_posts = PostDetail::where('plateform', 'Facebook')->get();
        foreach ($facebook_posts as $post) {
            $user = $post->post->user;
            $fb = new Facebook([
                'app_id' => env('app_id'),
                'app_secret' => env('app_secret'),
                'default_graph_version' => 'v16.0',
                'default_access_token' => $user->account->fb_page_token,
            ]);

            // likes
            $getlikes = $fb->get(
                "/$post->social_id/likes"
            );
            $likes = $getlikes->getGraphEdge()->asArray();

            // likes
            // comments
            $getcomments = $fb->get(
                "/$post->social_id/comments"
            );

            $comments = $getcomments->getGraphEdge()->asArray();

            $post->update([
                'likes' => count($likes),
                'comments' => count($comments),
            ]);
            // comments
        }
        // facebook likes and comments

        // insta likes and comments
        $Instagram_posts = PostDetail::where('plateform', 'Instagram')->get();
        foreach ($Instagram_posts as $post) {
            $user = $post->post->user;

            $insta = config('services.instagram');
            $tokenn = $user->account->insta_access_token;
            $instagram = new Facebook([
                'app_id' => $insta['client_id'],
                'app_secret' => $insta['client_secret'],
                'default_graph_version' => 'v16.0',
                'default_access_token' => $tokenn,
            ]);

            $getcommentslikes = $instagram->get("$post->social_id?fields=comments_count,like_count");
            $data = $getcommentslikes->getGraphNode()->asArray();
            $commentsCount = $data['comments_count'];
            $likessCount = $data['like_count'];

            $post->update([
                'likes' => $likessCount,
                'comments' => $commentsCount,
            ]);
        }
        // insta likes and comments
        return redirect('/index')->with('success', 'likes and comments get successfully');
    }
}
