<form action="{{ route('carts.store') }}" method="post" class="form-inline">

    @csrf
<input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit" name="button" class="btn btn-warning"><i class="fa fa-plus"> Add to cart</i></button>


</form>
