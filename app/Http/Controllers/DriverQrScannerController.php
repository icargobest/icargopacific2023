<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;
use Illuminate\Support\Facades\Auth;
class DriverQrScannerController extends Controller
{
    // Function to show the page we want to log in by scanner of QR code
    public function index(Request $request)
    {
        return view('driver_panel.driver');
    }

    // Function to allow the user to log in or not log in that is done by scanner of QR code
    public function checkUser(Request $request)
    {
        $result = 0;
        $status = null;
        $tracking_number = null;
        $id = null;
        $user_id = null;

        if ($request->data) {
            $data = explode('-', $request->data);
            if (count($data) == 2) {
                $user_id = trim($data[0]);
                $id = trim($data[1]);
            } else if (count($data) == 3) {
                $user_id = trim($data[0]);
                $tracking_number = trim($data[1]);
                $id = trim($data[2]);
            }
            $shipment = Shipment::where('user_id', $user_id)->where('id', $id)->first();
            if ($shipment) {
                if ($tracking_number && $shipment->tracking_number != $tracking_number) {
                    $result = 0;
                } else {
                    $result = 1;
                    $tracking_number = $shipment->tracking_number;
                    $status = $shipment->status;
                }
            }
        }
        return response()->json(['result' => $result, 'status' => $status, 'tracking_number' => $tracking_number, 'id' => $id]);
    }


    public function updatePickup(Request $request)
    {
        $id = $request->id;
        $shipment = Shipment::find($id);
        if ($shipment) {
            $shipment->status = 'PickedUp';
            $shipment->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    public function updateDelivered(Request $request)
    {
        $id = $request->id;
        $shipment = Shipment::find($id);
        if ($shipment) {
            $shipment->status = 'Delivered';
            $shipment->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

}