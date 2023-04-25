<?php
namespace Database\Seeders;
   
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;
   
class PlanSeeder extends Seeder
{
    public function run()
    {
        $plans = [
            [
                'name' => 'Free', 
                'slug' => 'free', 
                'stripe_plan' => 'price_1N0alwA6dkExbPGEMHNixzLj', 
                'price' => 0, 
                'description' => 'No monthly subscription'
            ],
            [
                'name' => 'Standard', 
                'slug' => 'standard', 
                'stripe_plan' => 'price_1MqtHUA6dkExbPGE2h50wTK6', 
                'price' => 49, 
                'description' => 'Standard monthly subscription'
            ],
            [
                'name' => 'Premium', 
                'slug' => 'premium', 
                'stripe_plan' => 'price_1MqtHvA6dkExbPGE4n0dRXri', 
                'price' => 99, 
                'description' => 'Premium'
            ]
        ];
   
        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}