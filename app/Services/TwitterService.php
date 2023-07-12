<?php

namespace App\Services;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Models\Account;
use App\Models\PostDetail;
use App\Models\User;
use CURLFile;
use Illuminate\Support\Facades\Http;
use App\Models\Post;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class TwitterService
{
    public function delete_post($data)
    {
        $this->twiter_refresh(auth()->user()->account);
        $postId = $data;


        // Create a new Guzzle HTTP client instance

        try {
            auth()->user()->refresh();
            $bearerToken = auth()->user()->account->twiter_access_token;

            $response = Http::withToken($bearerToken)->delete('https://api.twitter.com/2/tweets/' . $postId);

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

    public function create_post($data)
    {


        $post = Post::find($data['post']->id);
        $this->twiter_refresh($post->account);
        $post = Post::find($data['post']->id);
        $tags = $post->tag ? " #$post->tag" : '';
        $content = "$post->content $tags";
        $bearerToken = $post->account->twiter_access_token;


        $response = Http::withToken($bearerToken)->post('https://api.twitter.com/2/tweets',
            [
                "text" => $content,

            ]);
        $get = json_decode($response->body());


        if ($response->status() == 201) {
            $postdetail = new PostDetail();
            $postdetail->post_id = $post->id;
            $postdetail->plateform = 'Twitter';
            $postdetail->social_id = $get->data->id;
            $postdetail->save();
            $msg = ['status' => true];
        } else {

            $msg = ['status' => false];
            $post->delete();

        }

        return $msg;
    }


    public function twiter_refresh($account)
    {

        $refresh_token = $account->twiter_refresh_token;
        $twitter = config('services.twitter');
        $client_id = $twitter['client_id'];
        $client_secret = $twitter['client_secret'];
        $redirect_uri = $twitter['redirect'];

        $basee = base64_encode($client_id . ':' . $client_secret);
        $client = new Client();

        $response = $client->post('https://api.twitter.com/2/oauth2/token', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => "Basic $basee",
            ],
            'form_params' => [
                'grant_type' => 'refresh_token',
                'refresh_token' => $refresh_token,
            ],
        ]);


        $response2 = json_decode($response->getBody()->getContents());

        $access_token = $response2->access_token;
        $refresh_token = $response2->refresh_token;
        $user = Account::find( $account->id)->update([
            'twiter_access_token' => $access_token,
            'twiter_refresh_token' => $refresh_token
        ]);



    }
}
