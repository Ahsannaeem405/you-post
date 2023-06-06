<?php 
namespace App\Services;

use Facebook\Facebook;
use DateTime;
use DateTimeZone;
use App\Models\PostDetail;
class Facebookservice
{
    public function create_post($data)
    {

        
        
        $post = $data['post'];
        $media_path = asset("content_media/$post->media");
        // $media_path = "https://play2-earn.com/youpost/images/YouPost_Logo.png";
        // $media_path = "https://youpost.social/content_media/16812977781010.mp4";
        $accessToken = auth()->user()->fb_page_token;
        $fb = new Facebook([
            'app_id' => env('app_id'),
            'app_secret' => env('app_secret'),
            'default_graph_version' => 'v16.0',
            'default_access_token' => $accessToken,
        ]);
        $arr=[
            'message' => "$post->content #$post->tag",
            'description'=>"$post->content #$post->tag",
        ];
        $action='feed';
        if($data['media_type']=='image')
        {
        $action = 'photos';
            $arr['source'] = $fb->videoToUpload($media_path);
            
        }else if($data['media_type']=='video'){
            $action = 'videos';
            $arr['source'] = $fb->videoToUpload($media_path);
        }
        if($post->posted_at_moment != 'now')
        {
            $arr['published'] = false;
            $postdate = $post->posted_at->format('Y-m-d H:i:s');
            // $timezone = 'Asia/Karachi';
            $carbon = new \Carbon\Carbon($postdate, $data['timezone']);
            $scheduled_publish_time = $carbon->timestamp;
            $arr['scheduled_publish_time'] = $scheduled_publish_time;
        }

        $response = $fb->post("/me/$action",$arr );
        if (!$response->isError()) {
            $postdetail = new PostDetail();
            $postdetail->post_id = $post->id;
            $postdetail->plateform = 'Facebook';
            $postdetail->social_id = $response->getDecodedBody()['id'];
            $postdetail->save();
        } else {
            $error = $response->getThrownException()->getMessage();
            return back()->with('error',  $error);
        }
    }

    function delete_post($id)
    {
        $accessToken = auth()->user()->fb_page_token;



        $fb = new Facebook([
           'app_id' => env('app_id'),
                    'app_secret' => env('app_secret'),
           'default_access_token' => $accessToken,
        ]);

        $post_id = $id;

        
            $response = $fb->delete("/$post_id");
            if($response->getStatusCode()==200){
                $get_post=PostDetail::where('social_id',$data)->first();
                $dell=Post::find($get_post->post_id);
                $dell->delete();
                $msg=['status'=>true];
                return $msg;

            }
    }
    function edit_post($post,$req)
    {
        $accessToken = auth()->user()->fb_page_token;



        $fb = new Facebook([
           'app_id' => env('app_id'),
           'app_secret' => env('app_secret'),
           'default_access_token' => $accessToken,
        ]);

        $post_id = $req->id;
        $message ="$req->content #$req->tag";

        
        $response = $fb->post("/$post_id", ['message' => $message]);

            if($response->getStatusCode()==200){
                $get_post=PostDetail::where('social_id',$data)->first();
                $dell=Post::find($get_post->post_id);
                $dell->delete();
                $msg=['status'=>true];
                return $msg;

            }
    }

}