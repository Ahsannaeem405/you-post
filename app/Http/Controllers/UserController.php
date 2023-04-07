<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;

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
}
