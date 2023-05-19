<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use App\Models\Dispatcher;
use App\Models\Driver;
use App\Models\Staff;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $superadmin = User::where('type', 1)
            ->first();
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
        $customers = Customer::with('user')
            ->where('archived', 0)
            ->get();
        
        return view('icargo_superadmin_panel.registered_users.index', 
            compact('superadmin', 'companies' , 'drivers' , 'dispatchers',  'staffs' , 'customers'));
    }    
    

    public function show($id)
    {
        $superadmin = User::findOrFail($id);
        $company = Company::findOrFail($id);
        $driver = Driver::findOrFail($id);
        $dispatcher = Dispatcher::findOrFail($id);
        $staff = Staff::findOrFail($id);
        $customer = Customer::findOrFail($id);

        return view('icargo_superadmin_panel.registered_users.show', 
            compact('superadmin', 'companies' , 'drivers' , 'dispatchers',  'staffs', 'customer'));
    }

    public function edit($id)
    {
        $company = Company::with('company.user')->findOrFail($id);
        $driver = Driver::with('company.user')->findOrFail($id);
        $dispatcher = Dispatcher::with('company.user')->findOrFail($id);
        $staff = Staff::with('company.user')->findOrFail($id);
        $customer = Customer::with('user')->findOrFail($id);

        return view('registered_users.edit', 
            compact('company' , 'driver' , 'dispatcher',  'staff' , 'customer'));
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
        $customers = Customer::with('user')
            ->where('archived', 1)
            ->get();
        
        return view('icargo_superadmin_panel.registered_users.viewArchive', 
            compact('companies' , 'drivers' , 'dispatchers',  'staffs' , 'customers'));
    }    

    // update, archive, and unarchive functions use its own model controller

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('companies.index')->with('success', 'Staff member has been deleted successfully.');
    }

    public function updateStatus($user_id, $status_code)
    {
            $update_user = User::whereId($user_id)->update([
                'status' => $status_code
            ]);
            $user_id = User::findOrFail($user_id);
            return back();
    }
}
