<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id','order_number','total_amount','shipping_address',
        'payment_method','payment_status','status','notes',
        'phone','city','country',
    ];

    public function user()    { return $this->belongsTo(User::class); }
    public function items()   { return $this->hasMany(OrderItem::class); }
    public function invoice() { return $this->hasOne(Invoice::class); }

    public function isAdmin() { return false; }
}
