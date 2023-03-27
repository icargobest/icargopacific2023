<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
