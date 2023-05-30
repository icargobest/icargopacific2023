<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Dispatcher;
use App\Models\Driver;
use App\Models\User;
use App\Models\Shipment;
use App\Models\OrderHistory;
use App\Models\Staff;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if ($user && auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if ($user->type == 'super-admin') {
                return redirect()->route('super.admin.dashboard');
            } 
            elseif ($user->type == 'company') {
                $company = $user->company;
                if ($company && $company->archived) {
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'User account is archived.');
                }
                return redirect()->route('company.dashboard');
            } 
            elseif ($user->type == 'driver') {
                $driver = $user->driver;
                $company = $driver->company;
                if ($driver && $driver->archived) {
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'User account is archived.');
                } elseif ($company && $company->archived) {
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Company account is archived.');
                }
                return redirect()->route('driver.dashboard');
            } 
            elseif ($user->type == 'dispatcher') {
                $dispatcher = $user->dispatcher;
                $company = $dispatcher->company;
                if ($dispatcher && $dispatcher->archived) {
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'User account is archived.');
                } elseif ($company && $company->archived) {
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Company account is archived.');
                }
                return redirect()->route('dispatcher.dashboard');
            } 
            elseif ($user->type == 'staff') {
                $staff = $user->staff;
                $company = $staff->company;
                if ($staff && $staff->archived) {
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'User account is archived.');
                } elseif ($company && $company->archived) {
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Company account is archived.');
                }
                return redirect()->route('staff.dashboard');
            } 
            else {
                return redirect()->route('dashboard');
            }
        } elseif ($user) {
            return redirect()->route('login')->with('error', 'Incorrect password');
        } else {
            return redirect()->route('login')->with('error', 'User does not exist');
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
