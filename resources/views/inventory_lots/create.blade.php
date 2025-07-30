@extends('adminlte::page')

@section('title', 'Nuevo Lote de Inventario')

@section('content_header')
    <h1>Crear Lote de Inventario</h1>
@endsection

@section('content')
    <form action="{{ route('inventory_lots.store') }}" method="POST">
        @csrf
        @include('inventory_lots.form', ['lot' => null, 'products' => $products, 'warehouses' => $warehouses])
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('inventory_lots.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
