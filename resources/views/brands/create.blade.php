@extends('adminlte::page')

@section('title', 'Nueva Marca')

@section('content_header')
    <h1>Crear Marca</h1>
@endsection

@section('content')
    <form action="{{ route('brands.store') }}" method="POST">
        @csrf
        @include('brands.form')
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('brands.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
