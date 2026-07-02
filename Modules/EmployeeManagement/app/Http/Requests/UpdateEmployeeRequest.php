<?php

namespace Modules\EmployeeManagement\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            
            'id'                   => 'required|numeric',
            'phone'                   => 'required|string|max:20',
            'monthly_salary_package'  => 'required|numeric|min:0',
        ];
    }
}