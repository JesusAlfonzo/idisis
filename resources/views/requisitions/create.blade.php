@extends('adminlte::page')

@section('title', 'Nueva Requisición')

@section('content_header')
    <h1>Crear Requisición</h1>
@endsection

@section('content')
    <form action="{{ route('requisitions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="area_id">Área</label>
            <select name="area_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="employee_id">Empleado</label>
            <select name="employee_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Fecha</label>
            <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
        </div>
        <div class="form-group">
            <label for="status">Estado</label>
            <input type="text" name="status" class="form-control" value="{{ old('status') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('requisitions.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
