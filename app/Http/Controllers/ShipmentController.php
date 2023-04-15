<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\Bid;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;




class ShipmentController extends Controller
{
    public function index(){
        $data = Shipment::all();
        $data1 = Bid::all();

        return view('waybill.index', ['shipments' => $data, 'bids' => $data1]);
    }

    function __construct(){
        $this->shipment = new Shipment;
        $this->bid = new Bid;
    }

    function addShipment(Request $request){
        $data = [
            'station_id' => $request->stationID,
            'station_name' => $request->stationName,
            'tracking_number' => fake()->isbn13(),
            'user_id' => $request->user_id,
            'sender_name' => $request->senderName,
            'sender_address' => $request->senderAddress,
            'sender_city' => $request->senderCity,
            'sender_state' => $request->senderState,
            'sender_zip' => $request->senderZip,
            'recipient_name' => $request->receiverName,
            'recipient_address' => $request->receiverAddress,
            'recipient_city' => $request->receiverCity,
            'recipient_state' => $request->receiverState,
            'recipient_zip' => $request->receiverZip,
            'weight' => $request->weight,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'total_price' => fake()->numberBetween($min = 100, $max = 500),
            'status' => 'Pending',
        ];

        $this->shipment->addShipment($data);
        return back();
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
        $shipment->company_bade = $bid->company_name;
        $shipment->status = 'Processing';
        $shipment->save();

        Bid::where('shipment_id', $shipment->id)
        ->where('id', '!=', $bid->id)
        ->update(['status' => 'Rejected']);

        return redirect()->back();
    }

    function viewShipment($id){
        $ships=$this->shipment->getShipmentId($id);
        return view('waybill.view',compact('ships'));
    }

    public function viewInvoice($id)
    {
        $ship = Shipment::findOrFail($id);
        return view('waybill.generate-invoice', compact('ship'));
    }

    function generateInvoice($id)
    {
        $ship = Shipment::findOrFail($id);

        $data = ['ship' => $ship];

        $pdf = Pdf::loadView('waybill.generate-invoice', $data);
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice'.$ship->id.'-'.$todayDate.'.pdf');
    }


    public function generateBarcode($id) {
        $ship = Shipment::find($id);
        $data = $ship->user_id . '-' . $ship->tracking_number . '-' . $ship->id;
        $barcode = DNS1D::getBarcodePNG($data, 'C128');

        return view('barcode', [
            'barcode' => $barcode,
            'ship' => $ship
        ]);
    }

        

}
