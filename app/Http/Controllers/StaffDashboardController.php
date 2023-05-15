<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\WeeklyIncome;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\DailyIncome;
use Illuminate\Support\Facades\Auth;
use App\Models\Shipment;
use App\Models\Company;
use App\Models\Staff;

class StaffDashboardController extends Controller
{
    public function index()
    {
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

        $statuses = ['Pending', 'Processing', 'PickedUp', 'Assort', 'Transferred', 'Arrived', 'Dispatched', 'Delivered'];
        $counts = [];
        
        foreach ($statuses as $status) {
            if ($status === 'Pending') {
                $counts[$status] = Shipment::where('status', $status)
                                          ->count();
            } else {
                if (Auth::check()) {
                    $user_id = Auth::user()->id;
                    $staff = Staff::where('user_id', $user_id)->first();
                    $counts[$status] = Shipment::where('company_id', $staff->company_id)
                                              ->where('status', $status)
                                              ->count();
                } else {
                    $counts[$status] = 0;
                }
            }
        }
        
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
        

        return view('staff_panel.dashboard', compact('incomes','counts', 'totalMonthly', 'totalYearly', 'week1', 'week2', 'week3', 'week4', 'chartData', 'dailyData'));
    }
}