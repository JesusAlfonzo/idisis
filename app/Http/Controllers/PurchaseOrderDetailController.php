<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseOrderDetailRequest;
use App\Models\PurchaseOrderDetail;

class PurchaseOrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchaseOrderDetails = PurchaseOrderDetail::all();
        return view('purchase_order_details.index', compact('purchaseOrderDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('purchase_order_details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PurchaseOrderDetailRequest $request)
    {
        PurchaseOrderDetail::create($request->validated());
        return redirect()->route('purchase_order_details.index');
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
        $purchaseOrderDetail = PurchaseOrderDetail::findOrFail($id);
        return view('purchase_order_details.edit', compact('purchaseOrderDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PurchaseOrderDetailRequest $request, string $id)
    {
        $purchaseOrderDetail = PurchaseOrderDetail::findOrFail($id);
        $purchaseOrderDetail->update($request->validated());
        return redirect()->route('purchase_order_details.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $purchaseOrderDetail = PurchaseOrderDetail::findOrFail($id);
        $purchaseOrderDetail->delete();
        return redirect()->route('purchase_order_details.index')->with('success', 'Detalle de orden de compra eliminado correctamente');
    }
}
