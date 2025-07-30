@extends('adminlte::page')

@section('title', 'Editar Producto')

@section('content_header')
    <h1>Editar Producto</h1>
@endsection

@section('content')
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        @include('products.form', [
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands,
            'presentations' => $presentations,
            'unitOfMeasures' => $unitOfMeasures,
            'suppliers' => $suppliers
        ])
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
