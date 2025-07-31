@extends('adminlte::page')

@section('title', 'Nuevo Lote de Inventario')

@section('content_header')
    <h1>Crear Lote de Inventario</h1>
@endsection

@section('content')
    <form action="{{ route('inventory_lots.store') }}" method="POST">
        @csrf
        @include('inventory_lots.form', ['lot' => null, 'products' => $products, 'warehouses' => $warehouses])
        <div class="row mt-4 pb-5">
            <div class="col-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg mx-2"><i class="fas fa-save"></i> Guardar</button>
                <a href="{{ route('inventory_lots.index') }}" class="btn btn-secondary btn-lg mx-2"><i class="fas fa-times"></i> Cancelar</a>
            </div>
        </div>
    </form>
@endsection
