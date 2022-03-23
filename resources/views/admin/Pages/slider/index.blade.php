@extends('layouts.backend.master')
@section('content')
    <div class="card">

        <div class="card-header">
            Manage Slider
        </div>
        <div class="card-body">
            @include('admin.partaial.message')
            <a href="#addSliderModal" data-toggle="modal" class="btn btn-info float-right mb-2">

                <i class="clearfix"></i>Add New Slider
            </a>
            <div class="clearfix"></div>
            {{-- Add Modal --}}
            <div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Slider
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="title">Title <small class="text-danger">(requried)</small></label>
                                    <input type="text" class="form-control" name="title" id="" placeholder="Slider Title"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image <small class="text-danger">(requried)</small></label>
                                    <input type="file" class="form-control" name="image" id="" placeholder="Slider Image"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="">Button Text</label>
                                    <input type="text" class="form-control" name="button_text" id=""
                                        placeholder="Slider Button Text">
                                </div>
                                <div class="form-group">
                                    <label for="link">Button Link</label>
                                    <input type="url" class="form-control" name="button_link" id=""
                                        placeholder="Slider Button Link">
                                </div>
                                <div class="form-group">
                                    <label for="priority">Priority </label>
                                    <input type="number" class="form-control" name="priority" id="priority"
                                        placeholder="Priority" value="10" required>
                                </div>
                                <button type="submit" class="btn btn-danger">Add New</button>
                            </form>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-hover table-striped">
                <tr>
                    <th>#</th>
                    <th>Slider Title</th>
                    <th>Slider Image</th>
                    <th>Slider Priority</th>

                    <th style="">Action</th>
                </tr>
                @foreach ($sliders as $slider)
                    <tr>


                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $slider->title }}</td>

                        <td><img src="{{ asset('images/' . $slider->image) }}" alt="" width="50"></td>
                        <td>{{ $slider->priority }}</td>
                        {{-- <td>{{ $district->parent->name }}</td> --}}
                        {{-- <td>{{ $district->quantity }}</td> --}}
                        <td><a href="#editModal{{ $slider->id }}" class="btn btn-success" data-toggle="modal">Edit</a>

                            <a href="#deleteModal{{ $slider->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>


                            <div class="modal fade" id="deleteModal{{ $slider->id }}" tabindex="-1" role="dialog"
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
                                            <form action="{{ route('admin.slider.delete',$slider->id) }}" method="POST">
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
                            <div class="modal fade" id="editModal{{ $slider->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add New Slider
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group">
                                                    <label for="title">Title <small
                                                            class="text-danger">(requried)</small></label>
                                                    <input type="text" class="form-control" name="title" id=""
                                                        placeholder="Slider Title" required value="{{ $slider->title }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Old Image</label><br>

                                                    <img src="{{ asset('images/' . $slider->image) }}" width="100"> <br>
                                                    <div class="row">

                                                        <label>New image</label>
                                                        <div class="input-group col-xs-12">
                                                            <input type="file" name="image"
                                                                class="form-control file-upload-info"
                                                                placeholder="Upload Image">

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Button Text</label>
                                                        <input type="text" class="form-control" name="button_text" id=""
                                                            placeholder="Slider Button Text"
                                                            value="{{ $slider->button_text }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="link">Button Link</label>
                                                        <input type="url" class="form-control" name="button_link" id=""
                                                            placeholder="Slider Button Link"
                                                            value="{{ $slider->button_link }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="priority">Priority </label>
                                                        <input type="number" class="form-control" name="priority"
                                                            id="priority" placeholder="Priority" required
                                                            value="{{ $slider->priority }}">
                                                    </div>
                                                    <button type="submit" class="btn btn-danger">Update</button>
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
