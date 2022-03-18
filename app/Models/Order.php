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
        'is_seen_by_admin',
        'payment_id',
        'transaction_id'

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function charts()
    {
        return $this->hasMany(Cart::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
