<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends MBaseodel
{
    use HasFactory;
    protected $fillable = [
'supplier_name',
'phone_number',
'description',
'amount',
'balance',
'status',
'location',
'business_id'

    ];

}
