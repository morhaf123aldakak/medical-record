<?php

use App\Models\Patient;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patient_old_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Patient::class)->constrained();
            $table->string('old_medicines');
            $table->string('old_disease');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_old_histories');
    }
};
