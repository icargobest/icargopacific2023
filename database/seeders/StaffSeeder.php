<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Staff;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create staff for each company
        // Create staff for each company
        $companies = Company::all();

        foreach ($companies as $company) {
            for ($i = 1; $i <= 25; $i++) {
                // Create a user
                $user = User::create([
                    'name' => 'Staff ' . $i,
                    'email' => 'staff' . $i . '_' . $company->id . '@example.com',
                    'password' => Hash::make('password'), // You can change this to a secure password
                    'type' => '5',
                ]);

                // Create a staff member for the company
                Staff::create([
                    'user_id' => $user->id,
                    'company_id' => $company->id,
                    'contact_no' => 'Contact No ' . $i,
                    'tel' => 'Tel ' . $i,
                    'street' => 'Street ' . $i,
                    'city' => 'City ' . $i,
                    'state' => 'State ' . $i,
                    'postal_code' => 'Postal Code ' . $i,
                    // You can add additional fields if necessary
                ]);
            }
        }
    }
}
