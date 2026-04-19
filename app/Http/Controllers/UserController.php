<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserController extends Controller //implements HasMiddleware
{

    // public function __construct()
    // {
    //     $this->middleware('permission:view user')->only(['index']);
    //     $this->middleware('permission:create user')->only(['create', 'store']);
    //     $this->middleware('permission:edit user')->only(['edit', 'update']);
    //     $this->middleware('permission:delete user')->only(['destroy']);
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $roles = Role::all(); // Ambil semua role untuk dropdown
        // return view('users.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); // Ambil semua role untuk dropdown

        $hasRole = $user->roles->pluck('id')->toArray(); // Ambil ID role yang dimiliki user
        // dd($hasRole);

        return view('users.edit', compact('user', 'roles', 'hasRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user->update($validatedData);
        $user->syncRoles($request->input('roles'));
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
