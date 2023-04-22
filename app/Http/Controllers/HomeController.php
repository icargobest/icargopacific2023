<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    public function companyDashboard()
    {
        return view('company.dashboard');
    }

    public function superAdminDashboard()
    {
        return view('/super-admin/dashboard');
    }

    public function driverDashboard()
    {
        return view('driver.driver');
    }

    public function dispatcherDashboard()
    {
        return view('/company/dispatcher.dashboard');
    }

    public function staffDashboard()
    {
        return view('staff_panel.dashboard');
    }

    public function changePassword()
    {
        return view('/auth/passwords.change-password');
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|string|min:8',
        ]);


        # Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        # Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("success", "Password changed successfully!");
    }
}
