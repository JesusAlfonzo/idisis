@extends('adminlte::page')

@section('title', 'Unidades de Medida')

@section('content_header')
    <h1>Listado de Unidades de Medida</h1>
@endsection

@section('content')
    <a href="{{ route('unit_of_measure.create') }}" class="btn btn-primary mb-3">Nueva Unidad de Medida</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Abreviatura</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($unitsOfMeasure as $unit)
                <tr>
                    <td>{{ $unit->id }}</td>
                    <td>{{ $unit->name }}</td>
                    <td>{{ $unit->abbreviation }}</td>
                    <td>
                        <a href="{{ route('unit_of_measure.edit', $unit) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('unit_of_measure.destroy', $unit) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
