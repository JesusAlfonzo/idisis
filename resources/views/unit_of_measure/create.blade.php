@extends('adminlte::page')

@section('title', 'Nueva Unidad de Medida')

@section('content_header')
    <h1>Crear Unidad de Medida</h1>
@endsection

@section('content')
    <form action="{{ route('unit_of_measure.store') }}" method="POST">
        @csrf
        @include('unit_of_measure.form', ['unitOfMeasure' => null])
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('unit_of_measure.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
