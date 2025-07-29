
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Controllers de administración
use App\Http\Controllers\Admin\UserController;

// Controllers de entidades principales
use App\Http\Controllers\AreaController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\UnitOfMeasureController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryLotController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\PurchaseOrderDetailController;
use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\RequisitionDetailController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//  Rutas protegidas para usuarios admin
Route::middleware(['auth', 'role:admin','permission:manage.users'])->prefix('admin')->group(function () {
    Route::resource('users', UserController::class, ['as' => 'admin']); // CRUD de usuarios admin
});

// Rutas protegidas para entidades principales
Route::middleware(['auth'])->group(function () {
    // CRUD de áreas
    Route::resource('areas', AreaController::class);

    // CRUD de empleados
    Route::resource('employees', EmployeeController::class); 

    // CRUD de marcas
    Route::resource('brands', BrandController::class); 

    // CRUD de categorías
    Route::resource('categories', CategoryController::class); 

    // CRUD de presentaciones
    Route::resource('presentations', PresentationController::class); 

    // CRUD de unidades de medida
    Route::resource('unit_of_measure', UnitOfMeasureController::class);

    // CRUD de proveedores
    Route::resource('suppliers', SupplierController::class); 

    // CRUD de almacenes
    Route::resource('warehouses', WarehouseController::class); 

    // CRUD de productos
    Route::resource('products', ProductController::class); //error en create y form

    // CRUD de lotes de inventario
    Route::resource('inventory_lots', InventoryLotController::class); //varible indefinida en index

    // CRUD de órdenes de compra y detalles
    Route::resource('purchase_orders', PurchaseOrderController::class); //variable indefinida en index
    
    // CRUD de detalles de órdenes de compra
    Route::resource('purchase_order_details', PurchaseOrderDetailController::class); //variable indefinida en index

    // CRUD de requisiciones y detalles
    Route::resource('requisitions', RequisitionController::class);  //variable indefinida en create form

    // CRUD de detalles de requisiciones
    Route::resource('requisition_details', RequisitionDetailController::class); //variable indefinida en index

    // Agrega aquí cualquier otra entidad que tengas
});