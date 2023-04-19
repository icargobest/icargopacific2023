<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Shipment;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = [
            [
                'tracking_number' => fake()->isbn13(),
                'user_id' => '2',
                'sender_name' => 'price_1MqtHUA6dkExbPGE2h50wTK6',
                'price' => 49,
                'description' => 'Standard monthly subscription'
            ],
        ];
    }
}
