@extends('adminlte::page')

@section('title', 'Editar Requisición')

@section('content_header')
    <h1>Editar Requisición</h1>
@endsection

@section('content')
    <form action="{{ route('requisitions.update', $requisition) }}" method="POST">
        @csrf
        @method('PUT')
        @include('requisitions.form', [
            'requisition' => $requisition,
            'areas' => $areas,
            'employees' => $employees
        ])
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('requisitions.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
