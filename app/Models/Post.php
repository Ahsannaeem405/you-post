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
               }
            if ($group->plateform == 'Instagram'){
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
                
                $linki_feed = "https://www.linkedin.com/company/{$pg_id}/posts/{$live_post_id}/";}
            }
        }

        return [
            'fb_feed' => $fb_feed,
            'inst_feed' => $inst_feed,
            'tw_feed' => $tw_feed,
            'linkedin_feed' => $linki_feed,
        ];



       

      
    }

}
