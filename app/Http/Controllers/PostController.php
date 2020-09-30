<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Zan;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    //文章列表方法
    public function index(){
       $posts=post::orderby('created_at','desc')->withCount(['comments','zans'])->paginate(5);
       return view('posts.index',compact('posts'));
    }
    //文章详情方法
    public function show(Post $post,User $user){
        return view('posts.show',compact('post','user'));
    }
    //文章创建表单方法
    public function create(Post $post){
        $post->load('comments');
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
        $user_id=Auth::id();
        $params=array_merge(\request(['title','content']),compact('user_id'));
        $post=Post::create($params);
        return redirect()->route('post.index');
    }
    //文章编辑表单方法
    public function edit(Post $post){
        $this->authorize('update',$post);
        return view('posts.edit',compact('post'));
    }
    //文章编辑方法
    public function update(Post $post,Request $request){
        $this->authorize('update',$post);
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
        $this->authorize('delete',$post);
        $post->delete();
        return redirect()->route('post.index');
    }
    //上传图片方法
    public function imageUploade(Request $request){
//        dd($request->all());
        $path=$request->file('wangEditorH5file')->storePublicly(md5(time()));
        return asset('storage/',$path);
    }
    //提交评论方法
    public function comment(Request $request,Comment $comment,Post $post){
        //验证
        $this->validate($request,[
            'content'=>'required|min:1'
        ]);
        //逻辑
        $comment->post_id=request('post_id');
        $comment->user_id=Auth::id();
        $comment->content=request('content');
        //$post->comments()->save();
        $comment->save();
        return back();
    }
    //点赞
    public function zan(Post $post){
        $param=[
            'user_id'=>Auth::id(),
            'post_id'=>$post->id,
        ];
        Zan::firstOrCreate($param);
        return back();
    }
    //取消赞
    public function unzan(Post $post){
        $post->zan(Auth::id())->delete();
        return back();
    }
}