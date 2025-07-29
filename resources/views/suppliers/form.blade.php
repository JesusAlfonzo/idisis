<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $supplier->name ?? '') }}" required>
</div>
<div class="form-group">
    <label for="rif">RIF</label>
    <input type="text" name="rif" class="form-control" value="{{ old('rif', $supplier->rif ?? '') }}" required>
</div>
<div class="form-group">
    <label for="phone">Teléfono</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $supplier->phone ?? '') }}">
</div>
