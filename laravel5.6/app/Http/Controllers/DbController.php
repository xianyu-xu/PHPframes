<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use App\Models\student;

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

    public function mdb()
    {
        //添加
        $data = [
            'name'=>'lxd',
        ];
        // dump(student::create($data));


        //查询
        // where()  orderBy() first() 单条  get()多条   value()指定字段  pluck()取指定列 count()查询总记录数
        //分页
        // $res = student::offset(1)->limit(2)->get();

        // dump($res);

        // //修改
        // $data = ['name'=>'我是修改的名字'];
        // $res = student::where('id',1)->update($data);//返回影响行数
        // dump($res);

        // //删除
        // $find = student::find(2);
        // $res = $find->delete();//返回布尔值
        // dump($res);


        //软删除
        //在模型中设置
        dump(student::destroy(1));

        //读取软删除的数据
        $res = student::onlyTrashed()->where('id',1)->first();
        dump($res);

        //回复软删除
        dump($res->restore());

    }

    public function fy(Request $request)
    {
        $data = student::paginate(3);
        return view('html.index',compact('data'));
    }
    
}
