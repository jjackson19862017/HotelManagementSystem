<x-admin-master>
    @section('content')
        <div class="container-fluid">
            <br>
            <div class="row">
                <div class="card mb-4 w-100">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Permissions <span class="float-right"><a name="" id="" class="btn btn-success btn-sm"
                                                           data-toggle="modal" data-target="#addPermissionModel"
                                                           permission="button">Create Permission</a></span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="thead-dark">
                                <tr>
                                    <th class="w-90">Name</th>
                                    <th>Action</th>

                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td><a class="btn btn-link"  href="{{route('permission.edit', $permission->id)}}"
                                               role="button"><i class="fas fa-edit"></i> {{$permission->name}}</a></td>
                                        <td>
                                            <form action="{{route('permission.destroy', $permission->id)}}" method="post">
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

        <!-- Add Permission Modal-->
        <div class="modal fade" id="addPermissionModel" tabindex="-1" permission="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
            <div class="modal-dialog" permission="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Permission?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('permission.store')}}" method="post" class="form-horizontal">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-form-label col-sm-3">Permission Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" id="name" aria-describedby="helpId"
                                           placeholder="Enter Permission Name" value="{{old('name')}}">
                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary float-right">Create Permission
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-admin-master>
