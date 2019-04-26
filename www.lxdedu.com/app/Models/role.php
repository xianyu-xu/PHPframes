<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\traits\Query;

class Role extends Base
{
    //
    use Query;
    
    protected $table = 'roles';
    protected $dates   = ['deleted_at'];

    protected $guarded = [];

    //多对多关系
    public function auths()
    {
        return $this->belongsToMany(permission::class,'role_permission','rid','pid');
    }
}
