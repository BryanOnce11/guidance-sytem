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
        $year_lvls = ['1st Year', '2nd Year', '3rd Year', '4th Year'];
        $statuses = ['Active', 'Inactive']; // Sample statuses, you can adjust as needed
        $image_placeholder = 'placeholder_image.jpg'; // Assume all students use a placeholder image

        for ($i = 1; $i < 100; $i++) {
            // Create a student
            Student::create([
                'user_id' => $i + 1, // Assuming User IDs are sequential, adjust if needed
                'family_background_id' => $i + 1, // Assuming Family Background IDs are sequential, adjust if needed
                'course_id' => rand(1, 11), // Random Course ID, adjust based on actual courses in your DB
                'student_id' => "S{$i}0001",
                'status' => $statuses[array_rand($statuses)], // Random status
                'image' => $image_placeholder, // Placeholder image (you can replace with actual logic to store/upload an image)
                'year_lvl' => $year_lvls[array_rand($year_lvls)], // Random year level
                'fname' => "Student{$i}First",
                'lname' => "Student{$i}Last",
                'm_i' => "M.I.{$i}",
                'age' => rand(18, 25), // Random age between 18 and 25
                'birth_date' => now()->subYears(rand(18, 25))->toDateString(),
                'birth_place' => "Birth Place {$i}",
                'gender' => rand(0, 1) ? 'Male' : 'Female',
                'citizenship' => "Citizenship {$i}",
                'civil_status' => rand(0, 2) === 0 ? 'Single' : (rand(0, 1) === 0 ? 'Married' : 'Widowed'),
                'contact_num' => '09123456789', // Placeholder contact number
                'height' => rand(150, 180), // Random height in cm
                'weight' => rand(40, 100), // Random weight in kg
                'blood_type' => ['A', 'B', 'AB', 'O'][rand(0, 3)], // Random blood type
                'present_address' => "Present Address {$i}",
                'permanent_address' => "Permanent Address {$i}",
                'where_staying' => "Where Staying {$i}",
            ]);
        }
    }
}
