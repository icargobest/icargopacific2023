<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Shipment;
use App\Models\Bid;
use App\Models\Company;
use App\Models\Station;
use App\Models\OrderHistory;
use App\Models\Sender;
use App\Models\Recipient;
use App\Models\Staff;
use App\Models\User;
use App\Models\Dispatcher;
use Illuminate\Http\Request;


class ShipmentController extends Controller
{
    private $shipment;
    private $bid;

    public function TrackOrderLog(){
        $order_history = OrderHistory::all();
        $shipment = Shipment::all();

        foreach ($shipment as $ship) {
            $time = $ship->updated_at;
            $order_history_item = $order_history->where('order_id', $ship->id)->first();

            if (!$order_history_item) {
                $order_history_item = new OrderHistory;
                $order_history_item->order_id = $ship->id;
            }

            if ($ship->status === 'Pending') {
                $order_history_item->isPending = true;
                $order_history_item->isPendingTime = $time;
            } elseif ($ship->status === 'Processing') {
                $order_history_item->isProcessed = true;
                $order_history_item->isProcessedTime = $time;
            } elseif ($ship->status === 'PickedUp') {
                $order_history_item->isPickUp = true;
                $order_history_item->isPickUpTime = $time;
            } elseif ($ship->status === 'Assort') {
                $order_history_item->isAssort = true;
                $order_history_item->isAssortTime = $time;
            } elseif ($ship->status === 'Transferred') {
                $order_history_item->isTransferred = true;
                $order_history_item->isTransferredTime = $time;
            } elseif ($ship->status === 'Arrived') {
                $order_history_item->isArrived = true;
                $order_history_item->isArrivedTime = $time;
            } elseif ($ship->status === 'Dispatched') {
                $order_history_item->isDispatched = true;
                $order_history_item->isDispatchedTime = $time;
            } elseif ($ship->status === 'Delivered') {
                $order_history_item->isDelivered = true;
                $order_history_item->isDeliveredTime = $time;
            }

            $order_history_item->save();
        }
    }


    public function index(){
        $shipment = Shipment::all();
        $bid = Bid::all();

        $this->TrackOrderLog();

        return view('company.order.index', ['shipments' => $shipment, 'bids' => $bid, 'sender', 'recipient']);
    }

    public function userIndex(){
        $shipment = Shipment::all();
        $bid = Bid::all();

        $this->TrackOrderLog();

        return view('order.index', ['shipments' => $shipment, 'bids' => $bid, 'sender', 'recipient']);
    }

    public function staffIndex(){
        $shipment = Shipment::all();
        $bid = Bid::all();

        $this->TrackOrderLog();

        return view('staff_panel.order.index', ['shipments' => $shipment, 'bids' => $bid, 'sender', 'recipient']);
    }

    public function freight(){
        $shipment = Shipment::all();
        $bid = Bid::all();

        $this->TrackOrderLog();

        return view('company.freight.index', ['shipments' => $shipment, 'bids' => $bid, 'sender', 'recipient']);
    }

    public function company_advFreightPanel(){
        $shipment = Shipment::all();
        $bid = Bid::all();

        $this->TrackOrderLog();

        return view('company.freight.advance_freight', ['shipments' => $shipment, 'bids' => $bid, 'sender', 'recipient']);
    }

    public function staff_advFreightPanel(){
        $shipment = Shipment::all();
        $bid = Bid::all();
        $user_id = Auth::id();
        $staff = Staff::where('user_id', $user_id)->first(); // Retrieve the first matching staff record
        if ($staff) {
            $company_id = $staff->company_id; // Get the company_id from the staff record
            $company = Company::where('id', $company_id)->first(); // Retrieve the first matching company record
            if($company){
                $company_id_staff =  $company->user_id;
                $user = User::where('id', $company_id_staff)->first(); // Retrieve the first matching user record
                if($user){
                    $company_name = $user->name;
                }
            }
        }

        $this->TrackOrderLog();

        return view('staff_panel.freight.advance_freight', compact('company_name', 'company_id_staff'), ['shipments' => $shipment, 'bids' => $bid, 'sender', 'recipient']);
    }

    public function freightStaff(){
        $user_id = Auth::id();
        $staff = Staff::where('user_id', $user_id)->first(); // Retrieve the first matching staff record
        if ($staff) {
            $company_id = $staff->company_id; // Get the company_id from the staff record
            $company = Company::where('id', $company_id)->first(); // Retrieve the first matching company record
            if($company){
                $company_id_staff =  $company->user_id;
                $user = User::where('id', $company_id_staff)->first(); // Retrieve the first matching user record
                if($user){
                    $company_name = $user->name;
                }
            }
        }

        $this->TrackOrderLog();

        $bids = Bid::all();
        $shipments = Shipment::all();
        return view('staff_panel.freight.index', compact('company_name', 'company_id_staff'), ['shipments' => $shipments, 'bids' => $bids, 'sender', 'recipient']);
    }

    function postOrder(){
        $this->TrackOrderLog();
        return view('order.waybill-form');
    }

