<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Driver;
use App\Models\User;
use App\Models\Staff;
use App\Models\Company;
use App\Models\VerifyToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Drivers;
use Exception;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{
    private $driver;
    
    public function index()
    {
        $id = Auth::id();
        $company = Company::where('user_id', $id)->first();
        $user_id = $company->id;
        $drivers = $this->driver->with('user')->where('company_id', $user_id)->get();
        return view('company/drivers.index', compact('drivers'));
    }

    public function staffIndex()
    {
        $user_id = Auth::id();
        $staff = Staff::where('user_id', $user_id)->first();
        if ($staff) {
            $company_id = $staff->company_id;
            $drivers = $this->driver->with('user')->where('company_id', $company_id)->get();
        }
        return view('staff_panel/drivers.index', compact('drivers'));
    }

    function viewArchive(){

        $id = Auth::id();
        $company = Company::where('user_id', $id)->first();
        $user_id = $company->id;
        $drivers = $this->driver->with('user')->where('company_id', $user_id)->get();
        return view('company/drivers.viewArchive', compact('drivers'));
    }

    function staffviewArchive(){

        $user_id = Auth::id();
        $staff = Staff::where('user_id', $user_id)->first();
        if ($staff) {
            $company_id = $staff->company_id;
            $drivers = $this->driver->with('user')->where('company_id', $company_id)->get();
        }
        return view('staff_panel/drivers.viewArchive', compact('drivers'));
    }


    public function create()
    {
        return view('company/drivers.create');
    }

    function __construct()
    {
        $this->driver = new Driver;
    }

    public function store(CreateUserRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => '3',
            ]);
    
            $otherValidation = $request->validate([
                'contact_no' => ['required', 'min:11', 'max:11'],
                'vehicle_type' => ['required'],
                'plate_no' => ['required', 'min:6', 'max:8'],
                'license_number' => ['required', 'min:11', 'max:11'],
            ], [
                'contact_no.required' => 'Contact field is required.',
                'contact_no.max' => 'Contact number must be a min and max of 11 numbers',
                'vehicle_type.required' => 'Vehicle type field is required.',
                'plate_no.required' => 'Plate number field is required.',
                'plate_no.max' => 'Plate number must be a min of 6 and max of 8 characters',
                'license_number.required' => 'License number field is required.',
                'license_number.max' => 'Plate number must be a min and max of 11 characters'
            ]);

            $user->sendEmailVerificationNotification();
            
            if(Auth::user()->type == 'staff'){
                $id = Auth::id();
                $staff = Staff::where('user_id', $id)->first();
                $company_id = $staff->company_id;
                $company = Company::where('id', $company_id)->first();
                $user_id = $company->id;

            }else{
                $id = Auth::id();
                $company = Company::where('user_id', $id)->first();
                $user_id = $company->id;
            }
            $drivers = Driver::create([
                'user_id' => $user->id,
                'vehicle_type' => $otherValidation['vehicle_type'],
                'plate_no' => $otherValidation['plate_no'],
                'license_number' => $otherValidation['license_number'],
                'contact_no' =>  $otherValidation['contact_no'],
                'company_id' => $user_id,
            ]);
          
            DB::commit();
          } catch (Exception $ex) {
                DB::rollBack();
                throw $ex;
                
          }
       
        return back()->with('success','Driver has been created successfully.');
    }

    public function show(User $users)
    {
        return view('drivers.show', compact('users'));
    }

    public function edit(User $users)
    {
        return view('drivers.edit',compact('users'));
    }

    public function update($id, Request $request)
    {
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
        $driverData = [
            'vehicle_type' => $request->vehicle_type,
            'plate_no' => $request->plate_no,
            'license_number' => $request->license_number,
            'contact_no' => $request->contact_no,
        ];

        $driver = Driver::find($id);
        $driver->update($driverData);

        $user = $driver->user;
        $user->update( [
            'name' => $request->name,
            'password' => !empty($validated['password']) ? Hash::make($validated['password']) : $user->password,
        ]);
        $delete_token = VerifyToken::where('token', $get_token->token)->first();
        $delete_token->delete();
    }
        return back()->with('success', 'Driver #'.$id.' data updated successfully!');
        
    }

    public function destroy($id){
        Driver::destroy($id);
        return redirect()->route('drivers.index')->with('success','Driver has been deleted successfully');
    }

    public function archive($id)
    {
        $id = Driver::findOrFail($id);
        $id->archived = True;
        $id->save();
        return back()->with('success', 'Driver #'.$id->id.' Archived successfully!');
    }

    public function unarchive($id)
    {
        $id = Driver::findOrFail($id);
        $id->archived = False;
        $id->save();
        return back()->with('success', 'Driver #'.$id->id.' Restore successfully!');
    }

    public function updateStatus($user_id, $status_code)
    {
            $update_user = User::whereId($user_id)->update([
                'status' => $status_code
            ]);
            $user_id = User::findOrFail($user_id);
            return back()->with('success', 'Driver status updated successfully!');
    }

}
