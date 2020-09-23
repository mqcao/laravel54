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

/*Route::get('/', function () {
    return view('welcome');
});*/
//文章列表页
Route::get('posts/index','PostController@index')->name('post.index');
//文章详情页
Route::get('/posts/{post}','PostController@show')->name('post.show')->where('post','[0-9]+');//
//添加文章
Route::get('/posts/create','PostController@create')->name('post.create');//
Route::post('posts','PostController@store')->name('post.store');
//编辑文章
Route::get('posts/{post}/edit','PostController@edit')->name('post.edit');
Route::post('posts/{post}','PostController@update')->name('post.update');
//删除文章
Route::post('posts/delete','PostController@delete')->name('post.delete');