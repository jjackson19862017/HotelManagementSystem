<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['users'] = User::all(); // Returns all the information back from the Users Table
        $data['roles'] = Role::orderBy('name','asc')->get();
        return view('admin.user.index', $data);
    }

    public function trashedIndex()
    {
        $data = [];
        $data['users'] = User::onlyTrashed()->get(); // Returns all the information back from the Users Table
        return view('admin.user.trashed', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $createduser = User::create($inputs);
        $createduser->created_by = Auth::user()->id;
        $createduser->save();
        $createduser->roles()->attach(request('role')); // Attaches the selected role to the user
        $request->session()->flash('message', 'User was Created... ');
        $request->session()->flash('text-class', 'text-success');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $data = [];
        $data['user'] = $user;
        $data['roles'] = Role::orderBy('name','asc')->get();
        return view('admin.user.profile', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */


    public function usernameUpdate(Request $request,User $user): \Illuminate\Http\RedirectResponse
    {

        $user->username = $request->input('username');

        if($user->isDirty())
        {
            request()->validate([
                'username' => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash'],
            ]);
            $request->session()->flash('text-class', 'text-success');
            $request->session()->flash('message', 'Updated Username: ' . $user->username);
            $user->save();
        } else {
            $request->session()->flash('message', 'Nothing to Update...');
            $request->session()->flash('text-class', 'text-warning');
        }

        return back();
    }

    public function nameUpdate(Request $request, User $user): \Illuminate\Http\RedirectResponse
    {

        $user->name = $request->input('name');

        if($user->isDirty())
        {
            request()->validate([
                'name' => ['required', 'string', 'max:255'],
            ]);
            $request->session()->flash('text-class', 'text-success');
            $request->session()->flash('message', 'Updated Name: ' . $user->name);
            $user->save();
        } else {
            $request->session()->flash('message', 'Nothing to Update...');
            $request->session()->flash('text-class', 'text-warning');
        }

        return back();
    }

    public function emailUpdate(Request $request, User $user): \Illuminate\Http\RedirectResponse
    {

        $user->email = $request->input('email');

        if($user->isDirty())
        {
            request()->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
            $request->session()->flash('text-class', 'text-success');
            $request->session()->flash('message', 'Updated Email: ' . $user->email);
            $user->save();
        } else {
            $request->session()->flash('message', 'Nothing to Update...');
            $request->session()->flash('text-class', 'text-warning');
        }

        return back();
    }

    public function roleUpdate(Request $request, User $user): \Illuminate\Http\RedirectResponse
    {

        $user->role = $request->input('role');

        if($user->isDirty())
        {
            $user->roles()->detach(); // Removes all roles attached to the user
            $user->roles()->attach(request('role')); // Attaches the selected role to the user
            $request->session()->flash('text-class', 'text-success');
            $request->session()->flash('message', 'Updated Role');
        } else {
            $request->session()->flash('message', 'Nothing to Update...');
            $request->session()->flash('text-class', 'text-warning');
        }

        return back();
    }



    public function passwordUpdate(Request $request, User $user): \Illuminate\Http\RedirectResponse
    {
        if (!(Hash::check($request->get('currentpassword'), $user->password))) {
            // This is what happens if current password is incorrect.
            $request->session()->flash('message', 'Current Password is Incorrect');
            $request->session()->flash('text-class', 'text-warning');
            return back();
        }

        if(strcmp($request->get('currentpassword'),$request->get('newpassword'))==0){
            $request->session()->flash('message', 'Current Password cannot be the same as the New Password');
            $request->session()->flash('text-class', 'text-warning');
            return back();
        }
        if(strcmp($request->get('newpassword'),$request->get('password_confirmation'))==1){
            $request->session()->flash('message', 'Your New Passwords do not Match');
            $request->session()->flash('text-class', 'text-warning');
            return back();
        }
        $validator = Validator::make($request->all(), [
            'newpassword' => 'required|string|min:8',
            'currentpassword' => 'required',
        ]);
        //dd($validator);

        if ($validator->fails()) {
            $request->session()->flash('message', 'Passwords dont match');
            $request->session()->flash('text-class', 'text-warning');
            return back()
                ->withErrors($validator)
                ->withInput();;
        }

        $user->password = $request->get('newpassword');
        $user->save();
        $request->session()->flash('message', 'Password Changed');
        $request->session()->flash('text-class', 'text-success');
        return back();
    }











    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        // Delete User
        $user->deleted_by = Auth::user()->id;
        $user->save();
        $user->delete();

        $request->session()->flash('message', $user->username . ' was Deleted...');
        $request->session()->flash('text-class', 'text-danger');
        return back();
    }

    public function restoreUser(Request $request, $user)
    {
        // Restore User
        $user = User::withTrashed()->find($user);
        $user->restore();

        $request->session()->flash('message', 'Restored ' . $user->username);
        $request->session()->flash('text-class', 'text-success');
        return redirect()->route('trashed.user.index');
        }

    public function eraseUser(Request $request, $user)
    {
        $user = User::withTrashed()->find($user);
        $user->forceDelete();
        $request->session()->flash('message', $user->username . ' has been ERASED!');
        $request->session()->flash('text-class', 'text-warning');
        return redirect()->route('trashed.user.index');
    }
}
