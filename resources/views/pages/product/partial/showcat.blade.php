@extends('layouts.fontend.master')


<body>
    <div class="wrapper">
        @include('partial.navbar')
        <div class="container margin-top">
            <div class="row">
                <div class="col-md-4">
                    @include('admin.partaial.message')

                    @include('partial.product_sidebar')

                </div>
                <div class="col-md-8">
                    <div class="widget">
                        <h3>All Products in <span class="badge bg-danger">{{ $category->name }} Category</span> </h3>
                        @php
                            $products = $category->products()->paginate(9);
                        @endphp
                        @if ($products->count() > 0)
                            @include('pages.product.partial.all_product')
                        @else
                            <div class="alert alert-warning"> No Products has added yet in this Category</div>
                        @endif


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
