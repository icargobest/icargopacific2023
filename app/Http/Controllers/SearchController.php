<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Search;
use App\Models\OrderHistory;
use App\Models\Staff;
use App\Models\Company;
use App\Models\Dispatcher;
use App\Models\Driver;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
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

    public function searchStaff(Request $request)
    {
        $tracking_number = $request->input('tracking_number');
        $user = Auth::user()->id;
        $shipment = Search::where('tracking_number', $tracking_number)->first();
        $staff = Staff::where('user_id', $user)->first();

        if ($shipment) {
            if ($shipment->company_id != $staff->company_id) {
                $status = 'driver';
                $tracking_number = 'Invalid';
                return response()->json(['status' => $status, 'tracking_number' => $tracking_number]);
            }

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

    public function searchCompany(Request $request)
    {
        $tracking_number = $request->input('tracking_number');
        $user = Auth::user()->id;
        $shipment = Search::where('tracking_number', $tracking_number)->first();
        $company = Company::where('user_id', $user)->first();

        if ($shipment) {
            if ($shipment->company_id != $company->id) {
                $status = 'driver';
                $tracking_number = 'Invalid';
                return response()->json(['status' => $status, 'tracking_number' => $tracking_number]);
            }

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

    public function searchDriver(Request $request)
    {
        $tracking_number = $request->input('tracking_number');
        $user = Auth::user()->id;
        $shipment = Search::where('tracking_number', $tracking_number)->first();
        $driver = Driver::where('user_id', $user)->first();

        if ($shipment) {
            if ($shipment->driver_id != $driver->id) {
                $status = 'driver';
                $tracking_number = 'Invalid';
                return response()->json(['status' => $status, 'tracking_number' => $tracking_number]);
            }

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

    public function searchDispatcher(Request $request)
    {
        $tracking_number = $request->input('tracking_number');
        $user = Auth::user()->id;
        $shipment = Search::where('tracking_number', $tracking_number)->first();
        $dispatcher = Dispatcher::where('user_id', $user)->first();

        if ($shipment) {
            if ($shipment->company_id != $dispatcher->company_id) {
                $status = 'driver';
                $tracking_number = 'Invalid';
                return response()->json(['status' => $status, 'tracking_number' => $tracking_number]);
            }

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
