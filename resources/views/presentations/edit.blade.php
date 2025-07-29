@extends('adminlte::page')

@section('title', 'Editar Presentación')

@section('content_header')
    <h1>Editar Presentación</h1>
@endsection

@section('content')
    <form action="{{ route('presentations.update', $presentation) }}" method="POST">
        @csrf
        @method('PUT')
        @include('presentations.form')
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('presentations.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
