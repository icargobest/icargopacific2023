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
    public $timestamps = true;
    
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
    
    // SUPER ADMIN : Managing the Companies
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


    public function updateProfile(Request $request, $id)
    {
        $company = Company::with('user')->findOrFail($id);
        $user = $company->user;
    
        $validated = $this->validate($request, [
            'facebook' => ['required', 'url', 'max:255'],
            'website' => ['nullable','url', 'max:255'],
            'linkedin' => ['nullable','url', 'max:255'],
            'facebook.required' => 'Facebook Link is required',
        ]);
    
        $user->update([
            'name' => $request->name,
            'email' => $request->email ?? $user->email,
        ]);
    
        $company->update([
            'contact_no' => $request->contact_no,
            'contact_name' => $request->contact_name,
            'tel' => $request->tel,
            'street' => $request->street,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'facebook' => $validated['facebook'],
            'website' => $request->website,
            'linkedin' => $request->linkedin,
        ]);
    
        return back()->with('success', 'Company account has been updated successfully.');
    }
    
    public function updateImage(Request $request, $id)
    {
        $company = Company::with('user')->findOrFail($id);
        $user = $company->user;

        if ($image = $request->file('image')) {
            $folderName = $user->name; // Get the company's name
            $destinationPath = "images/company/$folderName"; // Set the destination path
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $company->update(['image' => $profileImage]);
        }
    
    return back()->with('success', 'Profile image has been updated successfully.');
    }

    

    public function update(Request $request, $id)
    {
        $company = Company::with('user')->findOrFail($id);
        $user = $company->user;
    
        $validated = $this->validate($request, [
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
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
            'tel' => $request->tel,
            'street' => $request->street,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'facebook' => $validated['facebook'],
            'website' => $request->filled('website') ? $request->website : $company->website,
            'linkedin' => $request->filled('linkedin') ? $request->linkedin : $company->linkedin,
        ]);
    
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


    // Company registration in the website
    public function addCompany(CreateCompanyRequest $request)
    {  
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => '2',
            ]);
    
            $companyData = [
                'user_id' => $user->id,
                'contact_no' =>  $request->contact_no,
                'contact_name' => $request->contact_name,
                'tel' => $request->tel,
                'street' => $request->street,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'facebook' => $request->facebook ?? '',
            ];
    
            if ($request->has('website')) {
                $companyData['website'] = $request->website;
            }
            if ($request->has('linkedin')) {
                $companyData['linkedin'] = $request->linkedin;
            }
            
            $company = Company::create($companyData);
            
            DB::commit();
            auth()->login($user); // log in the user programmatically
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    
        return redirect()->route('company.dashboard') // redirect to the company dashboard page
            ->with('success', 'Registered successfully. You are now logged in.');
    }
    

    // PROFILE
    public function profile()
    {
        $company = Company::with('user')->first();
    
        $userID = Auth::id();
    
        if ($company && $company->user_id == $userID) {
            return view('company.profile.myprofile', compact('company'));
        }
    
        return back()->with('error', 'You are not authorized to view this profile.');
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
