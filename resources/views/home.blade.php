@extends('layouts.app')
@section('home')
    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid text-white  bg-computer" style="background-color:#696969;">
        <div class="container text-sm-center">
            <h1 class="display-2 font-weight-bold" style="color:black;">Welcome</h1>
            <p class="lead" style="color:black;">ตรวจสินค้าชิ้นดียวผ่าน Code ที่ท่านส่งซ่อม <br>
                หรือตรวจสอบสินค้าหลายชิ้นด้วยการเข้าสู่ระบบ</p>
            <div class="btn-group mt-4" role="group" aria-label="Callout buttons">
                <label class="btn btn-primary btn-lg" for="code">ตรวจสอบผ่าน Code</label>
                @guest <a href="{{route('login')}}"><label class="btn btn-light btn-lg">เข้าสู่ระบบ</label></a>@endguest
            </div>
        </div>
    </div>

    <!-- /Jumbotron -->
    <!--Message-->
    <div class="container ">
        <div class="row">
            <div class="col-lg-5 mx-auto" id="comment-firebase">
                <div class="text-center  mb-3">
                    <h1>Search Product</h1>
                    <h5>Find Product by your code</h5>
                    <hr>
                    <form class="form" action="{{route('home.search')}}" method="get">
                        <div class="input-group">
                            <input type="text" name="code" id="code" class="form-control" size="50" placeholder="Your Code">
                            <span class="input-group-btn">
                        <button type="submit" class="btn btn-danger">SEARCH</button>
                    </span>
                        </div>
                    </form>
                    @if (session('fail'))
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            <strong>Fail!</strong> {{session('fail')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <h1 class="text-center mb-2">Promotion </h1>
        <hr>
        <div class="row mt-3">
            @foreach($promotions as $promotion)
                <div class="col-lg-5 mx-auto mb-2">
                    <a href="{{$promotion->url}}"><h4>{{$promotion->title}}</h4></a>
                    <p>{{str_limit($promotion->body,100)}}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection