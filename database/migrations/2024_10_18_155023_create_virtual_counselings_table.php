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
        Schema::create('virtual_counselings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Student::class);
            $table->date('date_requested')->default(now()->setTimezone('Asia/Manila'));
            $table->date('date_scheduled')->nullable();
            $table->time('time_scheduled')->nullable();
            $table->string('reason');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('virtual_counselings');
    }
};
