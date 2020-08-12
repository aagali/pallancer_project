@extends('layouts.front')
@section('stylecss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.min.css"/>
@endsection
@section('content')
<br />
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <h4>Edit Product</h4>
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{route('product.update',$product->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label for="name" class="col-4 col-form-label">Name</label>
                        <div class="col-8">
                            <input id="name" name="name" placeholder="name" class="form-control here" type="text"
                                value="{{old('name', $product->name)}}" />
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-4 col-form-label">Title</label>
                        <div class="col-8">
                            <input id="title" name="title" placeholder="title" class="form-control here" type="text"
                                value="{{old('title',$product->title)}}" />
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-4 col-form-label">SubTitle</label>
                        <div class="col-8">
                            <input id="subTitle" name="suptitle" placeholder="subTitle" class="form-control here"
                                type="text" value="{{old('suptitle',$product->suptitle)}}" />
                            @error('suptitle')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="time" class="col-4 col-form-label">Price</label>
                        <div class="col-8">
                            <input id="price" name="price" placeholder="price" class="form-control here" type="number"
                                value="{{old('price',$product->price)}}" />
                            @error('price')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-4 col-form-label">Description</label>
                        <div class="col-8">
                        <input id="x" type="hidden" name="description" value="{{old('description' , $product->description)}}">
                            <trix-editor input="x"></trix-editor>
                            @error('description')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="time" class="col-4 col-form-label">Image Online URL</label>
                        <div class="col-8">
                            <input id="image" name="img" placeholder="Image Online URL" class="form-control here"
                                 type="file" />
                                 @if ($product->img)
                                 <img src="{{asset('storage/'. $product->img)}}" height="200" alt="">
                                 @endif
                            @error('img')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">
                                Save
                            </button>
                            <a class="btn btn-outline-success " href="{{route('product.index')}}">back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.js"></script>
@endsection
