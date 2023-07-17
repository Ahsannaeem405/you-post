<?php

namespace App\Services;

use Facebook\Facebook;
use DateTime;
use DateTimeZone;
use GuzzleHttp\Client;
use App\Models\PostDetail;
use getID3;
use App\Models\Post;
use Illuminate\Support\Facades\Log;


class Instagramservice
{


    public function create_post($data)
    {

        $post = Post::find($data['post']->id);

        $media_path = asset("content_media/$post->media");

        $insta = config('services.instagram');
        $accesstoken = $post->account->insta_access_token;
        $insta_user_id = $post->account->insta_user_id;

        $instagram = new Facebook([
            'app_id' => $insta['client_id'],
            'app_secret' => $insta['client_secret'],
            'default_graph_version' => 'v16.0',
        ]);
        $tags = $post->tag ? " #$post->tag" : '';
        if ($post->media_type == 'image') {

            try {


                $response = \Http::post("https://graph.facebook.com/v16.0/$insta_user_id/media", [
                    'image_url' => $media_path,
                    'caption' => $post->content.$tags,
                    'access_token' => $accesstoken
                ])->json();

                $media_id = $response['id'];


                $response = \Http::post("https://graph.facebook.com/v16.0/$insta_user_id/media_publish", [
                    'creation_id' => $media_id,
                    'access_token' => $accesstoken
                ])->json();
                $postdetail = new PostDetail();
                $postdetail->post_id = $post->id;
                $postdetail->plateform = 'Instagram';
                $postdetail->social_id = $response['id'];
                $postdetail->save();
                $msg = ['status' => true];

            } catch (\Throwable $e) {

                $msg = ['status' => false];
                $post->delete();
            }


            return $msg;


        }
        if ($post->media_type == 'video') {

            try {


                $response = \Http::post("https://graph.facebook.com/v16.0/$insta_user_id/media", [
                    'video_url' => $media_path,
                    'media_type' => 'VIDEO',
                    'caption' => $post->content.$tags,
                    'access_token' => $accesstoken
                ])->json();

                sleep(10);

                $media_id = $response['id'];
                $response = \Http::post("https://graph.facebook.com/v16.0/$insta_user_id/media_publish", [
                    'creation_id' => $media_id,
                    'access_token' => $accesstoken
                ])->json();
                 $postdetail = new PostDetail();
               $postdetail->post_id = $post->id;
                $postdetail->plateform = 'Instagram';
                $postdetail->social_id = $response['id'];
                $postdetail->save();
                $msg = ['status' => true];

            } catch (\Throwable $e) {
                $msg = ['status' => false];
                $post->delete();
            }


            return $msg;


        } else {
            $msg = ['status' => false];
            $post->delete();
            return $msg;
        }

    }

    public function delete_post($data)
    {
        $accessToken = auth()->user()->account->insta_access_token;

        $postId = $data;

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

                $msg = ['status' => true];


            } else {
                $msg = ['status' => false];
            }
            return $msg;


        } catch (\Throwable $e) {
            $msg = ['status' => false];
            return $msg;
        }

    }

    function stats($post)
    {

        $getStats = \Http::withToken($post->account->insta_access_token)->get("https://graph.facebook.com/{$post->post_dt->social_id}?fields=like_count,comments_count")->json();
        $post->post_dt->update([
            'likes'=>$getStats['like_count'] ?? 0,
            'comments'=>$getStats['comments_count'] ?? 0,
            'shares'=>$getStats['shares_count'] ?? 0,
        ]);

    }
}
