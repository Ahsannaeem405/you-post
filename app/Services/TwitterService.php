<?php 
namespace App\Services;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Models\PostDetail;
use CURLFile;
class TwitterService
{
    public function create_post($data)
    {
        $post = $data['post'];
        $content = "$post->content #$post->tag";
        // $media_path = "https://play2-earn.com/youpost/images/YouPost_Logo.png";
        // $media_path = '16811071681110.jpg';
        $media_path = "content_media/$post->media";

        // $handle = fopen($media_path, "r");

        
        $twiter_access_token = auth()->user()->twiter_access_token;
        
        if ($data['media_type'] == 'image') {
            // dd('image');
            $twitter = new TwitterOAuth(
                'r5TkxuSJ5XrI9rZhnLzsler8v',
                '0E7kCIfTJwXeFBbvvOiLWF1OCgWwAnirKJCFbrydjHnotxU1vd',
                '1647859602539819008-NWvGYztWcYSJjPwARw7HxMCJQC0BE4',
                'TK5Yrbvkc8iFx9lqP7kpRgTKoob4YTLv7UIK62GT4gWEP'
            );
            // dd($twitter);
            $media = $twitter->upload('media/upload', ['media' => $media_path, 'media_type' => 'video']);
            dd($media);
            

            // Step 2: Upload the media
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.twitter.com/2/tweets',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            // CURLOPT_POSTFIELDS =>'{
            //     "text": $content
            // }',
            CURLOPT_POSTFIELDS => json_encode(array("text" => $content,
                "media" => array(
                    "media_ids" => array($media->media_id_string)
                )
            )),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                "Authorization: Bearer $twiter_access_token"
            ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            echo $response;
            $response2 = json_decode($response);

            dd($response2, 666);


            

        }elseif($data['media_type'] == 'video'){

            dd('video');
        }else{
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.twitter.com/2/tweets',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            // CURLOPT_POSTFIELDS =>'{
            //     "text": $content
            // }',
            CURLOPT_POSTFIELDS => json_encode(array("text" => $content)),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                "Authorization: Bearer $twiter_access_token"
            ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            echo $response;
            $response2 = json_decode($response);

            dd($response2);
        }


        $postdetail = new PostDetail();
        $postdetail->post_id = $post->id;
        $postdetail->plateform = 'Twitter';
        $postdetail->save();

    }
}