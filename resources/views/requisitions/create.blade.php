@extends('adminlte::page')

@section('title', 'Nueva Requisición')

@section('content_header')
    <h1>Crear Requisición</h1>
@endsection

@section('content')
    <form action="{{ route('requisitions.store') }}" method="POST">
        @csrf
        @include('requisitions.form', [
            'requisition' => $requisition ?? new \App\Models\Requisition(),
            'areas' => $areas,
            'employees' => $employees
        ])
        <div class="row mt-4 pb-5">
            <div class="col-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg mx-2"><i class="fas fa-save"></i> Guardar</button>
                <a href="{{ route('requisitions.index') }}" class="btn btn-secondary btn-lg mx-2"><i class="fas fa-times"></i> Cancelar</a>
            </div>
        </div>
    </form>
@endsection
