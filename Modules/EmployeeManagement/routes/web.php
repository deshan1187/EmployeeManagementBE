<?php

use Illuminate\Support\Facades\Route;
use Modules\EmployeeManagement\Http\Controllers\EmployeeManagementController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('employeemanagements', EmployeeManagementController::class)->names('employeemanagement');
});
