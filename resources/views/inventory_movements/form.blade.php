

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card border-primary shadow h-100">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-exchange-alt"></i> Movimiento
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="type">Tipo</label>
                    <input type="text" name="type" class="form-control form-control-lg" value="{{ old('type', $movement->type ?? '') }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="quantity">Cantidad</label>
                    <input type="number" step="0.01" name="quantity" class="form-control form-control-lg" value="{{ old('quantity', $movement->quantity ?? '') }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="notes">Notas</label>
                    <textarea name="notes" class="form-control form-control-lg">{{ old('notes', $movement->notes ?? '') }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card border-info shadow h-100">
            <div class="card-header bg-info text-white">
                <i class="fas fa-link"></i> Documento Relacionado
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="related_document_type">Tipo de Documento Relacionado</label>
                    <input type="text" name="related_document_type" class="form-control form-control-lg" value="{{ old('related_document_type', $movement->related_document_type ?? '') }}">
                </div>
                <div class="form-group mb-3">
                    <label for="related_document_id">ID de Documento Relacionado</label>
                    <input type="number" name="related_document_id" class="form-control form-control-lg" value="{{ old('related_document_id', $movement->related_document_id ?? '') }}">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card border-success shadow h-100">
            <div class="card-header bg-success text-white">
                <i class="fas fa-box"></i> Producto y Lote
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="product_id">Producto</label>
                    <select name="product_id" class="form-control form-control-lg" required>
                        <option value="">Seleccione</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ old('product_id', $movement->product_id ?? '') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="inventory_lot_id">Lote de Inventario</label>
                    <select name="inventory_lot_id" class="form-control form-control-lg">
                        <option value="">Seleccione</option>
                        @foreach($lots as $lot)
                            <option value="{{ $lot->id }}" {{ old('inventory_lot_id', $movement->inventory_lot_id ?? '') == $lot->id ? 'selected' : '' }}>
                                Lote #{{ $lot->id }} - {{ $lot->product->name ?? '' }} ({{ $lot->quantity }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card border-secondary shadow h-100">
            <div class="card-header bg-secondary text-white">
                <i class="fas fa-warehouse"></i> Almacén y Empleado
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="warehouse_id">Almacén</label>
                    <select name="warehouse_id" class="form-control form-control-lg" required>
                        <option value="">Seleccione</option>
                        @foreach($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}" {{ old('warehouse_id', $movement->warehouse_id ?? '') == $warehouse->id ? 'selected' : '' }}>{{ $warehouse->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="employee_id">Empleado</label>
                    <select name="employee_id" class="form-control form-control-lg" required>
                        <option value="">Seleccione</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ old('employee_id', $movement->employee_id ?? '') == $employee->id ? 'selected' : '' }}>{{ $employee->first_name }} {{ $employee->last_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
