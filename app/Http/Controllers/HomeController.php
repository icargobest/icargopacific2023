<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use App\Models\User;
>>>>>>> develop

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
<<<<<<< HEAD
=======
    public function createCompanyAccount(Request $request)
    {
        $data = new user;

        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=bcrypt($request->password);
        $data->type='2';

        $data->save();
        
        return view('/registerCompany')->with('success', "Registered successfully");
        // return redirect()->back()->with('success', "Registered successfully");
    }
    public function companyDashboard()
    {
        return view('/company/dashboard');
    }

    public function superAdminDashboard()
    {
        return view('/super-admin/dashboard');
    }

    public function driverDashboard()
    {
        return view('/driver/dashboard');
    }
>>>>>>> develop
}
