<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use App\Models\Staff;
use App\Models\Driver;
use App\Models\Dispatcher;

class CreateUsersSeeder extends Seeder
{
    public function run()
    {

        // Insert user records
        $users = [
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'type' => 0,
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'User2',
                'email' => 'user2@gmail.com',
                'type' => 0,
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Super Admin',
                'email' => 'super-admin@gmail.com',
                'type' => 1,
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Company',
                'email' => 'company@gmail.com',
                'type' => 2,
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Company2',
                'email' => 'company2@gmail.com',
                'type' => 2,
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Staff',
                'email' => 'staff@gmail.com',
                'type' => 5,
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Staff2',
                'email' => 'staff2@gmail.com',
                'type' => 5,
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ],
        ];

        // Create a user for each company and associate it with the company
        foreach ($users as $userData) {
            $user = User::create($userData);
            if ($user->type == 'company') {
                $company = Company::create([
                    'user_id' => $user->id,
                    'contact_no' => '1234567890',
                    'contact_name' => 'John Doe',
                    'company_address' => '123 Main St',
                    'archived' => false,
                ]);
            }
            if ($user->type == 'staff') {
                Staff::create([
                        'user_id' => $user->id,
                        'company_id' => $company->id,
                        'contact_no' => '1234567890',
                        'archived' => false,
                ]);
            }
        }
        // Creating a dispatcher user
        $dispatcher = User::create([
            'name' => 'Dispatcher User',
            'email' => 'dispatcher@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'type' => 4 // set the user type to dispatcher
        ]);

        // Creating a dispatcher record
        Dispatcher::create([
            'user_id' => $dispatcher->id,
            'company_id' => 1,
            'contact_no' => '1234567890'
        ]);

        // Creating a driver user
        $driver = User::create([
            'name' => 'Driver User',
            'email' => 'driver@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'type' => 3 // set the user type to driver
        ]);

        // Creating a driver record
        Driver::create([
            'user_id' => $driver->id,
            'company_id' => 1,
            'dispatcher_id' => 1,
            'contact_no' => '0987654321',
            'vehicle_type' => 'SUV',
            'license_number' => 'ABC123',
            'plate_no' => 'XYZ-123'
        ]);
    }
}
