<x-admin-master>
    @section('content')
        <div class="container-fluid  mt-1">
            <br>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                <div class="card mb-4 w-100">
                    <div class="card-header">
                        <i class="fas fa-edit"></i> User Profile for {{$user->name}} <span class="float-right"><a name="" id="" class="btn btn-success btn-sm"
                                                           data-toggle="modal" data-target="#changePasswordModel"
                                                           role="button">Change Password</a></span>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Username</td>
                                <td>{{$user->username}}</td>
                                <td><a name="" id="" class="btn btn-success btn-sm"
                                       data-toggle="modal" data-target="#changeUsernameModel"
                                       role="button"><i class="fas fa-edit"></i></a></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{$user->name}}</td>
                                <td><a name="" id="" class="btn btn-success btn-sm"
                                       data-toggle="modal" data-target="#changeNameModel"
                                       role="button"><i class="fas fa-edit"></i></a></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$user->email}}</td>
                                <td><a name="" id="" class="btn btn-success btn-sm"
                                       data-toggle="modal" data-target="#changeEmailModel"
                                       role="button"><i class="fas fa-edit"></i></a></td>
                            </tr>
                            </tbody>
                            <tr>
                                <td>Role</td>
                                <td>@foreach ($user->roles as $user_role)
                                        @if ($user_role->slug == $user_role->slug)
                                           {{$user_role->name}}
                                        @endif
                                    @endforeach</td>
                                <td><a name="" id="" class="btn btn-success btn-sm"
                                       data-toggle="modal" data-target="#changeRoleModel"
                                       role="button"><i class="fas fa-edit"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <!-- Change Password Modal-->
        <div class="modal fade" id="changePasswordModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Password?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('user.update.password',$user->id)}}" method="post" class="form-horizontal">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="currentpassword" class="col-form-label col-sm-3">Current Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control @error('currentpassword') is-invalid @enderror" name="currentpassword" id="currentpassword" placeholder="" autocomplete="off">
                                    @error('currentpassword')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="newpassword" class="col-form-label col-sm-3">New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control @error('newpassword') is-invalid @enderror" name="newpassword" id="newpassword" placeholder="" autocomplete="off">
                                    @error('newpassword')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_confirmation" class="col-form-label col-sm-3">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary float-right">Update Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Change Username Modal-->
        <div class="modal fade" id="changeUsernameModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Username?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('user.update.username',$user->id)}}" method="post" class="form-horizontal">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="username" class="col-form-label col-sm-3">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" aria-describedby="helpId" placeholder="Enter your username" value="{{$user->username}}">
                                    @error('username')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary float-right">Update Username
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Change Name Modal-->
        <div class="modal fade" id="changeNameModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Name?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('user.update.name',$user->id)}}" method="post" class="form-horizontal">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-form-label col-sm-3">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="helpId" placeholder="Enter your name" value="{{$user->name}}">
                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary float-right">Update Name
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Change Email Modal-->
        <div class="modal fade" id="changeEmailModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Email?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('user.update.email',$user->id)}}" method="post" class="form-horizontal">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="email" class="col-form-label col-sm-3">Name</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="helpId" placeholder="Enter your e-mail" value="{{$user->email}}">
                                    @error('email')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary float-right">Update E-mail Address
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Change Role Modal-->
        <div class="modal fade" id="changeRoleModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Role?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('user.update.role',$user->id)}}" method="post" class="form-horizontal">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="role" class="col-form-label col-sm-3">Name</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="role" id="role">
                                        @foreach ($user->roles as $user_role)
                                            @if ($user_role->slug == $user_role->slug)
                                                <option value="{{$user_role->id}}">{{$user_role->name}}</option>
                                            @endif
                                        @endforeach
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary float-right">Update Role
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection
</x-admin-master>
