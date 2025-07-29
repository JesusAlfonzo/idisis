@extends('adminlte::page')

@section('title', 'Nuevo Movimiento de Inventario')

@section('content_header')
    <h1>Crear Movimiento de Inventario</h1>
@endsection

@section('content')
    <form action="{{ route('inventory_movements.store') }}" method="POST">
        @csrf
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
        <div class="form-group">
            <label for="type">Tipo</label>
            <input type="text" name="type" class="form-control" value="{{ old('type') }}" required>
        </div>
        <div class="form-group">
            <label for="date">Fecha</label>
            <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('inventory_movements.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
