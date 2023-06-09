<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected function redirectTo()
    {
        $user = auth()->user();
        if ($user->type == 'company') {
            return '/company/dashboard';
        }
        else if ($user->type == 'staff'){
            return '/staff/dashboard';
        }
        else if ($user->type == 'dispatcher'){
            return '/dispatcher/dashboard';
        }
        else if ($user->type == 'driver'){
            return '/driver/dashboard';
        }
        else if ($user->type == 'super-admin'){
            return redirect()->route('super.admin.dashboard');
        }
        else {
            return '/home';
        }
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
