@extends('adminlte::page')

@section('title', 'Registrar nuevo empleado')

@section('content_header')
    <h1>Registrar nuevo empleado</h1>
@endsection

@section('content')
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        @include('employees.form', ['employee' => null, 'areas' => $areas])
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
