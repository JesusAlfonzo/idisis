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
        <div class="row mt-4 pb-5">
            <div class="col-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg mx-2"><i class="fas fa-save"></i> Guardar</button>
                <a href="{{ route('inventory_movements.index') }}" class="btn btn-secondary btn-lg mx-2"><i class="fas fa-times"></i> Cancelar</a>
            </div>
        </div>
    </form>
@endsection
