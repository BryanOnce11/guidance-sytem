<?php

use App\Models\Student;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personal_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Student::class);
            $table->string('cigarette');
            $table->string('liquior');
            $table->string('drugs');
            $table->string('discipline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_histories');
    }
};
