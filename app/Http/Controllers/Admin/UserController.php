<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

  public function create()
  {
    $roles = Role::all();
    $employees = \App\Models\Employee::whereNull('user_id')->get();
    return view('admin.users.create', compact('roles', 'employees'));
  }

  public function store(StoreUserRequest $request)
  {
    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
    ]);
    $user->assignRole($request->role);

    // Asignar el usuario al empleado seleccionado
    $employee = \App\Models\Employee::find($request->employee_id);
    $employee->user_id = $user->id;
    $employee->save();

    return redirect()->route('admin.users.create')->with('success', 'Usuario creado y asignado correctamente');
  }
}
