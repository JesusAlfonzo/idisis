<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $warehouse->name ?? '') }}" required>
</div>
<div class="form-group">
    <label for="location">Ubicación</label>
    <input type="text" name="location" class="form-control" value="{{ old('location', $warehouse->location ?? '') }}">
</div>
