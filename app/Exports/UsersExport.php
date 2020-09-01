<?php

namespace App\Exports;

use App\User;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromQuery,WithMapping,WithHeadings
{


    public function query()
    {
        return User::query();
    }
    public function map($User): array
    {
        return [
            $User->name,
            $User->email,
            $User->password,
            $User->address,
            $User->phone,
            $User->level,
            $User->created_at,
            $User->updated_at,


        ];
    }
    public function headings(): array
    {
        return [
            'name',
            'email',
            'password',
            'address',
            'phone',
            'level',
            'created_at',
            'updated_at',


        ];
    }

}
