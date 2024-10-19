<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FamilyBackground;

class FamilyBackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            FamilyBackground::create([
                'father_info_id' => $i + 1,
                'mother_info_id' => $i + 1,
                'spouse_info_id' => $i + 1,
            ]);
        }
    }
}
