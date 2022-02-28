@extends('layouts.backend.master')
@section('content')
    <div class="card">

        <div class="card-header">
            Add Product
        </div>
        <div class="card-body">
            @include('admin.partaial.message')

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
                    <label for="exampleInputPassword4">Select Category</label>

                    <select class="form-control" name="category_id">

                        <option value="">Please Select a category for the product</option>
                        @foreach (App\Models\Category::orderby('name', 'asc')->where('praent_id', null)->get()
                        as $praent)

                        <option value="{{ $praent->id }}">{{ $praent->name }}</option>

                        @foreach (App\Models\Category::orderby('name', 'asc')->where('praent_id', $praent->id)->get()
                as $child)
                <option value="{{ $child->id }}"> --------> {{ $child->name }}</option>
                @endforeach
                        @endforeach
                    </select>


                </div>

                <div class="form-group">
                    <label for="exampleInputPassword4">Select Category</label>

                    <select class="form-control" name="brand_id">

                        <option value="">Please Select a category for the product</option>
                        @foreach (App\Models\Brand::orderby('name', 'asc')->get()
                        as $brand)

                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>

                        @endforeach
                    </select>


                </div>
                {{-- <div class="form-group">
            <label for="exampleInputPassword4">Price</label>
            <input type="number" class="form-control" id="exampleInputPassword4" placeholder="Price">
          </div> --}}

          <div class="form-group">
            <label for="exampleInputPassword4">Price</label>
            <input type="number" class="form-control" name="price" id="exampleInputPassword4" placeholder="Price">
        </div>
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
