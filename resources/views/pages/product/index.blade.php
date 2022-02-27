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

                   @include('pages.product.partial.all_product')

                </div>
            </div>

        </div>

    </div>

</div>

    <!-- JavaScript Bundle with Popper -->

</body>
@endsection
