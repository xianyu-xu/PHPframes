<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CacheController extends Controller
{
    //
    public function index()
    {
         //添加
         //只有不存在才能添加成功
        Cache::add('name','张三',10);
        //没有则添加，有则修改
        Cache::put('age','1',10);

        //查询
        cache()->has('name');

        //获取
        cache('name');
        //如果存在则获取，如果不存在则使用默认值
        cache()->get('age',1);
        //如果存在则获取，如果不存在则调用函数
        cache()->get('age',function(){
            return 111;
        });
        cache('age',function(){
            return 111;
        });


        //如果没有，返回false然后将函数中的值赋给之前的名称
        Cache::remember('user',10,function(){
            $ret = DB::table('users')->where('id',1)->first();
            return $ret;
        });

        //删除
        // cache()->forget('id');

        //永久缓存
        Cache::forever('yj',1000);
    }
}
