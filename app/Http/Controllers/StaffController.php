<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStaffRequest;
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
        return view('company.staff.create');
    }

    public function store(CreateStaffRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => '5',
        ]);
    
        $staff = Staff::create([
            'contact_no' => $request->contact_no,
            'user_id' => $user->id,
            'company_id' => Auth::id(),
        ]);
    
        return redirect()->route('staff.index')
                ->with('success','Staff has been created successfully.');
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

    public function update(CreateStaffRequest $request, $id)
    {
        $staffData = [
            'contact_no' => $request->input('contact_no')
        ];

        $userData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ];
        
        $staff = Staff::find($id);
        $staff->update($staffData);

        $user = $staff->user;
        $user->update($userData);

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
