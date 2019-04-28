<?php

Route::group(['prefix'=>'admin','namespace'=>'admin','middleware'=>['CheckLogin:admin.login.login']],function(){

    //登录显示
    Route::get('login','LoginController@index')->name('admin.login.login');

    //登录验证
    Route::post('login','LoginController@login')->name('admin.login.login');

    //后台主页
    Route::get('index','IndexController@index')->name('admin.index');

    Route::get('welcome','IndexController@welcome')->name('admin.index.welcome');

    //退出
    Route::get('logout','IndexController@logout')->name('admin.logout');


    // 管理员列表管理
    // 列表
    Route::get('user/index','UserController@index')->name('admin.user.index');

    //添加
    //显示
    Route::get('user/addlist','UserController@addlist')->name('admin.user.addlist');
    //添加处理
    Route::post('user/add','UserController@add')->name('admin.user.add');

    //修改
    //显示
    Route::get('user/editlist/{id}','UserController@editlist')->name('admin.user.editlist')->where(['id'=>'\d+']);
    //添加处理
    Route::put('user/edit/{id}','UserController@edit')->name('admin.user.edit')->where(['id'=>'\d+']);

    //删除
    Route::delete('user/del/{user}','UserController@del')->name('admin.user.del');

    //ajax请求
    Route::get('user/list','UserController@list')->name('admin.user.list');
    //给用户分配角色
    Route::get('user/role/{user}','UserController@role')->name('admin.user.role');
    Route::post('user/addrole/{user}','UserController@addrole')->name('admin.user.addrole');

    //角色管理
    Route::get('user/role','RoleController@index')->name('admin.user.role');
    Route::get('user/role/list','RoleController@list')->name('admin.user.role.list');
    Route::resource('role','RoleController');

    //给角色分配权限
    Route::post('user/role/addauth/{role}','RoleController@addauth')->name('admin.user.role.addauth');
   


    //权限管理
    Route::get('user/permission','PermissionController@index')->name('admin.user.permission');
    Route::get('user/permission/list','PermissionController@list')->name('admin.user.permission.list');
    Route::resource('permission','PermissionController');
    //权限添加
    Route::get('user/permission/add','PermissionController@create')->name('admin.user.permission.add');
    Route::post('user/permission/store','PermissionController@store')->name('admin.user.permission.store');

});