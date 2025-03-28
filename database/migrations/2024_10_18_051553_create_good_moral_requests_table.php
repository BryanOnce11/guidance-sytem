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
        Schema::create('good_moral_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Student::class);
            $table->string('reason');
            $table->date('date_requested')->default(now()->setTimezone('Asia/Manila'));
            $table->string('date_to_pickup')->nullable();
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('good_moral_requests');
    }
};
