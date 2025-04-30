<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use App\Models\Business;

class User extends BaseModel
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
         'business_id',
        'name',
        'email',
        'password',
        'role_id'
    ];
    protected $with = ['role'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function role()
{
    return $this->belongsTo(Role::class);
}

public function isAdmin()
{
    return $this->role?->name === 'admin';
}

public function business(){
    return $this->belongsTo(Business::class);
}

// In User.php
public function getRoleNameAttribute()
{
    return $this->role?->name ?? 'unknown';
}

}
