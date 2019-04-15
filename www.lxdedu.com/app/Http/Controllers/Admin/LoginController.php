<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class LoginController extends Controller
{
    //登录
    public function index()
    {
        return view('admin.login.index');
    }

    //登录验证
    public function login(LoginRequest $request)
    {
        if((new User())->login($request->all()))
        {
            dump(session('admin.user'));
        }
        else
        {
            return redirect()->back()->with('error','登录失败，重新登录');
        }
    }

}
