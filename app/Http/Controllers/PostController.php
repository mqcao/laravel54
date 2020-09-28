<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    //文章列表方法
    public function index(){
       $posts=post::orderby('created_at','desc')->paginate(5);
        return view('posts.index',compact('posts'));
    }
    //文章详情方法
    public function show(Post $post){
        return view('posts.show',compact('post'));
    }
    //文章创建表单方法
    public function create(){
        return view('posts.create');
    }
    //文章创建方法
    public function store(Request $request,Post $post){
        $this->validate(request(),[
            'title'=>'required|string|min:2|max:50',
            'content'=>'required'
        ],[
            'title.min'=>'标题长度太短了！'
        ]);
            $post->create(request(['title','content']));
        return redirect()->route('post.index');
    }
    //文章编辑表单方法
    public function edit(Post $post){
        return view('posts.edit',compact('post'));
    }
    //文章编辑方法
    public function update(Post $post,Request $request){
        $this->validate(request(),[
            'title'=>'required|string|min:2|max:50',
            'content'=>'required'
        ],[
            'title.min'=>'标题长度太短了！'
        ]);

        $post->title=request('title');
        $post->content=request('content');
        $post->save();

        return redirect()->route('post.index');
    }
    //文章删除方法
    public function delete(Post $post){
        $post->delete();
        return redirect()->route('post.index');
        //return view('posts/create');
    }
    //上传图片方法
    public function imageUploade(Request $request){
//        dd($request->all());
        $path=$request->file('wangEditorH5file')->storePublicly(md5(time()));
        return asset('storage/',$path);
    }



}