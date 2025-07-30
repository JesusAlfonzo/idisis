<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $presentation->name ?? '') }}" required>
</div>
<div class="form-group">
    <label for="description">Descripción</label>
    <textarea name="description" class="form-control">{{ old('description', $presentation->description ?? '') }}</textarea>
</div>
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
    <label for="is_active">Activo</label>
    <select name="is_active" class="form-control" required>
        <option value="1" {{ old('is_active', $presentation->is_active ?? 1) == 1 ? 'selected' : '' }}>Sí</option>
        <option value="0" {{ old('is_active', $presentation->is_active ?? 1) == 0 ? 'selected' : '' }}>No</option>
    </select>
</div>
