<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //用户设置表单
    public function settingIndex()
    {
        return view('users.setting');
    }

    //用户设置动作
    public function setting()
    {
        return;
    }
}
