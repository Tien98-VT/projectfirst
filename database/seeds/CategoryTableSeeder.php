<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['id'=>1,'name'=>'áo nam','slug'=>'ao-nam','parent_id'=>0],
            ['id'=>2,'name'=>'áo nữ','slug'=>'ao-nu','parent_id'=>0],
            ['id'=>3,'name'=>'áo phông nam','slug'=>'ao-phong-nam','parent_id'=>1],
            ['id'=>4,'name'=>'áo phông nữ','slug'=>'ao-phong-nu','parent_id'=>1],

        ]);
    }
}
