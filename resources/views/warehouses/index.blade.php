@extends('adminlte::page')

@section('title', 'Almacenes')

@section('content_header')
    <h1>Listado de Almacenes</h1>
@endsection

@section('content')
    <a href="{{ route('warehouses.create') }}" class="btn btn-primary mb-3">Nuevo Almacén</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($warehouses as $warehouse)
                <tr>
                    <td>{{ $warehouse->id }}</td>
                    <td>{{ $warehouse->name }}</td>
                    <td>{{ $warehouse->location }}</td>
                    <td>
                        <a href="{{ route('warehouses.edit', $warehouse) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('warehouses.destroy', $warehouse) }}" method="POST" style="display:inline-block">
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
