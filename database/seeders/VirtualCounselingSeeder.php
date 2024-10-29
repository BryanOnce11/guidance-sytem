<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VirtualCounseling;

class VirtualCounselingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['Pending', 'Approved'];
        for ($i = 0; $i < 100; $i++) {
            VirtualCounseling::create([
                'student_id' => $i + 1,
                'date_requested' => now(),
                'date_scheduled' => now()->addDay(),
                'reason' => "Reason {$i}",
                'status' => $statuses[array_rand($statuses)]
            ]);
        }
    }
}
