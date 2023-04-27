<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'likes',
        'comments'
    ];
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id' ,'id');
    }
}
