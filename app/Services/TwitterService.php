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
        $tags = $post->tag ? " $post->tag" : '';
        $content = "$post->content $tags";
        $bearerToken = json_decode($post->account->twiter_access_token);


        $twitter = config('services.twitter');
        $connection = new TwitterOAuth(
            $twitter['client_id'],
            $twitter['client_secret'],
            $bearerToken->oauth_token,
            $bearerToken->oauth_token_secret,
        );

        if ($data['post']->media_type) {
            $images = explode(',', $post->media);
            $imagesdIds = [];
            foreach ($images as $image) {
                $connection->setApiVersion('1.1');
                $status = $connection->upload("media/upload", ["media" => public_path('content_media/' . $image)]);
                $imagesdIds[] = $status->media_id_string;
            }
        }
        $body = array();
        $body['text'] = $content;
        if (count($imagesdIds) >= 1) {
            $body['media'] = array(
                'media_ids' => $imagesdIds
            );
        }
        $connection->setApiVersion('2');
        $postTwitter = $connection->post("tweets", $body, true);
        if (isset($postTwitter->data)) {
            $postdetail = new PostDetail();
            $postdetail->post_id = $post->id;
            $postdetail->plateform = 'Twitter';
            $postdetail->social_id = $postTwitter->data->id;
            $postdetail->save();
            $msg = ['status' => true];
        } else {
            $msg = ['status' => false];
            $post->delete();

        }

        return $msg;
    }

    public function get_tw_data($access_token)
    {

        $twitter = config('services.twitter');
        $connection = new TwitterOAuth(
            $twitter['client_id'],
            $twitter['client_secret'],
            $access_token['oauth_token'],
            $access_token['oauth_token_secret'],
        );
        $connection->setApiVersion('2');
        $getProfile = $connection->get('users/me', ['user.fields' => 'id,profile_image_url']);
        return $getProfile->data;
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
        $user = Account::find($account->id)->update([
            'twiter_access_token' => $access_token,
            'twiter_refresh_token' => $refresh_token
        ]);


    }


    function stats($post)
    {
        $getStats = \Http::withToken($post->account->twiter_access_token)
            ->get("https://api.twitter.com/2/tweets/{$post->post_dt->social_id}/liking_users")->json();
        $post->post_dt->update([
            'likes' => $getStats['like_count'] ?? 0,
            'comments' => $getStats['comments_count'] ?? 0,
            'shares' => $getStats['shares_count'] ?? 0,
        ]);

    }
}
