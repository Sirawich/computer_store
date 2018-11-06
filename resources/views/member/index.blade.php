@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>State</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="row"><a href="" class="btn btn-warning mr-2">Edit</a>  <form action="" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form></td>
      </tr>

    </tbody>
  </table>
  </div>
@endsection