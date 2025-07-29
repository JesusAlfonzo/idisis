@extends('adminlte::page')

@section('title', 'Nuevo Detalle de Requisición')

@section('content_header')
    <h1>Crear Detalle de Requisición</h1>
@endsection

@section('content')
    <form action="{{ route('requisition_details.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="requisition_id">Requisición</label>
            <select name="requisition_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($requisitions as $requisition)
                    <option value="{{ $requisition->id }}" {{ old('requisition_id') == $requisition->id ? 'selected' : '' }}>{{ $requisition->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="product_id">Producto</label>
            <select name="product_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('requisition_details.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
