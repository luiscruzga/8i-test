<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function orderProduct() {
        return $this->hasManyThrough(
            Order::class,
            Product::class,
            'order_id',
            'product_id',
        );
    }
}
