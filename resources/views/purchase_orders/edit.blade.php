@extends('adminlte::page')

@section('title', 'Editar Orden de Compra')

@section('content_header')
    <h1>Editar Orden de Compra</h1>
@endsection

@section('content')
    <form action="{{ route('purchase_orders.update', $purchaseOrder) }}" method="POST">
        @csrf
        @method('PUT')
        @include('purchase_orders.form', [
            'purchaseOrder' => $purchaseOrder,
            'suppliers' => $suppliers,
            'employees' => $employees,
            'requisitions' => $requisitions,
            'products' => $products
        ])
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('purchase_orders.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
