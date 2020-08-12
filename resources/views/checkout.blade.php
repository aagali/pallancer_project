@extends('layouts.front')
@section('content')
<div class="py-5 text-center">
    <i class="material-icons"> add_shopping_cart </i>
    <h2>Checkout</h2>
</div>

<div class="row">
    <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">{{Auth::user()->products()->sum('count')}}</span>
        </h4>
        <ul class="list-group mb-3">
            @foreach ($carts as $cart)
            <li class="list-group-item d-flex justify-content-between lh-condensed" *ngFor="let c of cart">
                <div>
                <h6 class="my-0">{{$cart->name}}</h6>
                <small class="text-muted">{{$cart->suptitle}}</small>
                </div>
                <span class="text-muted"> Count({{$cart->pivot->count}})</span>
            <span class="text-muted"> {{$cart->price}}$ </span>
            </li>
            @endforeach

            <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span> <strong>{{$total}}$</strong>
            </li>
        </ul>
    </div>

</div>
@endsection