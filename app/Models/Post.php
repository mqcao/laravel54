<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Post extends Model
{
    //  protected $guarded=[];
    protected $fillable=['title','content','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    //一篇文章有很多评论
    public function comments(){
        return $this->hasMany(Comment::class)->orderBy('created_at','desc');
    }
}
