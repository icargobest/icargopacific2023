<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Shipment;
use App\Models\Driver;
use App\Models\Company;

class DriverDashboardController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $statuses = [ 'PickedUp', 'Delivered'];
        $counts = [];

        $driver = Driver::where('user_id', $user_id)->first();

        foreach ($statuses as $status) {
            $counts[$status] = Shipment::where('company_id', $driver->company_id)
                                      ->where('status', $status)
                                      ->count();
        }
        return view('driver_panel.dashboard', compact('counts'));
    }
}