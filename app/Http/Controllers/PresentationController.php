<?php

namespace App\Http\Controllers;

use App\Http\Requests\PresentationRequest;
use App\Models\Presentation;

class PresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presentations = Presentation::all();
        return view('presentations.index', compact('presentations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('presentations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PresentationRequest $request)
    {
        Presentation::create($request->validated());
        return redirect()->route('presentations.index');
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
        $presentation = Presentation::findOrFail($id);
        return view('presentations.edit', compact('presentation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PresentationRequest $request, string $id)
    {
        $presentation = Presentation::findOrFail($id);
        $presentation->update($request->validated());
        return redirect()->route('presentations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $presentation = Presentation::findOrFail($id);
        $presentation->delete();
        return redirect()->route('presentations.index')->with('success', 'Presentación eliminada correctamente');
    }
}
