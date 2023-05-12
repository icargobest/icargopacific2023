<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Shipment;
use App\Models\Dispatcher;

class DispatcherDashboardController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $statuses = [ 'Processing', 'PickedUp', 'Assort', 'Transferred', 'Arrived', 'Dispatched', 'Delivered'];
        $counts = [];

        $dispatcher = Dispatcher::where('user_id', $user_id)->first();

        foreach ($statuses as $status) {
            $counts[$status] = Shipment::where('company_id', $dispatcher->id)
                                      ->where('status', $status)
                                      ->count();
        }
        return view('dispatcher_panel.dashboard', compact('counts'));
    }
}