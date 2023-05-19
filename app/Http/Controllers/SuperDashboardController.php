<?php

namespace App\Http\Controllers;


use App\Models\Companies;
use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Models\User;
use App\Models\VerifyToken;
use App\Mail\VerificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;



class SuperDashboardController extends Controller
{
    public function index()
    {
        $incomes = Income::all();
        $totalMonthly = 0;

        $companycount = User::where('type', 2)->count();
        $usercount = User::where('type', 0)->count();
       
        

        return view('icargo_superadmin_panel.dashboard', compact('incomes', 'companycount', 'usercount'));
    }

    public function sendOTP($id){

        $data = User::findOrFail($id);

        $validToken = rand(10,100..'2022');
        $get_token = new VerifyToken();
        $get_token->token = $validToken;
        $get_token->email = $data['email'];
        $get_token->save();
        $get_user_email = $data['email'];
        $get_user_name = $data['name'];
        Mail::to($data['email'])->send(new VerificationMail($get_user_email, $validToken, $get_user_name));

        return back()->with('message', 'OTP sent. Please ask the otp from the email owner.');
    }

    
}