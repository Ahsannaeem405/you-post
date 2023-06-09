<?php

namespace App\Console\Commands;

use App\Services\TwitterService;
use Illuminate\Console\Command;
use App\Models\Post;
use App\Services\TwitterServiceShecdule;

class TwitterCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twitter:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        $get_post=Post::where('posted_at_moment','later')->where('plateform','Twitter')->get();

        foreach($get_post as $row)
        {
            $now=now()->timezone($row->timezone);
            $time=$now->format('Y-m-d H:i');
            if($time>=$row->posted_at){
                $run=new TwitterService();
                $arr['post']=$row;
                $result=$run->create_post($arr);
                if($result['status']==true)
                {
                    $up=Post::find($row->id);
                    $up->posted_at_moment='now';
                    $up->update();
                }
            }


        }

        return Command::SUCCESS;
    }
}