<?php

use Illuminate\Database\Seeder;

class studentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [];
        for($i=0;$i<=10;$i++)
        {
            $data[] = [
                'name'=>'name'.$i,
            ];

        }
        DB::table('students')->insert($data);
    }
}
