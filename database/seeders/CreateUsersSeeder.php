<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
               'name'=>'User',
               'email'=>'user@gmail.com',
               'type'=>0,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Super Admin',
               'email'=>'super-admin@gmail.com',
               'type'=>1,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Company',
               'email'=>'company@gmail.com',
               'type'=> 2,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Driver',
               'email'=>'manager@gmail.com',
               'type'=> 2,
               'password'=> bcrypt('123456'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}