<x-admin-master>
    @section('content')
        <div class="container-fluid  mt-1">
            <div class="row">
                <div class="card mb-4 w-100">
                    <div class="card-header">
                        <i class="fas fa-trash"></i>
                        Deleted Users
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Hotel Name</th>
                                    <th>Deleted</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($hotels as $hotel)
                                    <tr>
                                        <td>{{$hotel->name}}</td>
                                        <td>{{date('d M y, H:i:s', strtotime($hotel->deleted_at))}} by
                                            {{$hotel->deleted_by}}
                                        </td>
                                        <td>
                                            <a name="" id="" class="btn btn-primary btn-block" href="{{route('hotel.restore', $hotel)}}" role="button"><i class="fas fa-trash-restore"></i> Restore</a>

                                        </td>
                                        <td>
                                            <a name="" id="" class="btn btn-danger btn-block" href="{{route('hotel.erase', $hotel)}}" role="button"><i class="fas fa-trash-alt"></i> Erase!</a>

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
    @endsection
</x-admin-master>
