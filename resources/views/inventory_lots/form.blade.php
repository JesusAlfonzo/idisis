@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card border-primary shadow h-100">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-box"></i> Producto y Almacén
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="product_id">Producto</label>
                    <select name="product_id" id="product_id" class="form-control form-control-lg" required>
                        <option value="">Seleccione</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" data-is-kit="{{ $product->is_kit ? 1 : 0 }}" data-uses-per-kit="{{ $product->uses_per_kit ?? '' }}" {{ old('product_id', $lot->product_id ?? '') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <div id="kit-info" class="alert alert-info mt-2" style="display:none">
                        <span id="kit-info-text"></span>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="warehouse_id">Almacén</label>
                    <select name="warehouse_id" class="form-control form-control-lg" required>
                        <option value="">Seleccione</option>
                        @foreach($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}" {{ old('warehouse_id', $lot->warehouse_id ?? '') == $warehouse->id ? 'selected' : '' }}>{{ $warehouse->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card border-info shadow h-100">
            <div class="card-header bg-info text-white">
                <i class="fas fa-hashtag"></i> Lote y Cantidad
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="lot_number">Número de Lote</label>
                    <input type="text" name="lot_number" class="form-control form-control-lg" value="{{ old('lot_number', $lot->lot_number ?? '') }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="quantity">Cantidad</label>
                    <input type="number" name="quantity" id="quantity" class="form-control form-control-lg" value="{{ old('quantity', $lot->quantity ?? '') }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="cost">Costo</label>
                    <input type="number" step="0.01" name="cost" class="form-control form-control-lg" value="{{ old('cost', $lot->cost ?? '') }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="uses_remaining">Usos Restantes</label>
                    <input type="number" name="uses_remaining" class="form-control form-control-lg" value="{{ old('uses_remaining', $lot->uses_remaining ?? '') }}">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-secondary shadow h-100">
            <div class="card-header bg-secondary text-white">
                <i class="fas fa-calendar-alt"></i> Fecha de Vencimiento
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="expiration_date">Fecha de Vencimiento</label>
                    <input type="date" name="expiration_date" class="form-control form-control-lg" value="{{ old('expiration_date', $lot->expiration_date ?? '') }}">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function updateKitInfo() {
        var select = document.getElementById('product_id');
        var selected = select.options[select.selectedIndex];
        var isKit = selected.getAttribute('data-is-kit');
        var usesPerKit = selected.getAttribute('data-uses-per-kit');
        var kitInfo = document.getElementById('kit-info');
        var kitInfoText = document.getElementById('kit-info-text');
        if (isKit == '1' && usesPerKit && usesPerKit > 0) {
            kitInfo.style.display = '';
            kitInfoText.innerHTML = 'Este producto es un <b>kit</b>. Cada unidad equivale a <b>' + usesPerKit + '</b> usos. Al crear el lote, los usos totales serán: <b>' + (document.getElementById('quantity').value || 0) * usesPerKit + '</b>.';
        } else {
            kitInfo.style.display = 'none';
            kitInfoText.innerHTML = '';
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('product_id').addEventListener('change', updateKitInfo);
        document.getElementById('quantity').addEventListener('input', updateKitInfo);
        updateKitInfo();
    });
</script>
