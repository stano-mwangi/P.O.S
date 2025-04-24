<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebtItem extends Model
{
    use HasFactory;
    protected $fillable = ['debt_id', 'product_name', 'description', 'price','active_price','quantity'];
}
