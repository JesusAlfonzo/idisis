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
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Estado</th>
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
                                @if($category->is_active)
                                    <span class="badge bg-success">Activa</span>
                                @else
                                    <span class="badge bg-danger">Inactiva</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm me-1">Editar</a>
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
        </div>
    </div>
@endsection
