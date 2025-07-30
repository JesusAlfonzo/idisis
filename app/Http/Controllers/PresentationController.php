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
        $presentation = new Presentation(['is_active' => 1]);
        return view('presentations.create', compact('presentation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PresentationRequest $request)
    {
        $data = $request->validated();
        $data['is_active'] = $request->input('is_active', 1);
        Presentation::create($data);
        return redirect()->route('presentations.index')->with('success', 'Presentación creada correctamente');
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
        $data = $request->validated();
        $data['is_active'] = $request->input('is_active', 1);
        $presentation->update($data);
        return redirect()->route('presentations.index')->with('success', 'Presentación actualizada correctamente');
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
