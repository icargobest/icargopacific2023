<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
use App\Models\Driver;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ShipmentController extends Controller
{
    private $shipment;
    private $bid;

    public function TrackOrderLog()
    {
        $order_history = OrderHistory::all();
        $shipment = Shipment::all();

        foreach ($shipment as $ship) {
            $order_history_item = $order_history->where('shipment_id', $ship->id)->first();
            $time = $ship->updated_at;

            $datetime = Carbon::parse($time);

            $philippine_time = $datetime->tz('Asia/Manila');

            $formatted_datetime = $philippine_time->format('Y-m-d H:i:s');


            if (!$order_history_item) {
                $order_history_item = new OrderHistory;
                $order_history_item->shipment_id = $ship->id;
            }

            if ($ship->status === 'Pending') {
                $order_history_item->isPending = true;
                $order_history_item->isPendingTime = $formatted_datetime;
            } elseif ($ship->status === 'Processing') {
                $order_history_item->isProcessed = true;
                $order_history_item->isProcessedTime = $formatted_datetime;
            } elseif ($ship->status === 'PickedUp') {
                $order_history_item->isPickUp = true;
                $order_history_item->isPickUpTime = $formatted_datetime;
            } elseif ($ship->status === 'Assort') {
                $order_history_item->isAssort = true;
                $order_history_item->isAssortTime = $formatted_datetime;
            } elseif ($ship->status === 'Transferred') {
                $order_history_item->isTransferred = true;
                $order_history_item->isTransferredTime = $formatted_datetime;
            } elseif ($ship->status === 'Arrived') {
                $order_history_item->isArrived = true;
                $order_history_item->isArrivedTime = $formatted_datetime;
            } elseif ($ship->status === 'Dispatched') {
                $order_history_item->isDispatched = true;
                $order_history_item->isDispatchedTime = $formatted_datetime;
            } elseif ($ship->status === 'Delivered') {
                $order_history_item->isDelivered = true;
                $order_history_item->isDeliveredTime = $formatted_datetime;
            }

            $order_history_item->save();
        }
    }


    public function index()
    {
        $shipment = Shipment::all();
        $bid = Bid::all();

        $this->TrackOrderLog();

        return view('company.order.index', ['shipments' => $shipment, 'bids' => $bid, 'sender', 'recipient']);
    }

    public function userIndex()
    {
        $shipment = Shipment::all();
        $bid = Bid::all();

        $this->TrackOrderLog();

        return view('order.index', ['shipments' => $shipment, 'bids' => $bid, 'sender', 'recipient']);
    }

    public function staffIndex()
    {
        $shipment = Shipment::all();
        $bid = Bid::all();

        $this->TrackOrderLog();

        return view('staff_panel.order.index', ['shipments' => $shipment, 'bids' => $bid, 'sender', 'recipient']);
    }

    public function freight()
    {
        $shipment = Shipment::all();
        $company = Company::where('user_id', Auth::user()->id)->first();
        $bid = Bid::all();
        $logs = OrderHistory::all();
        $this->TrackOrderLog();

        return view('company.freight.index', compact('company', 'logs'), ['shipments' => $shipment, 'bids' => $bid, 'sender', 'recipient']);
    }

    public function freight_transfer($id)
    {
        $shipments = Shipment::where('id', $id)->first();
        $company = Company::where('user_id', Auth::user()->id)->first();
        $bids = Bid::all();
        $logs = OrderHistory::all();
        $stations = Station::all();
        $this->TrackOrderLog();

        return view('company.freight.freight_transfer', compact('company', 'logs', 'stations', 'shipments', 'bids'), ['sender', 'recipient']);
    }

    public function advfreight($id)
    {
        $currentUser = Auth::user()->id;

        $ship = Shipment::findOrFail($id);
        $company = Company::all()->whereNotIn('user_id', [$currentUser]);
        $bid = Bid::all();

        $this->TrackOrderLog();

        return view('company.advance_freight.transfers', compact('ship'), ['bids' => $bid, 'companies' => $company, 'sender', 'recipient']);
    }

    public function company_advFreightPanel()
    {
        $shipment = Shipment::all();
        $company = Company::where('user_id', Auth::user()->id)->first();
        $bid = Bid::all();

        $this->TrackOrderLog();

        return view('company.advance_freight.index', compact('company'), ['shipments' => $shipment, 'bids' => $bid, 'sender', 'recipient']);
    }

    public function staff_advFreightPanel()
    {
        $shipment = Shipment::all();
        $bid = Bid::all();
        $user_id = Auth::id();
        $staff = Staff::where('user_id', $user_id)->first(); // Retrieve the first matching staff record
        if ($staff) {
            $company_id = $staff->company_id; // Get the company_id from the staff record
            $company = Company::where('id', $company_id)->first(); // Retrieve the first matching company record
            if ($company) {
                $company_id_staff =  $company->user_id;
                $user = User::where('id', $company_id_staff)->first(); // Retrieve the first matching user record
                if ($user) {
                    $company_name = $user->name;
                }
            }
        }

        $this->TrackOrderLog();

        return view('staff_panel.advance_freight.advance_tracking', compact('staff', 'company_name', 'company_id_staff'), ['shipments' => $shipment, 'bids' => $bid, 'sender', 'recipient']);
    }

    public function staff_advfreight($id){
        $user_id = Auth::user()->id;
        $staff = Staff::where('user_id', $user_id)->first();
        $company_id = $staff->company_id;
        $company_user = Company::where('id', $company_id)->first();
        $company = Company::all()->whereNotIn('user_id', [$company_user->user_id]);

        $ship = Shipment::findOrFail($id);
        $bid = Bid::all();

        $this->TrackOrderLog();

        return view('staff_panel.advance_freight.transfers', compact('ship'), ['bids' => $bid, 'companies' => $company, 'sender', 'recipient']);
    }

    public function staff_advTransfer(Request $request)
    {
        $data = Shipment::findOrFail($request->id);
        $data->advTransferredto = $request->transfer_to_company;
        $data->advTransferredStatus = 'Pending';
        $data->save();

        return redirect()->back()->with('message', 'Transfer Pending');
    }

    public function staff_accept_transfer($id)
    {
        $shipment = Shipment::findOrFail($id);
        $currentStaff = Staff::where('user_id', Auth::user()->id)->first();

        $shipment->company_name = $company_name;
        $shipment->company_id = $currentStaff->company_id;
        $shipment->advTransferredStatus = 'Accepted';
        $shipment->status = 'Transferred';
        $shipment->save();
        $this->TrackOrderLog();
        return redirect()->back()->with('message', 'Transfer Accepted');
    }

    public function staff_decline_transfer($id)
    {
        $shipment = Shipment::findOrFail($id);

        $shipment->advTransferredto = NULL;
        $shipment->advTransferredStatus = NULL;
        $shipment->save();

        return redirect()->back()->with('message', 'Transfer Declined');
    }

    public function freightStaff()
    {
        $staff = Staff::where('user_id', Auth::user()->id)->first();


        $this->TrackOrderLog();

        $bids = Bid::all();
        $shipments = Shipment::all();
        return view('staff_panel.freight.freight_tracking', compact('staff'), ['shipments' => $shipments, 'bids' => $bids, 'sender', 'recipient']);
    }

    function postOrder()
    {
        $this->TrackOrderLog();
        return view('order.waybill-form');
    }

    function __construct()
    {
        $this->shipment = new Shipment;
        $this->bid = new Bid;
    }

    function addOrder(Request $request)
    {
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
        $fileName = time() . $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $fileName, 'public');

        $shipmentData = [
            'tracking_number' => fake()->isbn13(),
            'user_id' => $request->user_id,
            'sender_id' => $sender->id,
            'recipient_id' => $recipient->id,
            'weight' => $request->input('weight'),
            'length' => $request->input('length'),
            'width' => $request->input('width'),
            'height' => $request->input('height'),
            'service_type' => $request->input('service_type'),
            'order_type' => $request->input('order_type'),
            'category' => $request->input('category'),
            'min_bid_amount' => $request->input('amount'),
            'mop' => $request->input('mop'),
            'photo' => '/storage/' . $path,
            'status' => 'Pending',
        ];

        $shipmentModel = new Shipment();
        $shipment = $shipmentModel->create($shipmentData);

        // Update sender and recipient models
        // $sender->shipment_id = $shipment->id;
        // $recipient->shipment_id = $shipment->id;
        // $sender->save();
        // $recipient->save();

        $time = $shipment->updated_at;

        $order_history = new OrderHistory;
        $order_history->shipment_id = $shipment->id;
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

    function addBid(Request $request)
    {
        $company = Company::where('user_id', $request->company_id)->first();
        $data = [
            'company_id' => $company->id,
            'shipment_id' => $request->shipment_id,
            'bid_amount' => $request->bid_amount,
            'status' => 'Pending',
        ];
        $this->bid->addBid($data);

        $this->TrackOrderLog();

        return back();
    }

    function staff_addBid(Request $request)
    {
        $staff = Staff::where('user_id', $request->staff_id)->first();
        $company = Company::where('id', $staff->company_id)->first();

        // Add the bid data
        $data = [
            'company_id' => $company->id,
            'shipment_id' => $request->shipment_id,
            'bid_amount' => $request->bid_amount,
            'status' => 'Pending',
        ];
        $this->bid->addBid($data);

        $this->TrackOrderLog();

        return back();
    }

    function acceptBid(Request $request, $id)
    {
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

    function cancelOrder($id)
    {
        $shipment = Shipment::findOrFail($id);

        $shipment->status = 'Cancelled';
        $shipment->save();

        Bid::where('shipment_id', $shipment->id)
            ->update(['status' => 'Order Cancelled']);

        $this->TrackOrderLog();

        return redirect()->back();
    }

    function viewOrder($id)
    {
        $ship = Shipment::findOrFail($id);

        // Join bids table with companies table and users table
        $bids = Bid::where('shipment_id', $id)
            ->join('companies', 'bids.company_id', '=', 'companies.id')
            ->join('users', 'companies.user_id', '=', 'users.id')
            ->select('bids.*', 'users.name as company_name')
            ->get();

        if ($ship->company_id != null && $ship->bid_amount != null) {
            $company = Company::where('id', $ship->company_id)->first();
            $user = User::where('id', $company->user_id)->first();
            $company_name = $user->name;

            $this->TrackOrderLog();
            return view('order.view', compact('ship', 'company_name', 'bids'));
        } else {

            $this->TrackOrderLog();
            return view('order.view', compact('ship', 'bids'));
        }
    }

    function viewOrder_Company($id)
    {
        $ship = Shipment::findOrFail($id);

        // Join bids table with companies table and users table
        $bids = Bid::where('shipment_id', $id)
            ->join('companies', 'bids.company_id', '=', 'companies.id')
            ->join('users', 'companies.user_id', '=', 'users.id')
            ->select('bids.*', 'users.name as company_name')
            ->get();


        if ($ship->company_id != null && $ship->bid_amount != null) {
            $company = Company::where('id', $ship->company_id)->first();
            $user = User::where('id', $company->user_id)->first();
            $company_name = $user->name;

            $this->TrackOrderLog();
            return view('company.order.view', compact('ship', 'company_name', 'bids'));
        } else {

            $this->TrackOrderLog();
            return view('company.order.view', compact('ship', 'bids'));
        }
    }

    function viewOrder_Staff($id)
    {
        $ship = Shipment::findOrFail($id);

        // Join bids table with companies table and users table
        $bids = Bid::where('shipment_id', $id)
            ->join('companies', 'bids.company_id', '=', 'companies.id')
            ->join('users', 'companies.user_id', '=', 'users.id')
            ->select('bids.*', 'users.name as company_name')
            ->get();

        if ($ship->company_id != null && $ship->bid_amount != null) {
            $company = Company::where('id', $ship->company_id)->first();
            $user = User::where('id', $company->user_id)->first();
            $company_name = $user->name;

            $this->TrackOrderLog();
            return view('staff_panel.order.view', compact('ship', 'company_name', 'bids'));
        } else {

            $this->TrackOrderLog();
            return view('staff_panel.order.view', compact('ship', 'bids'));
        }
    }

    function trackOrder($id)
    {
        $bid = Bid::all();
        $logs = OrderHistory::all();
        $statuses = Shipment::pluck('status')->unique();

        $ship = Shipment::findOrFail($id);

        $company = Company::where('id', $ship->company_id)->first();
        $user = User::where('id', $company->user_id)->first();
        $company_name = $user->name;

        $this->TrackOrderLog();
        return view('order.track', compact('ship', 'logs', 'company_name'), ['bids' => $bid, 'order', 'statuses' => $statuses]);
    }

    function trackOrder_Company($id)
    {
        $bid = Bid::all();
        $logs = OrderHistory::all();
        $stations = Station::all();
        $statuses = Shipment::pluck('status')->unique();

        $ship = Shipment::findOrFail($id);

        $company = Company::where('id', $ship->company_id)->first();
        $user = User::where('id', $company->user_id)->first();
        $company_name = $user->name;

        $this->TrackOrderLog();
        return view('company.order.track', compact('ship', 'logs', 'company_name'), ['bids' => $bid, 'order', 'statuses' => $statuses, 'stations' => $stations]);
    }

    function trackOrder_Staff($id)
    {
        $bid = Bid::all();
        $logs = OrderHistory::all();
        $stations = Station::all();
        $statuses = Shipment::pluck('status')->unique();

        $ship = Shipment::findOrFail($id);

        $company = Company::where('id', $ship->company_id)->first();
        $user = User::where('id', $company->user_id)->first();
        $company_name = $user->name;

        $this->TrackOrderLog();
        return view('staff_panel.order.track', compact('ship', 'logs', 'company_name'), ['bids' => $bid, 'order', 'statuses' => $statuses, 'stations' => $stations]);
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

    function orderHistory_user()
    {
        $shipment = Shipment::all();
        $bid = Bid::all();
        $orderLogs = OrderHistory::all();
        $this->TrackOrderLog();
        return view('order.orderHistory', ['shipments' => $shipment, 'bids' => $bid, 'sender', 'recipient', 'orderLogs' => $orderLogs]);
    }

    function orderHistory_company()
    {
        $user_id = Auth::id();
        $company = Company::where('user_id', $user_id)->first();
        $shipments = Shipment::where('company_id', $company->id)
            ->where('status', 'Delivered')
            ->get();
        $bids = Bid::all();
        $orderLogs = OrderHistory::all();
        $this->TrackOrderLog();
        return view('company.order.orderHistory', [
            'shipments' => $shipments,
            'bids' => $bids,
            'sender',
            'recipient',
            'orderLogs' => $orderLogs
        ]);
    }

    function orderHistory_staff()
    {
        $user_id = Auth::id();
        $staff = Staff::with('company')->where('user_id', $user_id)->firstOrFail();
        $shipments = Shipment::with(['sender', 'recipient'])->where('company_id', $staff->company_id)
            ->where('status', 'Delivered')->get();
        $orderLogs = OrderHistory::all();
        $this->TrackOrderLog();
        return view('staff_panel.order.orderHistory', compact('shipments', 'orderLogs'));
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

    public function advTransfer(Request $request)
    {
        $data = Shipment::findOrFail($request->id);
        $data->advTransferredto = $request->transfer_to_company;
        $data->advTransferredStatus = 'Pending';
        $data->save();

        return redirect()->back()->with('message', 'Transfer Pending');
    }

    public function accept_transfer($id)
    {
        $shipment = Shipment::findOrFail($id);
        $currentCompany = Company::where('user_id', Auth::user()->id)->first();

        $shipment->company_name = Auth::user()->name;
        $shipment->company_id = $currentCompany->id;
        $shipment->advTransferredStatus = 'Accepted';
        $shipment->status = 'Transferred';
        $shipment->save();
        $this->TrackOrderLog();
        return redirect()->back()->with('message', 'Transfer Accepted');
    }

    public function decline_transfer($id)
    {
        $shipment = Shipment::findOrFail($id);

        $shipment->advTransferredto = NULL;
        $shipment->advTransferredStatus = NULL;
        $shipment->save();

        return redirect()->back()->with('message', 'Transfer Declined');
    }

    public function toPickUp_view()
    {
        $shipment = Shipment::all();
        $bid = Bid::all();
        $driver = Driver::all();

        $user_id = Auth::id();
        $dispatcher = Dispatcher::where('user_id', $user_id)->first(); // Retrieve the first matching dispatcher record
        if ($dispatcher) {
            $company_id = $dispatcher->company_id; // Get the company_id from the dispatcher record
            $dispatcher_station_id = $dispatcher->station_id;
            $company = Company::where('id', $company_id)->first(); // Retrieve the first matching company record
            if ($company) {
                $company_id_dispatcher =  $company->id;
                $company_ID =  $company->user_id;
                $user = User::where('id', $company_ID)->first(); // Retrieve the first matching user record
                if ($user) {
                    $company_name = $user->name;
                }
            }
        }

        $this->TrackOrderLog();

        return view('dispatcher_panel.order.pickup', compact('company_id_dispatcher', 'company_name', 'dispatcher_station_id'), ['shipments' => $shipment, 'drivers' => $driver, 'bids' => $bid, 'sender', 'recipient',]);
    }

    public function toDispatch_view()
    {
        $shipment = Shipment::all();
        $bid = Bid::all();
        $driver = Driver::all();

        $user_id = Auth::id();
        $dispatcher = Dispatcher::where('user_id', $user_id)->first(); // Retrieve the first matching dispatcher record
        if ($dispatcher) {
            $company_id = $dispatcher->company_id;
            $dispatcher_station_id = $dispatcher->station_id; // Get the company_id from the dispatcher record
            $company = Company::where('id', $company_id)->first(); // Retrieve the first matching company record
            if ($company) {
                $company_id_dispatcher =  $company->id;
                $company_ID =  $company->user_id;
                $user = User::where('id', $company_ID)->first(); // Retrieve the first matching user record
                if ($user) {
                    $company_name = $user->name;
                }
            }
        }

        $this->TrackOrderLog();

        return view('dispatcher_panel.order.dispatch', compact('company_id_dispatcher', 'dispatcher_station_id'), ['shipments' => $shipment, 'drivers' => $driver, 'bids' => $bid, 'sender', 'recipient']);
    }

    public function driverHistory_view()
    {
        $shipment = Shipment::all();

        $user_id = Auth::id();
        $driver = Driver::where('user_id', $user_id)->first(); // Retrieve the first matching dispatcher record
        if ($driver) {
            $driverID = $driver->id; // Get the driver_id from the driver record
            $company_id = $driver->company_id; // Get the company_id from the dispatcher record
            $company = Company::where('id', $company_id)->first(); // Retrieve the first matching company record
            if ($company) {
                $company_id_dispatcher =  $company->id;
                $company_ID =  $company->user_id;
                $user = User::where('id', $company_ID)->first(); // Retrieve the first matching user record
                if ($user) {
                    $company_name = $user->name;
                }
            }
        }

        $this->TrackOrderLog();

        return view('driver_panel.deliverHistory', compact('driverID', 'company_name'), ['shipments' => $shipment]);
    }

    public function driverOrder_view()
    {
        $shipment = Shipment::all();

        $user_id = Auth::id();
        $driver = Driver::where('user_id', $user_id)->first(); // Retrieve the first matching dispatcher record
        if ($driver) {
            $driverID = $driver->id; // Get the driver_id from the driver record
            $company_id = $driver->company_id; // Get the company_id from the dispatcher record
            $company = Company::where('id', $company_id)->first(); // Retrieve the first matching company record
            if ($company) {
                $company_id_dispatcher =  $company->id;
                $company_ID =  $company->user_id;
                $user = User::where('id', $company_ID)->first(); // Retrieve the first matching user record
                if ($user) {
                    $company_name = $user->name;
                }
            }
        }

        $this->TrackOrderLog();

        return view('driver_panel.orderList', compact('driverID', 'company_name'), ['shipments' => $shipment]);
    }

    public function dispatcherHistory_view()
    {
        $shipment = Shipment::all();
        $bid = Bid::all();
        $driver = Driver::all();

        $user_id = Auth::id();
        $dispatcher = Dispatcher::where('user_id', $user_id)->first(); // Retrieve the first matching dispatcher record
        if ($dispatcher) {
            $dispatch_id = $dispatcher->user_id;
            $company_id = $dispatcher->company_id; // Get the company_id from the dispatcher record
            $company = Company::where('id', $company_id)->first(); // Retrieve the first matching company record
            if ($company) {
                $company_id_dispatcher =  $company->id;
                $company_ID =  $company->user_id;
                $user = User::where('id', $company_ID)->first(); // Retrieve the first matching user record
                if ($user) {
                    $company_name = $user->name;
                    $driver_id = Driver::where('dispatcher_id', $user_id)->first();
                    if ($driver_id) {
                        $driverID = $driver_id->id;
                    } else {
                        $driverID = null;
                    }
                }
            }
        }

        $this->TrackOrderLog();

        return view('dispatcher_panel.dispatchHistory', compact('company_id_dispatcher', 'company_name', 'driverID'), ['shipments' => $shipment, 'drivers' => $driver, 'bids' => $bid, 'sender', 'recipient']);
    }

    public function edit_order($id)
    {
        $shipment = Shipment::findOrFail($id);

        return view('order.edit', compact('shipment'));
    }

    public function update_order(Request $request, $id)
    {
        $shipment = Shipment::find($id);
        $bids = Bid::where('shipment_id', $shipment->id)->exist();

        $shipment->sender->sender_name = $request->input('senderName');
        $shipment->sender->sender_address = $request->input('senderAddress');
        $shipment->sender->sender_mobile = $request->input('senderMobile');
        $shipment->sender->sender_tel = $request->input('senderTelephone');
        $shipment->sender->sender_email = $request->input('senderEmail');
        $shipment->sender->sender_city = $request->input('senderCity');
        $shipment->sender->sender_zip = $request->input('senderZip');
        $shipment->sender->sender_state = $request->input('senderState');

        $shipment->sender->save();

        $shipment->recipient->recipient_name = $request->input('receiverName');
        $shipment->recipient->recipient_address = $request->input('receiverAddress');
        $shipment->recipient->recipient_mobile = $request->input('receiverMobile');
        $shipment->recipient->recipient_tel = $request->input('receiverTelephone');
        $shipment->recipient->recipient_email = $request->input('receiverEmail');
        $shipment->recipient->recipient_city = $request->input('receiverCity');
        $shipment->recipient->recipient_zip = $request->input('receiverZip');
        $shipment->recipient->recipient_state = $request->input('receiverState');

        $shipment->recipient->save();

        $shipment->weight = $request->input('weight');
        $shipment->length = $request->input('length');
        $shipment->width = $request->input('width');
        $shipment->height = $request->input('height');
        $shipment->service_type = $request->input('service_type');
        $shipment->order_type = $request->input('order_type');
        $shipment->category = $request->input('category');
        $shipment->mop = $request->input('mop');
        $shipment->min_bid_amount = $request->input('amount');

        $shipment->save();

        return redirect()->route('viewOrder', $id, compact('bids'))->with('success', 'Order information has been updated!');
    }

    public function assignStation_view()
    {
        $shipment = Shipment::all();
        $bid = Bid::all();
        $station = Station::all();

        $user_id = Auth::id();
        $staff = Staff::where('user_id', $user_id)->first(); // Retrieve the first matching dispatcher record
        if ($staff) {
            $company_id = $staff->company_id; // Get the company_id from the dispatcher record
            $company = Company::where('id', $company_id)->first(); // Retrieve the first matching company record
            if ($company) {
                $company_id_staff =  $company->id;
                $company_ID =  $company->user_id;
                $user = User::where('id', $company_ID)->first(); // Retrieve the first matching user record
                if ($user) {
                    $company_name = $user->name;
                }
            }
        }

        $this->TrackOrderLog();

        return view('staff_panel.order.station', compact('company_id_staff', 'company_name'), ['shipments' => $shipment, 'stations' => $station, 'bids' => $bid, 'sender', 'recipient',]);
    }
}
