<?php

namespace App\Services;

use App\Models\Post;
use Facebook\Facebook;
use GuzzleHttp\Client;

class CreatePostService
{

    public function InitilizeData()
    {
        $fb_access_token = auth()->user()->account->fb_access_token;
        $fb_page_token = auth()->user()->account->fb_page_token;
        $all_pages = [];
        $instapages = [];
        //facebook
        if ($fb_access_token != null && $fb_page_token == null) {
            $fb = new Facebook([
                'app_id' => env('app_id'),
                'app_secret' => env('app_secret'),
                'default_graph_version' => 'v16.0',
                'default_access_token' => $fb_access_token,
            ]);
            $response = $fb->get('/me/accounts');
            $all_pages = json_decode($response->getbody())->data;
        }

        //linkedin
        if (!auth()->user()->account->linkedin_page_id && auth()->user()->account->linkedin_accesstoken) {
            $client = new Client();

            $response = $client->get('https://api.linkedin.com/v2/organizationalEntityAcls?q=roleAssignee', [
                'headers' => [
                    'Authorization' => 'Bearer ' . auth()->user()->account->linkedin_accesstoken,
                    'Content-Type' => 'application/json',
                    'X-Restli-Protocol-Version' => '2.0.0',
                ],
            ]);
            $pageAcls = json_decode($response->getBody(), true)['elements'];
            foreach ($pageAcls as $pageAcl) {
                $organizationalTarget = $pageAcl['organizationalTarget'];
                $pageId = explode(':', $organizationalTarget)[3];

                $pageResponse = $client->get("https://api.linkedin.com/v2/organizations/{$pageId}", [
                    'headers' => [
                        'Authorization' => 'Bearer ' . auth()->user()->account->linkedin_accesstoken,
                        'Content-Type' => 'application/json',
                        'X-Restli-Protocol-Version' => '2.0.0',
                    ],
                ]);
                $page = json_decode($pageResponse->getBody(), true);
                $instapages[] = $page;
            }
        }

        return ['facebook' => $all_pages, 'linkedin' => $instapages];


        //        if (count(auth()->user()->posts)) {
//            foreach (auth()->user()->posts as $post) {
//                $fb_posts = PostDetail::where('post_id', $post->id)->where('plateform', 'Facebook')->first();
//                if ($fb_posts) {
//                    $data['total_fb_likes'] = $data['total_fb_likes'] + $fb_posts->likes;
//                    $data['total_fb_comments'] = $data['total_fb_comments'] + $fb_posts->comments;
//                }
//
//                $insta_posts = PostDetail::where('post_id', $post->id)->where('plateform', 'Instagram')->first();
//                if ($insta_posts) {
//                    $data['total_insta_likes'] = $data['total_insta_likes'] + $insta_posts->likes;
//                    $data['total_insta_comments'] = $data['total_insta_comments'] + $insta_posts->comments;
//                }
//
//            }
//        }
    }

    public function Statisics()
    {

        $posts = Post::whereHas('post_dt')->where('account_id', auth()->user()->account_id)
            ->withSum('post_dt', 'likes')
            ->withSum('post_dt', 'shares')
            ->withSum('post_dt', 'comments')->get();
        $data = [
            'total_fb_likes' => $posts->where('plateform', 'Facebook')->sum('post_dt_sum_likes'),
            'total_fb_comments' => $posts->where('plateform', 'Facebook')->sum('post_dt_sum_shares'),
            'total_fb_shares' => $posts->where('plateform', 'Facebook')->sum('post_dt_sum_comments'),
            'total_insta_likes' => $posts->where('plateform', 'Instagram')->sum('post_dt_sum_likes'),
            'total_insta_comments' => $posts->where('plateform', 'Instagram')->sum('post_dt_sum_shares'),
            'total_insta_shares' => $posts->where('plateform', 'Instagram')->sum('post_dt_sum_comments'),
            'total_twitter_likes' => $posts->where('plateform', 'Twitter')->sum('post_dt_sum_likes'),
            'total_twitter_comments' => $posts->where('plateform', 'Twitter')->sum('post_dt_sum_shares'),
            'total_twitter_shares' => $posts->where('plateform', 'Twitter')->sum('post_dt_sum_comments'),
            'total_linkedin_likes' => $posts->where('plateform', 'Linkedin')->sum('post_dt_sum_likes'),
            'total_linkedin_comments' => $posts->where('plateform', 'Linkedin')->sum('post_dt_sum_shares'),
            'total_linkedin_shares' => $posts->where('plateform', 'Linkedin')->sum('post_dt_sum_comments'),
        ];


        return $data;
    }
}
