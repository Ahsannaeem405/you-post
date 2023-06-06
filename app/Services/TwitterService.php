<?php
namespace App\Services;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Models\PostDetail;
use CURLFile;
use Illuminate\Support\Facades\Http;
use App\Models\Post;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
class TwitterService
{
    public function delete_post($data)
    {
        $accessToken = auth()->user()->insta_access_token;

        $postId = $data->social_id;



        // Create a new Guzzle HTTP client instance


             $bearerToken =auth()->user()->twiter_access_token;

        $response = Http::withToken($bearerToken)->delete('https://api.twitter.com/2/tweets/'.$postId);
            if($response->getStatusCode()==200){
                $dell=Post::find($data->post_id);
                $dell->delete();
                $msg=['status'=>true];
                return $msg;

            }




    }
    public function create_post($data)
    {
        $post = Post::find($data['post']->id);
        $content = "$post->content #$post->tag";
        $bearerToken =$post->user->twiter_access_token;

        $response = Http::withToken($bearerToken)->post('https://api.twitter.com/2/tweets',
            [
                "text" => $content,

            ]);
            $get = json_decode($response->body());


        if($response->status() ==201)
        {
            $postdetail = new PostDetail();
            $postdetail->post_id = $post->id;
            $postdetail->plateform = 'Twitter';
            $postdetail->social_id=$get->data->id;
            $postdetail->save();
            $msg=['status'=>true];
        }
        else{
            $msg=['status'=>false];
            $post->delete();

        }

        return $msg;
    }
}
