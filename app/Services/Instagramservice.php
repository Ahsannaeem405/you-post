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
        $post = Post::find( $data['post']->id);
        $media_path = asset("content_media/$post->media");
        $accesstoken = $post->account->insta_access_token;
        $insta_user_id = $post->account->insta_user_id;


        $tags = $post->tag ? " $post->tag" : '';
        if ($post->media_type == 'image') {
            $child_id = [];
            try {

                $images = explode(',', $post->media);
                foreach ($images as $image) {
                   // $path = 'https://youpost.social/content_media/16892543581029.jpg';
                    $path = asset("content_media/$image");
                    $response = \Http::post("https://graph.facebook.com/v16.0/$insta_user_id/media", [
                        'caption' => $post->content . $tags,
                        'image_url' => $path,
                        'is_carousel_item' => count($images)>1,
                        'access_token' => $accesstoken
                    ])->json();

                    if (count($images)>1){
                        $child_id[] = $response['id'];
                    }
                    else{
                        $media_id = $response['id'];
                    }

                }


                if (count($images)>1){
                    $response = \Http::post("https://graph.facebook.com/v16.0/$insta_user_id/media", [
                        'caption' => $post->content . $tags,
                        'media_type' => 'CAROUSEL',
                        'children' => implode(',', $child_id),
                        'access_token' => $accesstoken
                    ])->json();
                    $media_id = $response['id'];
                }

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

            $video = explode(',', $post->media);
            $path = asset('content_media/' . $video[0]);
            try {


                $response = \Http::post("https://graph.facebook.com/v16.0/$insta_user_id/media", [
                    'video_url' => $path,
                    'media_type' => 'VIDEO',
                    'caption' => $post->content . $tags,
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

    public function get_inst_image($accessToken)
    {
         if($accessToken){
        $client = new Client();
        $response = $client->get('https://api.linkedin.com/v2/organizations/88426328?projection=(id,logoV2(original~:playableStreams))', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
            ],
        ]);

        $responseData = json_decode($response->getBody(), true);
        $imageUrl =$responseData['logoV2']['original~']['elements'][0]['identifiers'][0]['identifier'];
      
       }
       return $imageUrl;
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
            'likes' => $getStats['like_count'] ?? 0,
            'comments' => $getStats['comments_count'] ?? 0,
            'shares' => $getStats['shares_count'] ?? 0,
        ]);

    }
}
