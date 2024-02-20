<?php

use App\Models\Bed;
use App\Models\Ward;
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
        Schema::table('patient_admns', function (Blueprint $table) {
            $table->foreignIdFor(Ward::class)->nullable()->constrained();
            $table->foreignIdFor(Bed::class)->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('_patient_admn', function (Blueprint $table) {
            //
        });
    }
};
