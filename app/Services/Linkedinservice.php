<?php

namespace App\Services;

use Facebook\Facebook;
use DateTime;
use DateTimeZone;
use GuzzleHttp\Client;
use App\Models\PostDetail;
use App\Models\Post;

class Linkedinservice
{
    public function create_post($data)
    {
        $post = Post::find($data['post']->id);
        $media_path = asset("content_media/$post->media");
        $accesstoken = $post->user->linkedin_accesstoken;
        $linkedin_user_id = $post->user->linkedin_page_id;

        $mediaFilePath = "images/YouPost_Logo.png";


        // LinkedIn API endpoint for media upload

        $postEndpoint = 'https://api.linkedin.com/rest/posts';


        // Create the share with media
        $client = new Client();

        try {
            $response = \Http::withHeaders([
                'Authorization' => 'Bearer ' . $accesstoken,
                'Content-Type' => 'application/json',
                'X-Restli-Protocol-Version' => '2.0.0',
                'LinkedIn-Version' => '202306'
            ])->post($postEndpoint, [
                'author' => $linkedin_user_id,
                'commentary' => "$post->content #$post->tag",
                "visibility" => "PUBLIC",
                "distribution" => array(
                    "feedDistribution" => "MAIN_FEED",
                    "targetEntities" => [],
                    "thirdPartyDistributionChannels" => []
                ),
                "lifecycleState" => "PUBLISHED",
                "isReshareDisabledByAuthor" => false
            ]);


            $postdetail = new PostDetail();
            $postdetail->post_id = $post->id;
            $postdetail->plateform = 'Linkedin';
            $postdetail->social_id = $response->header('x-restli-id');

            $postdetail->save();
            $msg = ['status' => true];
        } catch (\Throwable $exception) {
            $msg = ['status' => false];
            $post->delete();
        }

        return $msg;


    }

    public function delete_post($data)
    {
        try {
            $accessToken = auth()->user()->linkedin_accesstoken;
            $get = explode('urn:li:share:', $data);
            $shareUrn = $get[1];

            $deleteEndpoint = "https://api.linkedin.com/v2/shares/{$shareUrn}";
            // Create a new Guzzle HTTP client instance
            $client = new Client();

            // Send a DELETE request to delete the share
            $response = $client->delete($deleteEndpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Content-Type' => 'application/json',
                    'X-Restli-Protocol-Version' => '2.0.0',
                ],
            ]);
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


}
