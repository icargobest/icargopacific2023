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

    function viewArchive(){
        $data = Employee::all();

        return view('employee.view_archive', ['employees' => $data]);
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

    function updateEmployee($id){
        $emp=$this->employee->getEmployeeId($id);
        return view('employee.edit',compact('emp'));
    }

    function saveUpdatedEmployee(Request $request){
        $data = [
            'name' => $request->updateFullName,
            'email' => $request->updateEmail,
            'password' => $request->updatePassword,
            'role' => $request->updateRole,
        ];
        $this->employee->updateEmployee($data,$request->id);
        return redirect()->route('EmployeePanel');
    }

    function viewEmployee($id){
        $emp=$this->employee->getEmployeeId($id);
        return view('employee.view',compact('emp'));
    }

    public function archive($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->archived = 1;
        $employee->save();

        return redirect()->route('EmployeePanel')->with('success', 'Employee data archived successfully.');
    }

    public function unarchive($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->archived = 0;
        $employee->save();

        return redirect()->route('viewArchive')->with('success', 'Employee date restore successfully.');
    }

}
