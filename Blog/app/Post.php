<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title', 'description', 'content','type', 'thumbnail', 'status', 'views', 'key_md5', 'user_id',
    ];
}
