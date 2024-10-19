<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SpouseInfo;

class SpouseInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            SpouseInfo::create([
                'fname' => "Spouse{$i}First",
                'lname' => "Spouse{$i}Last",
                'occupation' => "Occupation {$i}",
            ]);
        }
    }
}
