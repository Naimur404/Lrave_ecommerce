<form action="{{ route('carts.store') }}" method="post" class="form-inline">

    @csrf
<input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="button" name="button" class="btn btn-warning" onclick="addtoCart({{ $product->id }})"><i class="fa fa-plus"> Add to cart</i></button>


</form>
