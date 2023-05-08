<?php

namespace App\Http\Controllers;


use App\Models\Companies;
use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Models\Users;



class SuperDashboardController extends Controller
{
    public function index()
    {
        $incomes = Income::all();
        $totalMonthly = 0;

        $count = Companies::where('type', 2)->count();
        $count1 = Users::where('type', 0)->count();
       
        

        return view('dashboard', compact('incomes', 'count', 'count1'));
    }
}