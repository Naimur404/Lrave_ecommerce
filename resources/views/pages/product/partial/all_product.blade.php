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
<div class="d-flex justify-content-center">
    {!! $products->links() !!}
</div>

