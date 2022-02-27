@extends('layouts.backend.master')
@section('content')
    <div class="card">

        <div class="card-header">
            Add Category
        </div>
        <div class="card-body">
            @include('admin.partaial.message')

            <form class="forms-sample" action="{{ route('admin.category.store') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1"> Category Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Description</label>
                    <textarea class="form-control" name="description" id="exampleTextarea1" rows="2"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Parent Category</label>
                    <select class="form-control" name="praent_id" id="">
                        @foreach ($main_category as  $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>

                        @endforeach
                    </select>
                </div>

                {{-- <div class="form-group">
            <label for="exampleInputPassword4">Price</label>
            <input type="number" class="form-control" id="exampleInputPassword4" placeholder="Price">
          </div> --}}
                <div class="form-group">
                    <label>File upload</label>


                    <div class="row">


                            <div class="input-group col-xs-12">
                                <input type="file" name="image" class="form-control file-upload-info" placeholder="Upload Image">

                    </div>
                    <span class="input-group-append">
                        </span>
                    </div>
                </div>

                {{-- <div class="form-group">
          <label for="exampleTextarea1">Textarea</label>
          <textarea class="form-control" id="exampleTextarea1" rows="2"></textarea>
        </div> --}}
                <button type="submit" class="btn btn-success mr-2">Add Category</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
@endsection
