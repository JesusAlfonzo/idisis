

@if ($errors->any())
    <div class="alert alert-danger shadow-sm mb-4">
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
    <h5 class="mb-0"><i class="fas fa-box"></i> Datos del Producto</h5>
</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control form-control-lg" value="{{ old('name', $product->name ?? '') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="sku" class="form-label">SKU</label>
                        <input type="text" name="sku" class="form-control form-control-lg" value="{{ old('sku', $product->sku ?? '') }}" maxlength="50" pattern="^[A-Za-z0-9\-_.]+$" title="Solo letras, números, guiones y puntos">
                        @error('sku')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea name="description" class="form-control form-control-lg" rows="2">{{ old('description', $product->description ?? '') }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="price" class="form-label">Precio</label>
                        <input type="number" step="0.01" name="price" class="form-control form-control-lg" value="{{ old('price', $product->price ?? '') }}" min="0.01" required>
                        @error('price')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="reorder_point" class="form-label">Punto de Reorden</label>
                        <input type="number" name="reorder_point" class="form-control form-control-lg" min="0" value="{{ old('reorder_point', $product->reorder_point ?? 0) }}" required>
                        @error('reorder_point')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="is_active" class="form-label">Activo</label>
                        <select name="is_active" class="form-control form-control-lg" required>
                            <option value="1" {{ old('is_active', $product->is_active ?? 1) == 1 ? 'selected' : '' }}>Sí</option>
                            <option value="0" {{ old('is_active', $product->is_active ?? 1) == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mb-4" style="border-radius: 16px;">
            <div class="card-header bg-secondary text-white" style="border-radius: 16px 16px 0 0;">
                <h5 class="mb-0"><i class="fas fa-cubes"></i> Clasificación y Proveedor</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="category_id" class="form-label">Categoría</label>
                        <select name="category_id" class="form-control form-control-lg" required>
                            <option value="">Seleccione</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="brand_id" class="form-label">Marca</label>
                        <select name="brand_id" class="form-control form-control-lg">
                            <option value="">Seleccione</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id ?? '') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="presentation_id" class="form-label">Presentación</label>
                        <select name="presentation_id" class="form-control form-control-lg">
                            <option value="">Seleccione</option>
                            @foreach ($presentations as $presentation)
                                <option value="{{ $presentation->id }}" {{ old('presentation_id', $product->presentation_id ?? '') == $presentation->id ? 'selected' : '' }}>{{ $presentation->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="unit_of_measure_id" class="form-label">Unidad de Medida</label>
                        <select name="unit_of_measure_id" class="form-control form-control-lg" required>
                            <option value="">Seleccione</option>
                            @foreach ($unitOfMeasures as $unit)
                                <option value="{{ $unit->id }}" {{ old('unit_of_measure_id', $product->unit_of_measure_id ?? '') == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                            @endforeach
                        </select>
                        @error('unit_of_measure_id')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="supplier_id" class="form-label">Proveedor</label>
                        <select name="supplier_id" class="form-control form-control-lg">
                            <option value="">Seleccione</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ old('supplier_id', $product->supplier_id ?? '') == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mb-4" style="border-radius: 16px;">
            <div class="card-header bg-info text-white" style="border-radius: 16px 16px 0 0;">
                <h5 class="mb-0"><i class="fas fa-layer-group"></i> Configuración de Kit</h5>
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-4 mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_kit" id="is_kit" value="1" {{ old('is_kit', $product->is_kit ?? 0) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_kit">¿Es kit?</label>
                        </div>
                    </div>
                    <div class="col-md-8 mb-3" id="uses_per_kit_group" style="display:none">
                        <label for="uses_per_kit" class="form-label">Usos por kit</label>
                        <input type="number" name="uses_per_kit" id="uses_per_kit" class="form-control form-control-lg" min="1" value="{{ old('uses_per_kit', $product->uses_per_kit ?? '') }}">
                        <small class="form-text text-muted">Cantidad de usos que permite un solo kit de este producto.</small>
                        <div id="uses_per_kit_error" class="text-danger small"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleKitFields() {
        var isKit = document.getElementById('is_kit').checked;
        var usesGroup = document.getElementById('uses_per_kit_group');
        var usesInput = document.getElementById('uses_per_kit');
        var usesError = document.getElementById('uses_per_kit_error');
        usesGroup.style.display = isKit ? '' : 'none';
        if (!isKit) {
            usesInput.value = '';
            usesError.textContent = '';
        }
    }

    function validateForm(e) {
        var isKit = document.getElementById('is_kit').checked;
        var usesInput = document.getElementById('uses_per_kit');
        var usesError = document.getElementById('uses_per_kit_error');
        if (isKit && (!usesInput.value || parseInt(usesInput.value) < 1)) {
            usesError.textContent = 'Este campo es obligatorio y debe ser mayor a 0.';
            usesInput.focus();
            e.preventDefault();
            return false;
        } else {
            usesError.textContent = '';
        }
        return true;
    }
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('is_kit').addEventListener('change', toggleKitFields);
        toggleKitFields();
        var form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', validateForm);
        }
    });
</script>
