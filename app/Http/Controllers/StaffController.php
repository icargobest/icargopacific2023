<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    private $staff;

    function __construct()
    {
        $this->staff = new Staff;
    }

    public function index()
    {
        $user_id = Auth::id();
        $staff = $this->staff->with('user')->where('company_id', $user_id)->get();
        return view('company.staff.index', compact('staff'));
    }
    

    public function viewArchive()
    {
        $user_id = Auth::id();
        $staff = $this->staff->where('company_id', $user_id)->get();
        return view('company.staff.view_archive', compact('staff'));
    }
    

    public function create()
    {
        return view('company/staff.create');
    }


    public function store(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = 5;
        $saved = $user->save();

        $staff = new Staff;

        $staff->user_id = $user->id;
        $staff->company_id= Auth::id();// Set the user_id foreign key to the id of the newly created User
        $staff->name = $request->name;
        $staff->contact_no = $request->contact_no;
        $staff->archived = false;
        $saved1 = $staff->save();

        if($saved && $saved1){
            return back()->with('success', 'Employee data created successfully!');
        }else{
            return back()->with('error', 'Failed to create employee data!');
        }
    }

    public function show($id)
    {
        $staff = $this->staff->getStaff($id);
        // Get the user associated with the staff member
        return view('company.staff.show', compact('staff', 'user'));
    }

    public function edit($id)
    {
        $staff = $this->staff->getStaff($id);
        // Get the user associated with the staff member
        $user = $staff->user;
        return view('company.staff.edit', compact('staff', 'user'));
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::find($id);
        $user = $staff->user;

        $user->name = $request->input('updateFullName');
        $user->email = $request->input('updateEmail');
        $user->password = Hash::make($request->input('updatePassword'));
        $user->save();

        $staff->name = $request->input('updateFullName');
        $staff->contact_no = $request->input('updateContactNo');
        $staff->save();

        return back()->with('success', 'Staff #'.$id.' data updated successfully!');
    }

    public function destroy($id)
    {
        Staff::destroy($id);
        return redirect()->route('staff.index')->with('success', 'Staff member has been deleted successfully.');
    }

    public function archive($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->archived = True;
        $staff->save();

        return redirect()->back()->with('success', 'Staff #'.$id.' data archived successfully.');
    }

    public function unarchive($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->archived = False;
        $staff->save();

        return redirect()->back()->with('success', 'Staff #'.$id.' data restored successfully.');
    }

}
