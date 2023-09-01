<?php

namespace App\Services;

use App\Models\Post;
use Facebook\Facebook;
use DateTime;
use DateTimeZone;
use App\Models\PostDetail;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class  Facebookservice
{
    public function create_post($data)
    {


        $post = Post::find($data['post']->id);
        $media_path = public_path("content_media/$post->media");
        $media_path2 = public_path("content_media/16911507181001.png");
        $accessToken = $post->account->fb_page_token;

        $client = new Client();

        $url = "https://graph.facebook.com/me/feed";
        if ($data['post']->media_type == 'image') {
            $url = "https://graph.facebook.com/me/photos";
        } else if ($data['post']->media_type == 'video') {
            $url = "https://graph.facebook.com/me/videos";
        }
        $tags = $post->tag ? " $post->tag" : '';
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
        if ($data['post']->media_type == 'video' ) {
            $options['multipart'][] = [
                'name' => 'source',
                'contents' => fopen($media_path, 'r'),
            ];
        }      if ( $data['post']->media_type == 'image') {
            $options['multipart'][] = [
                'name' => 'source',
                'contents' => fopen($media_path2, 'r'),
            ];
        }


        try {
//
            $response = Http::attach(
                'source', fopen($media_path, 'r'), basename($media_path)
            )->post("https://graph.facebook.com/v13.0/me/photos", [
                'access_token' => $accessToken,
                'message' => 'testing',
                'published'=>false
            ])->json();
            Log::info($response);
            $response2 = Http::attach(
                'source', fopen($media_path2, 'r'), basename($media_path2)
            )->post("https://graph.facebook.com/v13.0/me/photos", [
                'access_token' => $accessToken,
                'message' => 'testing',
                'published'=>false
            ])->json();
            Log::info($response2);

            $fb = new Facebook([
                'app_id' => env('app_id'),
                'app_secret' => env('app_secret'),
                'default_access_token' => $accessToken,
            ]);
//            $response3=$fb->post('me/feed',[
//                'attached_media'=>[
//                    '{"media_fbid":"'.$response['id'].'"}',
//                    '{"media_fbid":"'.$response2['id'].'"}'
//                    ]
//
//            ]);


            $response3 = Http::post("https://graph.facebook.com/v13.0/me/feed", [
                'access_token' => $accessToken,
               // 'message' => 'photto 1',
                'attached_media'=>[
                    '{"media_fbid":"'.$response['id'].'"}',
                    '{"media_fbid":"'.$response2['id'].'"}'
                ]

            ])->json();
            Log::info($response3);
            die();



//            $response = $client->post($url, $options);
//
//            $responseData = json_decode($response->getBody(), true);

//            $postdetail = new PostDetail();
//            $postdetail->post_id = $post->id;
//            $postdetail->plateform = 'Facebook';
//            $postdetail->social_id = $responseData['id'];
//            $postdetail->save();
//
//            $msg = ['status' => true];
        } catch (\Throwable $e) {
            // Handles Guzzle HTTP errors
          //  $post->delete();
            Log::error($e);
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
