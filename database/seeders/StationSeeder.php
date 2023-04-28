<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Station;

class StationSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'user_id' => 1,
            'station_number' => 'ST01',
            'station_name' => 'Station 1',
            'station_address' => '123 Main Street',
            'station_contact_no' => '123-456-7890',
            'station_email' => 'station1@example.com',
        ];

        try {
            $stationModel = new Station();
            $stationModel->addStation($data);
            echo "Station data created successfully!\n";
        } catch (\Exception $e) {
            echo "Error creating station: " . $e->getMessage() . "\n";
        }
    }
}
