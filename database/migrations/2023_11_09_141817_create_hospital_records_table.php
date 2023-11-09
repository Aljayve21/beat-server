<?php

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
        Schema::create('hospital_records', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_admit');
            $table->date('date_for_discharged');
            $table->string('heart_rate');
            $table->string('respiratory');
            $table->string('blood_pressure');
            $table->string('temperature');
            $table->string('spo2');
            $table->date('date');
            $table->time('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_records');
    }
};
