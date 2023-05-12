<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Shipment;
use App\Models\OrderHistory;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        //If logged in check the shipments status for logs
        $order_history = OrderHistory::all();
        $shipment = Shipment::all();

        foreach ($shipment as $ship) {
            $time = $ship->updated_at;
            $order_history_item = $order_history->where('shipment_id', $ship->id)->first();

            if (!$order_history_item) {
                $order_history_item = new OrderHistory;
                $order_history_item->shipment_id = $ship->id;
            }

            if ($ship->status === 'Pending') {
                $order_history_item->isPending = true;
                $order_history_item->isPendingTime = $time;
            } elseif ($ship->status === 'Processed') {
                $order_history_item->isProcessed = true;
                $order_history_item->isProcessedTime = $time;
            } elseif ($ship->status === 'PickUp') {
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

        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $input['email'])->first();

        if($user && auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {

            if ($user->type == 'super-admin') {
                return redirect()->route('super.admin.dashboard');
            }

            else if ($user->type == 'company') {
                return redirect()->route('company.dashboard');
            }

            else if ($user->type == 'driver') {
                return redirect()->route('driver.dashboard');
            }
            else if ($user->type == 'dispatcher') {
                return redirect()->route('dispatcher.dashboard');
            }
            else if ($user->type == 'staff') {
                return redirect()->route('staff.dashboard');
            }
            else{
                return redirect()->route('dashboard');
            }
        }
        else if ($user) {
            return redirect()->route('login')->with('error','Incorrect password');
        }
        else{
            return redirect()->route('login')->with('error','User does not exist');
        }
    }


    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
