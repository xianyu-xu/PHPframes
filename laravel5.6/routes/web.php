<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::get('a/{id}',function($id){
    echo $id;
})->where(['id'=>'[0-9]+']);



// Route::group(['prefix'=>'admin'],function(){
//     Route::get('login',function(){
//         return 11;
//     });
// });

// //路由控制器
// Route::get('login','LoginController@index')->name('login');

// //在controller的目录下边，则要加命名空间
// // Route::get('admin/article/{id}','admin\ArticleController@index')->name('admin.article');



// //分组简化命名空间
// Route::group(['namespace'=>'admin'],function(){
//     Route::get('admin/article/{id}','ArticleController@index')->name('admin.article');
// });


//获取数据  input
Route::get('login','LoginController@login')->name('login');

//获取数据  request
Route::get('login2','LoginController@login2')->name('login');

//辅助函数获取数据   request()


//设置cookie
// Route::get('ck',function(){
//     return response('我设置了cookie')->cookie('name',111,10,'/');
// });

//获取cookie
Route::get('getck',function(){
    return request()->cookie('name');
})->name('getck');


//重定向
Route::get('ck',function(){
    response('我设置了cookie')->cookie('name',111,10,'/');
    return redirect()->route('getck',['id'=>1]);
});

//设置json
Route::get('json',function(){
    return response()->json(['name'=>'lxd','id'=>1],200);
});


//传递数据    循环
Route::get('index','HtmlController@index');

// 视图继承
Route::get('ext','HtmlController@extend');

//数据库
Route::get('db','DbController@db')->name('db');