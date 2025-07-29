@extends('adminlte::page')

@section('title', 'Nueva Orden de Compra')

@section('content_header')
    <h1>Crear Orden de Compra</h1>
@endsection

@section('content')
    <form action="{{ route('purchase_orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="supplier_id">Proveedor</label>
            <select name="supplier_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Fecha</label>
            <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
        </div>
        <div class="form-group">
            <label for="total">Total</label>
            <input type="number" step="0.01" name="total" class="form-control" value="{{ old('total') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('purchase_orders.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
