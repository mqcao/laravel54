<!DOCTYPE html>
<html lang="zh-CN">
@include('layouts.header')
<body>
@include('layouts.nav')
<div class="container">
    <div class="blog-header"><h1>{{$post->user_id}}||{{Auth::id()}}||{{$post->zan(Auth::id())->exists()}}</h1>
    </div>
    <div class="row">
        <div class="col-sm-8 blog-main">
            <div class="blog-post">
                <div style="display:inline-flex">
                    <h2 class="blog-post-title">{{$post->title}}</h2>
                    @can('update',$post)
                        <a style="margin: auto" href="http://127.0.0.1:8080/laravel54/public/posts/{{$post->id}}/edit">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">编辑</span>
                        </a>
                    @endcan
                    @can('delete',$post)
                        <a style="margin: auto" href="http://127.0.0.1:8080/laravel54/public/posts/{{$post->id}}/delete">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true">删除</span>
                        </a>
                    @endcan
                </div>

                <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}} by <a
                            href="#">{{$post->user->name}}</a></p>
                <p>
                <p>
                    <img src="http://127.0.0.1:8000/storage/72c76b674ec8793fcfd6555ff371bfbd/nxC9ozLfkORmoY92q9lPsejXchVvdNO2cwHiR2Jf.jpeg"
                         alt="63" style="max-width: 100%;">你好你好似懂非懂说</p>
                <p><br></p></p>
                <div>
                    @if($post->zan(Auth::id())->exists())
                        <a href="http://127.0.0.1:8080/laravel54/public/posts/{{$post->id}}/unzan" type="button"
                           class="btn btn-default btn-lg">取消赞</a>
                    @else
                        <a href="http://127.0.0.1:8080/laravel54/public/posts/{{$post->id}}/zan" type="button"
                           class="btn btn-primary btn-lg">赞</a>
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">评论</div>

                <!-- List group -->
                <ul class="list-group">
                    @foreach($post->comments as $comment)
                        <li class="list-group-item">
                            <h5>{{$comment->created_at}} by {{$comment->user->name}}</h5>
                            <div> {{ $comment->content }} </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">发表评论</div>

                <!-- List group -->
                <ul class="list-group">
                    <form action="http://127.0.0.1:8080/laravel54/public/posts/{{Auth::user()->id}}/comment"
                          method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="post_id" value="{{$post->id}}"/>
                        <li class="list-group-item">
                            <textarea name="content" class="form-control" rows="10"></textarea>
                            <button class="btn btn-default" type="submit">提交</button>
                            @include("layouts.error")
                        </li>
                    </form>

                </ul>
            </div>

        </div><!-- /.blog-main -->
        <div id="sidebar" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <aside id="widget-welcome" class="widget panel panel-default">
                <div class="panel-heading">
                    欢迎！
                </div>
                <div class="panel-body">
                    <p>
                        欢迎来到简书网站
                    </p>
                    <p>
                        <strong><a href="/">简书网站</a></strong> 基于 Laravel5.4 构建
                    </p>
                    <div class="bdsharebuttonbox bdshare-button-style0-24" data-bd-bind="1494580268777"><a href="#"
                                                                                                           class="bds_more"
                                                                                                           data-cmd="more"></a><a
                                href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#"
                                                                                                   class="bds_renren"
                                                                                                   data-cmd="renren"
                                                                                                   title="分享到人人网"></a><a
                                href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a><a href="#"
                                                                                                    class="bds_weixin"
                                                                                                    data-cmd="weixin"
                                                                                                    title="分享到微信"></a><a
                                href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#"
                                                                                                   class="bds_tqq"
                                                                                                   data-cmd="tqq"
                                                                                                   title="分享到腾讯微博"></a><a
                                href="#" class="bds_bdhome" data-cmd="bdhome" title="分享到百度新首页"></a></div>
                    <script>window._bd_share_config = {
                            "common": {
                                "bdSnsKey": {"tsina": "120473611"},
                                "bdText": "",
                                "bdMini": "2",
                                "bdMiniList": false,
                                "bdPic": "",
                                "bdStyle": "0",
                                "bdSize": "24"
                            },
                            "share": {},
                            "image": {
                                "viewList": ["tsina", "renren", "douban", "weixin", "qzone", "tqq", "bdhome"],
                                "viewText": "分享到：",
                                "viewSize": "16"
                            },
                            "selectShare": {
                                "bdContainerClass": null,
                                "bdSelectMiniList": ["tsina", "renren", "douban", "weixin", "qzone", "tqq", "bdhome"]
                            }
                        };
                        with (document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];</script>
                </div>
            </aside>
            <aside id="widget-categories" class="widget panel panel-default">
                <div class="panel-heading">
                    专题
                </div>

                <ul class="category-root list-group">
                    <li class="list-group-item">
                        <a href="/topic/1">旅游
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="/topic/2">轻松
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="/topic/5">测试专题
                        </a>
                    </li>
                </ul>

            </aside>
        </div>
    </div>
</div><!-- /.row -->
</div><!-- /.container -->

@include("layouts.footer")
</body>
</html>
