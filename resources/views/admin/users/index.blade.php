@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="mb-0">Usuarios</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item active">Usuarios</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
            <i class="fas fa-user-plus me-1"></i> Nuevo Usuario
        </a>
        <form method="GET" action="" class="d-flex align-items-center">
            <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Buscar usuario..." value="{{ request('search') }}">
            <button class="btn btn-outline-secondary btn-sm" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif
    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rol</th>
                        <th scope="col" class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                <span class="fw-semibold">{{ $user->name }}</span>
                                <br>
                                <small class="text-muted">{{ $user->email }}</small>
                            </td>
                            <td class="d-none d-md-table-cell">{{ $user->email }}</td>
                            <td>
                                @if($user->role)
                                    <span class="badge bg-info text-dark">{{ $user->role->name }}</span>
                                @else
                                    <span class="badge bg-secondary">Sin rol</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning btn-sm me-1" title="Editar usuario">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @include('components.delete-modal', [
                                    'modalId' => $user->id,
                                    'action' => route('admin.users.destroy', $user),
                                    'modalTitle' => 'Confirmar eliminación',
                                    'modalBody' => '¿Estás seguro de que deseas eliminar este usuario?',
                                    'buttonText' => 'Eliminar'
                                ])
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="fas fa-users-slash fa-2x mb-2"></i><br>
                                No hay usuarios registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if(method_exists($users, 'links'))
            <div class="card-footer py-2">
                {{ $users->links() }}
            </div>
        @endif
    </div>
@endsection
