@extends('adminlte::page')

@section('title', 'Nuevo Producto')

@section('content_header')



    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap" style="margin-top: 10px;">
        <h2 class="mb-0"><i class="fas fa-box"></i>
            {{ isset($product) && $product->id ? 'Editar producto' : 'Nuevo producto' }}</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white px-3 py-2 shadow-sm mb-0" style="border-radius: 8px;">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ isset($product) && $product->id ? 'Editar producto' : 'Nuevo producto' }}
                </li>
            </ol>
        </nav>
    </div>
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
            'suppliers' => $suppliers,
        ])
        <div class="text-center mt-4 pb-5">
            <button type="submit" class="btn btn-primary px-5 py-2 mx-2">Guardar</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary px-5 py-2 mx-2">Cancelar</a>
        </div>
    </form>
@endsection
