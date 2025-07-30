@extends('adminlte::page')

@section('title', 'Editar Lote de Inventario')

@section('content_header')
    <h1>Editar Lote de Inventario</h1>
@endsection

@section('content')
    <form action="{{ route('inventory_lots.update', $lot) }}" method="POST">
        @csrf
        @method('PUT')
        @include('inventory_lots.form', ['lot' => $lot, 'products' => $products, 'warehouses' => $warehouses])
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('inventory_lots.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
