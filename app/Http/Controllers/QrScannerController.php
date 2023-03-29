<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class QrScannerController extends Controller
{   // this Function show that Page we want to loging by Scanner of QrCode
    public function index(Request $request) {
    
		return view('driver.driver');
	}
	
	// this Function Allow to User log or no log that do by Scanner of QrCode
	public function checkUser(Request $request) {
		 $result =0;
		 $name = null;
			if ($request->data) {
				$user = User::where('name',$request->data)->first();
				if ($user) {
					Auth::login($user);
				    $result =1;
					$name = $user->name;
				 }else{
				 	$result =0;
				 }
            }
			return response()->json(['result' => $result, 'name' => $name]);
	}
}