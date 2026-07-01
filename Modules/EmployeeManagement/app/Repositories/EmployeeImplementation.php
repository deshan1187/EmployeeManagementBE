<?php

namespace Modules\EmployeeManagement\app\Repositories;

use Modules\EmployeeManagement\app\Models\Employee;
use Modules\NutritionManagement\app\Models\meal;
use Modules\NutritionManagement\app\Models\MealItem;
use Modules\NutritionManagement\app\Models\assignPlan;
use Modules\NutritionManagement\app\Models\Member;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Modules\NutritionManagement\app\Models\Trainer;

class EmployeeImplementation implements EmployeeInterface
{
    public function getAllEmployees()
    {
        return Employee::all();
    }
}
