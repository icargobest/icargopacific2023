<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
