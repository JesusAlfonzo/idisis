@extends('adminlte::page')

@section('title', 'Nueva Categoría')

@section('content_header')
    <h1>Crear Categoría</h1>
@endsection

@section('content')
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        @include('categories.form')
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
