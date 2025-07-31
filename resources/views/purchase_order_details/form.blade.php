<div class="form-group">
    <label for="purchase_order_id">Orden de Compra</label>
    <select name="purchase_order_id" class="form-control" required>
        <option value="">Seleccione</option>
        @foreach(isset($purchaseOrders) ? $purchaseOrders : [] as $order)
            <option value="{{ $order->id }}" {{ old('purchase_order_id', $detail->purchase_order_id ?? '') == $order->id ? 'selected' : '' }}>{{ $order->id }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="product_id">Producto</label>
    <select name="product_id" class="form-control" required>
        <option value="">Seleccione</option>
        @foreach($products as $product)
            <option value="{{ $product->id }}" {{ old('product_id', $detail->product_id ?? '') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="quantity">Cantidad</label>
    <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $detail->quantity ?? '') }}" required>
</div>
<div class="form-group">
    <label for="unit_price">Precio Unitario</label>
    <input type="number" step="0.01" name="unit_price" class="form-control" value="{{ old('unit_price', $detail->unit_price ?? '') }}" required>
</div>
