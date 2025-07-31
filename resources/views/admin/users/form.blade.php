
@if ($errors->any())
    <div class="alert alert-danger shadow-sm mb-4">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card shadow-sm mb-4" style="border-radius: 16px;">
            <div class="card-header bg-primary text-white" style="border-radius: 16px 16px 0 0;">
                <h5 class="mb-0"><i class="fas fa-user"></i> Datos del Usuario</h5>
            </div>
            <div class="card-body p-4">
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nombre <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name', $user->name ?? '') }}" required autocomplete="off">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Correo <span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email', $user->email ?? '') }}" required autocomplete="off">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Contraseña{{ isset($user) ? ' (dejar en blanco para no cambiar)' : '' }}</label>
                    <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="employee_id" class="form-label fw-semibold">Empleado <span class="text-danger">*</span></label>
                        <select name="employee_id" id="employee_id" class="form-control form-control-lg @error('employee_id') is-invalid @enderror" required>
                            <option value="">Seleccione un empleado</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('employee_id', $user->employee_id ?? '') == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('employee_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="role_id" class="form-label fw-semibold">Rol <span class="text-danger">*</span></label>
                        <select name="role_id" id="role_id" class="form-control form-control-lg @error('role_id') is-invalid @enderror" required>
                            <option value="">Seleccione</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ old('role_id', (isset($user) && $user->roles->first() ? $user->roles->first()->id : '')) == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
