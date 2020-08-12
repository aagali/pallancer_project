@extends('layouts.front')
@section('content')

<div class="row" id="products">
    @foreach ($product as $pro)
    <div class="col-3">
        <div class="card mb-3">
            <h3 class="card-header">{{$pro->name}}</h3>
            <div class="card-body">
                <h5 class="card-title">{{$pro->title}}</h5>
                <h6 class="card-subtitle text-muted">{{$pro->suptitle}}</h6>
            </div>
            <img style="height: 200px; width: 100%; display: block;" src="{{asset('storage/'. $pro->img)}}"
                alt="Card image" />
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{$pro->price}}</li>
            </ul>
            <div class="card-body">

            <form class="d-inline-block" action="{{route('cart.store')}}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{$pro->id}}">

                <button type="submit" class="btn btn-primary ">
                    Add to cart
                </button>
            </form>
                <a href="show/{{$pro->id}}" class="btn btn-outline-primary float-right">
                    View
                </a>
            </div>
        </div>
    </div>

    @endforeach

</div>
@endsection
