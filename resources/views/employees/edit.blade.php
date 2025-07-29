@extends('adminlte::page')

@section('title', 'Editar Empleado')

@section('content_header')
    <h1>Editar Empleado</h1>
@endsection

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('employees.update', $employee) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">Nombre</label>
            <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $employee->first_name) }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Apellido</label>
            <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $employee->last_name) }}" required>
        </div>
        <div class="form-group">
            <label for="position">Cargo</label>
            <input type="text" name="position" class="form-control" value="{{ old('position', $employee->position) }}">
        </div>
        <div class="form-group">
            <label for="area_id">Área</label>
            <select name="area_id" class="form-control" required>
                <option value="">Seleccione un área</option>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}" {{ old('area_id', $employee->area_id) == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Volver</a>
    </form>
@endsection
