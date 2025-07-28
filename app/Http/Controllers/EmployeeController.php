<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Area;

class EmployeeController extends Controller
{
    public function create()
    {
        $areas = Area::all();
        return view('employees.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'position' => 'nullable',
            'area_id' => 'required|exists:areas,id',
        ]);

        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'position' => $request->position,
            'area_id' => $request->area_id,
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]);

        return redirect()->route('employees.create')->with('success', 'Empleado registrado correctamente');
    }
}
