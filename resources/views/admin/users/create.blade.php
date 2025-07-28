@extends('adminlte::page')

@section('content')
    <h1>Registrar nuevo usuario</h1>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nombre" required>
        <input type="email" name="email" placeholder="Correo" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <select name="role" required>
            @foreach($roles as $role)
                <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
        </select>
        <button type="submit">Registrar</button>
    </form>
@endsection