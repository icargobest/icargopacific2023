<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DailyIncomeSeeder extends Seeder
{
    public function run()
    {
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        foreach ($daysOfWeek as $dayOfWeek) {
            DB::table('daily_income')->insert([
                'day' => Carbon::parse($dayOfWeek),
                'income' => rand(100, 1000),
            ]);
        }
    }
}
