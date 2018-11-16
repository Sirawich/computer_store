@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-item-center">
                            <h2>Create Promotion</h2>
                            <div class="ml-auto">
                                <a href="{{route('promotion.index')}}" class="btn btn-outline-secondary">Back to all promotion</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('promotion.store')}}" method="post">
                            @include('promotion._form',['buttonText'=>"Create"])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
