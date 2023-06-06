<?php

namespace App\Services;

use Facebook\Facebook;
use DateTime;
use DateTimeZone;
use GuzzleHttp\Client;
use App\Models\PostDetail;
use getID3;
use App\Models\Post;


class Instagramservice
{
    public function media_status($media_id, $post)
    {
        $insta = config('services.instagram');
        $accesstoken = auth()->user()->insta_access_token;
        $insta_user_id = auth()->user()->insta_user_id;

        $instagram = new Facebook([
            'app_id' => $insta['client_id'],
            'app_secret' => $insta['client_secret'],
            'default_graph_version' => 'v16.0',
        ]);
        //dd('$media_id/?fields=status_code&access_token=$accesstoken',$media_id,$accesstoken);
        $response = $instagram->get("/$media_id/?fields=status_code&access_token=$accesstoken");

        $result = $response->getDecodedBody();
        $status = $result['status_code'];

        if ($status == 'ERROR') {
            //dd($status);
            $response = $instagram->get("/$media_id/?fields=status&access_token=$accesstoken");

            $result = $response->getDecodedBody();
            $status = $result['status'];
            $msg = ['status' => false, 'msg' => $status];
            return $msg;
        }
        if ($status != 'FINISHED') {
            sleep(10);
        }
       //    $this->media_status($media_id, $post);


            $response = $instagram->post("/$insta_user_id/media_publish", array(
                'creation_id' => $media_id,
                'access_token' => $accesstoken,
            ));
            $postdetail = new PostDetail();
            $postdetail->post_id = $post->id;
            $postdetail->plateform = 'Instagram';
            $postdetail->social_id = $response->getDecodedBody()['id'];
            $postdetail->save();

            $msg = ['status' => true];
            //dd($msg);
            return $msg;




    }

    public function create_post($data)
    {
        // dd($data);
        $post = Post::find($data['post']->id);
        $video_path = "content_media/$post->media";
        $media_path = asset("content_media/$post->media");
        $insta = config('services.instagram');
        $accesstoken = auth()->user()->insta_access_token;
        $insta_user_id = auth()->user()->insta_user_id;

        $instagram = new Facebook([
            'app_id' => $insta['client_id'],
            'app_secret' => $insta['client_secret'],
            'default_graph_version' => 'v16.0',
        ]);

        if ($data['media_type'] == 'image') {


            $response = $instagram->post("/$insta_user_id/media", array(
                'image_url' => $media_path,
                'caption' => "$post->content",
            ), $accesstoken);

            $result = $response->getDecodedBody();
            $media_id = $result['id'];
            try {
                $response = $instagram->post("/$insta_user_id/media_publish", array(
                    'creation_id' => $media_id,
                    'access_token' => $accesstoken,
                ));
                $postdetail = new PostDetail();
                $postdetail->post_id = $post->id;
                $postdetail->plateform = 'Instagram';
                $postdetail->social_id = $response->getDecodedBody()['id'];
                $postdetail->save();
                $msg = ['status' => true];

            } catch (\Exception $e) {
                $msg = ['status' => false];
                $post->delete();
            }


            return $msg;


        } elseif ($data['media_type'] == 'video') {

            $getID3 = new getID3();
            $video_info = $getID3->analyze($video_path);
            //dd($video_info);
            $duration_seconds = $video_info['playtime_seconds'];
            $duration_formatted = gmdate('H:i:s', $duration_seconds);
            if ($video_info['playtime_seconds'] > 60) {
                $msg = ['status' => false, 'error' => 'max 60 Seconds video allow'];
                $post->delete();
                return $msg;


            }
            if ($video_info['filesize'] > 100000000) {
                $msg = ['status' => false, 'error' => 'max 100mb video allow'];
                $post->delete();
                return $msg;


            }


            $response = $instagram->post("/$insta_user_id/media", array(
                'media_type' => 'VIDEO',
                'video_url' => $media_path,
                'caption' => "$post->content",
            ), $accesstoken);
            sleep(10);
            $result = $response->getDecodedBody();
            $media_id = $result['id'];

            $get = $this->media_status($media_id, $post);
            $msg = $get;
            if (!$get['status']) {
              $post->delete();

            }



            return $msg;


        }
    }

    public function delete_post($data)
    {
        $accessToken = auth()->user()->insta_access_token;

        $postId = $data->social_id;

        // Instagram Graph API endpoint for deleting a post
        $deleteEndpoint = "https://graph.instagram.com/{$postId}";

        // Create a new Guzzle HTTP client instance
        $client = new Client();

        try {
            // Send a DELETE request to delete the post
            $response = $client->delete($deleteEndpoint, [
                'query' => [
                    'access_token' => $accessToken,
                ],
            ]);
            if ($response->getStatusCode() == 200) {
                $dell = Post::find($data->post_id);
                $dell->delete();
                $msg = ['status' => true];
                return $msg;

            }


        } catch (Exception $e) {
            echo 'Error deleting post: ' . $e->getMessage();
        }

    }
}
