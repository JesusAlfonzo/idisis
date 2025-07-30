@extends('adminlte::page')

@section('title', 'Editar Movimiento de Inventario')

@section('content_header')
    <h1>Editar Movimiento de Inventario</h1>
@endsection

@section('content')
    <form action="{{ route('inventory_movements.update', $movement) }}" method="POST">
        @csrf
        @method('PUT')
        @include('inventory_movements.form', [
            'movement' => $movement,
            'products' => $products,
            'warehouses' => $warehouses,
            'employees' => $employees,
            'lots' => $lots
        ])
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('inventory_movements.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
