@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label for="area_id">Área</label>
    <select name="area_id" class="form-control" required>
        <option value="">Seleccione</option>
        @foreach($areas as $area)
            <option value="{{ $area->id }}" {{ old('area_id', $requisition->area_id ?? '') == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="employee_id">Empleado</label>
    <select name="employee_id" class="form-control" required>
        <option value="">Seleccione</option>
        @foreach($employees as $employee)
            <option value="{{ $employee->id }}" {{ old('employee_id', $requisition->employee_id ?? '') == $employee->id ? 'selected' : '' }}>{{ $employee->first_name }} {{ $employee->last_name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="date">Fecha</label>
    <input type="date" name="date" class="form-control" value="{{ old('date', $requisition->date ?? '') }}" required>
</div>
<div class="form-group">
    <label for="status">Estado</label>
    <select name="status" class="form-control" required>
        <option value="pending" {{ old('status', $requisition->status ?? 'pending') == 'pending' ? 'selected' : '' }}>Pendiente</option>
        <option value="approved" {{ old('status', $requisition->status ?? '') == 'approved' ? 'selected' : '' }}>Aprobada</option>
        <option value="rejected" {{ old('status', $requisition->status ?? '') == 'rejected' ? 'selected' : '' }}>Rechazada</option>
    </select>
</div>
