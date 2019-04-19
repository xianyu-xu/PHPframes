<?php

namespace App\Models;


/**
 * App\Models\role
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\role query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $role_name 角色名称
 * @property string $auths 角色权限，用逗号隔开
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\role whereAuths($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\role whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\role whereRoleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\role whereUpdatedAt($value)
 */
class role extends Base
{
    //
}
