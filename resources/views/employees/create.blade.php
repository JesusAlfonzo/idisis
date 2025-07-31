@extends('adminlte::page')

@section('title', 'Registrar nuevo empleado')

@section('content_header')
    <h1>Registrar nuevo empleado</h1>
@endsection

@section('content')
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        @include('employees.form', ['employee' => null, 'areas' => $areas])
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary px-4">Registrar</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary ms-2 px-4">Cancelar</a>
        </div>
    </form>
@endsection
