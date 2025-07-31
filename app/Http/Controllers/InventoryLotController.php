<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryLotRequest;
use App\Models\InventoryLot;
use App\Models\Product;


class InventoryLotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventoryLots = InventoryLot::all();
        return view('inventory_lots.index', compact('inventoryLots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $warehouses = \App\Models\Warehouse::all();
        return view('inventory_lots.create', compact('products', 'warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InventoryLotRequest $request)
    {
        $data = $request->validated();
        $product = \App\Models\Product::find($data['product_id']);
        // Si el producto es kit, inicializar uses_remaining
        if ($product && $product->is_kit && $product->uses_per_kit > 0) {
            $data['uses_remaining'] = $data['quantity'] * $product->uses_per_kit;
        }
        InventoryLot::create($data);
        return redirect()->route('inventory_lots.index');
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
        $lot = InventoryLot::findOrFail($id);
        $products = \App\Models\Product::all();
        $warehouses = \App\Models\Warehouse::all();
        return view('inventory_lots.edit', compact('lot', 'products', 'warehouses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InventoryLotRequest $request, string $id)
    {
        $inventoryLot = InventoryLot::findOrFail($id);
        $inventoryLot->update($request->validated());
        return redirect()->route('inventory_lots.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inventoryLot = InventoryLot::findOrFail($id);
        $inventoryLot->delete();
        return redirect()->route('inventory_lots.index')->with('success', 'Lote de inventario eliminado correctamente');
    }
}
