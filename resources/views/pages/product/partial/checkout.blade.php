@extends('layouts.fontend.master')

@include('partial.navbar')
@section('content')
    <div class="container mt-2">
        <div class="card card-body">
            <h2>Confirm Item</h2>
            <hr>
            <div class="row">
                <div class="col-md-7 border-right-0">
                    @foreach (App\Models\Cart::totalCarts() as $cart)
                        <p>{{ $cart->product->title }} -

                            <strong>{{ $cart->product->price }} Taka</strong>

                            - {{ $cart->product_quantity }} Item
                        </p>
                    @endforeach
                </div>
                <div class="col-md-5">
                    @php
                        $total_price = 0;
                    @endphp
                    @foreach (App\Models\Cart::totalCarts() as $cart)
                        @php
                            $total_price += $cart->product->price * $cart->product_quantity;
                        @endphp
                        <p>Total Price : <strong>{{ $total_price }} Taka</strong> </p>
                        <p>Total Price With Shipping Cost :
                            <strong>{{ $total_price + App\Models\Setting::first()->shipping_cost }} Taka</strong>
                        </p>
                    @endforeach
                </div>
            </div>
            <div class="float-end">
                <a href="{{ route('carts') }}" class="btn btn-info btn-lg">Change Carts Item</a>
            </div>
        </div>


        <div class="card card-body mt-2">
            <h2>Shipping Address</h2>
            <form method="POST" action="{{ route('user.profile.update') }}">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Reciver Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ Auth::check() ? Auth::user()->first_name . ' ' . Auth::user()->last_name : '' }}"
                            required autocomplete="name" autofocus>

                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>




                <div class="row mb-3">
                    <label for="phone_no" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                    <div class="col-md-6">
                        <input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror"
                            name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_no : '' }}" required>

                        @error('phone_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required
                            autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>



                <div class="row mb-3">
                    <label for="street_address"
                        class="col-md-4 col-form-label text-md-end">{{ __('Shipping Address') }}</label>

                    <div class="col-md-6">

                        <textarea class="form-control" name="shipping_address" id="exampleTextarea1" rows="2"
                            required>{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>

                        @error('shipping_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="payment_method"
                        class="col-md-4 col-form-label text-md-end">{{ __('Payment Method') }}</label>

                    <div class="col-md-6">

                        <select class="form-control" name="payment_method_id" id="" required>

                        <option value="">Select a payment method please</option>

                        @foreach ($payments as $payment)
                            <option value="{{ $payment->id }}">{{ $payment->name }}</option>

                        @endforeach
                    </select>
                    </div>
                </div>
            </div>




            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Oder Now') }}
                    </button>
                </div>
            </div>
        </form>


    </div>

</div>
@endsection
