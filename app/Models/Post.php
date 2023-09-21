<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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


}
