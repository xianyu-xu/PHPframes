<?php

use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //清空数据表，重新添加
        App\Models\User::truncate();
        factory(App\Models\User::class,10)->create();
        App\Models\User::find(1)->update([
            'username'=>'admin',
        ]);
        
    }
}
