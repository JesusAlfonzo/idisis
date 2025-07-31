@extends('adminlte::page')

@section('title', 'Marcas')

@section('content_header')
    <h1>Listado de Marcas</h1>
@endsection

@section('content')
    <a href="{{ route('brands.create') }}" class="btn btn-primary mb-3">Nueva Marca</a>
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
                        {{-- <th>Estado</th> --}}
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->name }}</td>
                            {{-- <td>
                                Estado eliminado, no aplica para brands
                            </td> --}}
                            <td>
                                <a href="{{ route('brands.edit', $brand) }}" class="btn btn-warning btn-sm me-1">Editar</a>
                                @include('components.delete-modal', [
                                    'modalId' => $brand->id,
                                    'action' => route('brands.destroy', $brand),
                                    'modalTitle' => 'Confirmar eliminación',
                                    'modalBody' => '¿Estás seguro de que deseas eliminar esta marca?',
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
