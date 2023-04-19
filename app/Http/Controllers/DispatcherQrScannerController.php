<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class DispatcherQrScannerController extends Controller
{
    // Function to show the page we want to log in by scanner of QR code
    public function index(Request $request)
    {
        return view('company.dispatcher.dispatcher');
    }

    // Function to allow the user to log in or not log in that is done by scanner of QR code
    public function checkUser(Request $request)
    {
        $result = 0;
        $status = null;
        $name = null;
        $id = null;

        if ($request->data) {
            $user = User::where('name', $request->data)->first();
            if ($user) {
                Auth::login($user);
                $result = 1;
                $name = $user->name;
                $status = $user->status;
                $id = $user->id;
            } else {
                $result = 0;
            }
        }

        return response()->json(['result' => $result, 'status' => $status, 'name' => $name, 'id' => $id]);
    }

	public function updateReceived(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $user->status = 'received';
            $user->save();
        }
        return response()->json(['success' => true]);
    }

	public function updateOutfordelivery(Request $request)
	{
		$user = Auth::user();
        if ($user) {
            $user->status = 'delivery';
            $user->save();
        }
        return response()->json(['success' => true]);
	}

}