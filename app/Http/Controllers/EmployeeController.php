<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $data = Employee::all();

        return view('employee.index', ['employees' => $data]);
    }

    function __construct()
    {
        $this->employee = new Employee;
    }

    public function addEmployee(Request $request){
        $data = [
            'name' => $request->FullName,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ];

        $this->employee->addEmployee($data);
        return back();
    }

    public function archiveEmployee($id){
        $this->employee->deleteEmployee($id);
        return back();
    }

    function updateEmployee($id){
        $emp=$this->employee->getEmployeeId($id);
        return view('employee.edit',compact('emp'));
    }

    function saveUpdatedEmployee(Request $request){
        $data = [
            'name' => $request->updateFullName,
            'email' => $request->updateEmail,
            'password' => $request->updatePassword,
            'role' => $request->updateRole
        ];
        $this->employee->updateEmployee($data,$request->id);
        return redirect()->route('EmployeePanel');
    }
}
