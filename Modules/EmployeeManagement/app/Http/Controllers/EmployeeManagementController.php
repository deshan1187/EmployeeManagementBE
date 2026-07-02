<?php

namespace Modules\EmployeeManagement\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\EmployeeManagement\app\Repositories\EmployeeInterface;
use Modules\EmployeeManagement\app\Http\Requests\CalculateEmployeeRequest;
use Modules\EmployeeManagement\app\Http\Requests\StoreEmployeeRequest;
use Modules\EmployeeManagement\app\Http\Requests\UpdateEmployeeRequest;
use Exception;

class EmployeeManagementController extends Controller
{
    protected $repositoryInterface;

    public function __construct(EmployeeInterface $employeeInterface)
    {
        $this->repositoryInterface = $employeeInterface;
    }

    //get all employee
    public function getAll()
    {
        try {
            $employees = $this->repositoryInterface->getAllEmployees();

            return response()->json([
                'success' => true,
                'data'    => $employees,
                'message' => 'Employees fetched successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    //calculate salary 
    public function calculate(CalculateEmployeeRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $response = $this->repositoryInterface->calculate($validatedData);
            return response()->json([
                'success' => true,
                'data'    => $response,
                'message' => 'Calculated successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    //store employee details
    public function store(StoreEmployeeRequest $request)
    {
        $validatedData = $request->validated();

        try {
            $response = $this->repositoryInterface->store($validatedData);

            return response()->json([
                'success' => true,
                'data'    => $response,
                'message' => 'Employee created successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    //update employee details
    public function update(UpdateEmployeeRequest $request)
    {
        $validatedData = $request->validated();

        try {
            $response = $this->repositoryInterface->update($validatedData);

            return response()->json([
                'success' => true,
                'data'    => $response,
                'message' => 'Employee updated successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    //search employee using phone
    public function search(Request $request)
    {
        $phone = $request->query('phone');

        if (!$phone) {
            return response()->json([
                'success' => false,
                'error'   => 'Phone number is required'
            ], 422);
        }

        try {
            $response = $this->repositoryInterface->searchByPhone($phone);

            return response()->json([
                'success' => true,
                'data'    => $response,
                'message' => 'Employees fetched successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    //delete employee
    public function delete(Request $request)
    {
        $id = $request->query('id');

        if (!$id) {
            return response()->json([
                'success' => false,
                'error'   => 'Employee id is required'
            ], 422);
        }

        try {
            $this->repositoryInterface->delete($id);

            return response()->json([
                'success' => true,
                'message' => 'Employee deleted successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
