<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller {

    // 登录界面
    public function index() {
        // 如果用户已经登录则直接跳转到后台首页
        if(auth()->check()){
            return redirect(route('admin.index'));
        }

        return view('admin.login.index');
    }

    // 登录处理 
    public function login(LoginRequest $request) {
        if (auth()->attempt($request->only(['username', 'password']))) {
            // 登录成功
            return redirect()->route('admin.index')->with('msg','登录成功');
        }
        return redirect()->back()->withErrors(['errors' => '登录不合法']);
    }
}
