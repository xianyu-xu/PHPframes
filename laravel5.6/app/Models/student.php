<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Observers\studentObserver;

class student extends Model
{
    protected $table = 'students';
    // 批量赋值 $fillable[白名单] $guarded[黑名单]
    protected $guarded=[];
     //引入软删除
     use SoftDeletes;
     //指定删除的字段标识
     protected $dates = ['deleted_at'];


     //事件
     protected static function boot()
    {
        static::observe(studentObserver::class);
        parent::boot();
    }
}
