@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-item-center">
                            <h2>Edit Promotion</h2>
                            <div class="ml-auto">
                                <a href="{{route('promotion.index')}}" class="btn btn-outline-secondary">Back to all promotion</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('promotion.update',$promotion->id)}}" method="post">
                            {{method_field('PUT')}}
                            @include('promotion._form',['buttonText'=>"Update"])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
