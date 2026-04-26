<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'address',
        'profile_image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    // ── RELATIONSHIPS ─────────────────────────────────────────────────────────
    public function vendor()    { return $this->hasOne(Vendor::class); }
    public function orders()    { return $this->hasMany(Order::class); }
    public function carts()     { return $this->hasMany(Cart::class); }
    public function wishlists() { return $this->hasMany(Wishlist::class); }
    public function reviews()   { return $this->hasMany(Review::class); }

    // ── ROLE HELPERS ──────────────────────────────────────────────────────────
    public function isAdmin()    { return $this->role === 'admin'; }
    public function isVendor()   { return $this->role === 'vendor'; }
    public function isCustomer() { return $this->role === 'customer'; }
}
