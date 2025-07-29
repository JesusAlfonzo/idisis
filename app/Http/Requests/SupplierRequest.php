<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:suppliers,name',
            'email' => 'nullable|email|max:255|unique:suppliers,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'created_by' => 'nullable|string|max:255',
            'updated_by' => 'nullable|string|max:255',
            'deleted_by' => 'nullable|string|max:255',
            // Additional rules can be added here if needed
            'contact_person' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'tax_id' => 'nullable|string|max:50',
            'notes' => 'nullable|string|max:500',
            'status' => 'nullable|in:active,inactive',
            'country' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'state' => 'nullable|string|max:100',
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date',
            'deleted_at' => 'nullable|date',
            'supplier_type' => 'nullable|string|max:50',
            'supplier_category' => 'nullable|string|max:50',
            'supplier_rating' => 'nullable|numeric|min:1|max:5',
            'supplier_since' => 'nullable|date',
            'payment_terms' => 'nullable|string|max:255',
            'shipping_terms' => 'nullable|string|max:255',
            'bank_account' => 'nullable|string|max:50', 
        ];
    }
}
