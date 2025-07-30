@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Listado de Usuarios</h1>
@endsection

@section('content')
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Nuevo Usuario</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name ?? '' }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning btn-sm">Editar</a>
                        @include('components.delete-modal', [
                            'modalId' => $user->id,
                            'action' => route('admin.users.destroy', $user),
                            'modalTitle' => 'Confirmar eliminación',
                            'modalBody' => '¿Estás seguro de que deseas eliminar este usuario?',
                            'buttonText' => 'Eliminar'
                        ])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
