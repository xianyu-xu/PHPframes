<?php

//缓存
Route::get('cache','Admin\CacheController@index');
Route::get('up','Admin\FileController@index');

//引入后台登录
include base_path('routes/admin/admin.php');