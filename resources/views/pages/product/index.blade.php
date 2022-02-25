@extends('layouts.fontend.master')

@section('content')
<body>
    @include('partial.navbar')
    <div class="wrapper">

    <div class="container margin-top">
        <div class="row">
            <div class="col-md-4">

               @include('partial.product_sidebar')

            </div>
            <div class="col-md-8">
                <div class="widget">
                    <h3>All Products</h3>

                    <div class="row">

                        @foreach ($products as $product)

                        <div class="col-md-3">

                            <div class="card " >
                                {{-- <img class="feature-image" --}}
                                    {{-- src="{{ asset('images/bd-galaxy-a52-a525-sm-a525fzkhbkd-456286647.webp') }}"
                                    class="card-img-top" alt="..."> --}}

                                    @php
                                        $i =1;
                                    @endphp

                                    @foreach ($product->images as $image )
                                    @if ($i > 0)
                                    <img class="feature-image"
                                    src="{{ asset('images/'. $image->image) }}"
                                    class="card-img-top" alt="...">
                                    @endif
                                        @php
                                      $i--;
                                     @endphp
                                    @endforeach
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->title }}</h5>
                                    <p class="card-text">Taka - {{ $product->price }}</p>
                                    <a href="#" class="btn btn-primary">Add to cart</a>
                                </div>
                            </div>

                        </div>

                        @endforeach
                    </div>

                </div>
            </div>

        </div>
        {{-- <footer class="footer-bottom">
            <p class="text-center">&copy; 2022 All rights reserved</p>
        </footer> --}}
    </div>

</div>

    <!-- JavaScript Bundle with Popper -->

</body>
@endsection
