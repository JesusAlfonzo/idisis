@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card shadow-sm mb-4" style="border-radius: 16px;">
            <div class="card-header bg-primary text-white" style="border-radius: 16px 16px 0 0;">
                <h5 class="mb-0"><i class="fas fa-list"></i> Datos de la Categoría</h5>
            </div>
            <div class="card-body p-4">
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nombre <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name', $category->name ?? '') }}" required autocomplete="off">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="is_active" class="form-label fw-semibold">Estado</label>
                    <select name="is_active" id="is_active" class="form-select form-select-lg @error('is_active') is-invalid @enderror">
                        <option value="1" {{ old('is_active', $category->is_active ?? true) == 1 ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ old('is_active', $category->is_active ?? true) == 0 ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    @error('is_active')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
