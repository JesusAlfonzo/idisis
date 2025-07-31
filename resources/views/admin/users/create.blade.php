@extends('adminlte::page')

@section('title', 'Registrar Usuario')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="mb-0">Registrar Usuario</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
                <li class="breadcrumb-item active">Registrar</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        @include('admin.users.form')
        <div class="text-center mt-4 pb-5">
            <button type="submit" class="btn btn-primary px-5 py-2 mx-2">Registrar</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary px-5 py-2 mx-2">Cancelar</a>
        </div>
    </form>
@endsection