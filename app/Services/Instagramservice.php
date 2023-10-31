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
use Illuminate\Support\Facades\Http;

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





    public function get_inst_data($ins_user_id)
    {

        $instaUserId = $ins_user_id;
        $instaAccessToken = auth()->user()->account->insta_access_token;

        try {
            $response = Http::withToken($instaAccessToken)
                            ->get("https://graph.facebook.com/{$instaUserId}?fields=id,username,name,profile_picture_url");
            $pageData = $response->json();

            if(isset($pageData['id'])) {
                $username = $pageData['username'];
                $name = $pageData['name'];
                $profile_picture_url = $pageData['profile_picture_url'] ?? asset('assets/images/insta-default-image.png');
                return [
                    'username' => $username,
                    'name' => $name,
                    'profile_picture_url' => $profile_picture_url
                ];
            } else {
                return null; // Handle the case where the page is not found or other errors.
            }
        } catch (\Exception $e) {
            // Handle the exception, log the error, or return an error response.
            return $e->getMessage();
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
            'likes' => $getStats['like_count'] ?? 0,
            'comments' => $getStats['comments_count'] ?? 0,
            'shares' => $getStats['shares_count'] ?? 0,
        ]);

    }
}
