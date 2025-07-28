@extends('adminlte::page')

@section('content')
    <h1>Registrar nuevo empleado</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <input type="text" name="first_name" placeholder="Nombre" required>
        <input type="text" name="last_name" placeholder="Apellido" required>
        <input type="text" name="position" placeholder="Cargo (opcional)">
        <select name="area_id" required>
            <option value="">Seleccione un área</option>
            @foreach($areas as $area)
                <option value="{{ $area->id }}">{{ $area->name }}</option>
            @endforeach
        </select>
        <button type="submit">Registrar</button>
    </form>
@endsection
