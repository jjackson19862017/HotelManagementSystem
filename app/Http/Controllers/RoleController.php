<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    //
    public function index()
    {
        $data = [];
        $data['roles'] = Role::all(); // Returns all the data from the Roles Table
        return view('admin.role.index', $data);
    }

    public function store(Request $request)
    {
        request()->validate([
            'name'=> ['required']
        ]);

        // Takes the name input and creates the slug input all in lowercase and changes the spaces for -'s
        Role::create([
            'name'=> Str::ucfirst(request('name')),
            'slug'=> Str::of(Str::lower(request('name')))->slug('-')
        ]);

        $request->session()->flash('message', $request->name .' was created...');
        $request->session()->flash('text-class', 'text-success');

        return back();
    }

    public function edit(Role $role)
    {
        $data = [];
        $data['role'] = $role;
        $data['permissions'] = Permission::all();
        return view('admin.role.edit', $data);
    }

    public function update(Request $request, Role $role)
    {
        //$role->id = request('id');
        // Takes the name input and creates the slug input all in lowercase and changes the spaces for -'s
        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(request('name'))->slug('-');

        if($role->isDirty('name')){ // info If something has changed in the form.
            $request->session()->flash('message', 'Role: ' . $role->name . ' was Updated...');
            $request->session()->flash('text-class', 'text-success');
            $role->save();
        } else {
            $request->session()->flash('message', 'Nothing to Update...');
            $request->session()->flash('text-class', 'text-warning');
        }

        return back();
    }

    public function permission_attach(Role $role)
    {
        $role->permissions()->attach(request('permission'));
        return back();
    }

    public function permission_detach(Role $role)
    {
        $role->permissions()->detach(request('permission'));
        return back();
    }

    public function destroy(Request $request, Role $role){
        // Delete Role
        $role->delete();
        $request->session()->flash('message', $role->name . ' was Deleted...');
        $request->session()->flash('text-class', 'text-danger');
        return back();
    }
}
