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
    <label for="quantity">Cantidad</label>
    <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $movement->quantity ?? '') }}" required>
</div>
<div class="form-group">
    <label for="type">Tipo</label>
    <input type="text" name="type" class="form-control" value="{{ old('type', $movement->type ?? '') }}" required>
</div>
<div class="form-group">
    <label for="date">Fecha</label>
    <input type="date" name="date" class="form-control" value="{{ old('date', $movement->date ?? '') }}" required>
</div>
