<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Staff;
use App\Models\User;
use App\Models\Company;
use App\Models\Shipment;
use App\Models\Station;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
        $id = Auth::id();
        $company = Company::where('user_id', $id)->first();
        $user_id = $company->id;
        $staff = $this->staff->with('user')->where('company_id', $user_id)->get();
        return view('company.staff.index', compact('staff'));
    }


    public function viewArchive()
    {
        $id = Auth::id();
        $company = Company::where('user_id', $id)->first();
        $user_id = $company->id;
        $staff = $this->staff->with('user')->where('company_id', $user_id)->get();
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
        $user->sendEmailVerificationNotification();

            $id = Auth::id();
            $company = Company::where('user_id', $id)->first();
            $user_id = $company->id;

        $staff = Staff::create([
            'contact_no' =>  $otherValidation['contact_no'],
            'user_id' => $user->id,
            'company_id' => $user_id,
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

    public function assignStation($shipment_id, $station_id)
    {
        $shipmentData = [
            'station_id' => $station_id,
        ];

        $shipment = Shipment::find($shipment_id);
        $shipment->update($shipmentData);

        return back()->with('success', 'Driver was successfully assigned!');
    }

    public function index_edit($id)
    {
        $user = User::where('id', $id)->first();
        $staff = Staff::where('user_id', $user->id)->first();
        return view('staff_panel.profile.myProfile', compact('user', 'staff'));
    }

    public function edit_profile(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $staff = Staff::where('user_id', $id)->first();

        $validated = $this->validate($request, [
            'facebook' => ['required', 'url', 'max:255'],
            'website' => ['nullable', 'url', 'max:255'],
            'linkedin' => ['nullable', 'url', 'max:255'],
            'facebook.required' => 'Facebook Link is required',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        $staff->contact_no = $request->input('mobile');
        $staff->tel = $request->input('tel');
        $staff->street = $request->input('street');
        $staff->city = $request->input('city');
        $staff->state = $request->input('state');
        $staff->postal_code = $request->input('postal_code');
        $staff->facebook = $request->input('facebook');
        $staff->website = $request->input('website');
        $staff->linkedin = $request->input('linkedin');
        $staff->save();

        return back()->with('success', 'Profile account has been updated successfully.');
    }

    public function upload_photo(Request $request, $id)
    {
        $staff = Staff::where('user_id', $id)->first();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = 'public/photos/' . Auth::user()->name;

            // Create the folder if it doesn't exist
            if (!Storage::exists($path)) {
                Storage::makeDirectory($path);
            }

            // Store the photo in the user's folder
            $file->storeAs($path, $filename);

            // Save the photo path in the customer record
            $staff->photo = 'photos/' . Auth::user()->name . '/' . $filename;
            $staff->save();
        }

        return redirect()->back()->with('success', 'Profile image has been updated successfully.');
    }
}
