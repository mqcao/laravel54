<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //登录表单
    public function index()
    {
        return view('users.login');
    }

    //登录动作
    public function login(Request $request)
    {
        //验证
        $this->validate(\request(),[
            'email'=>'required|email',
            'password'=>'required|min:1',
            'is_remenber'=>'interger',
        ]);
        //逻辑
        $user=\request(['email','password']);
        $is_remenber=boolval(\request('is_remenber'));
        if (Auth::attempt($user,$is_remenber)){
            return redirect()->route('post.index');
        }
        return redirect()->back()->withErrors('邮箱密码输入错误');
    }

    //登出动作
    public function logout(){
        Auth::logout();
        return redirect()->route('user.login');
    }

}
