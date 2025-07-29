@extends('adminlte::page')

@section('title', 'Presentaciones')

@section('content_header')
    <h1>Listado de Presentaciones</h1>
@endsection

@section('content')
    <a href="{{ route('presentations.create') }}" class="btn btn-primary mb-3">Nueva Presentación</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($presentations as $presentation)
                <tr>
                    <td>{{ $presentation->id }}</td>
                    <td>{{ $presentation->name }}</td>
                    <td>{{ $presentation->description }}</td>
                    <td>
                        <a href="{{ route('presentations.edit', $presentation) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('presentations.destroy', $presentation) }}" method="POST" style="display:inline-block">
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
