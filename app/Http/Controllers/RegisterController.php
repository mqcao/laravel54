<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //注册表单
    public function create()
    {
        return view('users.register');
    }
    //注册动作
    public function store(Request $request,User $user)
    {
        //验证
        $this->validate($request,[
            'name'=>'required|min:2|max:20',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:1|confirmed'
        ]);
        //逻辑
        $name=request('name');
        $email=request('email');
        $password=bcrypt(request('password'));
        $user->create(compact('name','email','password'));
        //$user->create(request(['name','email','password']));
        //渲染
        return redirect()->route('user.login');
    }
}
