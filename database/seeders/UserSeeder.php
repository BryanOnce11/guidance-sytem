<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'Admin',
            'status' => 'Verified'
        ]);

        // for ($i = 0; $i < 100; $i++) {
        //     User::create([
        //         'email' => "student{$i}@example.com",
        //         'password' => bcrypt('password'),
        //         'role' => 'Student',
        //         'status' => rand(0, 1) ? 'Pending' : 'Verified',
        //     ]);
        // }
    }
}
