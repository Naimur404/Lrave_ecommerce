@extends('layouts.fontend.master')

@include('partial.navbar')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="" class="list-group-item">

                        @if (!is_null(Auth::user()->avatar))
                            <img src="{{ asset('images/' . Auth::user()->avatar) }}" style="width: 80px"
                                class="img rounded-circle">
                        @elseif (Gravatar::exists(Auth::user()->email))
                            <img src="{{ Gravatar::src(Auth::user()->email, 100) }}" style="width: 80px"
                                class="img rounded-circle">
                        @else
                            <img src="{{ asset('images/user.png') }}" style="width: 80px" class="img rounded-circle">
                        @endif


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
