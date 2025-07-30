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
        $unitId = $this->route('unit_of_measure');
        return [
            'name' => 'required|string|max:255|unique:unit_of_measure,name' . ($unitId ? ",{$unitId}" : ''),
            'abbreviation' => 'nullable|string|max:50|unique:unit_of_measure,abbreviation' . ($unitId ? ",{$unitId}" : ''),
        ];
    }
}
