@extends('layouts.front')
@section('content')
<div class="card mb-3">
    <h3 class="card-header">{{$product->name}}</h3>
    <div class="card-body">
        <h5 class="card-title">{{$product->title}}</h5>
        <h6 class="card-subtitle text-muted">{{$product->suptitle}}</h6>
    </div>
    <img style="display: block;" src="{{asset('storage/'. $product->img)}}" width="300" height="200px"
        alt="Card image" />
    <div class="card-body">
        <p class="card-text">{!!$product->description!!}</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">{{$product->price}}</li>
    </ul>
    
</div>

@endsection
