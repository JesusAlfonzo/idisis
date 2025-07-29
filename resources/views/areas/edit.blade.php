@extends('adminlte::page')

@section('title', 'Editar Área')

@section('content_header')
    <h1>Editar Área</h1>
@endsection

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('areas.update', $area) }}" method="POST">
        @csrf
        @method('PUT')
        @include('areas.form')
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('areas.index') }}" class="btn btn-secondary">Volver</a>
    </form>
@endsection
@extends('adminlte::page')

@section('title', 'Editar Área')

@section('content_header')
    <h1>Editar Área</h1>
@endsection

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('areas.update', $area) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $area->name) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" class="form-control">{{ old('description', $area->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('areas.index') }}" class="btn btn-secondary">Volver</a>
    </form>
@endsection
