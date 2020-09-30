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

    //一个用户对于一篇文章是否有赞
    public function zan($user_id){
        return $this->hasOne(Zan::class)->where('user_id',$user_id);
    }

    //一篇文章的所有赞
    public function zans(){
        return $this->hasMany(Zan::class);
    }

}
