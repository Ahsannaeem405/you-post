<?php 
namespace App\Services;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Models\PostDetail;
class TwitterService
{
    public function create_post($data)
    {
        $post = $data['post'];
        
        $twiter_oauth_token = auth()->user()->twiter_oauth_token;
        $twiter_secret_token = auth()->user()->twiter_secret_token;
        $oauth_verifier = auth()->user()->twiter_oauth_verifier;
        
        if (empty($oauth_verifier) ||
            empty($twiter_oauth_token) ||
            empty($twiter_secret_token)
        ) {
            return redirect('/index')->with('error', 'something went wrong');
        }
        // connect with application token
        $connection = new TwitterOAuth(
            env('consumer_key'),
            env('consumer_secret'),
            $twiter_oauth_token,
            $twiter_secret_token
        );
        
        $status = $connection->get('application/rate_limit_status', array('resources' => 'statuses'));

        // dd(json_encode($status));

        // request user token
        $token = $connection->oauth(
            'oauth/access_token', [
                'oauth_verifier' => $oauth_verifier
            ]
        );
        // connect with user token
        $twitter = new TwitterOAuth(
            env('consumer_key'),
            env('consumer_secret'),
            $token['oauth_token'],
            $token['oauth_token_secret']
        );
        
        $user = $twitter->get('account/verify_credentials');
        if(isset($user->error)) {
            // header('Location: ' . $config['url_login']);
            return redirect('/index')->with('error', 'something went wrong');
        }
        // post a tweet
        $status = $twitter->post(
            "statuses/update", [
                "status" => "$post->content #$post->tag"
            ]
        );
        $postdetail = new PostDetail();
        $postdetail->post_id = $post->id;
        $postdetail->plateform = 'Twitter';
        $postdetail->save();

    }
}