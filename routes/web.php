
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\EmployeeController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:admin','permission:manage.users'])->prefix('admin')->group(function () {
    Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('users', [UserController::class, 'store'])->name('admin.users.store');
});


// Rutas para áreas
Route::middleware(['auth'])->group(function () {
    Route::get('areas/create', [AreaController::class, 'create'])->name('areas.create');
    Route::post('areas', [AreaController::class, 'store'])->name('areas.store');
});

// Rutas para empleados (no solo admin)
Route::middleware(['auth'])->group(function () {
    Route::get('employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('employees', [EmployeeController::class, 'store'])->name('employees.store');
});