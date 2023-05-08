<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Models\Company;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Company::with('user')
            ->where('archived', 0)
            ->get();

        return view('icargo_superadmin_panel.companies.index', compact('companies'));
    }

    public function create()
    {
        return view('icargo_superadmin_panel.companies.create');
    }

    // company registration
    public function companyRegistrationOutsidePanel(CreateCompanyRequest $request)
    {  
       DB::beginTransaction();
       try {
       $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => Hash::make($request->password),
           'type' => '2',
       ]);
   
       $company = Company::create([
           'user_id' => $user->id,
           'contact_no' =>  $request->contact_no,
           'contact_name' => $request->contact_name,
           'company_address' => $request->company_address,
       ]);
           DB::commit();
           auth()->login($user); // log in the user programmatically
       } catch (Exception $ex) {
           DB::rollBack();
           throw $ex;
       }

        return redirect()->route('company.dashboard') // redirect to the company dashboard page
                        ->with('success', 'Registered successfully. You are now logged in.');
    }
    
    public function store(CreateCompanyRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => '2',
            ]);

            $company = Company::create([
                'user_id' => $user->id,
                'contact_no' =>  $request->contact_no,
                'contact_name' => $request->contact_name,
                'company_address' => $request->company_address,
            ]);

            DB::commit();

        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }

        return redirect()->route('companies.index')
            ->with('success', 'Company account has been created successfully.');
    }

    public function show($id)
    {
        $company = Company::with('user')->findOrFail($id);
        return view('icargo_superadmin_panel.companies.show', compact('company'));
    }

    public function edit($id)
    {
        $company = Company::with('user')->findOrFail($id);
        return view('icargo_superadmin_panel.companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $company = Company::with('user')->findOrFail($id);
        $user = $company->user;

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $company->update([
            'contact_no' =>  $request->contact_no,
            'contact_name' => $request->contact_name,
            'company_address' => $request->company_address,
        ]);

        return redirect()->route('companies.index', $id)
            ->with('success', 'Company account has been updated successfully.');
    }

    public function archive(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $company->update([
            'archived' => 1,
        ]);

        return redirect()->route('companies.index')
            ->with('success', 'Company account has been archived successfully.');
    }

    public function unarchive(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $company->update([
            'archived' => 0,
        ]);

        return redirect()->route('companies.index')
            ->with('success', 'Company account has been restored successfully.');
    }

    public function viewArchive()
    {
        $companies = Company::with('user')
            ->where('archived', 1)
            ->get();

        return view('icargo_superadmin_panel.companies.viewArchive', compact('companies'));
    }

    public function restore(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $company->update([
            'archived' => 0,
        ]);

        return redirect()->route('companies.index')
            ->with('success', 'Company account has been restored successfully.');
    }

    public function destroy($id)
    {
        Company::destroy($id);
        return redirect()->route('companies.index')->with('success', 'Staff member has been deleted successfully.');
    }
}
