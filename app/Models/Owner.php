<?php

// app/Models/Owner.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Owner extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'owner';
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'photo',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // const ROLE_OWNER = 'owner';

    // public function hasRole($role)
    // {
    //     return $role === self::ROLE_OWNER;
    // }
    // public function hasRole($role)
    // {
    //     return $this->role === $role;
    // }

    public function accommodations()
    {
        return $this->hasMany(Accommodation::class);
    }
}
