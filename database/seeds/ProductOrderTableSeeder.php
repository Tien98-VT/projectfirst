<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products_order')->delete();
        DB::table('products_order')->insert([
        ['code'=>'SP01','name'=>'Áo Nữ Sơ Mi Chấm Bi','price'=>50000,'quantity'=>1,'image'=>'Ao_nu_so_mi_cham_bi.jpg','order_id'=>1],
        ['code'=>'SP02','name'=>'Áo Nữ Phối Viền','price'=>60000,'quantity'=>1,'image'=>'ao-nu-phoi-vien.jpg','order_id'=>1],
        ['code'=>'SP01','name'=>'Áo Nữ Sơ Mi Chấm Bi','price'=>50000,'quantity'=>1,'image'=>'Ao_nu_so_mi_cham_bi.jpg','order_id'=>2],
        ['code'=>'SP02','name'=>'Áo Nữ Phối Viền','price'=>60000,'quantity'=>1,'image'=>'ao-nu-phoi-vien.jpg','order_id'=>2],
        ['code'=>'SP01','name'=>'Áo Nữ Sơ Mi Chấm Bi','price'=>50000,'quantity'=>1,'image'=>'Ao_nu_so_mi_cham_bi.jpg','order_id'=>3],
        ['code'=>'SP02','name'=>'Áo Nữ Phối Viền','price'=>60000,'quantity'=>1,'image'=>'ao-nu-phoi-vien.jpg','order_id'=>3],
        ['code'=>'SP01','name'=>'Áo Nữ Sơ Mi Chấm Bi','price'=>50000,'quantity'=>1,'image'=>'Ao_nu_so_mi_cham_bi.jpg','order_id'=>4],
        ['code'=>'SP02','name'=>'Áo Nữ Phối Viền','price'=>60000,'quantity'=>1,'image'=>'ao-nu-phoi-vien.jpg','order_id'=>4],
        ['code'=>'SP01','name'=>'Áo Nữ Sơ Mi Chấm Bi','price'=>50000,'quantity'=>1,'image'=>'Ao_nu_so_mi_cham_bi.jpg','order_id'=>5],
        ['code'=>'SP02','name'=>'Áo Nữ Phối Viền','price'=>60000,'quantity'=>1,'image'=>'ao-nu-phoi-vien.jpg','order_id'=>5],
       ]);

    }
}
