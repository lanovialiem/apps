<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:roles-view|roles-create|roles-edit|roles -delete', [
    //         'only' => ['index', 'create', 'edit', 'destroy']
    //     ]);
    // }
    public function index()
    {
        $roles = Role::all();
        return view('roles.list', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,name',
        ]);

        // ✅ Create role dulu
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web', // wajib
        ]);

        // ✅ Assign permissions (INI YANG MASUK KE role_has_permissions)
        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully.');
    }

    public function edit($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = Permission::all();
        // dd($permissions);

        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the role
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,name',
        ]);

        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->name,
        ]);

        // Sync permissions
        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions ?? []);
        }


        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy($id)
    {
        // Find the role by ID and delete it
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
