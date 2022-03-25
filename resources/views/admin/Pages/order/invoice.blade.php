
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
                                {{ $cart->product->price }} Taka
                            </td>
                            <td>
                                @php
                                    $total_price += $cart->product->price * $cart->product_quantity;
                                @endphp
                                {{ $cart->product->price * $cart->product_quantity }} Taka
                            </td>
                            <td>

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
<div class="mt-3">
    <h4>Thank You For Your Shopping !!</h4>
</div>


    </div>
</div>
