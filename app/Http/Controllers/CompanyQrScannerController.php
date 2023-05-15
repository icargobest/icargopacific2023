<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\OrderHistory;
use Illuminate\Support\Facades\Auth;
class CompanyQrScannerController extends Controller
{
    // Function to show the page we want to log in by scanner of QR code
    public function index(Request $request)
    {
        return view('company.companyQR');
    }

    // Function to allow the user to log in or not log in that is done by scanner of QR code
    public function checkUser(Request $request)
    {
        $result = 0;
        $status = null;
        $tracking_number = null;
        $id = null;
        $user_id = null;
        $order_id = null;
        $isPending = null;
        $isPendingTime = null;
        $isProcessed = null;
        $isProcessedTime = null;
        $isPickUp = null;
        $isPickUpTime = null;
        $isAssort = null;
        $isAssortTime = null;
        $isTransferred = null;
        $isTransferredTime = null;
        $isArrived = null;
        $isArrivedTime = null;
        $isDispatched = null;
        $isDispatchedTime = null;
        $isDelivered = null;
        $isDeliveredTime = null;

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
                    $order_id = $shipment->id;
                    $time = OrderHistory::where('order_id', $order_id)->first();
                    if ($time) {
                        $isPending = $time->isPending;
                        $isPendingTime = $time->isPendingTime;
                        $isProcessed = $time->isProcessed;
                        $isProcessedTime = $time->isProcessedTime;
                        $isPickUp = $time->isPickUp;
                        $isPickUpTime = $time->isPickUpTime;
                        $isAssort = $time->isAssort;
                        $isAssortTime = $time->isAssortTime;
                        $isTransferred = $time->isTransferred;
                        $isTransferredTime = $time->isTransferredTime;
                        $isArrived = $time->isArrived;
                        $isArrivedTime = $time->isArrivedTime;
                        $isDispatched = $time->isDispatched;
                        $isDispatchedTime = $time->isDispatchedTime;
                        $isDelivered = $time->isDelivered;
                        $isDeliveredTime = $time->isDeliveredTime;
                    }
                }
            }
        }
        return response()->json(['isPendingTime' => $isPendingTime, 'isProcessedTime' => $isProcessedTime, 'isAssortTime' => $isAssortTime, 'isPickUpTime' => $isPickUpTime, 
                                'isTransferredTime' => $isTransferredTime, 'isArrivedTime' => $isArrivedTime, 'isDispatchedTime' => $isDispatchedTime, 'isDeliveredTime' => $isDeliveredTime,
                                'isPending' => $isPending, 'isProcessed' => $isProcessed, 'isAssort' => $isAssort, 'isPickUp' => $isPickUp, 
                                'isTransferred' => $isTransferred, 'isArrived' => $isArrived, 'isDispatched' => $isDispatched, 'isDelivered' => $isDelivered,
                                'result' => $result, 'status' => $status, 'tracking_number' => $tracking_number, 'id' => $id]);
    }
}