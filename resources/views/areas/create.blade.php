@extends('adminlte::page')

@section('title', 'Nueva Área')

@section('content_header')
    <h1>Crear Área</h1>
@endsection

@section('content')
    <form action="{{ route('areas.store') }}" method="POST">
        @csrf
        @include('areas.form')
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('areas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
@extends('adminlte::page')

@section('content')
    <h1>Registrar nueva área</h1>
    <form action="{{ route('areas.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nombre del área" required>
        <button type="submit">Registrar</button>
    </form>
@endsection
