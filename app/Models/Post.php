<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
   protected $guarded=[];

    public function plateforms()
    {
        return $this->hasOne(PostDetail::class, 'post_id' ,'id');
    }

     public function post_dt()
    {
        return $this->hasOne(PostDetail::class, 'post_id' ,'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id' ,'id');
    }

    public function account():BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_id' ,'id');
    }


}
