<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    public function index()
    {
        $data = [];
        $data['hotels'] = Hotel::all(); // Returns all the data from the Hotels Table
        return view('admin.hotel.index', $data);
    }

    public function store(Request $request)
    {
        request()->validate([
            'name'=> ['required','string'],
            'telephone'=> ['required','string'],
            'address'=> ['required','string'],
            'town'=> ['required','string'],
            'county'=> ['required','string'],
            'postcode'=> ['required','string'],
            'website'=> ['required','string'],
            'email'=> ['required','string'],
            'numberOfRooms'=> ['required','integer'],
        ]);

        // Takes the name input and creates the slug input all in lowercase and changes the spaces for -'s
        Hotel::create([
            'name'=> Str::ucfirst(request('name')),
            'slug'=> Str::of(Str::lower(request('name')))->slug('-'),
            'telephone'=> request('telephone'),
            'address'=> request('address'),
            'town'=> request('town'),
            'county'=> request('county'),
            'postcode'=> request('postcode'),
            'website'=> request('website'),
            'email'=> request('email'),
            'numberOfRooms'=> request('numberOfRooms'),
        ]);

        Role::create([
            'name'=> Str::ucfirst(request('name')),
            'slug'=> Str::of(Str::lower(request('name')))->slug('-'),
        ]);

        $request->session()->flash('message', $request->name . ' was created...');
        $request->session()->flash('text-class', 'text-success');

        return back();
    }

    public function destroy(Request $request, Hotel $hotel): \Illuminate\Http\RedirectResponse
    {
        // Delete User
        $hotel->delete();
        $request->session()->flash('message', $hotel->name . ' was Deleted...');
        $request->session()->flash('text-class', 'text-danger');
        return back();
    }

}
