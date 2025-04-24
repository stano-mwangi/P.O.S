<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;
   

    protected $fillable = [
        'customer_id', 'amount', 'status'
    ];
    public function items()
    {
        return $this->hasMany(DebtItem::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($debt) {
            $debt->updateCustomerTotalDebt();
        });

        static::deleted(function ($debt) {
            $debt->updateCustomerTotalDebt();
        });
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function updateCustomerTotalDebt()
    {
        $customer = $this->customer;
        $customer->total_debt = $customer->debts()->sum('amount');
        $customer->save();
    }
}

