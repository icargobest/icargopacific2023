<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Forward;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    public function index(){
        return view('company.dashboard');
    }

    public function create(){
        return view('company.create');
    }

     // company registration
     public function store(Request $request)
     {
         $validated = $request->validate([
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'password' => ['required', 'string', 'min:8', 'confirmed'],
         ], [
             'name.required' => 'Name field is required.',
             'password.required' => 'Password field is required.',
             'password.confirmed' => 'Password does not match.',
             'password.min' => 'Password must be a minimum of 8 characters',
             'email.required' => 'Email field is required.',
             'email.unique' => 'Email address must be unique within the organization',
             'email.email' => 'Email field must be email address.'
         ]);
     
         $validated['type'] = '2'; // set the type to '2' company
         $validated['password'] = Hash::make($validated['password']);
     
         $user = User::create($validated);
 
         return redirect()->route('login')
                         ->with('success', 'Registered successfully. Please login to continue.');
     }

    public function show(){
        $data = ["data" => "data from database"];
        return view('company')
            ->with('data', $data);
    }
}