    function __construct(){
        $this->shipment = new Shipment;
        $this->bid = new Bid;
    }

    function addOrder(Request $request){
        $shipment = Shipment::all();
        $bid = Bid::all();
        $sender = Sender::all();
        $recipient = Recipient::all();

        // Insert sender data
        $senderData = [
            'sender_name' => $request->senderName,
            'sender_mobile' => $request->senderMobile,
            'sender_tel' => $request->senderTelephone,
            'sender_email' => $request->senderEmail,
            'sender_address' => $request->senderAddress,
            'sender_city' => $request->senderCity,
            'sender_state' => $request->senderState,
            'sender_zip' => $request->senderZip,
        ];
        $senderModel = new Sender();
        $sender = $senderModel->create($senderData);

        // Insert recipient data
        $recipientData = [
            'recipient_name' => $request->receiverName,
            'recipient_mobile' => $request->receiverMobile,
            'recipient_tel' => $request->receiverTelephone,
            'recipient_email' => $request->receiverEmail,
            'recipient_address' => $request->receiverAddress,
            'recipient_city' => $request->receiverCity,
            'recipient_state' => $request->receiverState,
            'recipient_zip' => $request->receiverZip,
        ];
        $recipientModel = new Recipient();
        $recipient = $recipientModel->create($recipientData);

        // Insert shipment data

        $requestData = $request->all();
        $fileName = time().$request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $fileName, 'public');

        $shipmentData = [
            'tracking_number' => fake()->isbn13(),
            'user_id' => $request->user_id,
            'sender_id' => $sender->id,
            'recipient_id' => $recipient->id,
            'weight' => $request->weight,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'service_type' => $request->service_type,
            'order_type' => $request->order_type,
            'category' => $request->category,
            'min_bid_amount' => $request->amount,
            'mode_of_payment' => $request->mode_of_payment,
            'photo' => '/storage/'.$path,
            'status' => 'Pending',
        ];

        $shipmentModel = new Shipment();
        $shipment = $shipmentModel->create($shipmentData);

        // Update sender and recipient models
        $sender->shipment_id = $shipment->id;
        $recipient->shipment_id = $shipment->id;
        $sender->save();
        $recipient->save();

        $time = $shipment->updated_at;

        $order_history = new OrderHistory;
        $order_history->order_id = $shipment->id;
        $order_history->isPending = true;
        $order_history->isPendingTime = $time;
        $order_history->save();

        $this->TrackOrderLog();

