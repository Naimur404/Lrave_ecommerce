@extends('layouts.fontend.master')


<body>
    <div class="wrapper">
        @include('partial.navbar')
    <div class="container margin-top">
        <div class="row">
            <div class="col-md-4">

                <div class="list-group">
                    <a href="#" class="list-group-item">First item</a>
                    <a href="#" class="list-group-item">Second item</a>
                    <a href="#" class="list-group-item">Third item</a>
                </div>

            </div>
            <div class="col-md-8">
                <div class="widget">
                    <h3>Featured Products</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card ">
                                <img class="feature-image"
                                    src="{{ asset('images/bd-galaxy-a52-a525-sm-a525fzkhbkd-456286647.webp') }}"
                                    class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Samsung</h5>
                                    <p class="card-text">Taka - 5000</p>
                                    <a href="#" class="btn btn-primary">Add to cart</a>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="card " >
                                <img class="feature-image"
                                    src="{{ asset('images/bd-galaxy-a52-a525-sm-a525fzkhbkd-456286647.webp') }}"
                                    class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Samsung</h5>
                                    <p class="card-text">Taka - 5000</p>
                                    <a href="#" class="btn btn-primary">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card " >
                                <img class="feature-image"
                                    src="{{ asset('images/bd-galaxy-a52-a525-sm-a525fzkhbkd-456286647.webp') }}"
                                    class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Samsung</h5>
                                    <p class="card-text">Taka - 50000</p>
                                    <a href="#" class="btn btn-primary">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card " >
                                <img class="feature-image"
                                    src="{{ asset('images/bd-galaxy-a52-a525-sm-a525fzkhbkd-456286647.webp') }}"
                                    class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Samsung</h5>
                                    <p class="card-text">Taka - 6000</p>
                                    <a href="#" class="btn btn-primary">Add to cart</a>
                                </div>
                            </div>
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

