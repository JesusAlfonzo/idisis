@extends('adminlte::page')

@section('title', 'Nuevo Proveedor')

@section('content_header')
    <h1>Crear Proveedor</h1>
@endsection

@section('content')
    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        @include('suppliers.form')
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
