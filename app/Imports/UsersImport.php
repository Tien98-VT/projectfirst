<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection)
    {
    foreach($collection as $key=>$value){
        if($key>0){
            DB::table('users')->insert(['name'=>$value[0],'email'=>$value[1],'password'=>Hash::make($value[2]),
            'address'=>$value[3],'phone'=>$value[4],'level'=>$value[5],'created_at'=>$value[6],'updated_at'=>$value[7]]);
        }
    }
    }
}
