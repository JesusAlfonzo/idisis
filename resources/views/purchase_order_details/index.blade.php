@extends('adminlte::page')

@section('title', 'Detalles de Orden de Compra')

@section('content_header')
    <h1>Listado de Detalles de Orden de Compra</h1>
@endsection

@section('content')
    <a href="{{ route('purchase_order_details.create') }}" class="btn btn-primary mb-3">Nuevo Detalle</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Orden de Compra</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchaseOrderDetails as $detail)
                <tr>
                    <td>{{ $detail->id }}</td>
                    <td>{{ $detail->purchaseOrder->id ?? '' }}</td>
                    <td>{{ $detail->product->name ?? '' }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ $detail->unit_price }}</td>
                    <td>
                        <a href="{{ route('purchase_order_details.edit', $detail) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('purchase_order_details.destroy', $detail) }}" method="POST" style="display:inline-block">
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
