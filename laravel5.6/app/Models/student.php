<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $table = 'students';
    // 批量赋值 $fillable[白名单] $guarded[黑名单]
    protected $guarded=[];
}
