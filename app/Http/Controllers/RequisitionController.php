<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequisitionRequest;
use App\Models\Requisition;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requisitions = Requisition::all();
        return view('requisitions.index', compact('requisitions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('requisitions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequisitionRequest $request)
    {
        Requisition::create($request->validated());
        return redirect()->route('requisitions.index');
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
        $requisition = Requisition::findOrFail($id);
        return view('requisitions.edit', compact('requisition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequisitionRequest $request, string $id)
    {
        $requisition = Requisition::findOrFail($id);
        $requisition->update($request->validated());
        return redirect()->route('requisitions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $requisition = Requisition::findOrFail($id);
        $requisition->delete();
        return redirect()->route('requisitions.index')->with('success', 'Requisición eliminada correctamente');
    }
}
