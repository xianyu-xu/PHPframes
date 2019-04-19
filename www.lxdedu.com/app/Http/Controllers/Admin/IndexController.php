<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //后台主页
    public function index(Request $request)
    {
        return view('admin.index.index');
    }

    //后台欢迎页
    public function welcome(Request $request)
    {
        return view('admin.index.welcome');
    }

    //用户退出
    public function logout()
    {
        auth()->logout();
        return redirect(route('admin.login.login'))->with('msg','请登录');
    }
}
