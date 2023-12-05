@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">Edit Admin</div>
            <div class="card-body">
                <form action="{{ route('update-admin',['id'=>$user->id]) }}" method="post" >
                    @method('PUT')
                    @csrf
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    @if($user->is_admin==false)
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
                          <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" >
                            <option value="">Choose Gender</option>
                            <option value="Pria" {{ ($user->gender=='Pria')?'selected':'' }}>Pria</option>
                            <option value="Wanita" {{ ($user->gender=='Wanita')?'selected':'' }} >Wanita</option>
                          </select>
                            @if ($errors->has('gender'))
                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="phone_number" class="col-md-4 col-form-label text-md-end text-start">Phone Number</label>
                        <div class="col-md-3">
                          <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ $user->phone_number }}">
                            @if ($errors->has('phone_number'))
                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ic_number" class="col-md-4 col-form-label text-md-end text-start">Identity Card Number</label>
                        <div class="col-md-4">
                          <input type="number" class="form-control @error('ic_number') is-invalid @enderror" id="ic_number" name="ic_number" value="{{ $user->ic_number }}">
                            @if ($errors->has('ic_number'))
                                <span class="text-danger">{{ $errors->first('ic_number') }}</span>
                            @endif
                        </div>
                    </div>
                    @endif
                    <div class="mb-3 row">
                        <a href="{{ route('dashboard') }}">Back</a>&nbsp;<input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection