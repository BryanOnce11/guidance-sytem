<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            Student::create([
                'user_id' => $i + 1,
                'family_background_id' => $i + 1,
                'student_id' => "S{$i}0001",
                'course' => "Course {$i}",
                'year_lvl' => rand(1, 4), // Random year level between 1 to 4
                'fname' => "Student{$i}First",
                'lname' => "Student{$i}Last",
                'm_i' => "M.I.{$i}",
                'birth_date' => now()->subYears(rand(18, 25))->toDateString(),
                'birth_place' => "Birth Place {$i}",
                'gender' => rand(0, 1) ? 'Male' : 'Female',
                'citizenship' => "Citizenship {$i}",
                'civil_status' => rand(0, 1) ? 'Single' : 'Married',
                'contact_num' => '09123456789',
                'emergency_fullname' => "Emergency Contact {$i}",
                'emergency_contact_num' => '09123456789',
                'emergency_occupation' => "Occupation {$i}",
            ]);
        }
    }
}
