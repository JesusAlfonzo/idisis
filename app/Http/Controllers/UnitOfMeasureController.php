<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitOfMeasureRequest;
use App\Models\UnitOfMeasure;

class UnitOfMeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unitsOfMeasure = UnitOfMeasure::all();
        return view('unit_of_measure.index', compact('unitsOfMeasure'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unitOfMeasure = null;
        return view('unit_of_measure.create', compact('unitOfMeasure'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnitOfMeasureRequest $request)
    {
        UnitOfMeasure::create($request->validated());
        return redirect()->route('unit_of_measure.index');
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
        $unitOfMeasure = UnitOfMeasure::findOrFail($id);
        return view('unit_of_measure.edit', compact('unitOfMeasure'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UnitOfMeasureRequest $request, string $id)
    {
        $unitOfMeasure = UnitOfMeasure::findOrFail($id);
        $unitOfMeasure->update($request->validated());
        return redirect()->route('unit_of_measure.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unitOfMeasure = UnitOfMeasure::findOrFail($id);
        $unitOfMeasure->delete();
        return redirect()->route('unit_of_measure.index')->with('success', 'Unidad de medida eliminada correctamente');
    }
}
