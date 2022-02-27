@extends('layouts.fontend.master')


<body>
    <div class="wrapper">
        @include('partial.navbar')
        <div class="container margin-top">
            <div class="row">
                <div class="col-md-4">

                  @include('partial.product_sidebar')

                </div>
                <div class="col-md-8">
                    <div class="widget">
                        <h3>Searched Products</h3>
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
