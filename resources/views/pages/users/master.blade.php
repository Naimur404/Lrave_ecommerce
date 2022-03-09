@extends('layouts.fontend.master')

@include('partial.navbar')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                  
                    <a href="" class="list-group-item">



                    </a>
                    <a href="{{ route('user.dashboard') }}" class="list-group-item {{ Route::is('user.dashboard') ? 'active' : ''}}">Dashboard</a>
                    <a href="{{ route('user.profile') }}" class="list-group-item">Update profile</a>
                    <a href="" class="list-group-item">logout</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card card-body">
                    @yield('sub-content')
                </div>

            </div>
        </div>
    </div>
@endsection
