<?php

namespace App\Observers;

use App\Models\permission;

class permissionObserver
{
    //
    public function creating(permission $permission)
    {
        $permission->is_menu = request()->get('is_menu',0);
    }
}
