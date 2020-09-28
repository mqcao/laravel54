<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//用户模块
//注册页面
Route::get('/register','RegisterController@create')->name('user.create');
//注册行为
Route::post('/register','RegisterController@store')->name('user.store');
//登录页面
Route::get('/login','LoginController@index')->name('user.loginform');
//登录行为
Route::post('/login','LoginController@login')->name('user.login');
//登出行为
Route::get('/logout','LoginController@logout')->name('user.logout');
//个人设置页面
Route::get('user/me/setting','UserController@settingIndex')->name('user.settingform');
//个人设置行为
Route::post('user/me/setting','UserController@setting')->name('user.setting');

//文章列表页
Route::get('posts/index','PostController@index')->name('post.index');
//文章详情页
Route::get('posts/{post}','PostController@show')->name('post.show')->where('post','[0-9]+');//
//添加文章
Route::get('posts/create','PostController@create')->name('post.create');//
Route::post('posts','PostController@store')->name('post.store');
//编辑文章
Route::get('posts/{post}/edit','PostController@edit')->name('post.edit');
Route::put('posts/{post}','PostController@update')->name('post.update')->where('post','[0-9]+');//;
//删除文章
Route::get('posts/{post}/delete','PostController@delete')->name('post.delete');
//图片上传
Route::post('/posts/image/upload','PostController@imageUploade')->name('post.image');
//提交评论
Route::post('posts/{user}/comment','PostController@comment')->name('post.comment');