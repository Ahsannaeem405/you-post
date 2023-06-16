<?php

namespace App\Services;

use Abraham\TwitterOAuth\TwitterOAuth;
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
        $this->twiter_refresh(auth()->user());


        $postId = $data;


        // Create a new Guzzle HTTP client instance

        try {
            auth()->user()->refresh();
            $bearerToken = auth()->user()->twiter_access_token;

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
        $this->twiter_refresh($post->user);
        $post = Post::find($data['post']->id);

        $content = "$post->content #$post->tag";
        $bearerToken = $post->user->twiter_access_token;


        $response = Http::withToken($bearerToken)->post('https://api.twitter.com/2/tweets',
            [
                "text" => $content,

            ]);
        $get = json_decode($response->body());



        if ($response->status() == 201) {
            $postdetail = new PostDetail();
            \Log::info($post);
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


    public function twiter_refresh($user)
    {


        $refresh_token = $user->twiter_refresh_token;
        $twitter = config('services.twitter');
        $client_id = $twitter['client_id'];
        $client_secret = $twitter['client_secret'];
        $redirect_uri = $twitter['redirect'];

        $basee = base64_encode($client_id . ':' . $client_secret);
        $curl = curl_init();
        curl_setopt_array($curl, array(


            CURLOPT_URL => 'https://api.twitter.com/2/oauth2/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => "grant_type=refresh_token&refresh_token=$refresh_token",
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                "Authorization: Basic $basee",
            ),
        ));
        $response = curl_exec($curl);

        curl_close($curl);
        $response2 = json_decode($response);

        $access_token = $response2->access_token;
        $refresh_token = $response2->refresh_token;
        $user=User::where('id', $user->id)->update([
            'twiter_access_token' => $access_token,
            'twiter_refresh_token' => $refresh_token
        ]);



    }
}
