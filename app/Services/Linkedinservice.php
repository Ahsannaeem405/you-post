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
        $post = $data['post'];
        $media_path = asset("content_media/$post->media");
        $accesstoken = auth()->user()->linkedin_accesstoken;
        $linkedin_user_id = auth()->user()->linkedin_user_id;
        
        
        
        
     $mediaFilePath="images/YouPost_Logo.png";
     
     
       

    // LinkedIn API endpoint for media upload
    $uploadEndpoint = 'https://api.linkedin.com/v2/assets?action=registerUpload';

 
    $postEndpoint = 'https://api.linkedin.com/v2/ugcPosts';

    

    $person='urn:li:person:' .$linkedin_user_id;
    // Create the share with media
    $response = $client->post($postEndpoint, [
        'headers' => [
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
            'X-Restli-Protocol-Version' => '2.0.0',
        ],
        'json' => [
            'author' =>$person,
            'lifecycleState' => 'PUBLISHED',
            'specificContent' => [
                        'com.linkedin.ugc.ShareContent' => [
                            'shareCommentary' => [
                                'text' => "$post->content #$post->tag"
                            ],
                            
                            "shareMediaCategory"=> "NONE",
                           // "media"=> [
                           //              [
                           //                  "status"=> "READY",
                           //                  "description"=> [
                           //                      "text"=> "Official LinkedIn Blog - Your source for insights and information about LinkedIn."
                           //                  ],
                           //                  "originalUrl"=> "https://blog.linkedin.com/",
                           //                  "title"=> [
                           //                  "text"=> "Official LinkedIn Blog"
                           //                  ]
                           //              ]
                           //          ]   
                        ],
                    ],
                    'visibility' => [
                        'com.linkedin.ugc.MemberNetworkVisibility' => 'PUBLIC'
                    ],
            
            
            
            
        ],
    ]);
    $id=json_decode($response->getBody());
  








                    $postdetail = new PostDetail();
                    $postdetail->post_id = $post->id;
                    $postdetail->plateform = 'Linkedin';
                    $postdetail->social_id = $id->id;

                    $postdetail->save();
               

       
    }
    public function delete_post($data)
    {
        $accessToken = auth()->user()->linkedin_accesstoken;
        $get=explode('urn:li:share:', $data);
        $shareUrn =$get[1]; 

        $deleteEndpoint = "https://api.linkedin.com/v2/shares/{$shareUrn}";
        // Create a new Guzzle HTTP client instance
        $client = new Client();

        try {
            // Send a DELETE request to delete the share
            $response = $client->delete($deleteEndpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Content-Type' => 'application/json',
                    'X-Restli-Protocol-Version' => '2.0.0',
                ],
            ]);
            if($response->getStatusCode()==200){
                $get_post=PostDetail::where('social_id',$data)->first();
                $dell=Post::find($get_post->post_id);
                $dell->delete();
                $msg=['status'=>true];
                return $msg;

            }
            

           
        } catch (Exception $e) {
            echo 'Error deleting share post: ' . $e->getMessage();
        }

    }

    

    

    
}
