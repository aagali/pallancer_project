@extends('layouts.front')
@section('content')
<hr />
<h1 style="display: inline-block;">Products</h1>
<a href="{{route('product.create')}}" class="btn btn-success float-right">
    Add Product
</a>
<hr />
@if (session()->has('succsess'))
<div class="alert alert-success">
    {{ session('succsess') }}
</div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Title</th>
            <th scope="col">SubTitle</th>
            <th scope="col">Price</th>
            <th scope="col" style="width: 350px;">Image</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->title}}</td>
            <td>{{$product->suptitle}}</td>
            <td>{{$product->price}}</td>
            <td><img width="100" src="{{asset('storage/'. $product->img)}}" alt="img"></td>
            <td>
                <a href="{{route('product.edit' , $product->id)}}" class="btn btn-outline-primary">Edit</a>
                <form class="d-inline-block" method="POST" action="{{route('product.destroy' , $product->id)}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
{{ $products->links() }}


@endsection
