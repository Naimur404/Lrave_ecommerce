<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {

        $orders = Order::orderBy('id', 'desc')->get();
        return view('admin.Pages.order.index', compact('orders'));
    }
    public function show($id)
    {
        $order = Order::find($id);
        return view('admin.Pages.order.show',compact('order'));
    }
}
