@extends('adminlte::page')

@section('title', 'Editar Lote de Inventario')

@section('content_header')
    <h1>Editar Lote de Inventario</h1>
@endsection

@section('content')
    <form action="{{ route('inventory_lots.update', $lot) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="product_id">Producto</label>
            <select name="product_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ old('product_id', $lot->product_id) == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $lot->quantity) }}" required>
        </div>
        <div class="form-group">
            <label for="expiration_date">Fecha de Vencimiento</label>
            <input type="date" name="expiration_date" class="form-control" value="{{ old('expiration_date', $lot->expiration_date) }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('inventory_lots.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
