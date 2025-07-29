@extends('adminlte::page')

@section('title', 'Requisiciones')

@section('content_header')
    <h1>Listado de Requisiciones</h1>
@endsection

@section('content')
    <a href="{{ route('requisitions.create') }}" class="btn btn-primary mb-3">Nueva Requisición</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Área</th>
                <th>Empleado</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requisitions as $requisition)
                <tr>
                    <td>{{ $requisition->id }}</td>
                    <td>{{ $requisition->area->name ?? '' }}</td>
                    <td>{{ $requisition->employee->name ?? '' }}</td>
                    <td>{{ $requisition->date }}</td>
                    <td>{{ $requisition->status }}</td>
                    <td>
                        <a href="{{ route('requisitions.edit', $requisition) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('requisitions.destroy', $requisition) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
