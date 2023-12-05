@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                
                @include('auth.profile')      
            </div>
        </div>
    </div>    
</div>
    
@endsection