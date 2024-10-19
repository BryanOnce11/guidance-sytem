<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FatherInfo;

class FatherInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            FatherInfo::create([
                'fname' => "Father{$i}First",
                'lname' => "Father{$i}Last",
                'occupation' => "Occupation {$i}",
            ]);
        }
    }
}
