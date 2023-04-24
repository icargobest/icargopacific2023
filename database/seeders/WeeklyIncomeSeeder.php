<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeeklyIncomeSeeder extends Seeder
{
    public function run()
    {
        $week1 = rand(100, 1000);
        $week2 = rand(100, 1000);
        $week3 = rand(100, 1000);
        $week4 = rand(100, 1000);

        DB::table('weekly_income')->insert([
            'week1' => $week1,
            'week2' => $week2,
            'week3' => $week3,
            'week4' => $week4,
        ]);
    }
}
