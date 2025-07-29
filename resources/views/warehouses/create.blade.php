@extends('adminlte::page')

@section('title', 'Nuevo Almacén')

@section('content_header')
    <h1>Crear Almacén</h1>
@endsection

@section('content')
    <form action="{{ route('warehouses.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="location">Ubicación</label>
            <input type="text" name="location" class="form-control" value="{{ old('location') }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('warehouses.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
