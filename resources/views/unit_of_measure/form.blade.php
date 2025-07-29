<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $unit->name ?? '') }}" required>
</div>
<div class="form-group">
    <label for="abbreviation">Abreviatura</label>
    <input type="text" name="abbreviation" class="form-control" value="{{ old('abbreviation', $unit->abbreviation ?? '') }}" required>
</div>
