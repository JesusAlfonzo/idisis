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
            <option value="{{ $employee->id }}" {{ old('employee_id', $requisition->employee_id ?? '') == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="date">Fecha</label>
    <input type="date" name="date" class="form-control" value="{{ old('date', $requisition->date ?? '') }}" required>
</div>
<div class="form-group">
    <label for="status">Estado</label>
    <input type="text" name="status" class="form-control" value="{{ old('status', $requisition->status ?? '') }}" required>
</div>
