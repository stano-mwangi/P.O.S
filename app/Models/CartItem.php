<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

protected $fillable = [
    'cart_id',
    'product_id',
    'product_name',
    'description',
    'price',
    'discount_price',
    'quantity',
    'active_price',
];
    
    
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function item()
    {
        return $this->belongsTo(Product::class);
        
    }
}

