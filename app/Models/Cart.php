<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    public $fillable = [
        'user_id',
        'product_id',
        'order_id',
        'ip_address',
        'product_quantity'

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function oder()
    {
        return $this->belongsTo(Order::class);
    }
    //total item
    public function totalitems()
    {if(Auth::check()){
        $carts = Cart::Where('user_id', Auth::id())
        ->where('order_id', NULL)
        ->get();
    }else{
        $carts = Cart::Where('ip_address', request()->ip())->where('order_id', NULL)
        ->get();
    }
    $total_items =0;
    foreach($carts as $cart){

        $total_items += $cart->product_quantity;
    }
    return $total_items;

    }
    //total cart model
    public function totalCarts()
    {if(Auth::check()){
        $carts = Cart::Where('user_id', Auth::id())
        ->where('order_id', NULL)
        ->get();
    }else{
        $carts = Cart::Where('ip_address', request()->ip())->where('order_id', NULL)
        ->get();
    }

    return $carts;

    }
}
