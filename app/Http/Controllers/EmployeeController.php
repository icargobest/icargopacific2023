<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = 4;
        $saved = $user->save();

        $staff = new Employee;

        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->password = Hash::make($request->password);
        $staff->archived = false;
        $staff->user_id = $user->id; // Set the user_id foreign key to the id of the newly created User
        $saved1 = $staff->save();

        if($saved && $saved1){
            return back()->with('success', 'Employee data created successfully!');
        }else{
            return back()->with('error', 'Failed to create employee data!');
        }
    }


    function edit($id){
        $data = User::find($id);
        return view('employee.edit', ['employee' => $data]);

    }

    function update(Request $request, $id){
        $user = User::find($id);
        $employee = Employee::where('user_id', $user->id)->first();

        $name = $request->input('updateFullName');
        $email = $request->input('updateEmail');
        $password = Hash::make($request->input('updatePassword'));

        if ($user->name == $name && $user->email == $email && $user->password == $password) {
            return back()->with('warning', 'No changes were made to Employee #'.$id.' data.');
        }

        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->save();

        $employee->name = $name;
        $employee->email = $email;
        $employee->password = $password;
        $employee->save();

        return back()->with('success', 'Employee #'.$id.' data updated successfully!');
    }



    function viewEmployee($id){
        $emp=$this->employee->getEmployeeId($id);
        $emp->unhashed_password = bcrypt($emp->password);
        return view('employee.view',compact('emp'));
    }

    public function archive($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->archived = True;
        $employee->save();

        return redirect()->back()->with('success', 'Employee #'.$id.' data archived successfully.');
    }

    public function unarchive($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->archived = False;
        $employee->save();

        return redirect()->back()->with('success', 'Employee #'.$id.' data restored successfully.');
    }

}
