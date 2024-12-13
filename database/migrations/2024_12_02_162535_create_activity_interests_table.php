<?php

use App\Models\Student;
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
        Schema::create('activity_interests', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Student::class);
            $table->json('extra_curricular');
            $table->string('special_skills');
            $table->string('hobbies');
            $table->json('interest');
            $table->string('subject_best_like');
            $table->string('subject_least_like');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_interests');
    }
};
