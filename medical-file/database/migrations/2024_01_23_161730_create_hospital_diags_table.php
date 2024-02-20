<?php

use App\Models\HospitalDep;
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
        Schema::create('hospital_diags', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(HospitalDep::class)->constrained();
            $table->string('lap_address');
            $table->string('lap_phone');
            $table->string('lap_mobile');
            $table->string('lap_email');
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_diags');
    }
};
