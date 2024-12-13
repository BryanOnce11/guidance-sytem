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
        Schema::create('scholastic_records', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Student::class);
            $table->json('scholastic_record_1')->nullable();
            $table->json('scholastic_record_2')->nullable();
            $table->json('scholastic_record_3')->nullable();
            $table->json('scholastic_record_4')->nullable();
            $table->json('scholastic_record_5')->nullable();
            $table->json('scholastic_record_6')->nullable();
            $table->json('scholastic_record_7')->nullable();
            $table->json('scholastic_record_8')->nullable();
            $table->json('scholastic_record_9')->nullable();
            $table->json('scholastic_record_10')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholastic_records');
    }
};
