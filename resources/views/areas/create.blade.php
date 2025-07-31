@extends('adminlte::page')

@section('title', 'Nueva Área')

@section('content_header')
    <h1>Crear Área</h1>
@endsection

@section('content')
    <form action="{{ route('areas.store') }}" method="POST">
        @csrf
        @include('areas.form')
        <div class="text-center mt-4 pb-5">
            <button type="submit" class="btn btn-primary px-5 py-2 mx-2">Guardar</button>
            <a href="{{ route('areas.index') }}" class="btn btn-secondary px-5 py-2 mx-2">Cancelar</a>
        </div>
    </form>
@endsection
