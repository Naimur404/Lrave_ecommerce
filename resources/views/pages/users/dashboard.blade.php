
@extends('pages.users.master')
@section('sub-content')
<div class="container">


<h2>Welcome {{ $user->first_name . ' ' . $user->last_name }}</h2>

@if (!is_null(Auth::user()->avatar))
<img src="{{ asset('images/' . Auth::user()->avatar) }}" style="width: 80px"
    class="img rounded-circle">
@elseif (Gravatar::exists(Auth::user()->email))
<img src="{{ Gravatar::src(Auth::user()->email, 100) }}" style="width: 80px"
    class="img rounded-circle">
@else
<img src="{{  asset('images/user.png') }}" style="width: 80px"
    class="img rounded-circle">
@endif
<div class="row">
    <div class="col-md-4">
        <div class="card card-body mt-2 pointer" onclick="location.href = '{{ route('user.profile') }}'">
Update Profile
        </div>
    </div>
</div>
</div>

@endsection
