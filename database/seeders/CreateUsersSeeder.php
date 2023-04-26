<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Company;
use App\Models\Staff;

class CreateUsersSeeder extends Seeder
{
    public function run()
{
    // Insert company records
    $companies = [        [            'name' => 'Company',            'email' => 'company@gmail.com',            'password' => bcrypt('password'),        ],
        [            'name' => 'Company2',            'email' => 'company2@gmail.com',            'password' => bcrypt('password'),        ],
    ];
    foreach ($companies as $company) {
        DB::table('companies')->insert($company);
    }

    // Retrieve the ID of the desired company
    $company_id = DB::table('companies')->where('name', 'Company')->value('id');

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
    foreach ($users as $user) {
        User::create($user);
    }

    // Insert staff records
    DB::table('staff')->insert([
        [
            'user_id' => 6,
            'company_id' => 4,
            'contact_no' => '1234567890',
            'archived' => false,
        ],
        [
            'user_id' => 7,
            'company_id' => 4,
            'contact_no' => '0987654321',
            'archived' =>false,
        ],
        ]);
        }

}
