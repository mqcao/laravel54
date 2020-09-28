<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //登录表单
    public function index()
    {
        return view('users.login');
    }

    //登录动作
    public function login()
    {
        return ;
    }

    //登出动作
    public function logout(){
        return;
    }

}
