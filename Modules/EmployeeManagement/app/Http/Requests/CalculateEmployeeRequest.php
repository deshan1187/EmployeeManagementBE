<?php

namespace Modules\EmployeeManagement\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculateEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'designation'             => 'required|in:Intern,Associate,Senior,Manager',
            'monthly_salary_package'  => 'required|numeric|min:0',
        ];
    }
}