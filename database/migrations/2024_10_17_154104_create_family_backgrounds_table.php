<?php

use App\Models\FatherInfo;
use App\Models\MotherInfo;
use App\Models\SpouseInfo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('family_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(FatherInfo::class);
            $table->foreignIdFor(MotherInfo::class);
            $table->foreignIdFor(SpouseInfo::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_backgrounds');
    }
};
