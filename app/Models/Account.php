<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $guarded=[];
    use HasFactory;

    protected $casts=[
        'platforms' => 'array'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'account_id', 'id');
    }
}
