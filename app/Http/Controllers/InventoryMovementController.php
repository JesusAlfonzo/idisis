<?php

namespace App\Http\Controllers;

use App\Models\InventoryMovement;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\Employee;
use App\Models\InventoryLot;
use Illuminate\Http\Request;
use App\Http\Requests\InventoryMovementRequest;

class InventoryMovementController extends Controller
{
    public function index()
    {
        $movements = InventoryMovement::with(['inventoryLot', 'employee'])->latest()->paginate(15);
        return view('inventory_movements.index', compact('movements'));
    }

    public function create()
    {
        $products = Product::all();
        $warehouses = Warehouse::all();
        $employees = Employee::all();
        $lots = InventoryLot::all();
        return view('inventory_movements.create', compact('products', 'warehouses', 'employees', 'lots'));
    }

    public function store(InventoryMovementRequest $request)
    {
        InventoryMovement::create($request->validated());
        return redirect()->route('inventory_movements.index')->with('success', 'Movimiento creado correctamente.');
    }

    public function edit(InventoryMovement $movement)
    {
        $products = Product::all();
        $warehouses = Warehouse::all();
        $employees = Employee::all();
        $lots = InventoryLot::all();
        return view('inventory_movements.edit', compact('movement', 'products', 'warehouses', 'employees', 'lots'));
    }

    public function update(InventoryMovementRequest $request, InventoryMovement $movement)
    {
        $movement->update($request->validated());
        return redirect()->route('inventory_movements.index')->with('success', 'Movimiento actualizado correctamente.');
    }

    public function destroy(InventoryMovement $movement)
    {
        $movement->delete();
        return redirect()->route('inventory_movements.index')->with('success', 'Movimiento eliminado correctamente.');
    }
}
