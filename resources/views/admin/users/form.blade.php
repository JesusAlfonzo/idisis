@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
</div>
<div class="form-group">
    <label for="email">Correo</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" required>
</div>
<div class="form-group">
    <label for="password">Contraseña{{ isset($user) ? ' (dejar en blanco para no cambiar)' : '' }}</label>
    <input type="password" name="password" class="form-control">
</div>
<div class="form-group">
    <label for="employee_id">Empleado</label>
    <select name="employee_id" class="form-control" required>
        <option value="">Seleccione un empleado</option>
        @foreach($employees as $employee)
            <option value="{{ $employee->id }}" {{ old('employee_id', $user->employee_id ?? '') == $employee->id ? 'selected' : '' }}>
                {{ $employee->first_name }} {{ $employee->last_name }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="role_id">Rol</label>
    <select name="role_id" class="form-control" required>
        <option value="">Seleccione</option>
        @foreach($roles as $role)
            <option value="{{ $role->id }}" {{ old('role_id', (isset($user) && $user->roles->first() ? $user->roles->first()->id : '')) == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
        @endforeach
    </select>
</div>
