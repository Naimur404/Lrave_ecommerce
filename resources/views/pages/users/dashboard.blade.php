
@extends('pages.users.master')
@section('sub-content')
<div class="container">
<h2>Welcome {{ $user->first_name . ' ' . $user->last_name }}</h2>
<div class="row">
    <div class="col-md-4">
        <div class="card card-body mt-2 pointer" onclick="location.href = '{{ route('user.profile') }}'">
Update Profile
        </div>
    </div>
</div>
</div>

@endsection
