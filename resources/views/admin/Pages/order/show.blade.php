@extends('layouts.backend.master')
@section('content')
    @include('admin.partaial.message')
    <div class="card">
        <div class="card-header">
            View Order #LE{{ $order->id }}
        </div>
        <div class="card-body">

            <h3>Order Information</h3>
            <div class="row">

                <div class="col-md-6 border-right">
                    <p><strong>Order Name :</strong>{{ $order->name }}</p>
                    <p><strong>Order Phone :</strong>{{ $order->phone_no }}</p>
                    <p><strong>Order Email :</strong>{{ $order->email }}</p>
                    <p><strong>Order Shipping Address :</strong>{{ $order->shipping_address }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Order Payment Method :</strong>{{ $order->payment->name }}</p>
                    <p><strong>Order Payment Transaction:</strong>{{ $order->transaction_id }}</p>
                </div>
            </div>
            <hr>

            <head>Order Items</head>
            @if (is_countable($order->charts) && count($order->charts) > 0)
                <table class="table table-bordered table-striped ">
                    <thead>
                        <tr>
                            <th>
                                No.
                            </th>
                            <th>
                                Product Totle
                            </th>
                            <th>
                                Prodct Image
                            </th>
                            <th>
                                Prodct Quantity
                            </th>
                            <th>
                                Unit Price
                            </th>
                            <th>Sub Total Price</th>
                            <th>
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_price = 0;
                        @endphp
                        @foreach ($order->charts as $cart)
                            <tr>
                                <td>
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>
                                    <a
                                        href="{{ route('product.show', $cart->product->slug) }}">{{ $cart->product->title }}</a>

                                </td>
                                <td>
                                    @if ($cart->product->images->count() > 0)
                                        <img src="{{ asset('images/' . $cart->product->images->first()->image) }}"
                                            width="100px">
                                    @endif

                                </td>
                                <td>
                                    <form action="{{ route('carts.update', $cart->id) }}" method="post"
                                        class="form-inline">
                                        @csrf
                                        <input type="number" name="product_quantity" class="form-label"
                                            value="{{ $cart->product_quantity }}">
                                        <button type="submit" class="btn btn-success ml-1">Update</button>
                                    </form>
                                </td>
                                <td>
                                    {{ $cart->product->price }} Taka
                                </td>
                                <td>
                                    @php
                                        $total_price += $cart->product->price * $cart->product_quantity;
                                    @endphp
                                    {{ $cart->product->price * $cart->product_quantity }} Taka
                                </td>
                                <td>
                                    <form action="{{ route('carts.delete', $cart->id) }}" method="post"
                                        class="form-inline">
                                        @csrf
                                        <input type="hidden" name="cart_id">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>

                            <td colspan="4"></td>
                            <td>Total Amount :</td>
                            <td colspan="2"><strong>{{ $total_price }} Taka</strong></td>
                        </tr>
                    </tbody>
                </table>
            @endif
            <hr>
            <form action="{{ route('admin.order.charge', $order->id) }}" method="post">
                @csrf
                <label for="">Shipping Cost</label>
                <input type="number" name="shipping_charge" id="shipping_cost" value="{{ $order->shipping_charge }}">
                <br>
                <label for="">Coustom Discount</label>
                <input type="number" name="custom_discount" id="custom_discount" value="{{ $order->custom_discount }}">
                <br>
                <input type="submit" value="Update" class="btn btn-success">
                <a href="{{ route('admin.order.invoice', $order->id) }}" class="ml-2 btn btn-behance">Invoice</a>

            </form>
            <hr>
            <form action="{{ route('admin.order.completed', $order->id) }}" style="display: inline-block!important;"
                method="post">
                @csrf
                @if ($order->is_completed)
                    <input type="submit" value="Cancle Order" class="btn btn-danger">
                @else
                    <input type="submit" value="Complete Order" class="btn btn-success">
                @endif
            </form>
            <form action="{{ route('admin.order.paid', $order->id) }}" style="display: inline-block!important;"
                method="post">
                @csrf
                @if ($order->is_paid)
                    <input type="submit" value="Cancle Payment Paid" class="btn btn-danger">
                @else
                    <input type="submit" value="Order Paid" class="btn btn-success">
                @endif
            </form>
        </div>
    </div>
@endsection
