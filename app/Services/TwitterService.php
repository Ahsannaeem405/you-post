<?php 
namespace App\Services;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Models\PostDetail;
use CURLFile;
use Illuminate\Support\Facades\Http;
use App\Models\Post;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
class TwitterService
{
    public function delete_post($data)
    {
        $accessToken = auth()->user()->insta_access_token;

        $postId = $data->social_id;

       

        // Create a new Guzzle HTTP client instance
       
           
             $bearerToken =auth()->user()->twiter_access_token;

        $response = Http::withToken($bearerToken)->delete('https://api.twitter.com/2/tweets/'.$postId);
            if($response->getStatusCode()==200){
                $dell=Post::find($data->post_id);
                $dell->delete();
                $msg=['status'=>true];
                return $msg;

            }

            
       

    }
    public function create_post($data)
    {
        $post = $data['post'];
        $content = "$post->content #$post->tag";
      
        $bearerToken =auth()->user()->twiter_access_token;

        $response = Http::withToken($bearerToken)->post('https://api.twitter.com/2/tweets',
            [
                "text" => $content,
                
            ]);
            $get = json_decode($response->body());


        if($response->status() ==201)
        {
                    //dd($get->data->id,$response->status());

            $postdetail = new PostDetail();
            $postdetail->post_id = $post->id;
            $postdetail->plateform = 'Twitter';
            $postdetail->social_id=$get->data->id;
            $postdetail->save();
            $msg=['status'=>true];
            return $msg;

        }
        else{
                                //dd($get,$response->status());

            $msg=['status'=>false];
            return $msg;
        }


        



            $twitter = new TwitterOAuth(
                'jaZMVTYw8C8dIicxol7Rru3Kg',
                'WpD1QQKOwFsWZ9UUjxE2VEMOvcX3xM1b1iut1vpbMin3fIvk5E',
                '1426518261236183047-P7b1vZbTo7EIFwwKyE8H5eUebLIdkf',
                'WWRvwJZx3IpmG1ZyobRi9nHw5AENaKl8G3W72Q9jJQimR'
            );
           
            
            
            
            


       
            
   



        


       




        
        $twiter_access_token = auth()->user()->twiter_access_token;
        
        if ($data['media_type'] == 'image') {
            
            
            $media_path = "content_media/$post->media";
            $media = $twitter->upload('media/upload', ['media' => $media_path]);


            $response = Http::withToken($bearerToken)->post('https://api.twitter.com/2/tweets',
            [
                "text" => $content,
                "media" => array(
                    "media_ids" => array($media->media_id_string)
                )
            ]);
            $response = json_decode($response->body());

            dd($response->body(),$media);



            

        }elseif($data['media_type'] == 'video'){
            
            $media_file = "content_media/$post->media";

            $media_file_size = filesize($media_file);
            $media_id='3';
            $media_init = $twitter->upload('media/upload', ['command' => 'INIT', 'media_type' => 'video/mp4', 'total_bytes' => $media_file_size,'media' => $media_file]);
            //dd($media_init);
            $media_id = $media_init->media_id_string;
            
            
            $media_file_size = filesize($media_file);
            //dd($media_file_size);
            $segment_id = 0;
            $one_segment_size=1024 * 1024;
            $div=$media_file_size / $one_segment_size ;
            $total=intval($div);
            $total++;
            $segment_size = $total * $one_segment_size; // 4MB
            
            $file = fopen($media_file, 'rb');
            
            
            while (!feof($file)) {
                
                
               

                
                
                
                $chunk = fread($file, $segment_size);
                $data=$twitter->upload('media/upload', ['media' => $media_file,'command' => 'APPEND', 'media_id' => $media_id, 'segment_index' => $segment_id, 'media_data' => base64_encode($chunk)]);
                
                $segment_id++;
                // if( $segment_id == $total){
                //     $segment_size=$mode;
                    
                // }
            }
            
            fclose($file);

            
            $media_finalize = $twitter->upload('media/upload', ['command' => 'FINALIZE', 'media_id' => $media_id,'media' => $media_file]);
            if ($twitter->getLastHttpCode() != 201) {
                $msg=['status'=>false,'error'=>$media_finalize->error];
                return $msg;


            }

        
            $media_status = $twitter->get('media/upload', ['command' => 'STATUS', 'media_id' => $media_finalize->media_id_string]);
            
            $response = Http::withToken($bearerToken)->post('https://api.twitter.com/2/tweets',
            [
                "text" => $content,
                "media" => array(
                    "media_ids" => array($media_finalize->media_id_string)
                )
            ]);
                        //dd($media_finalize,$response->body());


            
             
             

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

            
        }


        $postdetail = new PostDetail();
        $postdetail->post_id = $post->id;
        $postdetail->plateform = 'Twitter';
        $postdetail->save();
         $msg=['status'=>true];
                return $msg;
        

    }
}
