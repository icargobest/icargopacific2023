<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Staff;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

    public function store(CreateUserRequest $request)
    {
        DB::beginTransaction();
        try {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => '5',
        ]);

        $otherValidation = $request->validate([
            'contact_no' => ['required', 'min:11', 'max:11'],
        ], [
            'contact_no.required' => 'Contact field is required.',
            'contact_no.min' => 'Contact nuber must be a min and max of 11 numbers',
            'contact_no.max' => 'Contact nuber must be a min and max of 11 numbers'
        ]);
    
        $staff = Staff::create([
            'contact_no' =>  $otherValidation['contact_no'],
            'user_id' => $user->id,
            'company_id' => Auth::id(),
        ]);
            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
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
        $staffData = [
            'contact_no' => $request->input('updateContactNo')
        ];

        $userData = [
            'name' => $request->input('updateFullName'),
            'email' => $request->input('updateEmail'),
            'password' => Hash::make($request->input('updatePassword')),
        ];
        
        $staff = Staff::find($id);
        $staff->update($staffData);

        $user = $staff->user;
        $user->update($userData);

        return redirect()->route('staff.index')
                ->with('success','Staff #'.$id.' has been updated successfully.');
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

    public function updateStatus($user_id, $status_code)
    {
            $update_user = User::whereId($user_id)->update([
                'status' => $status_code
            ]);
            $user_id = User::findOrFail($user_id);
            return back()->with('success', 'Staff  status updated successfully!');
    }

}
