<?php


Route::group(['prefix'=>'admin','namespace'=>'admin'],function(){

    //登录显示
    Route::get('login','LoginController@index')->name('admin.login.index');

    //登录验证
    Route::post('login','LoginController@login')->name('admin.login.login');
});