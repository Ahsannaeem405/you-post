<?php 
namespace App\Services;

use Facebook\Facebook;
use DateTime;
use DateTimeZone;
use GuzzleHttp\Client;
use App\Models\PostDetail;
use getID3;
use App\Models\Post;


class Instagramservice
{
    public function media_status($media_id,$post)
    {
        $insta = config('services.instagram');
        $accesstoken = auth()->user()->insta_access_token;
        $insta_user_id = auth()->user()->insta_user_id;

        $instagram = new Facebook([
            'app_id' => $insta['client_id'],
            'app_secret' => $insta['client_secret'],
            'default_graph_version' => 'v16.0',
        ]);
        //dd('$media_id/?fields=status_code&access_token=$accesstoken',$media_id,$accesstoken);
        $response = $instagram->get("/$media_id/?fields=status_code&access_token=$accesstoken");

        $result = $response->getDecodedBody();
        $status=$result['status_code'];
      
        if($status =='ERROR')
           {
          //dd($status);
               $response = $instagram->get("/$media_id/?fields=status&access_token=$accesstoken");

                $result = $response->getDecodedBody();
                $status=$result['status'];
                $msg=['status'=>false ,'msg'=>$status];
                return $msg;
           }
        if($status !='FINISHED')
        {
           
          
          
            sleep(10);
            $get=$this->media_status($media_id,$post);

        }
        else{
            $response = $instagram->post("/$insta_user_id/media_publish", array(
                'creation_id' => $media_id,
                'access_token' => $accesstoken,
            ));
            $postdetail = new PostDetail();
            $postdetail->post_id = $post->id;
            $postdetail->plateform = 'Instagram';
            $postdetail->social_id = $response->getDecodedBody()['id'];
            $postdetail->save();

            $msg=['status'=>true];
          //dd($msg);
            return $msg;

        }




    }
    public function create_post($data)
    {
        // dd($data);
        $post = $data['post'];
        //$media_path = asset("content_media/$post->media");
        $video_path = "content_media/$post->media";
        $media_path = asset("content_media/$post->media");

       


        


        //$media_path = asset("content_media/1681298987999.mp4");


         //$media_path = "https://youpost.social/content_media/16811071681110.jpg";
        //$media_path = "https://youpost.social/content_media/16812977781010.mp4";
        
        $insta = config('services.instagram');
        $accesstoken = auth()->user()->insta_access_token;
        $insta_user_id = auth()->user()->insta_user_id;

        $instagram = new Facebook([
            'app_id' => $insta['client_id'],
            'app_secret' => $insta['client_secret'],
            'default_graph_version' => 'v16.0',
        ]);
        $media_id=0;

        if($data['media_type']=='image')
        {
          
           $media_path = asset("content_media/$post->media");
            //dd($media_path);
            $response = $instagram->post("/$insta_user_id/media", array(
                'image_url' => $media_path,
                'caption' => "$post->content",
                //'access_token' => $accesstoken,
            ),$accesstoken);
            // dd('image');
            $result = $response->getDecodedBody();
            $media_id = $result['id'];
             try {
                    $response = $instagram->post("/$insta_user_id/media_publish", array(
                      'creation_id' => $media_id,
                      'access_token' => $accesstoken,
                     ));
            

              } catch(Facebook\Exceptions\FacebookResponseException $e) {
                  return redirect('/index')->with('error', "444 $e");
              } catch(Facebook\Exceptions\FacebookSDKException $e) {
                  return redirect('/index')->with('error', "555 $e");
              }

              $postdetail = new PostDetail();
              $postdetail->post_id = $post->id;
              $postdetail->plateform = 'Instagram';
              $postdetail->social_id = $response->getDecodedBody()['id'];
              $postdetail->save();
              $msg=['status'=>true];
              return $msg;
          
              
        }elseif($data['media_type']=='video'){
          
          $getID3 = new getID3();
          $video_info = $getID3->analyze($video_path);
          //dd($video_info);
          $duration_seconds = $video_info['playtime_seconds'];
          $duration_formatted = gmdate('H:i:s', $duration_seconds);
          if($video_info['playtime_seconds'] > 60)
          {
             $msg=['status'=>false ,'error'=>'max 60 Seconds video allow'];
                return $msg;
            
            
          }
          if($video_info['filesize'] > 100000000)
          {
             $msg=['status'=>false ,'error'=>'max 100mb video allow'];
                return $msg;
            
            
          }
          
          

            $response = $instagram->post("/$insta_user_id/media", array(
                'media_type' => 'VIDEO',
                'video_url' =>$media_path,
                'caption' => "$post->content",
                //'access_token' => $accesstoken,
            ),$accesstoken);
          
          //dd($response);

            sleep(10);
            //dd($response->getDecodedBody());
            $result = $response->getDecodedBody();
            $media_id = $result['id'];

            $get=$this->media_status($media_id,$post);
            if($get ==null)

            {
                $msg=['status'=>true];
                return $msg;
             
            }
             return $get;

            
            // Create a new curl file
            
                //dd($response);

        }
        // dd(5665,'restt', $response44);
       
    }
    
    public function delete_post($data)
    {
        $accessToken = auth()->user()->insta_access_token;

        $postId = $data->social_id;

        // Instagram Graph API endpoint for deleting a post
        $deleteEndpoint = "https://graph.instagram.com/{$postId}";

        // Create a new Guzzle HTTP client instance
        $client = new Client();

        try {
            // Send a DELETE request to delete the post
            $response = $client->delete($deleteEndpoint, [
                'query' => [
                    'access_token' => $accessToken,
                ],
            ]);
            if($response->getStatusCode()==200){
                $dell=Post::find($data->post_id);
                $dell->delete();
                $msg=['status'=>true];
                return $msg;

            }

            
        } catch (Exception $e) {
            echo 'Error deleting post: ' . $e->getMessage();
        }

    }
}