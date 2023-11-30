<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use App\Services\TwitterService;




class Post extends Model
{
    protected $guarded = [];

    public function plateforms()
    {
        return $this->hasOne(PostDetail::class, 'post_id', 'id');
    }

    public function post_dt()
    {
        return $this->hasOne(PostDetail::class, 'post_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }

    public function getPlatformGroupImages()
    {
        $groups = Post::where('group_id', $this->group_id)->get();
        $content = '';
        foreach ($groups as $group) {
            if ($group->plateform == 'Facebook')
                $content .= '<div class="calender_socialfb" ><img src="' . asset('images/FB_Color.png') . '" alt=""></div>';
            elseif ($group->plateform == 'Instagram')
                $content .= '<div class="calender_socialicon"><img src="' . asset('images/Instagram_Color.png') . '" alt=""></div>';
            elseif ($group->plateform == 'Twitter')
                $content .= '<div class="calender_socialicon"><img src="' . asset('images/Twitter_Color.png') . '" alt=""></div>';
            elseif ($group->plateform == 'Linkedin')
                $content .= '<div class="calender_socialicon_in"><img src="' . asset('images/Linkedin_Color.png') . '" alt=""></div>';
        }

        return $content;
    }


    public function getPostLiveLink($post)
    {

       $groups = Post::where('group_id', $post->group_id)->get();

        $fb_feed = '';
        $inst_feed = '';
        $tw_feed = '';
        $linki_feed = '';

        foreach ($groups as $group) {
            if ($group->plateform == 'Facebook'){

                if($group->posted_at_moment=='now'){

                    $postId = $group->post_dt;
                    $postId = $postId->social_id;
                    $pageAccessToken = $post->account;
                    $pageAccessToken = $pageAccessToken->fb_page_token;
                    $url = "https://graph.facebook.com/{$postId}?fields=permalink_url&access_token={$pageAccessToken}";
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    $response = curl_exec($ch);

                    if (curl_errno($ch)) {
                        echo 'Error: ' . curl_error($ch);
                    }
                    curl_close($ch);
                    $data = json_decode($response, true);
                    // dd($data['permalink_url']);
                    if (isset($data['permalink_url'])) {
                        $fb_feed = $data['permalink_url'];

                    }

                  }

               }
            if ($group->plateform == 'Instagram'){
                if($group->posted_at_moment=='now'){

                    $instagramPostId = $group->post_dt;
                    $instagramPostId = $instagramPostId->social_id;
                    $userAccessToken = $post->account;
                    $userAccessToken = $userAccessToken->insta_access_token;
                    $url = "https://graph.facebook.com/v12.0/{$instagramPostId}?fields=permalink&access_token={$userAccessToken}";
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    $response = curl_exec($ch);
                    if (curl_errno($ch)) {
                        echo 'Error: ' . curl_error($ch);
                    }
                    curl_close($ch);
                    $data = json_decode($response, true);
                    if (isset($data['permalink'])) {
                        $inst_feed = $data['permalink'];
                     }
                 }
             }

             // for twitter
            if ($group->plateform == 'Twitter'){
                if($group->posted_at_moment=='now'){
                $live_post_id = $group->post_dt;
                $live_post_id = $live_post_id->social_id;

                $tw_feed = "https://twitter.com/{$live_post_id}/status/{$live_post_id}";

                }

            }
          // for linkedin
            if ($group->plateform == 'Linkedin'){
                if($group->posted_at_moment=='now'){
                $live_post_id = $group->post_dt;
                $live_post_id = $live_post_id->social_id;
                $live_post_id = explode(":", $live_post_id);
                $live_post_id = end($live_post_id);
                // getting access token
                $acces_token = $post->account;
                $acces_token = $acces_token->linkedin_accesstoken;
                // getting page id
                $pg_id = $post->account;
                $pg_id = $pg_id->linkedin_page_id;
                $pg_id = explode(":", $pg_id);
                $pg_id = end($pg_id);

                if($post->media_type == 'video'){
                    $linki_feed = "https://www.linkedin.com/feed/update/urn:li:ugcPost:{$live_post_id}/";
                }else{
                    $linki_feed = "https://www.linkedin.com/feed/update/urn:li:share:{$live_post_id}/";
                }

            }
            }
        }

        return [
            'fb_feed' => $fb_feed,
            'inst_feed' => $inst_feed,
            'tw_feed' => $tw_feed,
            'linkedin_feed' => $linki_feed,
        ];


    }

    public function getPostImgSrc($post)
    {
        $imgSrc = '';

        if (empty($post->media_type)) {
            $imgSrc = asset('images/tx_icon.png');
        } elseif ($post->media_type == 'image') {
            $Images = explode(',', $post->media);
            $imgSrc = asset('content_media/' . $Images[0]);
        } elseif ($post->media_type == 'video') {
            $imgSrc = asset('images/video_icon.png');
        }

        return $imgSrc;
    }


    public function getSuggestions($searchQuery,$textAreaid)
     {
        if($textAreaid == 'facebook_content'){
            $accessToken = auth()->user()->account->fb_access_token;
            try {
                $response = Http::get("https://graph.facebook.com/v13.0/pages/search", [
                    'q' => $searchQuery,
                    'fields' => 'id,name,location,link',
                    'access_token' => $accessToken,
                ]);

                $searchResults = $response->json();
                $names = collect($searchResults['data'])->pluck('name','id')->toArray();               
                return $names;
            } catch (\Exception $e) {
                // Handle the exception, log the error, or return an error response.
                return $e->getMessage();
            }
        }
    }




}
