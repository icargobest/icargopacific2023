<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Forward;
use App\Models\User;
use App\Models\Shipments;
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

    public function viewFreight(){
        $data = Shipments::all();
        return view('company.freight',['shipments'=>$data]);
    }

    public function transferShipment($id)
    {
        $data = Shipments::find($id);
        return view('/company/edit',['shipments'=>$data]);
    }

    public function transfer(Request $request)
    {
        $data = Shipments::find($request->id);
        $data->station_id=$request->station_id;
        $data->station=$request->station;
        $data->save();

        return redirect('company/freight');
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
     
          auth()->login($user); // log in the user programmatically
     
         return redirect()->route('company.dashboard') // redirect to the company dashboard page
                         ->with('success', 'Registered successfully. You are now logged in.');
     }
     

    public function show(){
        $data = ["data" => "data from database"];
        return view('company')
            ->with('data', $data);
    }
}
