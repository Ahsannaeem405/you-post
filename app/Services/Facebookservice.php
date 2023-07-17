<?php

namespace App\Services;

use App\Models\Post;
use Facebook\Facebook;
use DateTime;
use DateTimeZone;
use App\Models\PostDetail;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class  Facebookservice
{
    public function create_post($data)
    {


        $post = Post::find($data['post']->id);
        $media_path = public_path("content_media/$post->media");
        $accessToken = $post->account->fb_page_token;

        $client = new Client();

        $url = "https://graph.facebook.com/me/feed";
        if ($data['post']->media_type == 'image') {
            $url = "https://graph.facebook.com/me/photos";
        } else if ($data['post']->media_type == 'video') {
            $url = "https://graph.facebook.com/me/videos";
        }
        $tags = $post->tag ? " #$post->tag" : '';
        $options = [
            'query' => [
                'access_token' => $accessToken,
            ],
            'multipart' => [
                [
                    'name' => 'message',
                    'contents' => "$post->content $tags",
                ],
                [
                    'name' => 'description',
                    'contents' => "$post->content $tags",
                ],

            ],
        ];
        if ($data['post']->media_type == 'video' || $data['post']->media_type == 'image') {
            $options['multipart'][] = [
                'name' => 'source',
                'contents' => fopen($media_path, 'r'),
            ];
        }

        try {
            $response = $client->post($url, $options);

            $responseData = json_decode($response->getBody(), true);

            $postdetail = new PostDetail();
            $postdetail->post_id = $post->id;
            $postdetail->plateform = 'Facebook';
            $postdetail->social_id = $responseData['id'];
            $postdetail->save();

            $msg = ['status' => true];
        } catch (\Throwable $e) {
            // Handles Guzzle HTTP errors
            $post->delete();
            $msg = ['status' => false, 'error' => $e->getMessage()];
        }

        return $msg;

    }

    function delete_post($id)
    {
        $accessToken = auth()->user()->account->fb_page_token;

        $fb = new Facebook([
            'app_id' => env('app_id'),
            'app_secret' => env('app_secret'),
            'default_access_token' => $accessToken,
        ]);
        $post_id = $id;
        try {
            $response = $fb->delete("/$post_id");
            $msg = ['status' => true];
            return $msg;
        } catch (\Throwable $e) {
            $msg = ['status' => false];
            return $msg;
        }

    }

    function stats($post)
    {

        $getStats = \Http::withToken($post->account->fb_page_token)->get("https://graph.facebook.com/{$post->post_dt->social_id}?fields=comments.summary(true),likes.summary(true),shares.summary(true)")->json();
        $post->post_dt->update([
            'likes'=>$getStats['likes']['summary']['total_count'] ?? 0,
            'comments'=>$getStats['comments']['summary']['total_count'] ?? 0,
            'shares'=>$getStats['shares']['count'] ?? 0,
        ]);

    }

}
