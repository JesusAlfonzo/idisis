<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryMovementRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:0.01',
            'product_id' => 'required|exists:products,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'employee_id' => 'required|exists:employees,id',
            'inventory_lot_id' => 'nullable|exists:inventory_lots,id',
            'notes' => 'nullable|string',
        ];
    }
}
