<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    //
    protected $table = 'Users';

    protected $guraded = [];
    

    /**
     * 
     */
    public function login(array $data)
    {
        $info = self::where('username',$data['username'])->first();
        
        //验证用户是否存在
        if(!$info)
        {
            return false;
        }
        // dump(Hash::check($data['password'],$info['password']));exit;
        //验证密码是否正确
        if(!Hash::check($data['password'],$info['password']))
        {
            return false;
        }

        //写入session
        session(['admin.user'=>$info]);

        return true;
    }
}
