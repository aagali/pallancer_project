@extends('layouts.front')
@section('content')
<div class="row">
    <div class="col-sm-10">
        <h1>Profile</h1>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-sm-12 ml-5">
        <form class="form" action="#" method="post" id="registrationForm">
            <div class="form-group">
                <div class="col-xs-6">
                    <label for="first_name">
                        <h4>First name</h4>
                    </label>
                    <input type="text" class="form-control" name="" id="first_name" placeholder="first name"
                        value="{{$users->firstName}}" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-6">
                    <label for="last_name">
                        <h4>Last name</h4>
                    </label>
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name"
                        value="{{$users->lastName}}" />
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-6">
                    <label for="phone">
                        <h4>Phone</h4>
                    </label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone"
                        value="{{$users->phone}}" />
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-6">
                    <label for="email">
                        <h4>Email</h4>
                    </label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com"
                        value="{{$users->email}}" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-6">
                    <label for="email">
                        <h4>Type</h4>
                    </label>
                    <input type="text" class="form-control" name="type" id="type" 
                        value="{{$users->type}}" />
                </div>
            </div>
        </form>

        <hr />
    </div>
    <!-- /tab-content -->
</div>
@endsection
