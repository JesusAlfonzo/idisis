@extends('adminlte::page')

@section('content')
    <h1>Registrar nueva área</h1>
    <form action="{{ route('areas.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nombre del área" required>
        <button type="submit">Registrar</button>
    </form>
@endsection
