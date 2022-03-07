@extends('pages.users.master')
@section('content')
    <div class="container margin-top-20">
        <h2>My Cart Items</h2>
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
                @foreach (App\Models\Cart::totalCarts() as $cart)
                    <tr>
                        <td>
                            {{ $loop->index + 1 }}
                        </td>
                        <td>
                            <a href="{{ route('product.show', $cart->product->slug) }}">{{ $cart->product->title }}</a>

                        </td>
                        <td>
                            @if ($cart->product->images->count() > 0)
                                <img src="{{ asset('images/' . $cart->product->images->first()->image) }}" width="100px">
                            @endif

                        </td>
                        <td>
                            <form action="{{ route('carts.update', $cart->id) }}" method="post" class="form-inline">
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
                            <form action="{{ route('carts.delete', $cart->id) }}" method="post" class="form-inline">
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
        <div class="float-end">
            <a href="" class="btn btn-info btn-lg">Continue Shopping..</a>
            <a href="" class="btn btn-warning btn-lg">Checkout</a>
            <a href=""></a>
        </div>
    </div>
@endsection
