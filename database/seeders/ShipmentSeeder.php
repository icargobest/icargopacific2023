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
        $stations = Station::all();
        $users = User::all();
        $faker = Faker::create();

        // Insert sender data
        $senderData = [
            'sender_name' => $faker->name(),
            'sender_mobile' => $faker->phoneNumber(),
            'sender_tel' => $faker->phoneNumber(),
            'sender_email' => $faker->email(),
            'sender_address' => $faker->streetAddress(),
            'sender_city' => $faker->city(),
            'sender_state' => $faker->state(),
            'sender_zip' => $faker->postcode(),
        ];
        $senderModel = new Sender();
        $sender = $senderModel->create($senderData);

        // Insert recipient data
        $recipientData = [
            'recipient_name' => $faker->name(),
            'recipient_mobile' => $faker->phoneNumber(),
            'recipient_tel' => $faker->phoneNumber(),
            'recipient_email' => $faker->email(),
            'recipient_address' => $faker->streetAddress(),
            'recipient_city' => $faker->city(),
            'recipient_state' => $faker->state(),
            'recipient_zip' => $faker->postcode(),
        ];
        $recipientModel = new Recipient();
        $recipient = $recipientModel->create($recipientData);

        // Insert shipment data
        $shipmentData = [
            'station_id' => null,
            'tracking_number' => $faker->isbn13(),
            'user_id' => 1,
            'sender_id' => $sender->id,
            'recipient_id' => $recipient->id,
            'weight' => $faker->randomFloat(2, 1, 100),
            'length' => $faker->randomFloat(2, 1, 100),
            'width' => $faker->randomFloat(2, 1, 100),
            'height' => $faker->randomFloat(2, 1, 100),
            'service_type' => $faker->randomElement(['Standard', 'Express']),
            'order_type' => $faker->randomElement(['Document', 'Parcel']),
            'category' => $faker->randomElement(['Domestic', 'International']),
            'min_bid_amount' => $faker->randomFloat(2, 10, 1000),
            'photo' => $faker->imageUrl(),
            'status' => 'Pending',
        ];
        $shipmentModel = new Shipment();
        $shipmentModel->create($shipmentData);

        // Update sender and recipient models
        $sender->save();
        $recipient->save();
    }
}
