<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitOfMeasureRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:unit_of_measures,name',
            'abbreviation' => 'nullable|string|max:50|unique:unit_of_measures,abbreviation',
            'description' => 'nullable|string|max:500',
            'created_by' => 'nullable|string|max:255',
            'updated_by' => 'nullable|string|max:255',
            'deleted_by' => 'nullable|string|max:255',
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date',
            'deleted_at' => 'nullable|date',
        ];
    }
}
