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
        $drivers = Driver::with('user')
            ->where('archived', 0)
            ->get();
        $dispatchers = Dispatcher::with('user')
            ->where('archived', 0)
            ->get();
        $staffs = Staff::with('user')
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
        $company = Company::with('user')->findOrFail($id);
        return view('registered_users.edit', compact('company'));
    }


    public function update(Request $request, $id)
    {
        $company = Company::with('user')->findOrFail($id);
        if ($company) {
            $user = $company->user;

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
    
            $company->update([
                'contact_no' => $request->contact_no,
                'contact_name' => $request->contact_name,
                'company_address' => $request->company_address,
            ]);
    
            return redirect()->route('registered_users.index', $id)
                ->with('success', 'User account has been updated successfully.');
        }

        $dispatcher = Dispatcher::with('user')->findOrFail($id);
        if ($dispatcher) {
            $dispatcherData = [
                'contact_no' => $request->contact_no,
            ];
    
            $userData = [
                'name' => $request->input('name'),
            ];
            
            $dispatcher->update($dispatcherData);
            $dispatcher->user->update($userData);
    
            return redirect()->route('registered_users.index', $id)
                ->with('success', 'User account has been updated successfully.');
        }

        $driver = Driver::with('user')->findOrFail($id);
        if ($driver) {
            $driverData = [
                'license_no' => $request->license_no,
            ];
    
            $userData = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ];
            
            $driver->update($driverData);
            $driver->user->update($userData);
    
            return redirect()->route('registered_users.index', $id)
                ->with('success', 'User account has been updated successfully.');
        }

        $staff = Staff::with('user')->findOrFail($id);
        if ($staff) {
            $userData = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ];
            
            $staff->user->update($userData);
    
            return redirect()->route('registered_users.index', $id)
                ->with('success', 'User account has been updated successfully.');
        }

        return back()->withErrors(['message' => 'User not found.']);
    }


    public function archive(Request $request, $id)
    {
        $company = User::findOrFail($id);

        $company->update([
            'archived' => 1,
        ]);

        return redirect()->route('companies.index')
            ->with('success', 'User account has been archived successfully.');
    }

    public function unarchive(Request $request, $id)
    {
        $company = User::findOrFail($id);

        $company->update([
            'archived' => 0,
        ]);

        return redirect()->route('companies.index')
            ->with('success', 'User account has been restored successfully.');
    }

    public function viewArchive()
    {
        $companies = User::with('user')
            ->where('archived', 1)
            ->get();

        return view('icargo_superadmin_panel.companies.viewArchive', compact('companies'));
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
