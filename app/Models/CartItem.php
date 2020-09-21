<?php

namespace App\Models;

use App\Models\Cart;

class CartItem extends Model
{
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
