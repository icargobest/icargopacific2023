<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class YearlyIncomeSeeder extends Seeder
{
    public function run()
    {
        // Generate random data
        $data = [];
        for ($i = 2023; $i <= 2030; $i++) {
            $data[] = [
                '2023' => rand(50000, 100000),
                '2024' => rand(50000, 100000),
                '2025' => rand(50000, 100000),
                '2026' => rand(50000, 100000),
                '2027' => rand(50000, 100000),
                '2028' => rand(50000, 100000),
                '2029' => rand(50000, 100000),
                '2030' => rand(50000, 100000),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data into the database
        DB::table('yearly_income')->insert($data);
    }
}
