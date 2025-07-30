@extends('adminlte::page')

@section('title', 'Editar Unidad de Medida')

@section('content_header')
    <h1>Editar Unidad de Medida</h1>
@endsection

@section('content')
    <form action="{{ route('unit_of_measure.update', $unitOfMeasure) }}" method="POST">
        @csrf
        @method('PUT')
        @include('unit_of_measure.form', ['unitOfMeasure' => $unitOfMeasure])
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('unit_of_measure.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
