@extends('layouts.backend.master')
@section('content')
    <div class="card">

        <div class="card-header">
            Add Product
        </div>
        <div class="card-body">

            <form class="forms-sample" action="{{ route('admin.product.store') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Title</label>
                    <input type="text" class="form-control" name="title" id="exampleInputName1" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Description</label>
                    <textarea class="form-control" name="description" id="exampleTextarea1" rows="2"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Price</label>
                    <input type="number" class="form-control" name="price" id="exampleInputPassword4" placeholder="Price">
                </div>
                {{-- <div class="form-group">
            <label for="exampleInputPassword4">Price</label>
            <input type="number" class="form-control" id="exampleInputPassword4" placeholder="Price">
          </div> --}}
                <div class="form-group">
                    <label>File upload</label>


                    <div class="row">


                            <div class="input-group col-xs-12">
                                <input type="file" name="image[]" class="form-control file-upload-info" placeholder="Upload Image">

                                <input type="file" name="image[]" class="form-control file-upload-info" placeholder="Upload Image">
                                <input type="file" name="image[]" class="form-control file-upload-info" placeholder="Upload Image">
                                <input type="file" name="image[]" class="form-control file-upload-info" placeholder="Upload Image">





                    </div>
                    <span class="input-group-append">
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputCity1">Quantity</label>
                    <input type="number" class="form-control" name="quantity" id="exampleInputCity1"
                        placeholder="Quantity">
                </div>
                {{-- <div class="form-group">
          <label for="exampleTextarea1">Textarea</label>
          <textarea class="form-control" id="exampleTextarea1" rows="2"></textarea>
        </div> --}}
                <button type="submit" class="btn btn-success mr-2">Add Product</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
@endsection