        return redirect()->route('userOrderPanel')->with('success', 'Order added successfully.');
    }

    public function show(OrderHistory $order)
    {
        $order->load('order_histories');

        $this->TrackOrderLog();

        return view('orders.show', compact('order'));
    }

    function addBid(Request $request){
        $data = [
            'company_id' => $request->company_id,
            'company_name' => $request->company_name,
            'shipment_id' => $request->shipment_id,
            'bid_amount' => $request->bid_amount,
            'status' => 'Pending',
        ];
        $this->bid->addBid($data);

        $this->TrackOrderLog();

        return back();
    }

    function staff_addBid(Request $request){

        $user_id = Auth::id();
        $staff = Staff::where('user_id', $user_id)->first(); // Retrieve the first matching staff record
        if ($staff) {
            $company_id = $staff->company_id; // Get the company_id from the staff record
            $company = Company::where('id', $company_id)->first(); // Retrieve the first matching company record
            if($company){
                $company_id_staff =  $company->user_id;
                $user = User::where('id', $company_id_staff)->first(); // Retrieve the first matching user record
                if($user){
                    $company_name = $user->name;
                }
            }
        }
            // Add the bid data
            $data = [
                'company_id' => $company_id_staff,
                'shipment_id' => $request->shipment_id,
                'bid_amount' => $request->bid_amount,
                'status' => 'Pending',
            ];
            $this->bid->addBid($data);

            $this->TrackOrderLog();

            return back();
    }

    function acceptBid(Request $request, $id){
        $bid = Bid::findOrFail($id);
        $shipment = Shipment::findOrFail($request->input('shipment_id'));

        $bid->status = 'Accepted';
        $bid->save();

        $shipment->bid_amount = $bid->bid_amount;
        $shipment->company_id = $bid->company_id;
        $shipment->status = 'Processing';
        $shipment->save();

        Bid::where('shipment_id', $shipment->id)
        ->where('id', '!=', $bid->id)
        ->update(['status' => 'Rejected']);
        $this->TrackOrderLog();
        return redirect()->back();
    }

    function cancelOrder($id){
        $shipment = Shipment::findOrFail($id);

        $shipment->status = 'Cancelled';
        $shipment->save();
        $this->TrackOrderLog();

        return redirect()->back();
    }

    function viewOrder($id){
        $bid = Bid::all();

        $ship=$this->shipment->getShipmentId($id);
        $this->TrackOrderLog();
        return view('order.view',compact('ship'), ['bids' => $bid]);
    }

    function viewOrder_Company($id){
        $bid = Bid::all();
        $ship = Shipment::all();

        $ship=$this->shipment->getShipmentId($id);
        $this->TrackOrderLog();
        return view('company.order.view',compact('ship'), ['bids' => $bid]);
    }

    function viewOrder_Staff($id){
        $bid = Bid::all();

        $ship=$this->shipment->getShipmentId($id);
        $this->TrackOrderLog();
        return view('staff_panel.order.view',compact('ship'), ['bids' => $bid]);
    }

    function trackOrder($id){
        $bid = Bid::all();
        $logs = OrderHistory::all();
        $statuses = Shipment::pluck('status')->unique();

        $ship=$this->shipment->getShipmentId($id);
        $this->TrackOrderLog();
        return view('order.track',compact('ship', 'logs'), ['bids' => $bid, 'order', 'statuses' => $statuses]);
    }

    function trackOrder_Company($id){
        $bid = Bid::all();
        $logs = OrderHistory::all();
        $stations = Station::all();
        $statuses = Shipment::pluck('status')->unique();

        $ship=$this->shipment->getShipmentId($id);
        $this->TrackOrderLog();
        return view('company.order.track',compact('ship', 'logs'), ['bids' => $bid, 'order', 'statuses' => $statuses, 'stations' => $stations]);
    }

    function trackOrder_Staff($id){
        $bid = Bid::all();
        $logs = OrderHistory::all();
        $stations = Station::all();
        $statuses = Shipment::pluck('status')->unique();

        $ship=$this->shipment->getShipmentId($id);
        $this->TrackOrderLog();
        return view('staff_panel.order.track',compact('ship', 'logs'), ['bids' => $bid, 'order', 'statuses' => $statuses, 'stations' => $stations]);
    }

    public function viewInvoice($id)
    {
        $ship = Shipment::findOrFail($id);
        $this->TrackOrderLog();
        return view('order.generate-invoice', compact('ship'));
    }

    public function viewWaybill($id)
    {
        $ship = Shipment::findOrFail($id);
        $this->TrackOrderLog();
        return view('order.generate-waybill', compact('ship'));
    }

    public function viewWaybillCompany($id)
    {
        $ship = Shipment::findOrFail($id);
        $this->TrackOrderLog();
        return view('company.order.generate-waybill', compact('ship'));
    }

    public function viewInvoiceCompany($id)
    {
        $ship = Shipment::findOrFail($id);
        $this->TrackOrderLog();
        return view('company.order.generate-invoice', compact('ship'));
    }

    public function viewWaybillStaff($id)
    {
        $ship = Shipment::findOrFail($id);
        $this->TrackOrderLog();
        return view('staff_panel.order.generate-waybill', compact('ship'));
    }

    public function viewInvoiceStaff($id)
    {
        $ship = Shipment::findOrFail($id);
        $this->TrackOrderLog();
        return view('staff_panel.order.generate-invoice', compact('ship'));
    }

    function orderHistory(){
        $shipment = Shipment::all();
        $bid = Bid::all();
        $this->TrackOrderLog();
        return view('order.order-history', ['shipments' => $shipment, 'bids' => $bid, 'sender', 'recipient']);
    }

    public function transfer(Request $request)
    {
        $data = Shipment::findOrFail($request->id);
        $data->station_id = $request->transfer_station_number;
        $data->status = 'Transferred';
        $data->save();
        $this->TrackOrderLog();
        return redirect()->back()->with('success', 'Transfer Success');
    }

    public function toPickUp_view(){
        $shipment = Shipment::all();
        $bid = Bid::all();

        $user_id = Auth::id();
        $dispatcher = Dispatcher::where('user_id', $user_id)->first(); // Retrieve the first matching dispatcher record
        if ($dispatcher) {
            $company_id = $dispatcher->company_id; // Get the company_id from the dispatcher record
            $company = Company::where('id', $company_id)->first(); // Retrieve the first matching company record
            if($company){
                $company_id_dispatcher =  $company->user_id;
                $user = User::where('id', $company_id_dispatcher)->first(); // Retrieve the first matching user record
                if($user){
                    $company_name = $user->name;
                }
            }
        }

        $this->TrackOrderLog();

        return view('dispatcher_panel.order.pickup', compact('company_id_dispatcher'), ['shipments' => $shipment, 'bids' => $bid, 'sender', 'recipient',]);
    }

    public function toDispatch_view(){
        $shipment = Shipment::all();
        $bid = Bid::all();

        $user_id = Auth::id();
        $dispatcher = Dispatcher::where('user_id', $user_id)->first(); // Retrieve the first matching dispatcher record
        if ($dispatcher) {
            $company_id = $dispatcher->company_id; // Get the company_id from the dispatcher record
            $company = Company::where('id', $company_id)->first(); // Retrieve the first matching company record
            if($company){
                $company_id_dispatcher =  $company->user_id;
                $user = User::where('id', $company_id_dispatcher)->first(); // Retrieve the first matching user record
                if($user){
                    $company_name = $user->name;
                }
            }
        }

        $this->TrackOrderLog();

        return view('dispatcher_panel.order.dispatch', compact('company_id_dispatcher'), ['shipments' => $shipment, 'bids' => $bid, 'sender', 'recipient']);
    }

}
