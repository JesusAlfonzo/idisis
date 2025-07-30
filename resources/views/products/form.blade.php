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
    <label for="name">Nombre</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}" required>
</div>
<div class="form-group">
    <label for="description">Descripción</label>
    <textarea name="description" class="form-control">{{ old('description', $product->description ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="price">Precio</label>
    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price ?? '') }}" required>
</div>
<div class="form-group">
    <label for="category_id">Categoría</label>
    <select name="category_id" class="form-control" required>
        <option value="">Seleccione</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="brand_id">Marca</label>
    <select name="brand_id" class="form-control">
        <option value="">Seleccione</option>
        @foreach($brands as $brand)
            <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id ?? '') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="presentation_id">Presentación</label>
    <select name="presentation_id" class="form-control">
        <option value="">Seleccione</option>
        @foreach($presentations as $presentation)
            <option value="{{ $presentation->id }}" {{ old('presentation_id', $product->presentation_id ?? '') == $presentation->id ? 'selected' : '' }}>{{ $presentation->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="unit_of_measure_id">Unidad de Medida</label>
    <select name="unit_of_measure_id" class="form-control" required>
        <option value="">Seleccione</option>
        @foreach($unitOfMeasures as $unit)
            <option value="{{ $unit->id }}" {{ old('unit_of_measure_id', $product->unit_of_measure_id ?? '') == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="supplier_id">Proveedor</label>
    <select name="supplier_id" class="form-control">
        <option value="">Seleccione</option>
        @foreach($suppliers as $supplier)
            <option value="{{ $supplier->id }}" {{ old('supplier_id', $product->supplier_id ?? '') == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="is_active">Activo</label>
    <select name="is_active" class="form-control" required>
        <option value="1" {{ old('is_active', $product->is_active ?? 1) == 1 ? 'selected' : '' }}>Sí</option>
        <option value="0" {{ old('is_active', $product->is_active ?? 1) == 0 ? 'selected' : '' }}>No</option>
    </select>
</div>
