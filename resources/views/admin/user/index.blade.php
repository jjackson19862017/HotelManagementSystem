<x-admin-master>
    @section('content')
    <div class="container-fluid mt-1">
        <div class="row">
            <div class="card mb-4 w-100">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Users <span class="float-right"><a name="" id="" class="btn btn-success btn-sm"
                        data-toggle="modal" data-target="#addUserModal"
                        role="button">Create User</a></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td><a href="{{route('user.profile.show',$user->id)}}"><i class="fas fa-edit"></i> {{$user->username}}</a></td>
                                        <td>{{$user->name}} - {{$user->last_login_at}}</td>
                                        <td><a href="mailto:{{$user->email}}">{{$user->email}}</td>
                                        @method('DELETE')
                                            <td>
                                                <form action="{{route('user.destroy', $user->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fas fa-user-times"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add User Modal-->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add User?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span></span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('user.store')}}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="username" class="col-form-label col-sm-3">Username</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                name="username" id="username" aria-describedby="helpId"
                                placeholder="Enter username" value="{{old('username')}}">
                        @error('username')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-form-label col-sm-3">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" id="name" aria-describedby="helpId" placeholder="Enter Name"
                                value="{{old('name')}}">
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-form-label col-sm-3">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" aria-describedby="helpId" placeholder="Enter Email"
                                value="{{old('email')}}">
                        @error('email')
                        <div class=" invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-form-label col-sm-3">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="password" placeholder="" autocomplete="off">
                        @error('password')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password_confirmation" class="col-form-label col-sm-3">Confirm Password</label>
                    <div class="col-sm-9">
                        <input type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" id="password_confirmation" placeholder="">
                        @error('password_confirmation')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="role" class="col-form-label col-sm-3">Name</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="role" id="role">
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr>
                <button type="submit"
                        @if (Session::has('message'))
                        class="btn btn-success float-right">{{Session::get('message')}}
                    @else
                        class="btn btn-primary float-right">Create User
                    @endif
                </button>
            </form>
        </div>
    </div>
    </div>
</div>
    @endsection
</x-admin-master>
