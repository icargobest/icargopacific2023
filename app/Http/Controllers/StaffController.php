<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Staff;
use App\Models\User;
use App\Models\Company;
use App\Models\VerifyToken;
use App\Models\Shipment;
use App\Models\Station;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Mail;

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

    public function superadminIndex()
    {
        $staffs = Staff::with('company.user')
            ->where('archived', 0)
            ->get();

        return view('icargo_superadmin_panel.staff.index', compact('staffs'));
    }

    public function viewArchive()
    {
        $id = Auth::id();
        $company = Company::where('user_id', $id)->first();
        $user_id = $company->id;
        $staff = $this->staff->with('user')->where('company_id', $user_id)->get();
        return view('company.staff.view_archive', compact('staff'));
    }

    public function superadminviewArchive(){

        $staffs = Staff::with('company.user')
            ->where('archived', 1)
            ->get();

        return view('icargo_superadmin_panel.staff.viewArchive', compact('staffs'));
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

        $validated = $this->validate($request, [
            'contact_no' => ['required', 'min:11', 'max:11'],
            'contact_no.required' => 'Contact field is required.',
            'contact_no.min' => 'Contact nuber must be a min and max of 11 numbers',
            'contact_no.max' => 'Contact nuber must be a min and max of 11 numbers',
        ]);

        $user->sendEmailVerificationNotification();

            $id = Auth::id();
            $company = Company::where('user_id', $id)->first();
            $user_id = $company->id;

        $staff = Staff::create([
            'user_id' => $user->id,
            'company_id' => $user_id,
            'contact_no' =>  $validated['contact_no'],
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

    public function updateStaff(Request $request, $id)
    {
         $staff = Staff::find($id);
    
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = 'public/images/staff/' . Auth::id();

            // Create the folder if it doesn't exist
            if (!Storage::exists($path)) {
                Storage::makeDirectory($path);
            }

            // Store the photo in the user's folder
            $file->storeAs($path, $filename);

            // Save the photo path in the customer record
            $staff->photo = 'images/staff/' . Auth::id() . '/' . $filename;
            $staff->save();
        }

        $staff->contact_no = $request->input('contact_no');
        $staff->tel = $request->input('tel');
        $staff->street = $request->input('street');
        $staff->city = $request->input('city');
        $staff->state = $request->input('state');
        $staff->postal_code = $request->input('postal_code');
        $staff->facebook = $request->input('facebook');
        $staff->linkedin = $request->input('linkedin');
        $staff->save();
    
        $userData = [
            'name' => $request->input('updateFullName'),
            'email' => $request->input('updateEmail'),
        ];
    
        // Update the user data
        $user = $staff->user;
        $user->update($userData);
    
        return redirect()->route('staff.index')
            ->with('success', 'Staff #' . $id . ' has been updated successfully.');
    }

    public function superadminUpdate(Request $request, $id)
    {
        $staff = Staff::with('user')->findOrFail($id);
        $user = $staff->user;
        $get_token = $request->otp;
        $get_token = VerifyToken::where('token', $get_token)->first();
    
        $validated = $this->validate($request, [
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'password.confirmed' => 'Password does not match.',
            'password.min' => 'Password must be a minimum of 8 characters',
        ]);

        if($get_token){
            $get_token->is_activated = 1;
            $get_token->save();

            $user->update([
                'name' => $request->name,
                'email' => $request->email ?? $user->email,
                'password' => !empty($validated['password']) ? Hash::make($validated['password']) : $user->password,
            ]);

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = 'public/images/staff/' . Auth::id();
    
                // Create the folder if it doesn't exist
                if (!Storage::exists($path)) {
                    Storage::makeDirectory($path);
                }
    
                // Store the photo in the user's folder
                $file->storeAs($path, $filename);
    
                // Save the photo path in the customer record
                $staff->photo = 'images/staff/' . Auth::id() . '/' . $filename;
                $staff->save();
            }
            
            $staff->update([
                'contact_no' =>  $request->contact_no,
                'tel' => $request->tel,
                'street' => $request->street,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'facebook' => $request->facebook,
                'linkedin' => $request->linkedin,
            ]);

            $delete_token = VerifyToken::where('token', $get_token->token)->first();
            $delete_token->delete();

            return back()->with('success','Staff #'.$id.' has been updated successfully.');
        }

        return back()->with('warning','Please verify the account with OTP before modifying data.');
    }

    public function sendOTP($id){

        $data = User::findOrFail($id);

        $validToken = rand(10,100..'2022');
        $get_token = new VerifyToken();
        $get_token->token = $validToken;
        $get_token->email = $data['email'];
        $get_token->save();
        $get_user_email = $data['email'];
        $get_user_name = $data['name'];
        Mail::to($data['email'])->send(new VerificationMail($get_user_email, $validToken, $get_user_name));

        return back()->with('message', 'OTP sent. Please ask the otp from the email owner.');
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
