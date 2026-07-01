<?php

namespace Modules\EmployeeManagement\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\EmployeeManagement\Database\Factories\EmployeeFactory;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'designation',
        'monthly_salary_package',
        'monthly_tax_value',
        'yearly_increasing_bonus',
        'monthly_net_salary',
        'yearly_net_salary',
    ];

    // protected static function newFactory(): EmployeeFactory
    // {
    //     // return EmployeeFactory::new();
    // }
}
