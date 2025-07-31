@extends('adminlte::page')

@section('title', 'Editar Detalle de Orden de Compra')

@section('content_header')
    <h1>Editar Detalle de Orden de Compra</h1>
@endsection

@section('content')
    <form action="{{ route('purchase_order_details.update', $detail) }}" method="POST">
        @csrf
        @method('PUT')
        @include('purchase_order_details.form')
    </form>
@endsection
