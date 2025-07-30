<div class="mb-3">
    <label for="name" class="form-label">Nombre <span class="text-danger">*</span></label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $unitOfMeasure->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="abbreviation" class="form-label">Abreviatura</label>
    <input type="text" name="abbreviation" id="abbreviation" class="form-control @error('abbreviation') is-invalid @enderror" value="{{ old('abbreviation', $unitOfMeasure->abbreviation ?? '') }}">
    @error('abbreviation')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
