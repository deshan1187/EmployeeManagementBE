<?php

use Illuminate\Support\Facades\Route;
use Modules\EmployeeManagement\app\Http\Controllers\EmployeeManagementController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('employeemanagements', EmployeeManagementController::class)->names('employeemanagement');
});

Route::prefix('employee')->group(function () {
    //get all employee
    Route::get('getall', [EmployeeManagementController::class, 'getAll']);
    //calculate salary 
    Route::post('calculate', [EmployeeManagementController::class, 'calculate']);
    //store employee details
    Route::post('store', [EmployeeManagementController::class, 'store']);
    //update employee details
    Route::put('update', [EmployeeManagementController::class, 'update']);
    //search employee using phone
    Route::get('search', [EmployeeManagementController::class, 'search']);
    //delete employee
    Route::delete('delete', [EmployeeManagementController::class, 'delete']);
});
