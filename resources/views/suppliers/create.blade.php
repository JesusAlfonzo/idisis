@extends('adminlte::page')

@section('title', 'Nuevo Proveedor')

@section('content_header')
    <h1>Crear Proveedor</h1>
@endsection

@section('content')
    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        @include('suppliers.form')
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary px-4">Guardar</button>
            <a href="{{ route('suppliers.index') }}" class="btn btn-secondary ms-2 px-4">Cancelar</a>
        </div>
    </form>
@endsection
