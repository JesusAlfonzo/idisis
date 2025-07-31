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
        <div class="row mt-4 pb-5">
            <div class="col-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg mx-2"><i class="fas fa-save"></i> Guardar</button>
                <a href="{{ route('purchase_orders.index') }}" class="btn btn-secondary btn-lg mx-2"><i class="fas fa-times"></i> Cancelar</a>
            </div>
        </div>
    </form>
@endsection
