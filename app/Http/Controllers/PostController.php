<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //文章列表方法
    public function index(){
        $posts=[
            [
                'title'=>'asdqwe',
            ],
            [
                'title'=>'123123'
            ],
        ];
        return view('posts.index',['posts'=>$posts]);
    }
    //文章详情方法
    public function show(){
        return view('posts.show');
    }
    //文章创建表单方法
    public function create(){
        return view('posts.create');
    }
    //文章创建方法
    public function store(){
        //return view('posts/create');
    }
    //文章编辑表单方法
    public function edit(){
        return view('posts.edit');
    }
    //文章编辑方法
    public function update(){
        //return view('posts/create');
    }
    //文章删除方法
    public function delete(){
        //return view('posts/create');
    }

}
