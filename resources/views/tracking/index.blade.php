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
                                <a href="{{route('tracking.create')}}" class="btn btn-outline-secondary">Create Promotion</a>
                            </div>
                        </div> </div>
                    @include('tracking._message')
                    <div class="card-body">
                        <table class="table table-striped ">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Code</th>
                                <th scope="col">สมาชิกเจ้าของ</th>
                                <th scope="col">ชื่อสินค้า</th>
                                <th scope="col">ลักษณะอาการ</th>
                                <th scope="col">สถานะ</th>
                                <th scope="col">ราคา</th>
                                <th scope="col">หมายเหตุ</th>
                                <th scope="col">วันที่</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trackings as $tracking)
                                <td scope="row">{{$tracking->id}}</td>
                                <td>{{$tracking->code}}</td>
                                <td>{{$tracking->user->name}}</td>
                                <td>{{$tracking->product}}</td>
                                <td>{{str_limit($tracking->detail,50)}}</td>
                                <td>{{$tracking->status}}</td>
                                <td>{{$tracking->price}}</td>
                                <td>{{$tracking->note}}</td>
                                <td >
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#id{{$tracking->id}}">
                                        Click
                                    </button>
                                </td>
                                <td style="padding-right:inherit" ><a href="{{route('tracking.edit',$tracking->id)}}" class="btn btn-warning">Edit</a> </td>
                                    <td>
                                    <form action="{{route('tracking.destroy',$tracking->id)}}" method="post">
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
        @foreach($trackings as $tracking)
        <!-- Modal -->
        <div class="modal fade" id="id{{$tracking->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">สถานะ : {{$tracking->status}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <table class="table table-striped ">
                                <tr>
                                    <th>วันที่่รับเข้าสู่ระบบ : </th>
                                    <td>{{$tracking->created_at}}</td>
                                </tr>
                                <tr>
                                    <th>วันที่่ซ่อมเสร็จสิ้น : </th>
                                    <td>{{$tracking->Complete}}</td>
                                </tr>
                                <tr>
                                    <th>วันที่ลูกค้ามารับ : </th>
                                    <td>{{$tracking->Receive}}</td>
                                </tr>
                                <tr>
                                    <th>วันที่แก้ไขข้อมูล : </th>
                                    <td>{{$tracking->updated_at}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
            @endforeach
    </div>

@endsection