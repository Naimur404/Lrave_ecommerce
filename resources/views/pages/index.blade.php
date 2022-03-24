@extends('layouts.fontend.master')


<body>
    <div class="wrapper">

        @include('partial.navbar')

        <div class="container margin-top">

            <div class="row">


            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($sliders as $slider)
                        <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                            <img src="{{ asset('images/' . $slider->image) }}" class="d-block w-100"
                                alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $slider->title }}</h5>
                                    @if ($slider->button_link)
                                    <p>
                                        <a href="{{ $slider->button_link }}" class="btn btn-danger">{{ $slider->button_text }}</a>
                                    </p>

                                    @endif

                                  </div>
                        </div>
                    @endforeach


                </div>
                <button class="carousel-control-prev" type="button"
                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button"
                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

                <div class="col-md-4 margin-top">

                    @include('partial.product_sidebar')

                </div>

                <div class="col-md-8 mt-1">

                    <div class="widget">

                        <h3>Feature Products</h3>
                        @include('pages.product.partial.all_product')

                        <div class="d-flex justify-content-center">
                            {!! $products->links() !!}
                        </div>

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
