<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Company;
use App\Models\Forward;
use App\Models\User;
use App\Models\Shipments;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('company.create');
    }
     // company registration
     public function store(CreateUserRequest $request)
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
        $otherValidation = $request->validate([
            'contact_no' => ['required', 'min:11', 'max:11'],
            'contact_name' => ['required', 'string', 'max:255'],
            'company_address' => ['required', 'string', 'max:255'],
        ], [
            'contact_no.required' => 'Contact field is required.',
            'contact_no.min' => 'Contact nuber must be a min and max of 11 numbers',
            'contact_no.max' => 'Contact nuber must be a min and max of 11 numbers',
            'contact_name.required' => 'Name field is required.',
            'company_address.required' => 'Company Address field is required.',
        ]);
    
        $company = Company::create([
            'user_id' => $user->id,
            'contact_no' =>  $otherValidation['contact_no'],
            'contact_name' => $otherValidation['contact_name'],
            'company_address' => $otherValidation['company_address'],
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
     

    public function show(){
        $data = ["data" => "data from database"];
        return view('company')
            ->with('data', $data);
    }
}
