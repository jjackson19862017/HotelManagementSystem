<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    //
    public function index()
    {
        $data = [];
        $data['permissions'] = Permission::all(); // Returns all the data from the Permissions Table
        return view('admin.permission.index', $data);
    }

    public function store(Request $request)
    {
        request()->validate([
            'name'=> ['required']
        ]);

        // Takes the name input and creates the slug input all in lowercase and changes the spaces for -'s
        Permission::create([
            'name'=> Str::ucfirst(request('name')),
            'slug'=> Str::of(Str::lower(request('name')))->slug('-')
        ]);
        $request->session()->flash('text-class', 'text-success');
        $request->session()->flash('message', $request->name . ' was created...');

        return back();
    }

    public function edit(Permission $permission)
    {

        $data = [];
        $data['permission'] = $permission;
        return view('admin.permission.edit', $data);
    }

    public function update(Request $request, Permission $permission)
    {
        // Takes the name input and creates the slug input all in lowercase and changes the spaces for -'s
        $permission->name = Str::ucfirst(request('name'));
        $permission->slug = Str::of(request('name'))->slug('-');

        // If the name input has been changed then the name will be updated else do nothing.
        if($permission->isDirty('name')){ // info If something has changed in the form.
            $request->session()->flash('text-class', 'text-success');
            $request->session()->flash('message', 'Permission: ' . $permission->name . ' was Updated...');
            $permission->save();
        } else {
            $request->session()->flash('message', 'Nothing to Update...');
            $request->session()->flash('text-class', 'text-warning');

        }
        return redirect()->route('permission.index');
    }


    public function destroy(Request $request, Permission $permission){
        // Delete Permission
        $permission->delete();
        $request->session()->flash('text-class', 'text-danger');
        $request->session()->flash('message', $permission->name .' was Deleted...');
        return back();
    }
}
