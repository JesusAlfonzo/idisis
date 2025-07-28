<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

  public function create()
  {
    $roles = Role::all();
    return view('admin.users.create', compact('roles'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6',
      'role' => 'required|exists:roles,name',
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
    ]);
    $user->assignRole($request->role);

    return redirect()->route('admin.users.create')->with('success', 'Usuario creado correctamente');
  }
}
