@extends('adminlte::page')

@section('title', 'Nuevo Detalle de Orden de Compra')

@section('content_header')
    <h1>Crear Detalle de Orden de Compra</h1>
@endsection

@section('content')
    <form action="{{ route('purchase_order_details.store') }}" method="POST">
        @csrf
        @include('purchase_order_details.form')
    </form>
@endsection
