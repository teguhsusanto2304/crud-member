@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">Register</div>
            <div class="card-body">
                <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label for="image_path" class="col-md-4 col-form-label text-md-end text-start">Avatar</label>
                        <div class="col-md-6">
                          <input type="file" accept="image/*" class="form-control @error('image_path') is-invalid @enderror" id="image_path" name="image_path" value="{{ old('image_path') }}">
                            @if ($errors->has('image_path'))
                                <span class="text-danger">{{ $errors->first('image_path') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email Address</label>
                        <div class="col-md-6">
                          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="date_of_birth" class="col-md-4 col-form-label text-md-end text-start">Date of birth</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
                            @if ($errors->has('date_of_birth'))
                                <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gender" class="col-md-4 col-form-label text-md-end text-start">Gender</label>
                        <div class="col-md-6">
                          <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" value="{{ old('gender') }}">
                            <option value="">Choose Gender</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                          </select>
                            @if ($errors->has('gender'))
                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="phone_number" class="col-md-4 col-form-label text-md-end text-start">Phone Number</label>
                        <div class="col-md-3">
                          <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
                            @if ($errors->has('phone_number'))
                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ic_number" class="col-md-4 col-form-label text-md-end text-start">Identity Card Number</label>
                        <div class="col-md-4">
                          <input type="number" class="form-control @error('ic_number') is-invalid @enderror" id="ic_number" name="ic_number" value="{{ old('ic_number') }}">
                            @if ($errors->has('ic_number'))
                                <span class="text-danger">{{ $errors->first('ic_number') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                        <div class="col-md-6">
                          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password_confirmation" class="col-md-4 col-form-label text-md-end text-start">Confirm Password</label>
                        <div class="col-md-6">
                          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Register">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection