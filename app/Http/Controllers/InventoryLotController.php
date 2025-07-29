<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryLotRequest;
use App\Models\InventoryLot;

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
        return view('inventory_lots.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InventoryLotRequest $request)
    {
        InventoryLot::create($request->validated());
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
        $inventoryLot = InventoryLot::findOrFail($id);
        return view('inventory_lots.edit', compact('inventoryLot'));
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
