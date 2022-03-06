<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = [
        "user_id",
        'ip_address',
        'name',
        'phone_no',
        'shipping_address',
        'email',
        'message',
        'is_paid',
        'is_complete',
        'is_seen_by_admin'

    ];
    public function user()
    {
        return $this->belongsTo(User::class)->get();
    }
    public function charts()
    {
        return $this->hasMany(Cart::class)->get();
    }
}
