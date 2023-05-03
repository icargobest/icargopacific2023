<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Models\Company;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompaniesController extends Controller
{
    private $company;
    function __construct()
    {
        $this->company = new Company;
    }

    public function index(){
        return view('icargo_superadmin_panel.companies.index');
    }

    public function create(){
        return view('icargo_superadmin_panel/companies/create');
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
}
