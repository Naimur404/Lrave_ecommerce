@extends('pages.users.master')

@section('sub-content')


            <div class="card-body">
                <form method="POST" action="{{ route('user.profile.update') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                        <div class="col-md-6">
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                                name="first_name" value="{{ $user->first_name }}" required autocomplete="first_name" autofocus>

                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                                name="last_name" value="{{ $user->last_name}}" required autocomplete="last_name" autofocus>

                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('username') }}</label>

                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control @error('username') is-invalid @enderror"
                                name="username" value="{{ $user->username}}" required autocomplete="last_name" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone_no"
                            class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                        <div class="col-md-6">
                            <input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror"
                                name="phone_no" value="{{ $user->phone_no}}" required >

                            @error('phone_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $user->email}}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                     <div class="row mb-3">
                        <label for="street_address"
                            class="col-md-4 col-form-label text-md-end">{{ __('Street Address') }}</label>

                        <div class="col-md-6">
                            <input id="street_address" type="text" class="form-control @error('street_address') is-invalid @enderror"
                                name="street_address" value="{{ $user->street_address }}" required >

                            @error('street_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>




                    <div class="row mb-3">
                        <label for="division_id"
                            class="col-md-4 col-form-label text-md-end">{{ __('Division') }}</label>

                        <div class="col-md-6">
                            <select name="division_id" id="" class="form-control">
                                <option value="">Select your Divison</option>
                                @foreach ($divisions as $division)
                                <option value="{{ $division->id }}"{{ $user->division_id == $division->id  ? 'selected' : '' }}>{{ $division->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="district_id"
                            class="col-md-4 col-form-label text-md-end">{{ __('District') }}</label>

                        <div class="col-md-6">
                            <select name="district_id" id="" class="form-control">
                                <option value="">Select your District</option>
                                @foreach ($districts as $district)
                                <option value="{{ $district->division->id }}" {{ $user->district_id == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>












                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Profile') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
@endsection
