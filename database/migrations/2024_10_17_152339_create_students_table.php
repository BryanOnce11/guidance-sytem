<?php

use App\Models\Course;
use App\Models\FamilyBackground;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(FamilyBackground::class);
            $table->foreignIdFor(Course::class);
            $table->string('student_id');
            // $table->string('course');
            $table->string('year_lvl');
            $table->string('fname');
            $table->string('lname');
            $table->string('m_i');
            $table->date('birth_date');
            $table->string('birth_place');
            $table->string('gender');
            $table->string('citizenship');
            $table->string('civil_status');
            $table->string('contact_num');
            $table->string('emergency_fullname');
            $table->string('emergency_contact_num');
            $table->string('emergency_occupation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
