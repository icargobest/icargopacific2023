<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Company::factory(10)->create();
        \App\Models\Employee::factory(10)->create();
        //\App\Models\Shipment::factory(10)->create();
        //\App\Models\Sender::factory(10)->create();
        //\App\Models\Recipient::factory(10)->create();
        //\App\Models\Driver::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
