<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Models\Company;
use App\Models\User;
use App\Models\Staff;
use App\Models\Driver;
use App\Models\Dispatcher;
use App\Models\VerifyToken;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Mail;

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
            'facebook' => ['required', 'url', 'max:255'],
            'website' => ['nullable','url', 'max:255'],
            'linkedin' => ['nullable','url', 'max:255'],
            'facebook.required' => 'Facebook Link is required',
        ]);

        if($get_token){
            $get_token->is_activated = 1;
            $get_token->save();

            $user->update([
                'name' => $request->name,
                'email' => $request->email ?? $user->email,
                'password' => !empty($validated['password']) ? Hash::make($validated['password']) : $user->password,
            ]);

            if ($image = $request->file('image')) {
                $folderName = Auth::id(); // Get the user id
                $destinationPath = "images/company/$folderName"; // Set the destination path
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->storeAs($destinationPath, $profileImage, 'public'); // Use the 'public' disk
                $company->update(['image' => $profileImage]);
        
                return back()->with('success', 'Profile image has been updated successfully.');
            }
            
            $company->update([
                'contact_no' =>  $request->contact_no,
                'contact_name' => $request->contact_name,
                'tel' => $request->tel,
                'street' => $request->street,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'facebook' => $request->facebook,
                'website' => $request->website,
                'linkedin' => $request->linkedin,
            ]);

            $delete_token = VerifyToken::where('token', $get_token->token)->first();
            $delete_token->delete();
            return back()->with('success','Staff #'.$id.' has been updated successfully.');
        }

        return back()->with('warning','Please verify the account with OTP before modifying data.');
    }

    public function sendOTP($id){

        $data = User::findOrFail($id);

        $validToken = rand(10,100..'2022');
        $get_token = new VerifyToken();
        $get_token->token = $validToken;
        $get_token->email = $data['email'];
        $get_token->save();
        $get_user_email = $data['email'];
        $get_user_name = $data['name'];
        Mail::to($data['email'])->send(new VerificationMail($get_user_email, $validToken, $get_user_name));

        return back()->with('message', 'OTP sent. Please ask the otp from the email owner.');
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
        $update_user = User::whereId($user_id);

        $companies = Company::with('user')->where('user_id', $user_id)->first(); // Retrieve the first matching company record
        if($companies){
            $company_id = $companies->id;
            $drivers = Driver::where('company_id', $company_id)->get();
            if($drivers){
                foreach($drivers as $driver){
                    $driverUpdate = User::whereId($driver->user_id)->update([
                        'status' => $status_code
                    ]);
                    
                }
            }
            $dispatchers = Dispatcher::where('company_id', $company_id)->get();
            if($dispatchers){
                foreach($dispatchers as $dispatcher){
                    $dispatcherUpdate = User::whereId($dispatcher->user_id)->update([
                        'status' => $status_code
                    ]);
                    
                }
            }
            $staffs = Staff::where('company_id', $company_id)->get();
            if($staffs){
                foreach($staffs as $staff){
                    $staffUpdate = User::whereId($staff->user_id)->update([
                        'status' => $status_code
                    ]);
                    
                }
            }
        }
        $update_user->update([
            'status' => $status_code
        ]);
        return back()->with('success', 'Company status updated successfully!');
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
            $folderName = Auth::id(); // Get the user id
            $destinationPath = "images/company/$folderName"; // Set the destination path
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs($destinationPath, $profileImage, 'public'); // Use the 'public' disk
            $company->update(['image' => $profileImage]);
        } 
    
        return back()->with('success', 'Profile image has been updated successfully.');
    }
    
}
