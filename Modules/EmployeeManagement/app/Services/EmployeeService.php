<?php

namespace Modules\EmployeeManagement\app\Services;

class EmployeeService
{
    public function calculateEmployeeDetails(array $data): array
    {
        $salary = $data['monthly_salary_package'];

        // Monthly Tax
        if ($salary >= 150000) {
            $tax = $salary * 0.05;
        } elseif ($salary >= 100000) {
            $tax = $salary * 0.03;
        } else {
            $tax = 0;
        }

        // Monthly Net Salary
        $monthlyNetSalary = $salary - $tax;

        // Yearly Bonus
        switch ($data['designation']) {
            case 'Manager':
                $bonus = $salary * 0.05;
                break;

            case 'Senior':
                $bonus = $salary * 0.03;
                break;

            case 'Associate':
                $bonus = $salary * 0.01;
                break;

            default:
                $bonus = 0;
        }

        // Yearly Net Salary
        $yearlyNetSalary = ($monthlyNetSalary * 12) + $bonus;

        $data['monthly_tax_value'] = $tax;
        $data['monthly_net_salary'] = $monthlyNetSalary;
        $data['yearly_increasing_bonus'] = $bonus;
        $data['yearly_net_salary'] = $yearlyNetSalary;

        return $data;
    }
}