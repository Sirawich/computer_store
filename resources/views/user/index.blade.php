@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">  
                <div class="d-flex align-item-center">
                        <h2>ALL User</h2>
                        <div class="ml-auto">
                            <a href="{{route('user.create')}}" class="btn btn-outline-secondary">Create User</a> 
                        </div>
                    </div> </div>
<div class="card-body">  
@include('user._message')
<table class="table table-striped border">
    <thead>
      <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>State</th>
        <th>Role</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <td>{{$user['id']}}</td>
        <td>{{$user['email']}}</td>
        <td>{{$user['name']}}</td>
        <td>{{$user['phone']}}</td>
        <td>{{$user['address']}}</td>
        <td>{{$user['state']}}</td>
        <td>{{$user['role_id']}}</td>
        <td class="row"><a href="{{route('user.edit',$user->id)}}" class="btn btn-warning mr-2">Edit</a>
          <form action="{{route('user.destroy',$user->id)}}" method="post">
           @method('DELETE')
           @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit" onClick="return confirm('Are you sure?')">Delete</button>
          </form></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  <div class ="row">
      <div class="mx-auto">
        {{$users->links()}}
      </div>
    </div>
  </div>
  </div>
  </div>
  
  </div>


  </div>
@endsection