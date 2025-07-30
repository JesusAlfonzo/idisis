@extends('adminlte::page')

@section('title', 'Lotes de Inventario')

@section('content_header')
    <h1>Listado de Lotes de Inventario</h1>
@endsection

@section('content')
    <a href="{{ route('inventory_lots.create') }}" class="btn btn-primary mb-3">Nuevo Lote</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Fecha de Vencimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventoryLots as $lot)
                <tr>
                    <td>{{ $lot->id }}</td>
                    <td>{{ $lot->product->name ?? '' }}</td>
                    <td>{{ $lot->quantity }}</td>
                    <td>{{ $lot->expiration_date }}</td>
                    <td>
                        <a href="{{ route('inventory_lots.edit', $lot) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('inventory_lots.destroy', $lot) }}" method="POST" style="display:inline-block">
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
