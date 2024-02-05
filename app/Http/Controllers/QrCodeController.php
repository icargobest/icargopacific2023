<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Storage;

class QrCodeController extends Controller
{

    public function index()
    {
        return view('qrcode');
    }

    public function generateQrCode($data)
    {
        $qr = QrCode::size(500)
            ->backgroundColor(255, 255, 255)
            ->color(0, 0, 0)
            ->generate($data);

        $output = base64_encode($qr);
        return view('qr-code', compact('output'));
    }

    public function generateQrCode()
    {
        $data = "Rhoss";
        $qrCode = new QrCode($data);
        $qrCode->setSize(300);
        $qrCode->setMargin(10);

        $pngWriter = new PngWriter();
        $qrCodeData = $pngWriter->writeString($qrCode);

        $filename = 'qrcode.png';

        Storage::disk('local')->put($filename, $qrCodeData);

        $headers = [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Content-Length' => Storage::size($filename)
        ];

        return response()->download(storage_path('public/img/' . $filename), $filename, $headers);
    }
}
