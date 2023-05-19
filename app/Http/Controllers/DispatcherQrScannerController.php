<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\OrderHistory;
use App\Models\Dispatcher;
use Illuminate\Support\Facades\Auth;
class DispatcherQrScannerController extends Controller
{
    public function index(Request $request)
    {
        return view('dispatcher_panel.dispatcherParcelTracking');
    }

    // Function to show the page we want to log in by scanner of QR code
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
            $user = Auth::user()->id;
            $shipment = Shipment::where('user_id', $user_id)->where('id', $id)->first();
            $dispatcher = Dispatcher::where('user_id', $user)->first();
            if ($shipment) {
                if ($tracking_number && $shipment->tracking_number != $tracking_number) {
                    $result = 0;
                } else {
                    if ($shipment->company_id != $dispatcher->company_id) {
                        $result = 1;
                        $status = 'driver';
                        $tracking_number = 'Invalid';
                        return response()->json(['result' => $result, 'status' => $status, 'tracking_number' => $tracking_number]);
                    }
                    $result = 1;
                    $tracking_number = $shipment->tracking_number;
                    $status = $shipment->status;
                    $order_id = $shipment->id;
                    $time = OrderHistory::where('shipment_id', $order_id)->first();
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

	public function updateReceived(Request $request)
    {
        $id = $request->id;
        $shipment = Shipment::find($id);
        $time = OrderHistory::find($id);
        if ($shipment) {
            $shipment->status = 'Assort';
            $shipment->save();
        }
        if ($time) {
            $time->isAssort = true;
            $time->isAssortTime = now();
            $time->save();
        }
        return response()->json(['success' => true]);
    }

    public function updateOutfordelivery(Request $request)
    {
        $id = $request->id;
        $shipment = Shipment::find($id);
        $time = OrderHistory::find($id);
        if ($shipment) {
            $shipment->status = 'Dispatched';
            $shipment->save();
        }
        if ($time) {
            $time->isDispatched = true;
            $time->isDispatchedTime = now();
            $time->save();
        }
        return response()->json(['success' => true]);
    }

    public function updateTransfer(Request $request)
    {
        $id = $request->id;
        $shipment = Shipment::find($id);
        $time = OrderHistory::find($id);
        if ($shipment) {
            $shipment->status = 'Transferred';
            $shipment->save();
        }
        if ($time) {
            $time->isTransferred= true;
            $time->isTransferredTime = now();
            $time->save();
        }
        return response()->json(['success' => true]);
    }

    public function updateArrived(Request $request)
    {
        $id = $request->id;
        $shipment = Shipment::find($id);
        $time = OrderHistory::find($id);
        if ($shipment) {
            $shipment->status = 'Arrived';
            $shipment->save();
        }
        if ($time) {
            $time->isArrived = true;
            $time->isArrivedTime = now();
            $time->save();
        }
        return response()->json(['success' => true]);
    }
}
