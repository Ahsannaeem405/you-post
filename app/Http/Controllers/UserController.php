<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use App\Services\Facebookservice;


class UserController extends Controller
{
    //
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
        return view('user.index', compact('allPosts'));
    }
    public function create_post(Request $req, Facebookservice $facebookservice)
    {

        $req->validate([
            'content' => 'required',
            'tag' => 'required',
        ]);
        $platforms = auth()->user()->platforms;
        if(count($platforms) > 0 )
        {
            if(in_array('Facebook', $platforms))
            {
                $facebookservice->create_post();
                
            }
            

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
                $postdetail = new PostDetail();
                $postdetail->post_id = $post->id;
                $postdetail->plateform = $platforms[$i];
                $postdetail->save();
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
        if(in_array('Facebook',$req->plateform_val) && auth()->user()->fb_access_token == null)
        {
            // dd(12,$req->plateform_val);
            $error = ['message' => 'fb_error'];
            return response()->json($error, 404);

        }
        $user = User::find(auth()->user()->id);
        isset($req->plateform_val) ? $user->platforms = $req->plateform_val : $user->platforms = [];
        $user->update();
    }


    public function connect_to_facebook()
    {
        $fb = new Facebook([
            'app_id' => env('app_id'),
            'app_secret' => env('app_secret'),
            'default_graph_version' => 'v12.0',
        ]);
        // dd($fb);
        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email','user_posts'];
        $helper->getPersistentDataHandler()->set('state','abcdef');
        $loginUrl = $helper->getLoginUrl(url('connect_facebook/calback'), $permissions);
        return redirect()->away($loginUrl);
    }

    public function connect_facebook_calback(Request $request)
    {
        $fb = new Facebook([
            'app_id' => env('app_id'),
            'app_secret' => env('app_secret'),
            'default_graph_version' => 'v12.0',
        ]);
   
        // $accessToken = $fb->getOAuth2Client()->getAccessTokenFromCode($request->code, url('connect_facebook/calback'));
        try {
            $accessToken = $fb->getOAuth2Client()->getAccessTokenFromCode($request->code, url('connect_facebook/calback'));

        } catch (FacebookResponseException $e) {
            // Handle Facebook API errors
            return response()->json(['error' => $e->getMessage()]);
        } catch (FacebookSDKException $e) {
            // Handle Facebook SDK errors
            return response()->json(['error' => $e->getMessage()]);
        }
        dd($accessToken);


        // Store the access token in the database for future use
        $token = $accessToken->getValue();
        $user = User::find(auth()->user()->id);
        $user->fb_access_token = $token;
        $user->update();
        return redirect('/index')->with('success', 'Facebook Connected Successfully');
    }
}
