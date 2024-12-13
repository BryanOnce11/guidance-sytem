<?php

use App\Models\EmergencyContactInfo;
use App\Models\FatherInfo;
use App\Models\GuardianInfo;
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
            $table->foreignIdFor(GuardianInfo::class);
            $table->foreignIdFor(EmergencyContactInfo::class);
            $table->string('source_of_income');
            $table->string('parent_status');
            $table->string('birth_rank');
            $table->string('number_of_siblings');
            $table->string('number_of_children');
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
