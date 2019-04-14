<?php

use Illuminate\Database\Seeder;
use App\Models\student;

class studentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //清空数据
        student::truncate();
        //
        // $data = [];
        // for($i=0;$i<=10;$i++)
        // {
        //     $data[] = [
        //         'name'=>'name'.$i,
        //     ];

        // }
        // DB::table('students')->insert($data);

        //调用工厂函数
        factory(student::class,20)->create();

    }
}
