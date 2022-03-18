@extends('layouts.backend.master')
@section('content')
    <div class="card">

        <div class="card-header">
            Manage Product
        </div>
        <div class="card-body">
            @include('admin.partaial.message')
            <table class="table table-hover table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Title</th>
                        <th>Price</th>
                        <th>Quanqity</th>
                        <th style="">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                        <tr>


                            <td>#</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td><a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-success">Edit</a>
                                <a href="#deleteModal{{ $product->id }}" data-toggle="modal"
                                    class="btn btn-danger">Delete</a>
                                <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Are You Sure want To
                                                    Delete?</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.product.delete', $product->id) }}"
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
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Product Title</th>
                        <th>Price</th>
                        <th>Quanqity</th>
                        <th style="">Action</th>
                    </tr>
                </tfoot>
                </tbody>

            </table>


        </div>
    </div>
@endsection
