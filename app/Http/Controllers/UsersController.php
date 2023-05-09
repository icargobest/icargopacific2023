<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Models\Company;
use App\Models\Dispatcher;
use App\Models\Driver;
use App\Models\Staff;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $companies = Company::with('user')
            ->where('archived', 0)
            ->get();
        $drivers = Driver::with('company.user')
            ->where('archived', 0)
            ->get();
        $dispatchers = Dispatcher::with('company.user')
            ->where('archived', 0)
            ->get();
        $staffs = Staff::with('company.user')
            ->where('archived', 0)
            ->get();
        
        return view('icargo_superadmin_panel.registered_users.index', compact('companies' , 'drivers' , 'dispatchers',  'staffs' ));
    }    
    

    public function show($id)
    {
        return view('registered_users.show', compact('company' , 'driver' , 'dispatcher',  'staff' ));
    }

    public function edit($id)
    {
        $company = Company::with('company.user')->findOrFail($id);
        $driver = Driver::with('company.user')->findOrFail($id);
        $dispatcher = Dispatcher::with('company.user')->findOrFail($id);
        $staff = Staff::with('company.user')->findOrFail($id);
        return view('registered_users.edit', compact('company' , 'driver' , 'dispatcher',  'staff'));
    }


    public function updateCompany(Request $request, $id)
    {
        $company = Company::with('user')->findOrFail($id);
        $user = $company->user;

        $validated = $this->validate($request, [
            'password' => ['string', 'min:8', 'confirmed'],
            'password.confirmed' => 'Password does not match.',
            'password.min' => 'Password must be a minimum of 8 characters',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email ?? $user->email,
            'password' => !empty($validated['password']) ? Hash::make($validated['password']) : $user->password,
        ]);

        $company->update([
            'contact_no' =>  $request->contact_no,
            'contact_name' => $request->contact_name,
            'company_address' => $request->company_address,
        ]);
        return redirect()->route('registered_users.view', $id)
                ->with('success', 'Company data has been updated successfully.');
    }


    public function updateDriver(Request $request, $id)
    {
        $driverData = [
            'vehicle_type' => $request->vehicle_type,
            'plate_no' => $request->plate_no,
            'license_number' => $request->license_number,
            'contact_no' => $request->contact_no,
        ];

        $userData = [
            'name' => $request->input('name'),
        ];
        
        $driver = Driver::find($id);
        $driver->update($driverData);

        $user = $driver->user;
        $user->update($userData);

        return back()->with('success', 'Driver data has been updated successfully!');
    }

    public function updateDispatcher(Request $request, $id)
    {
        $dispatcherData = [
            'contact_no' => $request->contact_no,
        ];

        $userData = [
            'name' => $request->input('name'),
        ];
        
        $dispatcher = Dispatcher::find($id);
        $dispatcher->update($dispatcherData);

        $user = $dispatcher->user;
        $user->update($userData);

        return back()->with('success', 'Dispatcher data has been updated successfully!');
    }

    public function updateStaff(Request $request, $id)
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

        return back()->with('success', 'Staff #'.$id.' data updated successfully!');
    }


    public function archiveCompany(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $company->update([
            'archived' => 1,
        ]);

        return redirect()->route('registered_users.view')
            ->with('success', 'Company account has been archived successfully.');
    }

    public function archiveDispatcher($id)
    {
        $id = Dispatcher::findOrFail($id);
        $id->archived = True;
        $id->save();
        return back()->with('success', 'Dispatcher #'.$id->id.' Archived successfully!');
    }

    public function archiveDriver($id)
    {
        $id = Driver::findOrFail($id);
        $id->archived = True;
        $id->save();
        return back()->with('success', 'Driver #'.$id->id.' Archived successfully!');
    }

    public function archiveStaff($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->archived = True;
        $staff->save();

        return redirect()->back()->with('success', 'Staff #'.$id.' data archived successfully.');
    }


    public function unarchiveCompany(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $company->update([
            'archived' => 0,
        ]);

        return redirect()->route('registered_users.view')
            ->with('success', 'Company account has been archived successfully.');
    }

    public function unarchiveDispatcher($id)
    {
        $id = Dispatcher::findOrFail($id);
        $id->archived = False;
        $id->save();
        return back()->with('success', 'Dispatcher #'.$id->id.' Archived successfully!');
    }

    public function unarchiveDriver($id)
    {
        $id = Driver::findOrFail($id);
        $id->archived = False;
        $id->save();
        return back()->with('success', 'Driver #'.$id->id.' Archived successfully!');
    }

    public function unarchiveStaff($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->archived = False;
        $staff->save();

        return redirect()->back()->with('success', 'Staff #'.$id.' data archived successfully.');
    }

    public function viewArchive()
    {
        $companies = Company::with('user')
            ->where('archived', 1)
            ->get();
        $drivers = Driver::with('company.user')
            ->where('archived', 1)
            ->get();
        $dispatchers = Dispatcher::with('company.user')
            ->where('archived', 1)
            ->get();
        $staffs = Staff::with('company.user')
            ->where('archived', 1)
            ->get();
        
        return view('icargo_superadmin_panel.registered_users.viewArchive', compact('companies' , 'drivers' , 'dispatchers',  'staffs' ));
    }    

    public function restore(Request $request, $id)
    {
        $company = User::findOrFail($id);

        $company->update([
            'archived' => 0,
        ]);

        return redirect()->route('companies.index')
            ->with('success', 'User account has been restored successfully.');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('companies.index')->with('success', 'Staff member has been deleted successfully.');
    }
}
