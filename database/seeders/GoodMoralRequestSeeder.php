<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GoodMoralRequest;

class GoodMoralRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['Pending', 'Ready To Pickup', 'Picked Up'];
        for ($i = 0; $i < 100; $i++) {
            GoodMoralRequest::create([
                'student_id' => $i + 1,
                'reason' => "reason{$i}",
                'date_requested' => now(),
                'date_to_pickup' => now()->addDay(),
                'status' => $statuses[array_rand($statuses)]
            ]);
        }
    }
}
