<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsOrder extends Model
{
    protected $table = 'products_order';
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}

