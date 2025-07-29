<div class="form-group">
    <label for="supplier_id">Proveedor</label>
    <select name="supplier_id" class="form-control" required>
        <option value="">Seleccione</option>
        @foreach($suppliers as $supplier)
            <option value="{{ $supplier->id }}" {{ old('supplier_id', $order->supplier_id ?? '') == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="date">Fecha</label>
    <input type="date" name="date" class="form-control" value="{{ old('date', $order->date ?? '') }}" required>
</div>
<div class="form-group">
    <label for="total">Total</label>
    <input type="number" step="0.01" name="total" class="form-control" value="{{ old('total', $order->total ?? '') }}" required>
</div>
