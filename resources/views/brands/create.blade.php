@extends('adminlte::page')

@section('title', 'Nueva Marca')

@section('content_header')
    <h1>Crear Marca</h1>
@endsection

@section('content')
    <form action="{{ route('brands.store') }}" method="POST">
        @csrf
        @include('brands.form')
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary px-4">Guardar</button>
            <a href="{{ route('brands.index') }}" class="btn btn-secondary ms-2 px-4">Cancelar</a>
        </div>
    </form>
@endsection
