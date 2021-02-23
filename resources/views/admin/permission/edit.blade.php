<x-admin-master>
    @section('content')
        <div class="container-fluid">
            <br>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="card mb-4 w-100">
                        <div class="card-header">
                            <h3><i class="fas fa-edit"></i> {{$permission->name}}</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('permission.update', $permission->id)}}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="helpId" value="{{$permission->name}}">
                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
</x-admin-master>
