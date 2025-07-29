@extends('adminlte::page')

@section('title', 'Movimientos de Inventario')

@section('content_header')
    <h1>Listado de Movimientos de Inventario</h1>
@endsection

@section('content')
    <a href="{{ route('inventory_movements.create') }}" class="btn btn-primary mb-3">Nuevo Movimiento</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventory_movements as $movement)
                <tr>
                    <td>{{ $movement->id }}</td>
                    <td>{{ $movement->product->name ?? '' }}</td>
                    <td>{{ $movement->quantity }}</td>
                    <td>{{ $movement->type }}</td>
                    <td>{{ $movement->date }}</td>
                    <td>
                        <a href="{{ route('inventory_movements.edit', $movement) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('inventory_movements.destroy', $movement) }}" method="POST" style="display:inline-block">
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
