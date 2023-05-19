<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dispatcher;
use App\Models\Driver;
use App\Models\Staff;
use App\Models\Company;
use App\Models\VerifyToken;
use App\Models\Station;
use Exception;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DispatcherController extends Controller
{
    private $dispatcher;

    function __construct()
    {
        $this->dispatcher = new Dispatcher;
    }

    public function index()
    {
        $station = Station::all();

        $id = Auth::id();
        $company = Company::where('user_id', $id)->first();
        $user_id = $company->id;
        $dispatchers = $this->dispatcher->with('user')->where('company_id', $user_id)->get();
        return view('company/dispatcher.index', compact('dispatchers'), ['stations' => $station, ]);
    }

    public function staffIndex()
    {
        $station = Station::all();
        
        $user_id = Auth::id();
        $staff = Staff::where('user_id', $user_id)->first();
        if ($staff) {
            $company_id = $staff->company_id;
            $dispatchers = $this->dispatcher->with('user')->where('company_id', $company_id)->get();
        }
        return view('staff_panel/dispatcher.index', compact('dispatchers'), ['stations' => $station, ]);
    }

    function viewArchive(){

        $id = Auth::id();
        $company = Company::where('user_id', $id)->first();
        $user_id = $company->id;
        $dispatchers = $this->dispatcher->with('user')->where('company_id', $user_id)->get();
        return view('company/dispatcher.viewArchive', compact('dispatchers'));
    }

    function staffviewArchive(){

        $user_id = Auth::id();
        $staff = Staff::where('user_id', $user_id)->first();
        if ($staff) {
            $company_id = $staff->company_id;
            $dispatchers = $this->dispatcher->with('user')->where('company_id', $company_id)->get();
        }
        return view('staff_panel/dispatcher.viewArchive', compact('dispatchers'));
    }


    public function create()
    {
        return view('company/dispatcher.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => '4',
            ]);
    
            $otherValidation = $request->validate([
                'contact_no' => ['required', 'min:11', 'max:11'],
            ], [
                'contact_no.required' => 'Contact field is required.',
                'contact_no.max' => 'Contact number must be a min and max of 11 numbers'
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
                $file->move('storage/images/dispatcher/'.$user->id ,$filename);
            }
            $drivers = Dispatcher::create([
                'user_id' => $user->id,
                'company_id' => $user_id,
                'station_id' => $request->station_id,
                'contact_no' =>  $otherValidation['contact_no'],
                'tel' => $request->tel,
                'street' => $request->street,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'image' =>  $filename,
            ]);
          
            DB::commit();
          } catch (Exception $ex) {
                DB::rollBack();
                throw $ex;
                
          }

        return back()->with('success','Dispatcher has been created successfully.');
    }

    public function show(User $users)
    {
        return view('dispatcher.show', compact('users'));
    }

    public function edit(User $users)
    {
        return view('dispatcher.edit',compact('users'));
    }

    public function update($id, Request $request)
    {
        $dispatcher = Dispatcher::find($id);
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
        $user = $dispatcher->user;
        $user->update( [
            'name' => $request->name,
            'password' => !empty($validated['password']) ? Hash::make($validated['password']) : $user->password,
        ]);
        $delete_token = VerifyToken::where('token', $get_token->token)->first();
        $delete_token->delete();
    }


        if($request->hasfile('image')){
            $destination = 'storage/images/dispatcher/'.$dispatcher->user_id.'/'.$dispatcher->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/images/dispatcher/'.$dispatcher->user_id ,$filename);
        }else{
            $filename = $dispatcher->image;
        }
        $dispatcherData = [
            'contact_no' => $request->contact_no,
            'tel' => $request->tel,
            'street' => $request->street,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'image' =>  $filename,
        ];
        
        $dispatcher->update($dispatcherData);

        return back()->with('success', 'Dispatcher #'.$id.' data updated successfully!');
    }

    public function destroy($id){
        Dispatcher::destroy($id);
        return redirect()->route('dispatcher.index')->with('success','Dispatcher has been deleted successfully');
    }

    public function archive($id)
    {
        $id = Dispatcher::findOrFail($id);
        $id->archived = True;
        $id->save();
        return back()->with('success', 'Dispatcher #'.$id->id.' Archived successfully!');
    }

    public function unarchive($id)
    {
        $id = Dispatcher::findOrFail($id);
        $id->archived = False;
        $id->save();
        return back()->with('success', 'Dispatcher #'.$id->id.' Restore successfully!');
    }

    public function updateStatus($user_id, $status_code)
    {
            $update_user = User::whereId($user_id)->update([
                'status' => $status_code
            ]);
            $user_id = User::findOrFail($user_id);
            return back()->with('success', 'Dispatcher status updated successfully!');
    }

    public function assignDriver($shipment_id, $driver_id)
    {
        $shipmentData = [
            'driver_id' => $driver_id,
        ];

        $driverData = [
            'dispatcher_id' => Auth::id()
        ];

        $shipment = Shipment::find($shipment_id);
        $shipment->update($shipmentData);

        $dispatch = Driver::where('id', $driver_id)->first();
        $dispatch->update($driverData);

        return back()->with('success', 'Driver was successfully assigned!');
        
    }

    public function dispatcherProfile()
    {
        $user_id = Auth::id();
        $dispatchers = $this->dispatcher->with('user')->where('user_id', $user_id)->get();
        return view('dispatcher_panel/profile.user', compact('dispatchers'));
    }

    public function updateProfile($id, Request $request)
    {
        $validated = $this->validate($request, [
            'facebook' => ['required', 'url', 'max:255'],
            'facebook.required' => 'Facebook Link is required',
        ]);

        $dispatcherData = [
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
        
        $dispatcher = Dispatcher::find($id);
        $dispatcher->update($dispatcherData);

        $user = $dispatcher->user;
        $user->update($userData);

        return back()->with('success', 'Updated successfully!');
        
    }

    public function updateImage($id, Request $request)
    {
        $dispatcher = Dispatcher::find($id);
        if($request->hasfile('image')){
            $destination = 'storage/images/dispatcher/'.$dispatcher->user_id.'/'.$dispatcher->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/images/dispatcher/'.$dispatcher->user_id ,$filename);
        }
        $dispatcherData = [
            'image' =>  $filename,
        ];
        
        $dispatcher->update($dispatcherData);

        return back()->with('success', 'Profile picture updated successfully!');
    }

}
