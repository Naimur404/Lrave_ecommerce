@extends('layouts.backend.master')
@section('content')
    <div class="card">

        <div class="card-header">
            Edit Division
        </div>
        <div class="card-body">
            @include('admin.partaial.message')

            <form class="forms-sample" action="{{ route('admin.division.update', $division->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputName1" value="{{ $division->name }}">
                </div>
                <div class="form-group">
                    <label for="Priority">Priority</label>
                    <input type="text" class="form-control" name="priority" id="Priority" value="{{ $division->priority }}">
                </div>


                {{-- <div class="form-group">
            <label for="exampleInputPassword4">Price</label>
            <input type="number" class="form-control" id="exampleInputPassword4" placeholder="Price">
          </div> --}}


                {{-- <div class="form-group">
          <label for="exampleTextarea1">Textarea</label>
          <textarea class="form-control" id="exampleTextarea1" rows="2"></textarea>
        </div> --}}
                <button type="submit" class="btn btn-success mr-2">update Division</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
@endsection
