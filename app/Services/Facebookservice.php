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
        $accessToken = auth()->user()->fb_page_token;
        $fb = new Facebook([
            'app_id' => env('app_id'),
            'app_secret' => env('app_secret'),
            'default_graph_version' => 'v12.0',
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
            $postdetail->save();
        } else {
            $error = $response->getThrownException()->getMessage();
            return back()->with('error',  $error);
        }
        
    }
}