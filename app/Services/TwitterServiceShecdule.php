<?php 
namespace App\Services;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Models\PostDetail;
use CURLFile;
use Illuminate\Support\Facades\Http;
use App\Models\Post;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
class TwitterServiceShecdule
{
   
    public function create_post($data)
    {
        \Log::info($data);
        $post = $data;
        $content = "$post->content #$post->tag";
      
        $bearerToken =$post->user->twiter_access_token;

        $response = Http::withToken($bearerToken)->post('https://api.twitter.com/2/tweets',
            [
                "text" => $content,
                
            ]);
            $get = json_decode($response->body());


        if($response->status() ==201)
        {
                    //dd($get->data->id,$response->status());

            $postdetail = new PostDetail();
            $postdetail->post_id = $post->id;
            $postdetail->plateform = 'Twitter';
            $postdetail->social_id=$get->data->id;
            $postdetail->save();
            $msg=['status'=>true];
            return $msg;

        }
        else{
            //dd($get,$response->status());

            $msg=['status'=>false];
            return $msg;
        }


        





        

    }
}
