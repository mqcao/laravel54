<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //一个评论只属于一篇文章
    public function post(){
        return $this->belongsTo(Post::class);
    }

    //一个评论只属于一个人
    public function user(){
        return $this->belongsTo(User::class);
    }
    //

}
