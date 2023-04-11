<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use Facebook\Facebook;

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
    public function create_post(Request $req)
    {
        $req->validate([
            'content' => 'required',
            'tag' => 'required',
        ]);
        $platforms = auth()->user()->platforms;
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
        // dd($req->plateform_val);
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
       // $helper->getPersistentDataHandler()->set('state','US');
        $loginUrl = $helper->getLoginUrl('http://localhost:8000/connect_facebook/calback', $permissions);
        

        return redirect()->away($loginUrl);
    }

    public function connect_facebook_calback(Request $request)
    {
        $fb = new Facebook([
            'app_id' => env('app_id'),
            'app_secret' => env('app_secret'),
            'default_graph_version' => 'v12.0',
        ]);
        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
            dd(1);
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            return 'Graph returned an error: ' . $e->getMessage();
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            return 'Facebook SDK returned an error: ' . $e->getMessage();
        }
        if (!isset($accessToken)) {
            if ($helper->getError()) {
                return 'Error: ' . $helper->getError() . ', Description: ' . $helper->getErrorDescription();
            } else {
                return 'Error: Bad request';
            }
        }
        // Store the access token in the database for future use
        $token = $accessToken->getValue;

        dd($request);
        $user = User::find(auth()->user()->id);
        $user->acees_token = $request->code;
        $user->update();
        return redirect('/index')->with('success', 'Connected Successfully');
    }
}
