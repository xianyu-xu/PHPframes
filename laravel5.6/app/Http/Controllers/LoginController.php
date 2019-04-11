<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    //
    public function index()
    {
        return "用户登录";
    }


    public function login()
    {
        $username = Input::get('username');
        $pwd = Input::get('pwd');
        //获取全部
        dump(Input::all()) ;
        //获取指定的字段 白名单
        dump(Input::only(['username','pwd']));
        //排除掉不要的 黑名名单
        dump(Input::except(['username']));
        //判断一个字段是否存在
        dump(Input::has('username'));
        return $username;
    }

    public function login2(Request $request)
    {
        $username = $request->get('username');

        //获取全部
        dump($request->all());

        //获取指定字段 白名单
        dump($request->only('pwd'));

        //排除指定字段  黑名单
        dump($request->except('pwd'));

        //判断请求方式
        dump($request->isMethod('post'));
    }
}
