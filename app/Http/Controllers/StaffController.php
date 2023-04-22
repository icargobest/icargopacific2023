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
        return view('company.staff.create');
    }


    public function store(Request $request)
    {
        // staff user account
        $user = new User;

        $validatedUser = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'Name field is required.',
            'password.required' => 'Password field is required.',
            'password.confirmed' => 'Password does not match.',
            'password.min' => 'Password must be a minimum of 8 characters',
            'email.required' => 'Email field is required.',
            'email.unique' => 'Email address must be unique within the organization',
            'email.email' => 'Email field must be email address.',
        ]);
        
        $validatedUser['type'] = '5'; // set the type to '3' driver
        $validatedUser['password'] = Hash::make($validatedUser['password']);
        $user = User::create($validatedUser);

        // staff linked to users table
        $staff = new Staff;
        $validatedStaff = $request->validate([
            'contact_no' => ['required', 'string', 'min:11', 'max:11'],
        ], [
            'contact_no.required' => 'Contact field is required.',
            'contact_no.max' => 'Contact no must be a min and max of 11 characters'
        ]);          
        
        $validatedStaff['user_id'] = $user->id;
        $validatedStaff['company_id'] =  Auth::id();
        $staff = Staff::create($validatedStaff);

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
