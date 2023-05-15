<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Models\Company;
use App\Models\Dashboard;
use App\Models\Forward;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    private $company;
    function __construct()
    {
        $this->company = new Company;
    }

    public function index(){
        return view('registerCompany');
    }

    public function create(){
        return view('registerCompany');
    }
     // company registration
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
            auth()->login($user); // log in the user programmatically
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }

         return redirect()->route('company.dashboard') // redirect to the company dashboard page
                         ->with('success', 'Registered successfully. You are now logged in.');
     }
}
