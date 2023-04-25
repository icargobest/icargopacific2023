<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DispatcherDashboardController extends Controller
{
    public function index()
    {
        $dashboard = DB::table('dashboard')->first();
        return view('dispatchdashboard', compact('dashboard'));
    }
}
