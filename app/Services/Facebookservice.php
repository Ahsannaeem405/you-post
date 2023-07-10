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

        $options = [
            'query' => [
                'access_token' => $accessToken,
            ],
            'multipart' => [
                [
                    'name' => 'message',
                    'contents' => "$post->content #$post->tag",
                ],
                [
                    'name' => 'description',
                    'contents' => "$post->content #$post->tag",
                ],

            ],
        ];
        if ($data['post']->media_type == 'video' || $data['post']->media_type == 'image'){
            $options['multipart'][]= [
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

    function edit_post($post, $req)
    {
        $accessToken = auth()->user()->account->fb_page_token;


        $fb = new Facebook([
            'app_id' => env('app_id'),
            'app_secret' => env('app_secret'),
            'default_access_token' => $accessToken,
        ]);

        $post_id = $req->id;
        $message = "$req->content #$req->tag";


        $response = $fb->post("/$post_id", ['message' => $message]);

        if ($response->getStatusCode() == 200) {
            $get_post = PostDetail::where('social_id', $data)->first();
            $dell = Post::find($get_post->post_id);
            $dell->delete();
            $msg = ['status' => true];
            return $msg;

        }
    }

}
