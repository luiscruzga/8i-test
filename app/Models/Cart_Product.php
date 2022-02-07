<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function cartProduct() {
        return $this->hasManyThrough(
            Cart::class,
            Product::class,
            'cart_id',
            'product_id',
        );
    }
}