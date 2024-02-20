<?php

use App\Models\Doctor;
use App\Models\HospitalDiag;
use App\Models\Patient;
use App\Models\PatientHistory;
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
        Schema::create('patient_diagnosle_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(HospitalDiag::class)->constrained();
            $table->foreignIdFor(PatientHistory::class)->constrained();
            $table->foreignIdFor(Doctor::class)->constrained();
            $table->foreignIdFor(Patient::class)->constrained();
            $table->string('date');
            $table->string('note');
            $table->string('lap_note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_diagnosle_histories');
    }
};
