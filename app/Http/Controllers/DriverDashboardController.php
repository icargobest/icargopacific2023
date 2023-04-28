<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DriverDashboardController extends Controller
{
    public function index()
    {
        $dashboard = DB::table('dashboard')->first();
        return view('driver_panel.dashboard', compact('dashboard'));
    }
}
