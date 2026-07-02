<?php

namespace Modules\EmployeeManagement\app\Repositories;

interface EmployeeInterface
{ 
    //get all employee
    public function getAllEmployees();
    //calculate salary 
    public function calculate($data);
    //store employee details
    public function store($data);
    //update employee details
    public function update($data);
    //search employee using phone
    public function searchByPhone($phone);
    //delete employee
    public function delete($id);
}
