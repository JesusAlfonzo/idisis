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
            'sku' => 'nullable|string|max:50|unique:products,sku' . ($productId ? ",{$productId}" : '') . '|regex:/^[A-Za-z0-9\-_.]+$/',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0.01',
            'reorder_point' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'presentation_id' => 'nullable|exists:presentations,id',
            'unit_of_measure_id' => 'required|exists:unit_of_measures,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'is_kit' => 'sometimes|boolean',
            'uses_per_kit' => 'required_if:is_kit,1|nullable|integer|min:1',
            'is_active' => 'sometimes|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre del producto es obligatorio.',
            'name.unique' => 'Ya existe un producto con ese nombre.',
            'name.max' => 'El nombre no puede superar los 255 caracteres.',
            'sku.unique' => 'El SKU ya está registrado para otro producto.',
            'sku.max' => 'El SKU no puede superar los 50 caracteres.',
            'sku.regex' => 'El SKU solo puede contener letras, números, guiones, guiones bajos y puntos.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio debe ser un número.',
            'price.min' => 'El precio debe ser mayor a 0.',
            'reorder_point.required' => 'El punto de reorden es obligatorio.',
            'reorder_point.integer' => 'El punto de reorden debe ser un número entero.',
            'reorder_point.min' => 'El punto de reorden no puede ser negativo.',
            'category_id.required' => 'Debe seleccionar una categoría.',
            'category_id.exists' => 'La categoría seleccionada no existe.',
            'brand_id.exists' => 'La marca seleccionada no existe.',
            'presentation_id.exists' => 'La presentación seleccionada no existe.',
            'unit_of_measure_id.required' => 'Debe seleccionar una unidad de medida.',
            'unit_of_measure_id.exists' => 'La unidad de medida seleccionada no existe.',
            'supplier_id.exists' => 'El proveedor seleccionado no existe.',
            'uses_per_kit.required_if' => 'Debe indicar la cantidad de usos por kit si el producto es un kit.',
            'uses_per_kit.integer' => 'La cantidad de usos por kit debe ser un número entero.',
            'uses_per_kit.min' => 'La cantidad de usos por kit debe ser mayor a 0.',
        ];
    }
}
