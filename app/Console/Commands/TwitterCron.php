<?php

namespace App\Console\Commands;

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
        $get=date('Y-m-d H:i');
        $get_post=Post::where('posted_at_moment','later')->where('posted_at' ,$get)->get();
        foreach($get_post as $row)
        {

            if($row->plateform == 'Twitter')
            {
                \Log::info($row);

                $run=new TwitterServiceShecdule();
                $result=$run->create_post($row);
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
