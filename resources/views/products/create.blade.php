@extends('adminlte::page')

@section('title', 'Nuevo Producto')

@section('content_header')
    <h1>Crear Producto</h1>
@endsection

@section('content')
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="category_id">Categoría</label>
            <select name="category_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="brand_id">Marca</label>
            <select name="brand_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="presentation_id">Presentación</label>
            <select name="presentation_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($presentations as $presentation)
                    <option value="{{ $presentation->id }}" {{ old('presentation_id') == $presentation->id ? 'selected' : '' }}>{{ $presentation->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="unit_of_measure_id">Unidad de Medida</label>
            <select name="unit_of_measure_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($unitOfMeasures as $unit)
                    <option value="{{ $unit->id }}" {{ old('unit_of_measure_id') == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
