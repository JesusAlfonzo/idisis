<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $employee->name ?? '') }}" required>
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email ?? '') }}">
</div>
<div class="form-group">
    <label for="area_id">Área</label>
    <select name="area_id" class="form-control">
        <option value="">Seleccione</option>
        @foreach($areas as $area)
            <option value="{{ $area->id }}" {{ old('area_id', $employee->area_id ?? '') == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
        @endforeach
    </select>
</div>
