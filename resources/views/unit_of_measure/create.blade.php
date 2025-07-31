@extends('adminlte::page')

@section('title', 'Nueva Unidad de Medida')

@section('content_header')
    <h1>Crear Unidad de Medida</h1>
@endsection

@section('content')
    <form action="{{ route('unit_of_measure.store') }}" method="POST">
        @csrf
        @include('unit_of_measure.form', ['unitOfMeasure' => null])
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary px-4">Guardar</button>
            <a href="{{ route('unit_of_measure.index') }}" class="btn btn-secondary ms-2 px-4">Cancelar</a>
        </div>
    </form>
@endsection
