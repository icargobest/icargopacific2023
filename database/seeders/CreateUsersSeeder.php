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
                'password'=> bcrypt('password'),
             ],[
                'name'=>'User2',
                'email'=>'user2@gmail.com',
                'type'=>0,
                'password'=> bcrypt('password'),
             ],
            [
               'name'=>'Super Admin',
               'email'=>'super-admin@gmail.com',
               'type'=>1,
               'password'=> bcrypt('password'),
            ],
            [
               'name'=>'Company',
               'email'=>'company@gmail.com',
               'type'=> 2,
               'password'=> bcrypt('password'),
            ],
            [
               'name'=>'Company2',
               'email'=>'company2@gmail.com',
               'type'=> 2,
               'password'=> bcrypt('password'),
            ],
            [
               'name'=>'Staff',
               'email'=>'staff@gmail.com',
               'type'=> 4,
               'password'=> bcrypt('password'),
            ],
            [
               'name'=>'Staff2',
               'email'=>'staff2@gmail.com',
               'type'=> 4,
               'password'=> bcrypt('password'),
            ],
            [
               'name'=>'Driver',
               'email'=>'driver@gmail.com',
               'type'=> 3,
               'password'=> bcrypt('password'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
