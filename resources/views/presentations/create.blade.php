@extends('adminlte::page')

@section('title', 'Nueva Presentación')

@section('content_header')
    <h1>Crear Presentación</h1>
@endsection

@section('content')
    <form action="{{ route('presentations.store') }}" method="POST">
        @csrf
        @include('presentations.form')
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary px-4">Guardar</button>
            <a href="{{ route('presentations.index') }}" class="btn btn-secondary ms-2 px-4">Cancelar</a>
        </div>
    </form>
@endsection
