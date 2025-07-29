<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $area->name ?? '') }}" required>
</div>
<div class="form-group">
    <label for="description">Descripción</label>
    <textarea name="description" class="form-control">{{ old('description', $area->description ?? '') }}</textarea>
</div>
