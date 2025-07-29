@extends('adminlte::page')

@section('content')
    <h1>Registrar nuevo usuario</h1>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        @include('admin.users.form')
        <button type="submit">Registrar</button>
    </form>
@endsection