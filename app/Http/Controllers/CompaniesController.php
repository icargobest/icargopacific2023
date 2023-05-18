<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Models\Company;
use App\Models\User;
use App\Models\VerifyToken;
use Exception;
use Illuminate\Http\Request;
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
       $user->sendEmailVerificationNotification();
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
            $user->sendEmailVerificationNotification();
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

        $company->update([
            'contact_no' =>  $request->contact_no,
            'contact_name' => $request->contact_name,
            'company_address' => $request->company_address,
        ]);
        $delete_token = VerifyToken::where('token', $get_token->token)->first();
        $delete_token->delete();
        }

        return back()->with('success', 'Company account has been updated successfully.');
    }

    public function archive(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $company->update([
            'archived' => 1,
        ]);

        return back()->with('success', 'Company account has been archived successfully.');
    }

    public function unarchive(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $company->update([
            'archived' => 0,
        ]);

        return back()->with('success', 'Company account has been restored successfully.');
    }

    public function viewArchive()
    {
        $companies = Company::with('user')
            ->where('archived', 1)
            ->get();

        return view('icargo_superadmin_panel.companies.viewArchive', compact('companies'));
    }

    public function destroy($id)
    {
        Company::destroy($id);
        return back()->with('success', 'Staff member has been deleted successfully.');
    }

    public function updateStatus($user_id, $status_code)
    {
            $update_user = User::whereId($user_id)->update([
                'status' => $status_code
            ]);
            $user_id = User::findOrFail($user_id);
            return back()->with('success', 'Company status updated successfully!');
    }
}
