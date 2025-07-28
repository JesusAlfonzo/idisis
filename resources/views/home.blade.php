@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')



    {{-- @if (auth()->user()->hasRole('admin'))
        <p>Bienvenido Registrar usuarios al sistema</p>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Formulario de Registro</a>
    @else
    @endif



@stop --}}

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
