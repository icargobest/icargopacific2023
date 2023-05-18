<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Driver;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::all();

        foreach ($companies as $company) {
            for ($i = 1; $i <= 25; $i++) {
                $user = User::create([
                    'name' => 'Driver' . $i . ' - ' . $company->name,
                    'email' => 'driver' . $i . '_' . $company->id . '@example.com',
                    'password' => Hash::make('password'),
                    'type' => '3',
                ]);

                Driver::create([
                    'user_id' => $user->id,
                    'company_id' => $company->id,
                    'contact_no' => 'Contact No ' . $i,
                    'vehicle_type' => 'Vehicle Type ' . $i,
                    'license_number' => 'License Number ' . $i,
                    'plate_no' => 'Plate No ' . $i,
                    // Add other fields for driver if necessary
                ]);
            }
        }
    }
}
