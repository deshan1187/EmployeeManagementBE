<?php

namespace Modules\EmployeeManagement\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\EmployeeManagement\app\Models\Employee;
use Modules\EmployeeManagement\app\Repositories\EmployeeInterface;
//namespace App\Http\Controllers;

use Exception;

class EmployeeManagementController extends Controller

{
    protected $repositoryInterface;

    public function __construct(EmployeeInterface $employeeInterface)
    {
        $this->repositoryInterface = $employeeInterface;
    }

    /**
     * Display a listing of employees
     */
    public function index()
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


    public function create()
    {
        return view('employeemanagement::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('employeemanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('employeemanagement::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
