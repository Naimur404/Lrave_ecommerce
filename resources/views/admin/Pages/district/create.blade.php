@extends('layouts.backend.master')
@section('content')
    <div class="card">

        <div class="card-header">
            Add District
        </div>
        <div class="card-body">
            @include('admin.partaial.message')

            <form class="forms-sample" action="{{ route('admin.district.store') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="priority">Select a division for the district</label>
                    <select name="division_id" id="" class="form-control">

                        <option value="">Please select a divison for district</option>
                        @foreach ($divisions as $division)
                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                        @endforeach
                    </select>

                </div>



                {{-- <div class="form-group">
            <label for="exampleInputPassword4">Price</label>
            <input type="number" class="form-control" id="exampleInputPassword4" placeholder="Price">
          </div> --}}


                {{-- <div class="form-group">
          <label for="exampleTextarea1">Textarea</label>
          <textarea class="form-control" id="exampleTextarea1" rows="2"></textarea>
        </div> --}}
                <button type="submit" class="btn btn-success mr-2">Add district</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
@endsection
