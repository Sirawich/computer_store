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
                                <th>Code</th>
                                <th>สมาชิกเจ้าของ</th>
                                <th>ชื่อสินค้า</th>
                                <th>ลักษณะอาการ</th>
                                <th>วันที่</th>
                                <th>สถานะ</th>
                                <th>ค่าบริการ</th>
                                <th>หมายเหตุ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trackings as $tracking)
                                <td>{{$tracking->id}}</td>
                                <td>{{$tracking->code}}</td>
                                <td>{{$tracking->user->name}}</td>
                                <td>{{$tracking->product}}</td>
                                <td>{{str_limit($tracking->detail,50)}}</td>
                                <td>{{$tracking->created_date}}</td>
                                <td>{{$tracking->status}}</td>
                                <td>{{$tracking->price}}</td>
                                <td>{{$tracking->note}}</td>
                                <td class="row"><a href="{{route('promotion.edit',$tracking->id)}}" class="btn btn-warning mr-2">Edit</a>
                                    <form action="{{route('promotion.destroy',$tracking->id)}}" method="post">
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
                            {{$trackings->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    </div>
@endsection