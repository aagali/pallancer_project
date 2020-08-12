@extends('layouts.front')
@section('content')
<hr />
<h1 style="display: inline-block;">Users</h1>
<button data-toggle="modal" data-target="#myModal" class="btn btn-primary float-right">Add Users</button>
<hr />

<table class="table table-bordered" id="users">
    <thead>
        <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->firstName}}</td>
            <td>{{$user->lastName}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>
            <a class="btn btn-sm btn-outline-primary edit" data-id="{{$user->id}}">Edit</a>
                <a class="btn btn-sm btn-outline-danger delete" data-id="{{$user->id}}">Delete</a>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="addUserForm">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-4 col-form-label">First Name</label>
                        <div class="col-8">
                            <input id="name" name="firstName" placeholder="firstName" class="form-control here"
                                type="text" value="{{old('firstName')}}" />
                            @error('firstName')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-4 col-form-label">Last Name</label>
                        <div class="col-8">
                            <input id="title" name="lastName" placeholder="lastName" class="form-control here"
                                type="text" value="{{old('lastName')}}" />
                            @error('lastName')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-4 col-form-label">Email</label>
                        <div class="col-8">
                            <input id="subTitle" name="email" placeholder="email" class="form-control here" type="email"
                                value="{{old('email')}}" />
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="time" class="col-4 col-form-label">Phone</label>
                        <div class="col-8">
                            <input id="price" name="phone" placeholder="phone" class="form-control here" type="number"
                                value="{{old('phone')}}" />
                            @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="time" class="col-4 col-form-label">Phone</label>
                        <div class="col-8">
                            <input id="price" name="password" placeholder="password" class="form-control here" type="password"
                                 />
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="add"  type="button" class="btn btn-primary">
                            Save
                        </button>
                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
  
                    </div>
                </form>
            </div>

            <!-- Modal footer -->

        </div>
    </div>
</div>
<div id="editModel"></div>
@endsection
