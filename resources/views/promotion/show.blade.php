@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-item-center">
                            <h2>{{$promotion->title}}</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! $promotion->body_html !!}
                        <div class="float-right">
                            <span class="text-muted"> {{$promotion->created_date}}</span>
                            <div class="media mt-2">
                                <a href="{{$promotion->user->url}}" class="pr-2">
                                    <img src="{{$promotion->user->avatar}}">
                                </a>
                                <div class="media-body mt-1">
                                    <a href="{{$promotion->user->url}}">{{$promotion->user->name}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
