<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostDetail;
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
        if(isset($req->selected_plateform))
        {
            $plateform = explode(",", $req->selected_plateform);
            $post = new Post();
            $post->user_id = auth()->user()->id;
            $post->content = $req->content;
            $post->tag = $req->tag;
            $post->posted_at = new DateTime($req->time);
            $post->save();
            for ($i = 0; $i < count($plateform); $i++) {
                $postdetail = new PostDetail();
                $postdetail->post_id = $post->id;
                $postdetail->plateform = $plateform[$i];
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
}
