<?php

use App\Models\HospitalDep;
use App\Models\User;
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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(HospitalDep::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->double('visit_price');
            $table->double('followup_price');
            $table->double('inpatient_visit_price');
            $table->string('note');
            $table->string('signature');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
