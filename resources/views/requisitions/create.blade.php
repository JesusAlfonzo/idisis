@extends('adminlte::page')

@section('title', 'Nueva Requisición')

@section('content_header')
    <h1>Crear Requisición</h1>
@endsection

@section('content')
    <form action="{{ route('requisitions.store') }}" method="POST">
        @csrf
        @include('requisitions.form', [
            'requisition' => $requisition ?? new \App\Models\Requisition(),
            'areas' => $areas,
            'employees' => $employees
        ])
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('requisitions.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
