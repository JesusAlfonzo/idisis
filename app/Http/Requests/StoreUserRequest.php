<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = $this->route('user');
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email' . ($userId ? ",{$userId}" : ''),
            'employee_id' => 'required|exists:employees,id',
            'role_id' => 'required|exists:roles,id',
        ];

        // Solo requerir password al crear
        if ($this->isMethod('post')) {
            $rules['password'] = 'required|min:6';
        } else {
            $rules['password'] = 'nullable|min:6';
        }

        return $rules;
    }
}
