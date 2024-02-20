<?php

use App\Models\Bed;
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
        Schema::create('patient_admns', function (Blueprint $table) {
            $table->id();


            $table->string('admission_data');
            $table->string('discharge_data');
            $table->integer('total_cost');
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_admns');
    }
};
