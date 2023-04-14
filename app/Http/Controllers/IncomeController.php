<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::all();
        $total = 0;

        foreach ($incomes as $income) {
            $total += $income->amount;
        }

        $dashboard = DB::table('dashboard')->first();

        return view('income', compact('incomes', 'total', 'dashboard'));
    }
}