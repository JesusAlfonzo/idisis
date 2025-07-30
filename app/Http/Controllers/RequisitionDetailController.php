<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequisitionDetailRequest;
use App\Models\RequisitionDetail;
use App\Models\Requisition;
use App\Models\Product;

class RequisitionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requisitionDetails = RequisitionDetail::all();
        return view('requisition_details.index', compact('requisitionDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $requisitions = Requisition::all();
        $products = Product::all();
        return view('requisition_details.create', compact('requisitions', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequisitionDetailRequest $request)
    {
        RequisitionDetail::create($request->validated());
        return redirect()->route('requisition_details.index');
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
        $requisitionDetail = RequisitionDetail::findOrFail($id);
        return view('requisition_details.edit', compact('requisitionDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequisitionDetailRequest $request, string $id)
    {
        $requisitionDetail = RequisitionDetail::findOrFail($id);
        $requisitionDetail->update($request->validated());
        return redirect()->route('requisition_details.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $requisitionDetail = RequisitionDetail::findOrFail($id);
        $requisitionDetail->delete();
        return redirect()->route('requisition_details.index')->with('success', 'Detalle de requisición eliminado correctamente');
    }
}
