@extends('adminlte::page')

@section('title', 'Nueva Orden de Compra')

@section('content_header')
    <h1>Crear Orden de Compra</h1>
@endsection

@section('content')
    <form action="{{ route('purchase_orders.store') }}" method="POST">
        @csrf
        @include('purchase_orders.form', [
            'purchaseOrder' => $purchaseOrder ?? new \App\Models\PurchaseOrder(),
            'suppliers' => $suppliers,
            'employees' => $employees,
            'requisitions' => $requisitions,
            'products' => $products
        ])
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('purchase_orders.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
