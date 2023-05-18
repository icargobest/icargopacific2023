<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Company;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(5)->create();
        //\App\Models\Company::factory(5)->create();
        //\App\Models\Employee::factory(5)->create();
        //\App\Models\Shipment::factory(10)->create();
        //\App\Models\Sender::factory(10)->create();
        //\App\Models\Recipient::factory(10)->create();
        //\App\Models\Driver::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Create 15 users with associated companies
        for ($i = 1; $i <= 15; $i++) {
            $user = User::create([
                'name' => 'Company ' . $i,
                'email' => 'company' . $i . '@example.com',
                'password' => Hash::make('password'),
                'type' => '2',
            ]);

            $company = Company::create([
                'user_id' => $user->id,
                'contact_no' => '123456789',
                'contact_name' => 'Contact Name ' . $i,
                'company_address' => 'Company Address ' . $i,
            ]);
        }

        // Create 15 users and customers
        for ($i = 1; $i <= 15; $i++) {
            // Create a user
            $user = User::create([
                'name' => 'User' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => Hash::make('password'), // You can change this to a secure password
            ]);

            // Create a customer for the user
            Customer::create([
                'user_id' => $user->id,
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
