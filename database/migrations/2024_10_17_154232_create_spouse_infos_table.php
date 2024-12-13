<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('spouse_infos', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('m_i');
            $table->date('birth_date')->nullable();
            $table->string('educational_attainment')->nullable();
            $table->string('contact_num')->nullable();
            $table->string('email')->nullable();
            $table->string('occupation');
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('avg_monthly_income')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spouse_infos');
    }
};
