@extends('layouts.backend.master')
@section('content')
    <div class="card">
        <div class="card-header">
            View Order #LE{{ $order->id }}
        </div>
        <div class="card-body">
            @include('admin.partaial.message')
<h3>Order Information</h3>
<div class="row">

    <div class="col-md-6 border-right">
<p><strong>Order Name :</strong>{{ $order->name}}</p>
<p><strong>Order Phone :</strong>{{ $order->phone_no}}</p>
<p><strong>Order Email :</strong>{{ $order->email}}</p>
<p><strong>Order Shipping Address :</strong>{{ $order->shipping_address}}</p>
    </div>
    <div class="col-md-6">
<p><strong>Order Payment Method :</strong>{{ $order->payment->name }}</p>

    </div>
</div>

        </div>
    </div>
@endsection
