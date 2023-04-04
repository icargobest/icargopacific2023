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

    function __construct(){
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
        return back()->with('success', 'Employee data created successfully!');
    }

    function edit($id){
        $data = Employee::find($id);
        return view('employee.edit', ['employee' => $data]);

    }

    function update(Request $request, $id){
        $data = Employee::find($id);
        $data->name = $request->input('updateFullName');
        $data->email = $request->input('updateEmail');
        $data->password = $request->input('updatePassword');
        $data->role = $request->input('updateRole');
        $data->save();
        return back()->with('success', 'Employee #'.$id.' data updated successfully!');
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

        return redirect()->back()->with('success', 'Employee #'.$id.' data archived successfully.');
    }

    public function unarchive($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->archived = 0;
        $employee->save();

        return redirect()->back()->with('success', 'Employee #'.$id.' data restored successfully.');
    }

}
