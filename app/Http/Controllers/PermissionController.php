<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;


class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        return view('permissions.list',compact('permissions'));
    }

    public function create()
    {

        return view('permissions.create');
    }

    public function store(Request $request)
    {
        // Validate and store the new permission
        $request->validate([
            'name' => 'required|unique:permissions,name',
            'guard_name' => 'required',
        ]);

        if ($request->has('guard_name')) {
            $guardName = $request->input('guard_name');
        } else {
            $guardName = config('auth.defaults.guard');
        }

        // Permission::create($request->only('name', 'guard_name'));
        return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
    }

    public function edit($permission)
    {
        // return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, $permission)
    {
        // Validate and update the permission
        // $request->validate([
        //     'name' => 'required|unique:permissions,name,' . $permission->id,
        //     'guard_name' => 'required',
        // ]);

        // $permission->update($request->only('name', 'guard_name'));

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
    }

    public function destroy($permission)
    {
        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
    }
}
