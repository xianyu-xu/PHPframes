<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class DbController extends Controller
{
    //

    public function db()
    {
        // dump(DB::connection());

        //插入
        // $res = DB::table('users')->insert(['name'=>'lxd','pwd'=>'123']);

        // dump($res);

        //更新
        // $res = DB::table('users')->where('id','1')->update(['name'=>'lxd']);
        // dump($res);

        //删除
        // $res = DB::table('users')->where('id','<','2')->delete();
        // dump($res);

        //查询
        
        // $res = DB::table('users')->get();

        // $res = DB::table('users')->where('id','<','20')->get();

        // $res = DB::table('users')->where('id','<','10')
        //                         ->orWhere('name','ldd1')
        //                         ->get();

        $role = request()->get('id');
        $res = DB::table('users')->when($role,function(Builder $query) use($role){
            $query->where('id',$role);
        })->get();
        dump($res);

        //当条件为false时，执行第二个闭包函数
        $role = null;

        $res = DB::table('users')
                ->when($role, function ($query) use ($role) {
                    return $query->orderBy($role);
                }, function ($query) {
                    return $query->orderBy('name','desc');
                })->get();
        dump($res);
    }
}
