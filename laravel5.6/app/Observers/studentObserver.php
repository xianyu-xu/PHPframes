<?php

namespace App\Observers;

use App\Models\student;

class studentObserver
{
    //
    public function creating(student $student)
    {
        $student->ip = request()->ip();
    }
}
