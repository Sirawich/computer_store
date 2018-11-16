@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-item-center">
                            <h2>ALL Promotion</h2>
                            <div class="ml-auto">
                                <a href="{{route('promotion.create')}}" class="btn btn-outline-secondary">Create Promotion</a>
                            </div>
                        </div> </div>
                    @include('user._message')
                    <div class="card-body">
                        <table class="table table-striped border">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Detail</th>
                                <th>View</th>
                                <th>User</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($promotions as $promotion)
                                <td>{{$promotion->id}}</td>
                                <td><a href="{{ $promotion->url }}">{{$promotion->title}}</a></td>
                                <td>{{str_limit($promotion->body,100)}}</td>
                                <td>{{$promotion->views}}</td>
                                <td>{{$promotion->user->name}}</td>
                                <td>{{$promotion->created_at}}</td>
                                <td>{{$promotion->updated_at}}</td>
                                <td class="row"><a href="{{route('promotion.edit',$promotion->id)}}" class="btn btn-warning mr-2">Edit</a>
                                    <form action="{{route('promotion.destroy',$promotion->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit" onClick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class ="row">
                        <div class="mx-auto">
                            {{$promotions->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    </div>
@endsection