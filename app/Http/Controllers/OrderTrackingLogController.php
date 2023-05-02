<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderTrackingLog;

class OrderTrackingLogController extends Controller
{
    public function store(Request $request)
    {
        $orderTrackingLog = new OrderTrackingLog;
        $orderTrackingLog->tracking_number = $request->input('tracking_number');
        $orderTrackingLog->shipment_id = $request->input('shipment_id');
        $orderTrackingLog->status = $request->input('status');
        $orderTrackingLog->save();

        return response()->json([
            'success' => true,
            'message' => 'Order tracking log stored successfully',
        ]);
    }
}
