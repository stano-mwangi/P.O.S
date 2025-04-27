<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends BaseModel
{
    use HasFactory;
    protected $fillable = [
  'status',
        'session_id',
        'business_id'

    ];
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
public function user(){
    return $this->belongTo(User::class);
}
}

