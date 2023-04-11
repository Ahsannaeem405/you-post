<?php 
namespace App\Services;

use Facebook\Facebook;

class Facebookservice
{
    public function create_post()
    {
        // Perform some functionality
        
        $fb = new Facebook([
            'app_id' => env('app_id'),
            'app_secret' => env('app_secret'),
            'default_graph_version' => 'v12.0',
        ]);
        $accessToken = auth()->user()->fb_access_token;

        $fb->setDefaultAccessToken($accessToken);
        $response = $fb->post('/me/feed', [
            'message' => 'Hello, Facebook testing!'
        ]);

        if (!$response->isError()) {
            // Post was successful
            dd('Post successfull');
        } else {
            // Handle error
            $error = $response->getThrownException()->getMessage();
        }
    }
}