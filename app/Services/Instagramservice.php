<?php 
namespace App\Services;

use Facebook\Facebook;
use DateTime;
use DateTimeZone;
use App\Models\PostDetail;
class Instagramservice
{
    public function create_post($data)
    {
        // dd($data);
        $post = $data['post'];
        // $media_path = asset("content_media/$post->media");
        $media_path = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaAImXTgjSXB57ikN3nC2CJdRBHDZeKXNGd9Bk8GU&s";
        $insta = config('services.instagram');
        $accesstoken = auth()->user()->insta_access_token;
        $insta_user_id = auth()->user()->insta_user_id;

        $instagram = new Facebook([
            'app_id' => $insta['client_id'],
            'app_secret' => $insta['client_secret'],
            'default_graph_version' => 'v16.0',
        ]);

        if($data['media_type']=='image')
        {
            $response = $instagram->post("/$insta_user_id/media", array(
                'image_url' => $media_path,
                'caption' => "$post->content #$post->tag",
                'access_token' => $accesstoken,
            ));
        }else if($data['media_type']=='video'){
            $response = $instagram->post("/$insta_user_id/media", array(
                'image_url' => $media_path,
                'video_url' => $media_path,
                'caption' => "$post->content #$post->tag",
                'access_token' => $accesstoken,
            ));
        }
        try {

            $result = $response->getDecodedBody();
            $media_id = $result['id'];
            
            $response = $instagram->post("/$insta_user_id/media_publish", array(
                'creation_id' => $media_id,
                'access_token' => $accesstoken,
                ));

        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            return redirect('/index')->with('error', "444 $e");
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            return redirect('/index')->with('error', "555 $e");
        }

        $postdetail = new PostDetail();
        $postdetail->post_id = $post->id;
        $postdetail->plateform = 'Instagram';
        $postdetail->save();
    }
}