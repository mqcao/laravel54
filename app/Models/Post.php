<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
//    protected $guarded=[];
    protected $fillable=['title','content','user_id'];
}