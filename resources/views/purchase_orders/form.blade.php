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
    <label for="supplier_id">Proveedor</label>
    <select name="supplier_id" class="form-control" required>
        <option value="">Seleccione</option>
        @foreach($suppliers as $supplier)
            <option value="{{ $supplier->id }}" {{ old('supplier_id', $purchaseOrder->supplier_id ?? '') == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="employee_id">Empleado</label>
    <select name="employee_id" class="form-control" required>
        <option value="">Seleccione</option>
        @foreach($employees as $employee)
            <option value="{{ $employee->id }}" {{ old('employee_id', $purchaseOrder->employee_id ?? '') == $employee->id ? 'selected' : '' }}>{{ $employee->first_name }} {{ $employee->last_name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="requisition_id">Requisición</label>
    <select name="requisition_id" class="form-control">
        <option value="">Seleccione</option>
        @foreach($requisitions as $requisition)
            <option value="{{ $requisition->id }}" {{ old('requisition_id', $purchaseOrder->requisition_id ?? '') == $requisition->id ? 'selected' : '' }}>
                #{{ $requisition->id }} - {{ $requisition->status }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="order_date">Fecha</label>
    <input type="date" name="order_date" class="form-control" value="{{ old('order_date', $purchaseOrder->order_date ?? '') }}" required>
</div>

<div class="form-group">
    <label for="status">Estado</label>
    <select name="status" class="form-control" required>
        <option value="pending" {{ old('status', $purchaseOrder->status ?? 'pending') == 'pending' ? 'selected' : '' }}>Pendiente</option>
        <option value="approved" {{ old('status', $purchaseOrder->status ?? '') == 'approved' ? 'selected' : '' }}>Aprobada</option>
        <option value="rejected" {{ old('status', $purchaseOrder->status ?? '') == 'rejected' ? 'selected' : '' }}>Rechazada</option>
        <option value="completed" {{ old('status', $purchaseOrder->status ?? '') == 'completed' ? 'selected' : '' }}>Completada</option>
    </select>
</div>

<div class="form-group">
    <label for="total_amount">Total</label>
    <input type="number" step="0.01" name="total_amount" class="form-control" value="{{ old('total_amount', $purchaseOrder->total_amount ?? '') }}" required>
</div>

@include('purchase_order_details.form', [
    'details' => $purchaseOrder->purchaseOrderDetails ?? [],
    'products' => $products ?? [],
])
