@extends('adminlte::page')

@section('title', 'Órdenes de Compra')

@section('content_header')
    <h1>Listado de Órdenes de Compra</h1>
@endsection

@section('content')
    <a href="{{ route('purchase_orders.create') }}" class="btn btn-primary mb-3">Nueva Orden de Compra</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Proveedor</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchase_orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->supplier->name ?? '' }}</td>
                    <td>{{ $order->date }}</td>
                    <td>{{ $order->total }}</td>
                    <td>
                        <a href="{{ route('purchase_orders.edit', $order) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('purchase_orders.destroy', $order) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
