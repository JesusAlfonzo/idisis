
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card border-primary shadow h-100">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-map-marker-alt"></i> Área y Solicitante
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="destination_area_id">Área Destino</label>
                    <select name="destination_area_id" class="form-control form-control-lg" required>
                        <option value="">Seleccione</option>
                        @foreach($areas as $area)
                            <option value="{{ $area->id }}" {{ old('destination_area_id', $requisition->destination_area_id ?? '') == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="requesting_employee_id">Empleado Solicitante</label>
                    <select name="requesting_employee_id" class="form-control form-control-lg" required>
                        <option value="">Seleccione</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ old('requesting_employee_id', $requisition->requesting_employee_id ?? '') == $employee->id ? 'selected' : '' }}>{{ $employee->first_name }} {{ $employee->last_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card border-info shadow h-100">
            <div class="card-header bg-info text-white">
                <i class="fas fa-user-check"></i> Procesado y Estado
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="processed_by_employee_id">Procesado por</label>
                    <select name="processed_by_employee_id" class="form-control form-control-lg">
                        <option value="">Seleccione</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ old('processed_by_employee_id', $requisition->processed_by_employee_id ?? '') == $employee->id ? 'selected' : '' }}>{{ $employee->first_name }} {{ $employee->last_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="status">Estado</label>
                    <select name="status" class="form-control form-control-lg" required>
                        <option value="pendiente" {{ old('status', $requisition->status ?? 'pendiente') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="approved" {{ old('status', $requisition->status ?? '') == 'approved' ? 'selected' : '' }}>Aprobada</option>
                        <option value="rejected" {{ old('status', $requisition->status ?? '') == 'rejected' ? 'selected' : '' }}>Rechazada</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-secondary shadow h-100">
            <div class="card-header bg-secondary text-white">
                <i class="fas fa-sticky-note"></i> Notas
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="notes">Notas</label>
                    <textarea name="notes" class="form-control form-control-lg" rows="3">{{ old('notes', $requisition->notes ?? '') }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
