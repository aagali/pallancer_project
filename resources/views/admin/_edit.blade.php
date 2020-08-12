<div class="modal" id="editModel">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <form id="editUserForm" data-id="{{$user->id}}">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label for="name" class="col-4 col-form-label">First Name</label>
                        <div class="col-8">
                            <input id="name" name="firstName" placeholder="firstName" class="form-control here"
                                type="text" value="{{$user->firstName}}" />
                            @error('firstName')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-4 col-form-label">Last Name</label>
                        <div class="col-8">
                            <input id="title" name="lastName" placeholder="lastName" class="form-control here"
                                type="text" value="{{$user->lastName}}" />
                            @error('lastName')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-4 col-form-label">Email</label>
                        <div class="col-8">
                            <input id="subTitle" name="email" placeholder="email" class="form-control here" type="email"
                                value="{{$user->email}}" />
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="time" class="col-4 col-form-label">Phone</label>
                        <div class="col-8">
                            <input id="price" name="phone" placeholder="phone" class="form-control here" type="number"
                                value="{{$user->phone}}" />
                            @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="time" class="col-4 col-form-label">Password</label>
                        <div class="col-8">
                            <input id="price" name="password" placeholder="password" class="form-control here"
                                type="password" />
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button  id="edit" id="add" type="button" class="btn btn-primary">
                            Save
                        </button>
                        <button  type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>

            <!-- Modal footer -->

        </div>
    </div>
</div>
<script>
 /*
    $('#edit').click(function(){
        var data = $('#editUserForm').serialize();
        var id = $('#editUserForm').data('id')
         $.post(`/admin/users/${id}` , data).done(function(data){
        console.log(data);
         })
    })*/
</script>