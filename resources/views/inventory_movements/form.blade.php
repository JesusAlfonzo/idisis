
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
    <label for="type">Tipo</label>
    <input type="text" name="type" class="form-control" value="{{ old('type', $movement->type ?? '') }}" required>
</div>

<div class="form-group">
    <label for="quantity">Cantidad</label>
    <input type="number" step="0.01" name="quantity" class="form-control" value="{{ old('quantity', $movement->quantity ?? '') }}" required>
</div>

<div class="form-group">
    <label for="product_id">Producto</label>
    <select name="product_id" class="form-control" required>
        <option value="">Seleccione</option>
        @foreach($products as $product)
            <option value="{{ $product->id }}" {{ old('product_id', $movement->product_id ?? '') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="warehouse_id">Almacén</label>
    <select name="warehouse_id" class="form-control" required>
        <option value="">Seleccione</option>
        @foreach($warehouses as $warehouse)
            <option value="{{ $warehouse->id }}" {{ old('warehouse_id', $movement->warehouse_id ?? '') == $warehouse->id ? 'selected' : '' }}>{{ $warehouse->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="employee_id">Empleado</label>
    <select name="employee_id" class="form-control" required>
        <option value="">Seleccione</option>
        @foreach($employees as $employee)
            <option value="{{ $employee->id }}" {{ old('employee_id', $movement->employee_id ?? '') == $employee->id ? 'selected' : '' }}>{{ $employee->first_name }} {{ $employee->last_name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="inventory_lot_id">Lote de Inventario</label>
    <select name="inventory_lot_id" class="form-control">
        <option value="">Seleccione</option>
        @foreach($lots as $lot)
            <option value="{{ $lot->id }}" {{ old('inventory_lot_id', $movement->inventory_lot_id ?? '') == $lot->id ? 'selected' : '' }}>
                Lote #{{ $lot->id }} - {{ $lot->product->name ?? '' }} ({{ $lot->quantity }})
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="notes">Notas</label>
    <textarea name="notes" class="form-control">{{ old('notes', $movement->notes ?? '') }}</textarea>
</div>
