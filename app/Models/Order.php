<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function product_order()
    {
        return $this->hasMany(ProductsOrder::class, 'order_id', 'id');
    }
}
