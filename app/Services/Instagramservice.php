<?php 
namespace App\Services;

use Facebook\Facebook;
use DateTime;
use DateTimeZone;
use GuzzleHttp\Client;
use App\Models\PostDetail;
class Instagramservice
{
    public function create_post($data)
    {
        // dd($data);
        $post = $data['post'];
        $media_path = asset("content_media/$post->media");
        // $media_path = "https://youpost.social/content_media/16811071681110.jpg";
        // $media_path = "https://youpost.social/content_media/16812977781010.mp4";
        
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
            // dd('image');
        }elseif($data['media_type']=='video'){
            // dd('345 video');
            // $response = $instagram->post("/$insta_user_id/videos", array(
            //     'video_url' => 'klwhsofu',
            //     'caption' => "$post->content #$post->tag",
            //     'access_token' => $accesstoken,
            // ));
            
            // $url = "https://graph.instagram.com/$insta_user_id/media?access_token=$accesstoken";
            // $client = new Client();
            // $response44 = $client->post($url, [
            //     'multipart' => [
            //         [
            //             'name' => 'caption',
            //             'contents' => 'This is a test post last.'
            //         ],
            //         [
            //             'name' => 'media_url',
            //             'contents' => fopen($media_path, 'r'),
            //         ],
            //     ],
            // ]);

            // 
            
            // Create a new curl file
            $file = curl_file_create($media_path, 'video/mp4', basename($media_path));

            // Set the API endpoint URL
            $url = "https://graph.instagram.com/3471481726457098/$insta_user_id/media";

            // Set the request parameters
            $params = [
                'access_token' => $accesstoken,
                'media_type' => 'VIDEO',
                'video_title' => 'My Video Title',
                'video_description' => 'My Video Descriptiondd',
                'video_file' => $file,
            ];

            // Create a new curl session
            $ch = curl_init($url);

            // Set the curl options
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Execute the curl session
            $response = curl_exec($ch);

            // Close the curl session
            curl_close($ch);

            // Decode the response JSON
            $response_data = json_decode($response, true);
            // dd($response_data, 1212, $response);
            // Check for any errors
            if (isset($response_data['error'])) {
                echo 'Error: ' . $response_data['error']['message'];
            } else {
                echo 'Video uploaded successfully!';
            }
    
        }
        // dd(5665,'restt', $response44);
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
        $postdetail->social_id = $response->getDecodedBody()['id'];
        $postdetail->save();
    }
}