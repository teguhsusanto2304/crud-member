@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @elseif ($message = Session::get('errors'))
                <div class="alert alert-error">
                    {{ $message }}
                </div>
            @else
                    <div class="alert alert-success">
                        You are logged in!
                    </div>       
                @endif   
                @if($isAdmin==true)
                <a class="btn btn-primary" href="{{ route('add') }}">Add New User</a>
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col" width="5%">Avatar</th>
                        <th scope="col" width="45%">Name</th>
                        <th scope="col" width="50%">Email</th>
                        <th scope="col" width="5%">Member</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                        @php $i=1; @endphp
                        @foreach ($users as $row)
                        <tr>
                            <th scope="row"><img width="50px" height="50px" class="rounded-circle" src="{{ url('/public/images/'.(empty($row->image_path)?'default.png':$row->image_path)) }}"></th>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{ ($row->is_admin)?'Admin':'Member'}}</td>
                            <td>
                                <form action="{{ route('destroy',$row->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')  
                                <div class="btn-group">
                                <a class="btn btn-info" href="{{ route('profile',['id'=>$row->id]) }}">View</a>
                                <a class="btn btn-warning" href="{{ route('edit',['id'=>$row->id]) }}" >Edit</a>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                </div>
                            </form>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>     
                @else
                @include('auth.profile')
                @endif        
            </div>
        </div>
    </div>    
</div>
    
@endsection