<?php

namespace Modules\EmployeeManagement\app\Repositories;

use Modules\EmployeeManagement\app\Models\Employee;
use Modules\EmployeeManagement\app\Services\EmployeeService;

class EmployeeImplementation implements EmployeeInterface
{
    protected EmployeeService $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    //get all employee
    public function getAllEmployees()
    {
        return Employee::all();
    }

    //calculate salary 
    public function calculate($data)
    {
        return $this->employeeService->calculateEmployeeDetails($data);
    }

    //store employee details
    public function store($data)
    {
        // run calculattion for salary
        $calculated = $this->employeeService->calculateEmployeeDetails($data);

        $employee = new Employee();
        $employee->name                    = $calculated['name'];
        $employee->email                   = $calculated['email'];
        $employee->phone                   = $calculated['phone'];
        $employee->designation             = $calculated['designation'];
        $employee->monthly_salary_package  = $calculated['monthly_salary_package'];
        $employee->monthly_tax_value       = $calculated['monthly_tax_value'];
        $employee->yearly_increasing_bonus = $calculated['yearly_increasing_bonus'];
        $employee->monthly_net_salary      = $calculated['monthly_net_salary'];
        $employee->yearly_net_salary       = $calculated['yearly_net_salary'];
        $employee->save();

        return $employee;
    }

    //update employee details
    public function update($data)
    {
        $employee = Employee::findOrFail($data['id']);

        $calculated = $this->employeeService->calculateEmployeeDetails([
            'designation'            => $employee->designation,
            'monthly_salary_package' => $data['monthly_salary_package'],
        ]);

        $employee->phone                   = $data['phone'];
        $employee->monthly_salary_package  = $calculated['monthly_salary_package'];
        $employee->monthly_tax_value       = $calculated['monthly_tax_value'];
        $employee->yearly_increasing_bonus = $calculated['yearly_increasing_bonus'];
        $employee->monthly_net_salary      = $calculated['monthly_net_salary'];
        $employee->yearly_net_salary       = $calculated['yearly_net_salary'];
        $employee->save();

        return $employee;
    }

    //search employee using phone
    public function searchByPhone($phone)
    {
        return Employee::where('phone', 'like', '%' . $phone . '%')->get();
    }

    //delete employee
    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return true;
    }
}
