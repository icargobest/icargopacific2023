<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\Bid;
use App\Models\Sender;
use App\Models\Recipient;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;


class ShipmentController extends Controller
{
    private $shipments;
    private $bid;

    public function index(){
        $shipment = Shipment::all();
        $bid = Bid::all();
        $sender = $shipment->sender();
        $recipient = $shipment->recipient();

        return view('company.order.index', ['shipments' => $shipment, 'bids' => $bid, 'sender', 'recipient']);
    }

    public function userIndex(){
        $shipment = Shipment::all();
        $bid = Bid::all();
        $sender = Sender::all();
        $recipient = Recipient::all();

        return view('order.index', ['shipments' => $shipment, 'bids' => $bid, 'sender' => $sender, 'recipient' => $recipient]);
    }

    function postOrder(){
        return view('order.waybill-form');
    }

    function __construct(){
        $this->shipment = new Shipment;
        $this->bid = new Bid;
    }

    function addOrder(Request $request){

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
            'status' => 'Pending',
        ];
        $shipmentModel = new Shipment();
        $shipment = $shipmentModel->create($shipmentData);

        // Update sender and recipient models
        $sender->shipment_id = $shipment->id;
        $recipient->shipment_id = $shipment->id;
        $sender->save();
        $recipient->save();

        return view('order.index');
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
        return back();
    }

    function acceptBid(Request $request, $id){
        $bid = Bid::findOrFail($id);
        $shipment = Shipment::findOrFail($request->input('shipment_id'));

        $bid->status = 'Accepted';
        $bid->save();

        $shipment->bid_amount = $bid->bid_amount;
        $shipment->company_bid = $bid->company_name;
        $shipment->status = 'Processing';
        $shipment->save();

        Bid::where('shipment_id', $shipment->id)
        ->where('id', '!=', $bid->id)
        ->update(['status' => 'Rejected']);

        return redirect()->back();
    }

    function viewOrder($id){
        $bid = Bid::all();

        $ship=$this->shipment->getShipmentId($id);
        return view('order.view',compact('ship'), ['bids' => $bid]);
    }

    function trackOrder($id){
        $bid = Bid::all();

        $ship=$this->shipment->getShipmentId($id);
        return view('order.track',compact('ship'), ['bids' => $bid]);
    }

    public function viewInvoice($id)
    {
        $ship = Shipment::findOrFail($id);
        return view('order.generate-invoice', compact('ship'));
    }
}
