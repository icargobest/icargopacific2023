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
        $company = Company::findOrFail($id);
        $driver = Driver::findOrFail($id);
        $dispatcher = Dispatcher::findOrFail($id);
        $staff = Staff::findOrFail($id);

        return view('icargo_superadmin_panel.registered_users.show', compact('companies' , 'drivers' , 'dispatchers',  'staffs' ));
    }

    public function edit($id)
    {
        $company = Company::with('company.user')->findOrFail($id);
        $driver = Driver::with('company.user')->findOrFail($id);
        $dispatcher = Dispatcher::with('company.user')->findOrFail($id);
        $staff = Staff::with('company.user')->findOrFail($id);
        return view('registered_users.edit', compact('company' , 'driver' , 'dispatcher',  'staff'));
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
