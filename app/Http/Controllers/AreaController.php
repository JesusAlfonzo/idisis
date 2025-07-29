<?php

namespace App\Http\Controllers;

use App\Http\Requests\AreaRequest;
use App\Models\Area;

class AreaController extends Controller
{
    public function create()
    {
        return view('areas.create');
    }

    public function store(AreaRequest $request)
    {

        Area::create($request->only('name'));

        return redirect()->route('areas.create')->with('success', 'Área registrada correctamente');
    }

    public function update(AreaRequest $request, Area $area)
    {
        $area->update($request->only('name'));

        // return redirect()->route('areas.index')->with('success', 'Área actualizada correctamente'); de momento no existe la vista de index
    }
}
