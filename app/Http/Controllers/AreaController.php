<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    public function create()
    {
        return view('areas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:areas,name',
        ]);

        Area::create($request->only('name'));

        return redirect()->route('areas.create')->with('success', 'Área registrada correctamente');
    }
}
