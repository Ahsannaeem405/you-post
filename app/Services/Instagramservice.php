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
        $media_path = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaAImXTgjSXB57ikN3nC2CJdRBHDZeKXNGd9Bk8GU&s";
        $insta = config('services.instagram');
        $accesstoken = auth()->user()->insta_access_token;
        $insta_user_id = auth()->user()->insta_user_id;


        $instagram = new Facebook([
            'app_id' => $insta['client_id'],
            'app_secret' => $insta['client_secret'],
            'default_graph_version' => 'v16.0',
            // 'default_access_token' => $accesstoken,
        ]);
    
        try {
            // Upload the photo or video to the Instagram account
            $response = $instagram->post("/$insta_user_id/media", array(
            'image_url' => $media_path,
            // 'image'=>''
            // 'media_type' => 'photo',
            'caption' => 'hello every one',
            'access_token' => $accesstoken,
            ));
            $result = $response->getDecodedBody();
            $media_id = $result['id'];
            
            $response = $instagram->post("/$insta_user_id/media_publish", array(
                'creation_id' => $media_id,
                'access_token' => $accesstoken,
                ));
            // Publish the photo or video on the Instagram account
            // $response = $instagram->post('/{instagram-user-id}/media_publish', array(
            // 'creation_id' => '{creation-id}',
            // 'access_token' => '{access-token}',
            // ));
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // Handle error
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // Handle error
        }
        
        // Print the media ID
        // echo $media_id;
        dd($result, $response);
        
    }
}