<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $productId = $this->route('product');
        return [
            'name' => 'required|string|max:255|unique:products,name' . ($productId ? ",{$productId}" : ''),
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'presentation_id' => 'nullable|exists:presentations,id',
            'unit_of_measure_id' => 'required|exists:unit_of_measures,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'is_active' => 'sometimes|boolean',
        ];
    }
}
