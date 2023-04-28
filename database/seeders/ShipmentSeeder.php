<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Shipment;
use App\Models\Bid;
use App\Models\Sender;
use App\Models\Recipient;
use App\Models\Station;
use App\Models\User;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    $faker = Faker::create();
    foreach (range(1,5) as $index) {
        DB::table('shipments')->insert([
            'station_id' => $faker->numberBetween(1,10),
            'station' => $faker->randomElement(['Test1','Test2', 'Test3']),
            'tracking_number' => $faker->numberBetween(500,1000),
            'user_id' => $faker->numberBetween(1,10),
            'sender_name' => $faker->name,
            'sender_address' => $faker->address,
            'sender_city' => $faker->city,
            'sender_state' => $faker->state,
            'sender_zip' => $faker->postcode,
            'recipient_name' => $faker->name,
            'recipient_address' => $faker->address,
            'recipient_city' => $faker->city,
            'recipient_state' => $faker->state,
            'recipient_zip' => $faker->postcode,
            'length' => $faker->numberBetween(1,10),
            'width' => $faker->numberBetween(1,10),
            'height' => $faker->numberBetween(1,10),
            'weight' => $faker->numberBetween(1,50),
            'bid_amount' => $faker->randomFloat(2,50,200),
            'company_bade' => $faker->company,
            'total_price' => $faker->randomFloat(2,100,500),
            'status' => $faker->randomElement(['Pending', 'In Transit', 'Delivered'])
        ]);
    }
}
