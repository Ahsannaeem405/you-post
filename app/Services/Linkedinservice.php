<?php

namespace App\Services;

use Facebook\Facebook;
use DateTime;
use DateTimeZone;
use GuzzleHttp\Client;
use App\Models\PostDetail;

class Linkedinservice
{
    public function create_post($data)
    {
        $post = $data['post'];
        $media_path = asset("content_media/$post->media");
        $accesstoken = auth()->user()->linkedin_accesstoken;
        $linkedin_user_id = auth()->user()->linkedin_user_id;
        // $media_path = "https://play2-earn.com/youpost/images/YouPost_Logo.png";
        // $media_path = "https://play2-earn.com/youpost/images/YouPost_Logo.png";

        // 
        // if ($data['media_type'] == 'image') {

        //     // upload image first 
        //     $linkedInClient = new Client(['base_uri' => 'https://api.linkedin.com']);

        //     $response1 = $linkedInClient->post(
        //             '/media/upload', [
        //                 'headers' => [
        //                     'Accept'                => 'application/json',
        //                     'Authorization'         =>  "Bearer $accesstoken",
        //                 ],
        //                 'multipart' => [
        //                     [
        //                         'name'     => 'fileupload',
        //                         'contents' => fopen($media_path, 'r'),
        //                     ],
        //                 ],
        //             ]
        //         );
        //         dd($response1);
        //     // upload image first 

        //     $post_data = [
        //         'author' => "urn:li:person:$linkedin_user_id",
        //         'lifecycleState' => 'PUBLISHED',
        //         'specificContent' => [
        //             'com.linkedin.ugc.ShareContent' => [
        //                 'shareCommentary' => [
        //                     'text' => "$post->content #$post->tag"
        //                 ],
        //                 'shareMediaCategory' => 'IMAGE',
        //                 'media' => [
        //                     [
        //                         'status' => 'READY',
        //                         'description' => [
        //                             'text' => 'Mydfgh'
        //                         ],
        //                         'originalUrl' => $media_path,
        //                         'title' => [
        //                             'text' => 'image title'
        //                         ],
        //                         'thumbnails' => [
        //                             [
        //                                 'resolvedUrl' => $media_path
        //                             ]
        //                         ]
        //                     ]
        //                 ]
        //             ]
        //         ],
        //         'visibility' => [
        //             'com.linkedin.ugc.MemberNetworkVisibility' => 'PUBLIC'
        //         ]
        //     ];
        //     $curl = curl_init();
        //     curl_setopt_array($curl, [
        //         CURLOPT_URL => "https://api.linkedin.com/v2/ugcPosts",
        //         CURLOPT_RETURNTRANSFER => true,
        //         CURLOPT_ENCODING => "",
        //         CURLOPT_MAXREDIRS => 10,
        //         CURLOPT_TIMEOUT => 30,
        //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //         CURLOPT_CUSTOMREQUEST => "POST",
        //         CURLOPT_POSTFIELDS => json_encode($post_data),
        //         CURLOPT_HTTPHEADER => [
        //             "Authorization: Bearer " . $accesstoken,
        //             "Content-Type: application/json"
        //         ],
        //     ]);
        //     $response3 = curl_exec($curl);
        //     $err = curl_error($curl);
        //     curl_close($curl);
        //     if ($err) {
        //         echo "cURL Error #:" . $err;
        //         return redirect('/index')->with('error', $err);
        //     } else {
        //         $postdetail = new PostDetail();
        //         $postdetail->post_id = $post->id;
        //         $postdetail->plateform = 'Instagram';
        //         $postdetail->save();
        //     }
        //     dd('image',$response3);

        // } elseif ($data['media_type'] == 'video') {
        //     $post_data = [
        //         'author' => "urn:li:person:$linkedin_user_id",
        //         'lifecycleState' => 'PUBLISHED',
        //         'specificContent' => [
        //             'com.linkedin.ugc.ShareContent' => [
        //                 'shareCommentary' => [
        //                     'text' => "$post->content #$post->tag"
        //                 ],
        //                 'shareMediaCategory' => 'IMAGE',
        //                 'media' => [
        //                     [
        //                         'status' => 'READY',
        //                         'description' => [
        //                             'text' => 'Mydfgh'
        //                         ],
        //                         'originalUrl' => $media_path,
        //                         'title' => [
        //                             'text' => 'image title'
        //                         ],
        //                         'thumbnails' => [
        //                             [
        //                                 'resolvedUrl' => $media_path
        //                             ]
        //                         ]
        //                     ]
        //                 ]
        //             ]
        //         ],
        //         'visibility' => [
        //             'com.linkedin.ugc.MemberNetworkVisibility' => 'PUBLIC'
        //         ]
        //     ];
        //     $curl = curl_init();
        //     curl_setopt_array($curl, [
        //         CURLOPT_URL => "https://api.linkedin.com/v2/ugcPosts",
        //         CURLOPT_RETURNTRANSFER => true,
        //         CURLOPT_ENCODING => "",
        //         CURLOPT_MAXREDIRS => 10,
        //         CURLOPT_TIMEOUT => 30,
        //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //         CURLOPT_CUSTOMREQUEST => "POST",
        //         CURLOPT_POSTFIELDS => json_encode($post_data),
        //         CURLOPT_HTTPHEADER => [
        //             "Authorization: Bearer " . $accesstoken,
        //             "Content-Type: application/json"
        //         ],
        //     ]);
        //     $response3 = curl_exec($curl);
        //     $err = curl_error($curl);
        //     curl_close($curl);
        //     if ($err) {
        //         echo "cURL Error #:" . $err;
        //         return redirect('/index')->with('error', $err);
        //     } else {
        //         $postdetail = new PostDetail();
        //         $postdetail->post_id = $post->id;
        //         $postdetail->plateform = 'Instagram';
        //         $postdetail->save();
        //     }
        //     dd('video',$response3);

        // } else {
            try{

                $post_data = [
                    'author' => "urn:li:person:$linkedin_user_id",
                    'lifecycleState' => 'PUBLISHED',
                    'specificContent' => [
                        'com.linkedin.ugc.ShareContent' => [
                            'shareCommentary' => [
                                'text' => "$post->content #$post->tag"
                            ],
                            'shareMediaCategory' => 'NONE'
                        ]
                    ],
                    'visibility' => [
                        'com.linkedin.ugc.MemberNetworkVisibility' => 'PUBLIC'
                    ]
                ];
                $curl = curl_init();
                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://api.linkedin.com/v2/ugcPosts",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode($post_data),
                    CURLOPT_HTTPHEADER => [
                        "Authorization: Bearer " . $accesstoken,
                        "Content-Type: application/json"
                    ],
                ]);
                $response3 = curl_exec($curl);
                // dd($response3, 00);
                $err = curl_error($curl);
                curl_close($curl);
                if ($err) {
                    echo "cURL Error #:" . $err;
                    return redirect('/index')->with('error', $err);
                } else {
                    $postdetail = new PostDetail();
                    $postdetail->post_id = $post->id;
                    $postdetail->plateform = 'Linkedin';
                    $postdetail->save();
                }
            } catch (\Exception $e) {
                
                return redirect('/index')->with('error', $e->getMessage());
            }
            // dd('text',$response3);

        // }
    }
}
