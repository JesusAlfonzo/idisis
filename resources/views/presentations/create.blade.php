@extends('adminlte::page')

@section('title', 'Nueva Presentación')

@section('content_header')
    <h1>Crear Presentación</h1>
@endsection

@section('content')
    <form action="{{ route('presentations.store') }}" method="POST">
        @csrf
        @include('presentations.form')
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('presentations.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
