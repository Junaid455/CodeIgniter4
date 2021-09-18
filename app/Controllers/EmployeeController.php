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
        // print_r($this->request->getPost('femail'));
        $employee = new Employee;
        $data = [
            'first_name' => $this->request->getPost('fname'),
            'last_name' => $this->request->getPost('lname'),
            'email' => $this->request->getPost('femail')
        ];
        $employee->save($data);
        $data = ['status'=>'Employees Created Succesfully'];
        return $this->response->setJSON($data);
    }

    public function getEmployee()
    {
        $employee = new Employee;
        $data['employees'] = $employee->findAll();
        return $this->response->setJSON($data);
    }
    
    public function viewEmployee()
    {
        $employee = new Employee;
        $data['employee'] = $employee->find($this->request->getPost('empID'));
        return $this->response->setJSON($data);
    }

    public function deleteEmployee()
    {
        $employee = new Employee;
        $d = $employee->delete($this->request->getPost('empID'));
        if($d)
        {
            $data = ['status'=>'Employees Deleted Succesfully'];
        }
        else {
            $data = ['status'=>'Employees Not Deleted Succesfully'];
        }
        return $this->response->setJSON($data);
    }
}