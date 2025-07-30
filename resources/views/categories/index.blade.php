@extends('adminlte::page')

@section('title', 'Categorías')

@section('content_header')
    <h1>Listado de Categorías</h1>
@endsection

@section('content')
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Nueva Categoría</a>
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
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">Editar</a>
                        @include('components.delete-modal', [
                            'modalId' => $category->id,
                            'action' => route('categories.destroy', $category),
                            'modalTitle' => 'Confirmar eliminación',
                            'modalBody' => '¿Estás seguro de que deseas eliminar esta categoría?',
                            'buttonText' => 'Eliminar'
                        ])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
