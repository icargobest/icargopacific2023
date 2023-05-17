<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dispatcher;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;

class DispatcherSeeder extends Seeder
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
                    'name' => 'Dispatcher' . $i . ' - ' . $company->name,
                    'email' => 'dispatcher' . $i . '_' . $company->id . '@example.com',
                    'password' => Hash::make('password'),
                    'type' => '4',
                ]);

                Dispatcher::create([
                    'user_id' => $user->id,
                    'company_id' => $company->id,
                    'contact_no' => 'Contact No ' . $i,
                    // Add other fields for dispatcher if necessary
                ]);
            }
        }

    }
}
