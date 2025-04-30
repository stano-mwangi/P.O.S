<?php

namespace App\Models;
use App\Models\Business;
use Illuminate\Database\Eloquent\Model;

class Business extends BaseModel
{
    protected $fillable = [
'name'
    ];

    public function owner()
{
    return $this->hasMany(User::class);
}
}
