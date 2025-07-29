@extends('adminlte::page')

@section('title', 'Editar Almacén')

@section('content_header')
    <h1>Editar Almacén</h1>
@endsection

@section('content')
    <form action="{{ route('warehouses.update', $warehouse) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $warehouse->name) }}" required>
        </div>
        <div class="form-group">
            <label for="location">Ubicación</label>
            <input type="text" name="location" class="form-control" value="{{ old('location', $warehouse->location) }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('warehouses.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
