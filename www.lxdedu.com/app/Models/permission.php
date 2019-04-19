<?php

namespace App\Models;


/**
 * App\Models\permission
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\permission query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name 权限名称
 * @property string $routename 路由名称
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\permission whereRoutename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\permission whereUpdatedAt($value)
 */
class permission extends Base
{
    //
}
