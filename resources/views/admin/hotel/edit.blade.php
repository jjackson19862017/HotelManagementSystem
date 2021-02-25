<x-admin-master>
    @section('content')
        <div class="container-fluid">
            <br>
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="card mb-4 w-100">
                        <div class="card-header">
                            <h3><i class="fas fa-edit"></i> {{$hotel->name}}</h3>






                        </div>
                        <div class="card-body">
                            <form action="{{route('hotel.update', $hotel->id)}}" method="post" class="form-horizontal">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="name" class="col-form-label col-sm-3">Hotel Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               name="name" id="name" aria-describedby="helpId"
                                               value="{{$hotel->name}}">
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
                                               value="{{$hotel->telephone}}">
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
                                               value="{{$hotel->address}}">
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
                                               value="{{$hotel->town}}">
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
                                               value="{{$hotel->county}}">
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
                                               value="{{$hotel->postcode}}">
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
                                               value="{{$hotel->website}}">
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
                                               value="{{$hotel->email}}">
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
                                               value="{{$hotel->numberOfRooms}}">
                                        @error('numberOfRooms')
                                        <div class=" invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <hr>

                                <button type="submit" class="btn btn-primary float-right">Edit {{$hotel->name}}
                                </button>
                            </form>
                            <form class="float-left" action="{{route('hotel.destroy', $hotel->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i> Delete {{$hotel->name}}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-admin-master>
