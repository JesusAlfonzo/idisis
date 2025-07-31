
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
                <i class="fas fa-user-tie"></i> Datos de Proveedor y Empleado
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="supplier_id">Proveedor</label>
                    <select name="supplier_id" class="form-control form-control-lg" required>
                        <option value="">Seleccione</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ old('supplier_id', $purchaseOrder->supplier_id ?? '') == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="employee_id">Empleado</label>
                    <select name="employee_id" class="form-control form-control-lg" required>
                        <option value="">Seleccione</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ old('employee_id', $purchaseOrder->employee_id ?? '') == $employee->id ? 'selected' : '' }}>{{ $employee->first_name }} {{ $employee->last_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="requisition_id">Requisición</label>
                    <select name="requisition_id" class="form-control form-control-lg">
                        <option value="">Seleccione</option>
                        @foreach($requisitions as $requisition)
                            <option value="{{ $requisition->id }}" {{ old('requisition_id', $purchaseOrder->requisition_id ?? '') == $requisition->id ? 'selected' : '' }}>
                                #{{ $requisition->id }} - {{ $requisition->status }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card border-info shadow h-100">
            <div class="card-header bg-info text-white">
                <i class="fas fa-calendar-alt"></i> Fechas
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="order_date">Fecha</label>
                    <input type="date" name="order_date" class="form-control form-control-lg" value="{{ old('order_date', $purchaseOrder->order_date ?? '') }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="expected_delivery_date">Fecha de Entrega Esperada</label>
                    <input type="date" name="expected_delivery_date" class="form-control form-control-lg" value="{{ old('expected_delivery_date', $purchaseOrder->expected_delivery_date ?? '') }}">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card border-success shadow h-100">
            <div class="card-header bg-success text-white">
                <i class="fas fa-tasks"></i> Estado y Total
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="status">Estado</label>
                    <select name="status" class="form-control form-control-lg" required>
                        <option value="pending" {{ old('status', $purchaseOrder->status ?? 'pending') == 'pending' ? 'selected' : '' }}>Pendiente</option>
                        <option value="approved" {{ old('status', $purchaseOrder->status ?? '') == 'approved' ? 'selected' : '' }}>Aprobada</option>
                        <option value="rejected" {{ old('status', $purchaseOrder->status ?? '') == 'rejected' ? 'selected' : '' }}>Rechazada</option>
                        <option value="completed" {{ old('status', $purchaseOrder->status ?? '') == 'completed' ? 'selected' : '' }}>Completada</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="total_amount">Total</label>
                    <input type="number" step="0.01" name="total_amount" class="form-control form-control-lg" value="{{ old('total_amount', $purchaseOrder->total_amount ?? '') }}" required>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card border-secondary shadow h-100">
            <div class="card-header bg-secondary text-white">
                <i class="fas fa-list"></i> Detalles de la Orden
            </div>
            <div class="card-body">
                @include('purchase_order_details.form', [
                    'details' => $purchaseOrder->purchaseOrderDetails ?? [],
                    'products' => $products ?? [],
                ])
            </div>
        </div>
    </div>
</div>


