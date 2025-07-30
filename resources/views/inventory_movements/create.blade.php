@extends('adminlte::page')

@section('title', 'Nuevo Movimiento de Inventario')

@section('content_header')
    <h1>Crear Movimiento de Inventario</h1>
@endsection

@section('content')
    <form action="{{ route('inventory_movements.store') }}" method="POST">
        @csrf
        @include('inventory_movements.form', [
            'movement' => null,
            'products' => $products,
            'warehouses' => $warehouses,
            'employees' => $employees,
            'lots' => $lots
        ])
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('inventory_movements.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
