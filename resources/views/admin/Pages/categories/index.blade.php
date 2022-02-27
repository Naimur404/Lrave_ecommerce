@extends('layouts.backend.master')
@section('content')
    <div class="card">

        <div class="card-header">
            Manage Product
        </div>
        <div class="card-body">
            @include("admin.partaial.message")
            <table class="table table-hover table-striped">
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Parent Category</th>
                    <th>Category Iamge</th>
                    <th style="">Action</th>
                </tr>
                @foreach ($categories as $category)
                    <tr>


                        <td>#</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            @if ($category->praent_id == null)
                                Primary Category
                            @else
                                {{ $category->parent->name }}
                            @endif
                        </td>
                        <td>
                            <img src="{{ asset('images/' . $category->image) }}" width="150">

                        </td>
                        {{-- <td>{{ $category->parent->name }}</td> --}}
                        {{-- <td>{{ $category->quantity }}</td> --}}
                        <td><a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-success">Edit</a>
                            <a href="#deleteModal{{ $category->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>
                            <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Are You Sure want To Delete?
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.category.delete', $category->id) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Parmanent Delete</button>
                                            </form>

                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                @endforeach

            </table>


        </div>
    </div>
@endsection
