<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create(['name' => 'Bachelor of Science in Agriculture', 'code' => 'BSAgri']);
        Course::create(['name' => 'Bachelor of Science in Business Administration - Financial Management', 'code' => 'BSBA - FM']);
        Course::create(['name' => 'Bachelor of Science in Business Administration - Human Resource Development Management', 'code' => 'BSBA - HRDM']);
        Course::create(['name' => 'Bachelor of Science in Business Administration - Marketing Management', 'code' => 'BSBA - MM']);
        Course::create(['name' => 'Bachelor of Science in Criminology', 'code' => 'BSCrim']);
        Course::create(['name' => 'Bachelor of Elementary Education', 'code' => 'BEED']);
        Course::create(['name' => 'Bachelor of Secondary Education - English', 'code' => 'BSED - English']);
        Course::create(['name' => 'Bachelor of Secondary Education - Filipino', 'code' => 'BSED - Filipino']);
        Course::create(['name' => 'Bachelor of Secondary Education - Mathematics', 'code' => 'BSED - Math']);
        Course::create(['name' => 'Bachelor of Science in Hospitality Management', 'code' => 'BSHM']);
        Course::create(['name' => 'Bachelor of Science in Information Technology', 'code' => 'BSIT']);
    }
}
