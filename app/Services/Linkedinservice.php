<?php

namespace App\Services;

use Facebook\Facebook;
use DateTime;
use DateTimeZone;
use GuzzleHttp\Client;
use App\Models\PostDetail;
use App\Models\Post;
use Illuminate\Support\Facades\Http;

class Linkedinservice
{
    public function create_post($data)
    {
        $post = Post::find($data['post']->id);
        $media_path = public_path("content_media/$post->media");
        $accesstoken = $post->account->linkedin_accesstoken;
        $linkedin_user_id = $post->account->linkedin_page_id;


        // LinkedIn API endpoint for media upload
        $postEndpoint = 'https://api.linkedin.com/rest/posts';
        $tags = $post->tag ? " #$post->tag" : '';
        if (!$post->media_type) {
            try {
                $response = \Http::withHeaders([
                    'Authorization' => 'Bearer ' . $accesstoken,
                    'Content-Type' => 'application/json',
                    'X-Restli-Protocol-Version' => '2.0.0',
                    'LinkedIn-Version' => '202306'
                ])->post($postEndpoint, [
                    'author' => $linkedin_user_id,
                    'commentary' => "$post->content $tags",
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

        else if ($post->media_type == 'image') {

            try {
                $imageupload = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $accesstoken,
                    'Content-Type' => 'application/json',
                    'X-Restli-Protocol-Version' => '2.0.0',
                    'LinkedIn-Version' => '202306'
                ])->post("https://api.linkedin.com/rest/images?action=initializeUpload", [
                    'initializeUploadRequest' => array(
                        'owner' => $linkedin_user_id
                    )
                ])->json();
                $imageid = $imageupload['value']['image'];
                $response = Http::attach(
                    'file', file_get_contents($media_path), 'image.jpg'
                )->post($imageupload['value']['uploadUrl']);


                $postnow = \Http::withHeaders([
                    'Authorization' => 'Bearer ' . $accesstoken,
                    'Content-Type' => 'application/json',
                    'X-Restli-Protocol-Version' => '2.0.0',
                    'LinkedIn-Version' => '202306'
                ])->post($postEndpoint, [
                    'author' => $linkedin_user_id,
                    'commentary' => "$post->content $tags",
                    "visibility" => "PUBLIC",
                    "distribution" => array(
                        "feedDistribution" => "MAIN_FEED",
                        "targetEntities" => [],
                        "thirdPartyDistributionChannels" => []
                    ),
                    "content" => array(
                        "media" => array(
                            "title" => "title of the video",
                            "id" => $imageid
                        )
                    ),
                    "lifecycleState" => "PUBLISHED",
                    "isReshareDisabledByAuthor" => false
                ]);


                $postdetail = new PostDetail();
                $postdetail->post_id = $post->id;
                $postdetail->plateform = 'Linkedin';
                $postdetail->social_id = $postnow->header('x-restli-id');
                $postdetail->save();
                $msg = ['status' => true];

            } catch (\Throwable $exception) {
                $msg = ['status' => false];
                $post->delete();
            }
            return $msg;
        }
        else if ($post->media_type == 'video') {

            try {
                $videoupload = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $accesstoken,
                    'Content-Type' => 'application/json',
                    'X-Restli-Protocol-Version' => '2.0.0',
                    'LinkedIn-Version' => '202306'
                ])->post("https://api.linkedin.com/rest/videos?action=initializeUpload", [
                    'initializeUploadRequest' => array(
                        'owner' => $linkedin_user_id,
                        "fileSizeBytes" => filesize($media_path),
                        "uploadCaptions" => false,
                        "uploadThumbnail" => false,
                    )
                ]);

                $videoid = $videoupload['value']['video'];


                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $accesstoken,
                    'X-Restli-Protocol-Version' => '2.0.0',
                    'LinkedIn-Version' => '202306'
                ])->attach(
                    'file', file_get_contents($media_path), 'video.mp4'
                )->post($videoupload['value']['uploadInstructions'][0]['uploadUrl']);
                $etag = $response->header('ETag');

                $finalize = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $accesstoken,
                    'X-Restli-Protocol-Version' => '2.0.0',
                    'LinkedIn-Version' => '202306'
                ])->post('https://api.linkedin.com/rest/videos?action=finalizeUpload', [
                    'finalizeUploadRequest' => array(
                        'video' => $videoid,
                        'uploadToken' => "",
                        'uploadedPartIds' => [$etag]
                    ),
                ]);

                $postnow = \Http::withHeaders([
                    'Authorization' => 'Bearer ' . $accesstoken,
                    'Content-Type' => 'application/json',
                    'X-Restli-Protocol-Version' => '2.0.0',
                    'LinkedIn-Version' => '202306'
                ])->post($postEndpoint, [
                    'author' => $linkedin_user_id,
                    'commentary' => "$post->content $tags",
                    "visibility" => "PUBLIC",
                    "distribution" => array(
                        "feedDistribution" => "MAIN_FEED",
                        "targetEntities" => [],
                        "thirdPartyDistributionChannels" => []
                    ),
                    "content" => array(
                        "media" => array(
                            "title" => "title of the video",
                            "id" => $videoid
                        )
                    ),
                    "lifecycleState" => "PUBLISHED",
                    "isReshareDisabledByAuthor" => false
                ]);


                $postdetail = new PostDetail();
                $postdetail->post_id = $post->id;
                $postdetail->plateform = 'Linkedin';
                $postdetail->social_id = $postnow->header('x-restli-id');
                $postdetail->save();
                $msg = ['status' => true];

            } catch (\Throwable $exception) {

                $msg = ['status' => false];
                $post->delete();
            }
            return $msg;
        }


    }

    public function delete_post($data)
    {
        try {
            $accessToken = auth()->user()->account->linkedin_accesstoken;
            $shareUrn=urlencode($data);
            $deleteEndpoint = "https://api.linkedin.com/rest/posts/$shareUrn";
            // Create a new Guzzle HTTP client instance
            $client = new Client();

            // Send a DELETE request to delete the share
            $response = $client->delete($deleteEndpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Content-Type' => 'application/json',
                    'X-Restli-Protocol-Version' => '2.0.0',
                    'LinkedIn-Version' => '202306'
                ],
            ]);
            if ($response->getStatusCode() == 204) {
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
