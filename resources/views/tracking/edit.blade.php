@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-item-center">
                            <h2>Edit Tracking</h2>
                            <div class="ml-auto">
                                <a href="{{route('tracking.index')}}" class="btn btn-outline-secondary">Back to all tracking</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('tracking.update',$tracking->id)}}" method="post">
                            {{method_field('PUT')}}
                            @include('tracking._form',['buttonText'=>"Update"])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
