<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>shoping</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.min.css">
    @yield('stylecss')
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="{{route('index')}}">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="{{route('product.index')}}" class="nav-link">Products</a></li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <input id="search" class="form-control mr-sm-2 ml-15" type="text" placeholder="Search" />
                <a href="{{route('cart.index')}}" class="p-car" style="color:black">
                    <span class="material-icons md-48 ">shopping_cart</span>
                    @guest
                    <span class="badge badge-light bg-secondary">0</span>
                    @else
                    <span class="badge badge-light bg-secondary">{{Auth::user()->products()->sum('count')}}</span>
                    @endguest
                </a>
                @guest
                <a href="{{route('register')}}" class="btn btn-secondary my-2 my-sm-0 ml-4">Sign up</a>
                <a href="{{route('login')}}" class="btn btn-secondary my-2 my-sm-0 ml-2">Login</a>
                @else
                <a href="{{route('profile.index')}}" class="btn btn-secondary my-2 my-sm-0 ml-4">Profile</a>
                <a href="{{route('logout')}}" class="btn btn-secondary my-2 my-sm-0 ml-2">LogOut</a>
                @endguest

            </div>
        </div>
    </nav>

    <div class="container" style="margin-top:100px">
        @yield('content')
        @yield('script')
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">©2020</p>

        </footer>
    </div>
    <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $('#search').keyup(function () {
            var name = $(this).val(),
                token = $('#token').val();
            $.post('/search', {
                name: name,
                _token: token
            }).done(function (data) {
                $('#products').replaceWith(data);
            })
        })
        $('#add').click(function () {
            var data = $('#addUserForm').serialize();
            $.post('/admin/user', data).done(function (data) {
                $('#myModal').modal('hide');
                $('#users').replaceWith(data);
            })
        })

        $('.edit').click(function () {
            var id = $(this).data('id');
            $.get(`/admin/user/${id}/edit`).done(function (data) {
                $('#editModel').replaceWith(data);
                $('#editModel').modal('show');
            })
        })

        $(document).on('click', '#edit', function () {
            var data = $('#editUserForm').serialize();
            var id = $('#editUserForm').data('id')
            $.post(`/admin/user/${id}`, data).done(function (data) {
                $('#users').replaceWith(data);
                $('#editModel').modal('hide');

            })
        })

        $('.delete').click(function () {
            var id = $(this).data('id');
            $.get(`/admin/user/${id}`).done(function (data) {
                $('#deletetModel').replaceWith(data);
            })
        })
    </script>
</body>

</html>
