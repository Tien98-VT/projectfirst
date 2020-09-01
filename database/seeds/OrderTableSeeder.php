<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->delete();
        DB::table('orders')->insert([
            ['id'=>1,'full'=>'Nguyễn Van Tiến','address'=>'Hải Dương','email'=>'TranDan@gmail.com','phone'=>'0393960055','total'=>'1100000','state'=>1],
            ['id'=>2,'full'=>'Nguyễn Van Tiến','address'=>'Hải Dương','email'=>'TranDan@gmail.com','phone'=>'0393960044','total'=>'1100000','state'=>1],
            ['id'=>3,'full'=>'Nguyễn Van Tiến','address'=>'Hải Dương','email'=>'TranDan@gmail.com','phone'=>'0393960033','total'=>'1100000','state'=>2],
            ['id'=>4,'full'=>'Nguyễn Van Tiến','address'=>'Hải Dương','email'=>'TranDan@gmail.com','phone'=>'0393960022','total'=>'1100000','state'=>2],
            ['id'=>5,'full'=>'Nguyễn Van Tiến','address'=>'Hải Dương','email'=>'TranDan@gmail.com','phone'=>'0393960011','total'=>'1100000','state'=>2],


        ]);
    }
}
