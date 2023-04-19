<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\PostDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Facebook\Facebook;
use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Client;
use HttpClient;
use DateTime;
use League\OAuth2\Client\Provider\LinkedIn;
use Abraham\TwitterOAuth\TwitterOAuth;
use Session;
use App\Services\Facebookservice;
use App\Services\TwitterService;
use App\Services\Instagramservice;


class UserController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->select('id','tag', 'posted_at')->get();
        $allPosts = [];
        foreach ($posts as $post) {
            $allPosts[] = [
                'id' => $post->id,
                'title' => $post->tag,
                'start' => $post->posted_at,
            ];
        }


        $fb_access_token = auth()->user()->fb_access_token;
        $fb_page_token = auth()->user()->fb_page_token;
        $insta_access_token = auth()->user()->insta_access_token;
        $insta_user_id = auth()->user()->insta_user_id;
        if($fb_access_token != null && $fb_page_token == null)
        {
            $fb = new Facebook([
                'app_id' => env('app_id'),
                'app_secret' => env('app_secret'),
                'default_graph_version' => 'v16.0',
                'default_access_token' => $fb_access_token,
            ]);
            $response = $fb->get('/me/accounts');
            $all_pages = json_decode($response->getbody())->data;
        }else{
            $all_pages = [];
        }

        if($insta_access_token != null && $insta_user_id == null)
        {
            $insta = config('services.instagram');
            $insta = new Facebook([
                'app_id' => $insta['client_id'],
                'app_secret' => $insta['client_secret'],
                'default_graph_version' => 'v16.0',
                'default_access_token' => $insta_access_token,
            ]);
            $insta_response = $insta->get('/me/accounts');
            $all_pages_for_insta = json_decode($insta_response->getbody())->data;
        }else{
            $all_pages_for_insta =[];
        }
        
        return view('user.index', compact('allPosts', 'all_pages', 'all_pages_for_insta'));

    }
    public function create_post(Request $req, Facebookservice $facebookservice, TwitterService $TwitterService, Instagramservice $Instagramservice)
    {
        $req->validate([
            'content' => 'required',
            'tag' => 'required',
        ]);
        $platforms = auth()->user()->platforms;
        if(in_array('Instagram',$platforms) && $req->media_type == 'image')
        {
            $req->validate([
                'media' => 'dimensions:min_width=400,min_height=500',
            ]);
        }
        if(count($platforms) > 0 )
        {
            $post = new Post();
            $post->user_id = auth()->user()->id;
            $post->content = $req->content;
            $post->tag = $req->tag;
            $post->posted_at_moment = $req->posttime;
            $post->posted_at = new DateTime($req->time);
            
            if ($req->hasFile('media')) {
                $imageName = time() . rand(1111,999) . '.' . $req->media->extension();
                $req->media->move('content_media', $imageName);
                $post->media = $imageName;
            }
            $post->save();
            for ($i = 0; $i < count($platforms); $i++) {
            
                if($platforms[$i] == 'Facebook')
                {
                    $data = [
                        'post' => $post,
                        'media_type' => $req->media_type,
                        'timezone' => $req->timezone,
                        ]; 
                    $facebookservice->create_post($data);
                    
                }elseif($platforms[$i] == 'Twitter'){
                   $data = [
                        'post' => $post,
                        'media_type' => $req->media_type,
                        'timezone' => $req->timezone,
                        ];  
                    $TwitterService->create_post($data);
                    
                }elseif($platforms[$i] == 'Instagram'){
                    $data = [
                        'post' => $post,
                        'media_type' => $req->media_type,
                        'timezone' => $req->timezone,
                        ]; 

                    $Instagramservice->create_post($data);
                }else{
                    $postdetail = new PostDetail();
                    $postdetail->post_id = $post->id;
                    $postdetail->plateform = $platforms[$i];
                    $postdetail->save();
                }
                
            }
            return back()->with('success', 'Post Created Successfully');
        }else {
            return back()->with('error', 'Please Select Atleast One Platform');
        }
    }

    public function get_event_detail(Request $request)
    {
        $post = Post::find($request->id);
        return view('user.event_detail', compact('post'));
    }

    public function update_user_platforms(Request $req)
    {
        if($req->plateform_val != null)
        {

        }
        if(in_array('Facebook',$req->plateform_val) && (auth()->user()->fb_access_token == null || auth()->user()->fb_page_token == null))
        {
            $error = ['message' => 'fb_error'];
            return response()->json($error, 404);
        }elseif(in_array('Twitter',$req->plateform_val) && 
        (auth()->user()->twiter_oauth_token == null || auth()->user()->twiter_secret_token == null || auth()->user()->twiter_oauth_verifier == null)){
            $error = ['message' => 'twiter_error'];
            return response()->json($error, 404);
        }elseif(in_array('Instagram',$req->plateform_val) && (auth()->user()->insta_access_token == null || auth()->user()->insta_user_id == null))
        {
            $error = ['message' => 'insta_error'];
            return response()->json($error, 404);
        }


        $user = User::find(auth()->user()->id);
        isset($req->plateform_val) ? $user->platforms = $req->plateform_val : $user->platforms = [];
        $user->update();
    }

    //////////////////facebook////////////////////////
    public function connect_to_facebook()
    {
        $fb = new Facebook([
            'app_id' => env('app_id'),
            'app_secret' => env('app_secret'),
            'default_graph_version' => 'v16.0',
        ]);
        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['pages_read_engagement','pages_manage_posts'];
        $helper->getPersistentDataHandler()->set('state','abcdef');
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
        $user = User::find(auth()->user()->id);
        $user->fb_access_token = $token;
        $user->update();
        return redirect('/index')->with('success', 'Facebook Connected Successfully! kindly Select Your Page');
    }
    
    public function select_page()
    {
    //  $posts = Post::where('user_id', auth()->user()->id)->select('id','tag', 'posted_at')->get();
    //     $allPosts = [];
    //     foreach ($posts as $post) {
    //         $allPosts[] = [
    //             'id' => $post->id,
    //             'title' => $post->tag,
    //             'start' => $post->posted_at,
    //         ];
    //     }
        
        $accessToken = auth()->user()->fb_access_token;
        $fb = new Facebook([
            'app_id' => env('app_id'),
            'app_secret' => env('app_secret'),
            'default_graph_version' => 'v16.0',
            'default_access_token' => $accessToken,
        ]);
        $response = $fb->get('/me/accounts');
        $all_pages = json_decode($response->getbody())->data;
        return view('user.select_page', compact('allPosts', 'all_pages'));
    }
    
    public function set_page(Request $req)
    {
        $req->validate([
            'page' => 'required',
        ]);
        $user = User::find(auth()->user()->id);
        $user->fb_page_token = $req->page;
        $user->update();
        return redirect('/index')->with('success', 'Facebook Connected Successfully!');
    }
    
    //////////////////facebook////////////////////////////
    
    
    /////////////////////instagram////////////////////////
    
    public function connect_to_instagram()
    {
        $insta = config('services.instagram');
        
        $fb = new Facebook([
            'app_id' => $insta['client_id'],
            'app_secret' => $insta['client_secret'],
            'default_graph_version' => 'v16.0',
        ]);
        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['instagram_basic','pages_show_list', 'ads_management', 'business_management', 'instagram_content_publish', 'pages_read_engagement'];
        $helper->getPersistentDataHandler()->set('state','abcdef');
        $loginUrl = $helper->getLoginUrl($insta['redirect'], $permissions);
        return redirect()->away($loginUrl);

    }
    public function connect_instagram_calback(Request $request)
    {
        $insta = config('services.instagram');
        $fb = new Facebook([
            'app_id' => $insta['client_id'],
            'app_secret' => $insta['client_secret'],
            'default_graph_version' => 'v16.0',
        ]);
        $accessToken = $fb->getOAuth2Client()->getAccessTokenFromCode($request->code, $insta['redirect']);
        $user = User::find(auth()->user()->id);
        $user->insta_access_token = $accessToken;
        $user->update();
        return redirect('/index')->with('success', 'Please Select page that you have connected with you instagram business account');
    
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
        $response = $instagram->get("/$req->page?fields=instagram_business_account", auth()->user()->insta_access_token);
        $result = $response->getDecodedBody();
        // dd($result);
        if(isset($result['instagram_business_account']))
        {
            $instagram_business_account_id = $result['instagram_business_account']['id'];
            $user = User::find(auth()->user()->id);
            $user->insta_user_id = $instagram_business_account_id;
            $user->update();
            return redirect('/index')->with('success', 'instagram Connected Successfully!');
        }else{
            return redirect('/index')->with('error', 'Sorry! no instagram account is connected with this page');
        }
        
    }
    
    
    ////////////////////instagram/////////////////////////
    
    ////////////////////linkedin/////////////////////////
    public function connect_to_linkedin()
    {
        // return Socialite::driver('linkedin')->redirect();
        $client_id = '77l861fu7qz6ly';
        $client_secret = '2JCRuJKoFqCsHB3w';
        $redirect_uri = url('connect_linkedin/calback');
        $authorization_url = 'https://www.linkedin.com/oauth/v2/authorization?' . http_build_query(array(
            'response_type' => 'code',
            'client_id' => $client_id,
            'redirect_uri' => $redirect_uri,
            'state' => 'us',
            'scope' => 'w_member_social r_liteprofile r_emailaddress'
        ));
        header('Location: ' . $authorization_url);
        exit();
        // Create the OAuth 2.0 client
        // $provider = new LinkedIn([
        //     'clientId'     => '77l861fu7qz6ly',
        //     'clientSecret' => '2JCRuJKoFqCsHB3w',
        //     'redirectUri'  => url('connect_linkedin/calback'),
        //     'grant_type' => 'code',
        //     'response_type' => 'code',

        //     'scope'       => 'w_member_social'
        // ]);
        
        // $authorizationUrl = $provider->getAuthorizationUrl();
        // return redirect($authorizationUrl);
        
    }
    
    public function connect_linkedin_calback(Request $request)
    {
        // return redirect('/index')->with('success', 'linkedin Connected Successfully');
        
        $provider = new LinkedIn([
            'clientId'     => '77l861fu7qz6ly',
            'clientSecret' => '2JCRuJKoFqCsHB3w',
            'redirectUri'  => url('connect_linkedin/calback'),
            'response_type' => 'code',
            'grant_type' => 'authorization_code',
            // 'scope'       => 'r_liteprofile%20r_emailaddress%20w_member_social'
            'scope' => 'w_member_social r_liteprofile r_emailaddress'
            
        ]);
        // dd($provider);
        $accessToken = $provider->getAccessToken('authorization_code', [
            'code' => $_GET['code']
        ]);
 
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
        // dd($accessToken, $userData);
        $userId = $userData['id'];
        
        // 


        $data = [
		    'author' => "urn:li:person:$userId",
		    'lifecycleState' => 'PUBLISHED',
		    'specificContent' => [
		        'com.linkedin.ugc.ShareContent' => [
		            'shareCommentary' => [
		                'text' => 'Check out my new blog post ans!'
		            ],
		            'shareMediaCategory' => 'ARTICLE',
		            'media' => [
		                [
		                    'status' => 'READY',
		                    'description' => [
		                        'text' => 'Mydfg '
		                    ],
		                    'originalUrl' => 'https://www.example.com/my-blog-post',
		                    'title' => [
		                        'text' => 'My blog post title 22222'
		                    ],
		                    'thumbnails' => [
		                        [
		                            'resolvedUrl' => 'https://www.example.com/my-blog-post-image.jpg'
		                        ]
		                    ]
		                ]
		            ]
		        ]
		    ],
		    'visibility' => [
		        'com.linkedin.ugc.MemberNetworkVisibility' => 'PUBLIC'
		    ]
		];
		$curl = curl_init();
		curl_setopt_array($curl, [
		    CURLOPT_URL => "https://api.linkedin.com/v2/ugcPosts",
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "",
		    CURLOPT_MAXREDIRS => 10,
		    CURLOPT_TIMEOUT => 30,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "POST",
		    CURLOPT_POSTFIELDS => json_encode($data),
		    CURLOPT_HTTPHEADER => [
		        "Authorization: Bearer ".$accessToken,
		        "Content-Type: application/json"
		    ],
		]);
		$response3 = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		    echo "cURL Error #:" . $err;
		} else {
		    echo $response3;
		}
        dd($response3);

    }
    ////////////////////linkedin/////////////////////////
    
    public function connect_to_twitter()
    {

        $twitteroauth = new TwitterOAuth(env('consumer_key'), env('consumer_secret'));
        
        // request token of application
        $request_token = $twitteroauth->oauth(
            'oauth/request_token', [
                'oauth_callback' => url('/connect_to_twitter/calback')
            ]
        );
        // throw exception if something gone wrong
        if($twitteroauth->getLastHttpCode() != 200) {
            throw new \Exception('There was a problem performing this request');
        }
        
        // save token of application to database
        $user = User::find(auth()->user()->id);
        $user->twiter_oauth_token = $request_token['oauth_token'];
        $user->twiter_secret_token = $request_token['oauth_token_secret'];
        $user->update();
        // generate the URL to make request to authorize our application
        $url = $twitteroauth->url(
            'oauth/authorize', [
                'oauth_token' => $request_token['oauth_token']
            ]
        );
        return redirect($url);
    }
    
    public function connect_twitter_calback(Request $request)
    {

        $oauth_verifier = filter_input(INPUT_GET, 'oauth_verifier');
        User::where('id', auth()->user()->id)->update(['twiter_oauth_verifier' => $oauth_verifier]);
        return redirect('/index')->with('success', 'Twitter Connected Successfully');
    }
}
