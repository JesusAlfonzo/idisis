


@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="mb-0">Editar Usuario</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
                <li class="breadcrumb-item active">Editar</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.users.form')
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection
