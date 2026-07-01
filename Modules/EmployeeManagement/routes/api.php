<?php

use Illuminate\Support\Facades\Route;
use Modules\EmployeeManagement\app\Http\Controllers\EmployeeManagementController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('employeemanagements', EmployeeManagementController::class)->names('employeemanagement');
});

Route::prefix('employee')->group(function () {
    // add submission
    Route::get('get', [EmployeeManagementController::class, 'index']);
});