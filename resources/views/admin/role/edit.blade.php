<x-admin-master>
    @section('content')
        <div class="container-fluid">
            <br>
            <div class="row">
                <div class="card mb-4 w-100">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        {{$role->name}} Role <span class="float-right"><a name="" id="" class="btn btn-success btn-sm"
                                                           data-toggle="modal" data-target="#editRoleModel"
                                                           role="button">Edit {{$role->name}} - Role</a></span>
                    </div>
                    <div class="card-body">
                        @if(!$permissions->isEmpty())
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{$permission->id}}</td>
                                        <td class="
                                            @if ($role->permissions->contains($permission))
                                            alert alert-success
                                                @else
                                            alert alert-danger
                                            @endif">
                                            {{$permission->name}}</td>
                                        <td>@if (!$role->permissions->contains($permission))
                                                <form action="{{route('role.permission.attach', $permission->id)}}" method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="hidden" name="permission" id="permission" value="{{$role->id}}">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Attach</button>
                                                </form>
                                            @else
                                                <form action="{{route('role.permission.detach', $permission->id)}}" method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="hidden" name="permission" id="permission" value="{{$role->id}}">
                                                    </div>
                                                    <button type="submit" class="btn btn-danger">Detach</button>
                                                </form>
                                            @endif</td>
                                        <td> <form action="{{route('role.permission.detach', $permission->id)}}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="permission" id="permission" value="{{$role->id}}">
                                                </div>
                                                <button type="submit" class="btn btn-danger">Detach</button>
                                            </form></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <h3>No Data to display</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Role Modal-->
        <div class="modal fade" id="editRoleModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Role?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('role.update', $role->id)}}" method="post" class="form-horizontal">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="name" class="col-form-label col-sm-3">Role Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" id="name" aria-describedby="helpId"
                                           value="{{$role->name}}">
                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary float-right">Edit Role
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-admin-master>
