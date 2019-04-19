<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $params)
    {
        $routename = $request->route()->getName();
        if($routename != $params)
        {
            //检测是否登陆
            if(!auth()->check()){
                //清空session
                session()->flush();

                //跳转登陆页面
                return redirect(route('admin.login.login'))->withErrors(['errors'=>'请登录']);
            }
        }
       
        return $next($request);
    }
}
