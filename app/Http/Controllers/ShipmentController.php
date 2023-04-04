<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;




class ShipmentController extends Controller
{
    public function index(){
        $data = Shipment::all();

        return view('waybill.index', ['shipments' => $data]);
    }

    function __construct(){
        $this->shipment = new Shipment;
    }

    function addShipment(Request $request){
        $data = [
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
            'status' => 'pending',
        ];

        $this->shipment->addShipment($data);
        return back();
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

}
