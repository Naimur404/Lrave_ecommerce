@extends('layouts.fontend.master')
@section('title')
{{ $product->title }} | Laravel Ecommerce Site
@endsection
@section('content')

    <body>
        @include('partial.navbar')
        <div class="wrapper">

            <div class="container margin-top">
                <div class="row">
                    <div class="col-md-4">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">

                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($product->images as $image)
                                    <div class="product-item carousel-item {{ $i == 1 ? 'active' : '' }}">
                                        <img src="{{ asset('images/' . $image->image) }}" class="d-block w-100" alt="">
                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach




                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="widget">
                            <h4>{{ $product->title }} <span class=" badge bg-primary" style="display: inline-block">{{ $product->quantity < 1 ? ' Out Of Stock' : $product->quantity .' In Stock'}}</span></h4>

                            <h6>{{ $product->price }} Taka

                            </h6>
                            <hr>
                            <div class="porduct-description">{{ $product->description }}</div>

                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- JavaScript Bundle with Popper -->

    </body>
@endsection

