<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Employee;

class EmployeeController extends BaseController
{
    public function index()
    {
        return view('employees/create');
    }

    public function store()
    {
        $employee = new Employee();
        $data = [
            'first_name' => $this->request->getPost('fname'),
            'last_name' => $this->request->getPost('lname'),
            'email' => $this->request->getPost('femail'),
        ];
        $employee->save($data);
        $data['setudent'] = ['status'=>'Employees Created Succesfully'];
        return $this->reponse->setJSON($data);
    }
}
