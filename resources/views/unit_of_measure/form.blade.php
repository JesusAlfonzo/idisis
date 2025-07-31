<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card shadow-sm mb-4" style="border-radius: 16px;">
            <div class="card-header bg-primary text-white" style="border-radius: 16px 16px 0 0;">
                <h5 class="mb-0"><i class="fas fa-ruler"></i> Unidad de Medida</h5>
            </div>
            <div class="card-body p-4">
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nombre <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name', $unitOfMeasure->name ?? '') }}" required autocomplete="off">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="abbreviation" class="form-label fw-semibold">Abreviatura</label>
                    <input type="text" name="abbreviation" id="abbreviation" class="form-control form-control-lg @error('abbreviation') is-invalid @enderror" value="{{ old('abbreviation', $unitOfMeasure->abbreviation ?? '') }}" autocomplete="off">
                    @error('abbreviation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
