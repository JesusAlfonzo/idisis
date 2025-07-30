@extends('adminlte::page')

@section('title', 'Nuevo Producto')

@section('content_header')
    <h1>Crear Producto</h1>
@endsection

@section('content')
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        @include('products.form', [
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands,
            'presentations' => $presentations,
            'unitOfMeasures' => $unitOfMeasures,
            'suppliers' => $suppliers
        ])
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
