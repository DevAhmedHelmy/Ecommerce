<?php

namespace App\Models;


use App\Models\CartItem;

class Cart extends Model
{
    public function items()
    {
        return $this->hasMany(CartItem::class,'cart_id');
    }
}
