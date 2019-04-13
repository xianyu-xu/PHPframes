<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atrice extends Model
{
    //引入软删除
    use SoftDeletes;
    //指定删除的字段标识
    protected $dates = ['deleted_at'];
    //当文件名（类名）和表名不一致时
    //指定表名  不用表前缀
    protected $table = 'Atrices';

    //指定主键
    protected $primaryKey = 'id';
    
    // 如果表中没有creat_at he create_up  则需要指定模型不去管理

    public $timestamps = true;

    // 批量赋值 $fillable[白名单] $guarted[黑名单]
    protected $guarted=[];



}
