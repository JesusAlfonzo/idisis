@extends('adminlte::page')

@section('title', 'Nueva Categoría')

@section('content_header')
    <h1>Crear Categoría</h1>
@endsection

@section('content')
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        @include('categories.form')
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary px-4">Guardar</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary ms-2 px-4">Cancelar</a>
        </div>
    </form>
@endsection
