<x-admin-master>
    @section('content')
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="card mb-4 w-100">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Hotels <span class="float-right"><a name="" id="" class="btn btn-success btn-sm"
                        data-toggle="modal" data-target="#addHotelModel"
                        role="button">Create Hotel</a></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Rooms</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($hotels as $hotel)
                                    <tr>
                                        <td><a class="btn btn-link"
                                               href="{{route('hotel.edit', $hotel->id)}}"
                                               role="button"><i class="fas fa-edit"></i> {{$hotel->name}}</a></td>
                                        <td>{{$hotel->telephone}}<br>
                                            <a href="mailto:{{$hotel->email}}">{{$hotel->email}}</a><br>
                                            <a href="http://{{$hotel->website}}" target="_blank">{{$hotel->website}}</a>
                                        </td>
                                        <td>{{$hotel->address}},<br>{{$hotel->town}},<br>{{$hotel->county}},<br>{{$hotel->postcode}}</td>
                                        <td>{{$hotel->numberOfRooms}}</td>



                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Hotel Modal-->
<div class="modal fade" id="addHotelModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Hotel?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span></span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('hotel.store')}}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-form-label col-sm-3">Hotel Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" id="name" aria-describedby="helpId"
                                placeholder="Enter Hotel Name" value="{{old('name')}}">
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telephone" class="col-form-label col-sm-3">Telephone</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('telephone') is-invalid @enderror"
                                name="telephone" id="telephone" aria-describedby="helpId" placeholder="Enter Telephone Number"
                                value="{{old('telephone')}}">
                        @error('telephone')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-form-label col-sm-3">Street Address</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                                id="address" aria-describedby="helpId" placeholder="Enter address"
                                value="{{old('address')}}">
                        @error('address')
                        <div class=" invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="town" class="col-form-label col-sm-3">Town</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('town') is-invalid @enderror" name="town"
                                id="town" aria-describedby="helpId" placeholder="Enter town"
                                value="{{old('town')}}">
                        @error('town')
                        <div class=" invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="county" class="col-form-label col-sm-3">County</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('county') is-invalid @enderror" name="county"
                                id="county" aria-describedby="helpId" placeholder="Enter county"
                                value="{{old('county')}}">
                        @error('county')
                        <div class=" invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="postcode" class="col-form-label col-sm-3">Post-Code</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('postcode') is-invalid @enderror" name="postcode"
                                id="postcode" aria-describedby="helpId" placeholder="Enter postcode"
                                value="{{old('postcode')}}">
                        @error('postcode')
                        <div class=" invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="website" class="col-form-label col-sm-3">Website</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('website') is-invalid @enderror" name="website"
                                id="website" aria-describedby="helpId" placeholder="Enter website"
                                value="{{old('website')}}">
                        @error('website')
                        <div class=" invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-form-label col-sm-3">E-Mail</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" aria-describedby="helpId" placeholder="Enter email"
                                value="{{old('email')}}">
                        @error('email')
                        <div class=" invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="numberOfRooms" class="col-form-label col-sm-3">Number Of Rooms</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control @error('numberOfRooms') is-invalid @enderror" name="numberOfRooms"
                                id="numberOfRooms" aria-describedby="helpId" placeholder="How many rooms in the Hotel?"
                                value="{{old('numberOfRooms')}}">
                        @error('numberOfRooms')
                        <div class=" invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                <button type="submit"
                        @if (Session::has('message'))
                        class="btn btn-success float-right">{{Session::get('message')}}
                    @else
                        class="btn btn-primary float-right">Create Hotel
                    @endif
                </button>
            </form>
        </div>
    </div>
    </div>
</div>
    @endsection
</x-admin-master>
