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
                <a  class="btn btn-sm btn-outline-primary edit" data-id="{{$user->id}}">Edit</a>
                <a class="btn btn-sm btn-outline-danger delete" data-id="{{$user->id}}">Delete</a>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>