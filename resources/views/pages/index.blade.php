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
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img class="d-block w-100" src="..." alt="First slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="..." alt="Second slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="..." alt="Third slide">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
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
