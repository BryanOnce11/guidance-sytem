<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MotherInfo;

class MotherInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            MotherInfo::create([
                'fname' => "Mother{$i}First",
                'lname' => "Mother{$i}Last",
                'occupation' => "Occupation {$i}",
            ]);
        }
    }
}
