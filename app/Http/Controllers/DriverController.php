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
use Illuminate\Support\Facades\File;

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
    
    public function superadminIndex()
    {
        $drivers = Driver::with('company.user')
            ->where('archived', 0)
            ->get();

        return view('icargo_superadmin_panel.driver.index', compact('drivers'));
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

    public function superadminviewArchive(){

        $drivers = Driver::with('company.user')
            ->where('archived', 1)
            ->get();

        return view('icargo_superadmin_panel.driver.viewArchive', compact('drivers'));
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
            if($request->hasfile('image')){
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('storage/images/driver/'.$user->id ,$filename);
            }
            $drivers = Driver::create([
                'user_id' => $user->id,
                'vehicle_type' => $otherValidation['vehicle_type'],
                'plate_no' => $otherValidation['plate_no'],
                'license_number' => $otherValidation['license_number'],
                'contact_no' =>  $otherValidation['contact_no'],
                'tel' => $request->tel,
                'street' => $request->street,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'company_id' => $user_id,
                'image' => $filename,
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
        $driver = Driver::find($id);

        $validated = $this->validate($request, [
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'password.confirmed' => 'Password does not match.',
            'password.min' => 'Password must be a minimum of 8 characters',
        ]);

        $user = $driver->user;
        $user->update( [
            'name' => $request->name,
            'email' => $request->email,
            'password' => !empty($validated['password']) ? Hash::make($validated['password']) : $user->password,
        ]);

        if($request->hasfile('image')){
            $destination = 'storage/images/driver/'.$driver->user_id.'/'.$driver->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/images/driver/'.$driver->user_id ,$filename);
        }else{
            $filename = $driver->image;
        }
        
        $driverData = [
            'vehicle_type' => $request->vehicle_type,
            'plate_no' => $request->plate_no,
            'license_number' => $request->license_number,
            'contact_no' => $request->contact_no,
            'tel' => $request->tel,
            'street' => $request->street,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'image' => $filename,
        ];
        $driver->update($driverData);

        return back()->with('success','Staff #'.$id.' has been updated successfully.');
    }

    public function superadminUpdate($id, Request $request)
    {
        $driver = Driver::find($id);
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

            $user = $driver->user;
            $user->update( [
                'name' => $request->name,
                'email' => $request->email,
                'password' => !empty($validated['password']) ? Hash::make($validated['password']) : $user->password,
            ]);

            if($request->hasfile('image')){
                $destination = 'storage/images/driver/'.$driver->user_id.'/'.$driver->image;
                if(File::exists($destination)){
                    File::delete($destination);
                }
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('storage/images/driver/'.$driver->user_id ,$filename);
            }else{
                $filename = $driver->image;
            }
            
            $driverData = [
                'vehicle_type' => $request->vehicle_type,
                'plate_no' => $request->plate_no,
                'license_number' => $request->license_number,
                'contact_no' => $request->contact_no,
                'tel' => $request->tel,
                'street' => $request->street,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'image' => $filename,
            ];
            $driver->update($driverData);

            $delete_token = VerifyToken::where('token', $get_token->token)->first();
            $delete_token->delete();
            return back()->with('success','Staff #'.$id.' has been updated successfully.');
        }
        else{
            return back()->with('warning','Please verify the account with OTP before modifying data.');
        };
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

    public function driverProfile()
    {
        $user_id = Auth::id();
        $drivers = $this->driver->with('user')->where('user_id', $user_id)->get();
        return view('driver_panel/profile.user', compact('drivers'));
    }

    public function updateProfile($id, Request $request)
    {
        $validated = $this->validate($request, [
            'facebook' => ['required', 'url', 'max:255'],
            'facebook.required' => 'Facebook Link is required',
        ]);

        $driverData = [
            'vehicle_type' => $request->vehicle_type,
            'plate_no' => $request->plate_no,
            'license_number' => $request->license_number,
            'contact_no' => $request->contact_no,
            'tel' => $request->tel,
            'street' => $request->street,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'facebook' => $validated['facebook'],
            'linkedin' => $request->linkedin,
        ];

        $userData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];
        
        $driver = Driver::find($id);
        $driver->update($driverData);

        $user = $driver->user;
        $user->update($userData);

        return back()->with('success', 'Updated successfully!');
        
    }

    public function updateImage($id, Request $request)
    {
        $driver = Driver::find($id);
        if($request->hasfile('image')){
            $destination = 'storage/images/driver/'.$driver->user_id.'/'.$driver->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/images/driver/'.$driver->user_id ,$filename);
        }
        $driverData = [
            'image' =>  $filename,
        ];
        
        $driver->update($driverData);

        return back()->with('success', 'Profile picture updated successfully!');
    }

}
