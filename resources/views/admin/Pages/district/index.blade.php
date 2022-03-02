@extends('layouts.backend.master')
@section('content')
    <div class="card">

        <div class="card-header">
            Manage District
        </div>
        <div class="card-body">
            @include("admin.partaial.message")
            <table class="table table-hover table-striped">
                <tr>
                    <th>#</th>
                    <th>District Name</th>
                    <th>Division name</th>

                    <th style="">Action</th>
                </tr>
                @foreach ($districts as $district)
                    <tr>


                        <td>#</td>
                        <td>{{ $district->name }}</td>
                        <td>{{ $district->division->name }}</td>

                        {{-- <td>{{ $district->parent->name }}</td> --}}
                        {{-- <td>{{ $district->quantity }}</td> --}}
                        <td><a href="{{ route('admin.district.edit', $district->id) }}" class="btn btn-success">Edit</a>
                            <a href="#deleteModal{{ $district->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>
                            <div class="modal fade" id="deleteModal{{ $district->id }}" tabindex="-1" role="dialog"
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
                                            <form action="{{ route('admin.district.delete', $district->id) }}" method="POST">
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
