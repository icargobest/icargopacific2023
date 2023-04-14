<?php

namespace App\Http\Controllers;

use App\Models\Search;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function search(Request $request)
    {
        $tracking_number = $request->input('tracking_number');
        $shipment = Search::where('tracking_number', $tracking_number)->first();

        if ($shipment) {
            return response()->json([
                'message' => 'Tracking number found!',
                'data' => $shipment,
            ]);
        } else {
            return response()->json([
                'message' => 'Tracking number not found.',
            ]);
        }
    }
}
