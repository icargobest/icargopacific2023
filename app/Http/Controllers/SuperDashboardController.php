<?php

namespace App\Http\Controllers;


use App\Models\Companies;
use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Models\User;
use App\Models\Driver;
use App\Models\Dispatcher;
use App\Models\Customer;
use App\Models\Staff;
use App\Models\VerifyToken;
use App\Mail\VerificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\DailyIncome;
use Illuminate\Support\Facades\DB;


class SuperDashboardController extends Controller
{
    public function index()
    {

        $incomes = Income::all();
        $totalMonthly = 0;
        foreach ($incomes as $income) {
            $totalMonthly += $income->amount;
        }

        $totalYearly = $totalMonthly;

        $companycount = Companies::count();
        $usercount = User::count();
        $drivercount = Driver::count();
        $staffcount = Staff::count();
        $dispatchercount = Dispatcher::count();
        $customercount = Customer::count();

        // Prepare the data for use in the line chart
        $chartData = [
            ['Year', 'Income'],
            ['2023', DB::table('yearly_income')->value('2023')],
            ['2024', DB::table('yearly_income')->value('2024')],
            ['2025', DB::table('yearly_income')->value('2025')],
            ['2026', DB::table('yearly_income')->value('2026')],
            ['2027', DB::table('yearly_income')->value('2027')],
            ['2028', DB::table('yearly_income')->value('2028')],
            ['2029', DB::table('yearly_income')->value('2029')],
            ['2030', DB::table('yearly_income')->value('2030')]
        ];

        $dailyData = DailyIncome::select('day', 'income')->orderBy('day')->get();

        $incomes = Income::all();
        $totalMonthly = 0;

        $data = DB::table('weekly_income')->first();
        $week1 = $data->week1;
        $week2 = $data->week2;
        $week3 = $data->week3;
        $week4 = $data->week4;

        foreach ($incomes as $income) {
            $totalMonthly += $income->amount;
        }

        $totalYearly = $totalMonthly;

        return view('icargo_superadmin_panel.dashboard', compact('incomes', 'companycount', 'usercount', 'drivercount', 'staffcount', 'dispatchercount', 'customercount', 'totalMonthly', 'totalYearly', 'week1', 'week2', 'week3', 'week4', 'chartData', 'dailyData'));
    }

    public function sendOTP($id)
    {

        $data = User::findOrFail($id);

        $validToken = rand(10, 100. . '2022');
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
