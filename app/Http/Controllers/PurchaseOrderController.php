<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseOrderRequest;
use App\Models\PurchaseOrder;
use App\Models\Supplier;


class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchaseOrders = PurchaseOrder::all();
        return view('purchase_orders.index', compact('purchaseOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = \App\Models\Supplier::all();
        $employees = \App\Models\Employee::all();
        $requisitions = \App\Models\Requisition::all();
        $products = \App\Models\Product::all();
        $purchaseOrder = new PurchaseOrder();
        return view('purchase_orders.create', compact('suppliers', 'employees', 'requisitions', 'products', 'purchaseOrder'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PurchaseOrderRequest $request)
    {
        PurchaseOrder::create($request->validated());
        return redirect()->route('purchase_orders.index');
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
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        $suppliers = \App\Models\Supplier::all();
        $employees = \App\Models\Employee::all();
        $requisitions = \App\Models\Requisition::all();
        $products = \App\Models\Product::all();
        return view('purchase_orders.edit', compact('purchaseOrder', 'suppliers', 'employees', 'requisitions', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PurchaseOrderRequest $request, string $id)
    {
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        $purchaseOrder->update($request->validated());
        return redirect()->route('purchase_orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        $purchaseOrder->delete();
        return redirect()->route('purchase_orders.index')->with('success', 'Orden de compra eliminada correctamente');
    }
}
