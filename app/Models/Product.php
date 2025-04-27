<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    use HasFactory;
    protected $fillable = [
'product_name',
'description',
'price',
'discount_price',
'quantity',
'category',
'business_id'

    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}

