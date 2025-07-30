<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Employee;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{



  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $users = User::with('employee')->get();
    return view('admin.users.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $roles = Role::all();
    $employees = \App\Models\Employee::whereNull('user_id')->get();
    return view('admin.users.create', compact('roles', 'employees'));
  }

  /**
   * Store a newly created resource in storage.
   */
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

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    // Mostrar detalles de un usuario
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $user)
  {
    $roles = Role::all();
    $employees = Employee::all();
    return view('admin.users.edit', compact('user', 'roles', 'employees'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(StoreUserRequest $request, User $user)
  {
    $data = [
      'name' => $request->name,
      'email' => $request->email,
    ];
    if ($request->filled('password')) {
      $data['password'] = bcrypt($request->password);
    }
    $user->update($data);
    $user->syncRoles([$request->role_id]);

    // Actualizar el empleado asociado
    $employee = Employee::find($request->employee_id);
    $employee->user_id = $user->id;
    $employee->save();

    return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado correctamente');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    $user->delete();
    return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado correctamente');
  }

}
