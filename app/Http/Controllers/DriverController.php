<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Drivers;

class DriverController extends Controller
{
    private $type;
    private $validate;
    private $update_user;
    
    public function index(User $users)
    {
        $type = '3';
        $users = User::where('type','=', $type)->paginate(100);
        return view('company/drivers.index', compact('users'));
    }

    function viewArchive(User $users){

        $type = '3';
        $users = User::where('type','=', $type)->paginate(100);
        return view('company/drivers.viewArchive', compact('users'));
    }


    public function create()
    {
        return view('company/drivers.create');
    }

    function __construct()
    {
        $this->driver = new Driver;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
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
            'email.email' => 'Email field must be email address.'
        ]);

        $validated['type'] = '3'; // set the type to '3' driver
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        $user->driverDetail()->create([
            'vehicle_type' => $request->vehicle_type,
            'plate_no' => $request->plate_no,
        ]);
        return redirect()->route('drivers.index')->with('success','Driver has been created successfully.');
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
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->update();

        $user->driverDetail()->update([
            'vehicle_type' => $request->vehicle_type,
            'plate_no' => $request->plate_no,
        ]);
        return redirect()->route('drivers.index')->with('success','Driver Has Been updated successfully');
    }

    public function destroy($id){
        Driver::destroy($id);
        return redirect()->route('drivers.index')->with('success','Driver has been deleted successfully');
    }

    public function archive($id)
    {
        $id = User::findOrFail($id);
        $id->driverDetail()->update([
            'archived' => true,
        ]);
        return redirect()->route('drivers.index')->with('success', 'Driver data archived successfully.');
    }

    public function unarchive($id)
    {
        $id = User::findOrFail($id);
        $id->driverDetail()->update([
            'archived' => false,
        ]);
        return redirect()->route('drivers.viewArchive')->with('success', 'Driver data restore successfully.');
    }

    public function updateStatus($user_id, $status_code)
    {
            $update_user = User::whereId($user_id)->update([
                'status' => $status_code
            ]);
            return redirect()->route('drivers.index')->with('success','Driver Has Been updated successfully');
    }

}
