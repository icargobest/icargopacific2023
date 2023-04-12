<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class DriverQrScannerController extends Controller
{
    // Function to show the page we want to log in by scanner of QR code
    public function index(Request $request)
    {
        return view('driver.driver');
    }

    // Function to allow the user to log in or not log in that is done by scanner of QR code
    public function checkUser(Request $request)
    {
        $result = 0;
        $received = 0;
        $pickup = 0;
        $delivery = 0;
        $delivered = 0;
        $name = null;

        if ($request->data) {
            $user = User::where('name', $request->data)->first();
            if ($user) {
                Auth::login($user);
                $result = 1;
                $received = $user->received;
                $pickup = $user->pickup;
                $delivery = $user->delivery;
                $delivered = $user->delivered;
                $name = $user->name;
            } else {
                $result = 0;
            }
        }

        return response()->json(['result' => $result, 'received' => $received, 'delivery' => $delivery, 'delivered' => $delivered, 'pickup' => $pickup, 'name' => $name]);
    }

	public function updatePickup(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $user->pickup = $request->pickup;
            $user->save();
        }
        return response()->json(['success' => true]);
    }

	public function updateDelivery(Request $request)
	{
		$user = Auth::user();
        if ($user) {
            $user->delivery = $request->delivery;
            $user->save();
        }
        return response()->json(['success' => true]);
	}
	public function updateDelivered(Request $request)
	{
		$user = Auth::user();
        if ($user) {
            $user->delivered = $request->delivered;
            $user->save();
        }
        return response()->json(['success' => true]);
	}

}