<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $User = [
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
