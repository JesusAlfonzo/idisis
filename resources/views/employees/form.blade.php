@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
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
                <h5 class="mb-0"><i class="fas fa-id-card"></i> Datos del Empleado</h5>
            </div>
            <div class="card-body p-4">
                <div class="mb-3">
                    <label for="first_name" class="form-label fw-semibold">Nombre <span class="text-danger">*</span></label>
                    <input type="text" name="first_name" id="first_name" class="form-control form-control-lg @error('first_name') is-invalid @enderror" value="{{ old('first_name', $employee->first_name ?? '') }}" required autocomplete="off">
                    @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label fw-semibold">Apellido <span class="text-danger">*</span></label>
                    <input type="text" name="last_name" id="last_name" class="form-control form-control-lg @error('last_name') is-invalid @enderror" value="{{ old('last_name', $employee->last_name ?? '') }}" required autocomplete="off">
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="position" class="form-label fw-semibold">Cargo</label>
                    <input type="text" name="position" id="position" class="form-control form-control-lg @error('position') is-invalid @enderror" value="{{ old('position', $employee->position ?? '') }}" autocomplete="off">
                    @error('position')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="area_id" class="form-label fw-semibold">Área <span class="text-danger">*</span></label>
                    <select name="area_id" id="area_id" class="form-control form-control-lg @error('area_id') is-invalid @enderror" required>
                        <option value="">Seleccione</option>
                        @foreach($areas as $area)
                            <option value="{{ $area->id }}" {{ old('area_id', $employee->area_id ?? '') == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                        @endforeach
                    </select>
                    @error('area_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
