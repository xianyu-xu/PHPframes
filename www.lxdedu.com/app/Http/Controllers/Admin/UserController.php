<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    //列表
    public function index(Request $request)
    {
        // 日期初始化
        $dateData = ['datemin' => date('Y-m-d'), 'datemax' => date('Y-m-d')];
        return view('admin.user.index', $dateData);
    }

    public function list(Request $request)
    {
       return (new User())->search($request,'username');
    }

    //添加
    // 显示
    public function addlist()
    {

    }

    // 处理
    public function add(Request $request)
    {

    }

    //给用户分配角色
    public function addrole(User $user)
    {
        dump($user->role());
    }

    //修改
    // 显示
    public function editlist(Request $request,int $id)
    {

    }

    //处理
    public function edit(Request $request,int $id)
    {

    }


    //删除
    public function del(Request $request,User $user)
    {
        $user->delete();
        return ['status'=>0,'msg'=>'删除成功'];
    }
}
