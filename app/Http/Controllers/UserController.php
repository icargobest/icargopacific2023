<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Search;
use App\Models\OrderHistory;

class UserController extends Controller
{
    public function search(Request $request)
    {
        $tracking_number = $request->input('tracking_number');
        $shipment = Search::where('tracking_number', $tracking_number)->first();

        if ($shipment) {
            $order_history = OrderHistory::where('shipment_id', $shipment->id)->first();

            if ($order_history) {
                return response()->json([
                    'message' => 'Shipment found!',
                    'shipment' => $shipment,
                    'order_history' => $order_history,
                ]);
            } else {
                return response()->json([
                    'message' => 'Order history not found for shipment.',
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Shipment not found.',
            ]);
        }
    }
}
