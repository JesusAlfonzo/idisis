<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'supplier_id' => 'required|exists:suppliers,id',
            'order_date' => 'required|date',
            'status' => 'required|string|in:pending,approved,rejected,completed',
            'total_amount' => 'required|numeric|min:0',
            'created_by' => 'nullable|string|max:255',
            'updated_by' => 'nullable|string|max:255',
            'deleted_by' => 'nullable|string|max:255',
            // Additional rules can be added here if needed
            'employee_id' => 'required|exists:employees,id',
            'requisition_id' => 'nullable|exists:requisitions,id',
            'purchase_order_details' => 'required|array',
            'purchase_order_details.*.product_id' => 'required|exists:products,id',
            'purchase_order_details.*.quantity' => 'required|integer|min:1',
            'purchase_order_details.*.price' => 'required|numeric|min:0',
        ];
    }
}
