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
        Schema::create('vital_signs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->string('heart_rate');
            $table->decimal('respiratory_rate',5,2);
            $table->string('blood_pressure');
            $table->decimal('temperature',5,2);
            $table->integer('spo2');
            $table->integer('pulse_rate');
            $table->timestamps();

            //$table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade'); // Assuming a cascading delete is desired
            $table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    Schema::table('vital_signs', function (Blueprint $table) {
        $table->dropForeign(['patient_id']);
        $table->dropForeign(['room']);
    });

    Schema::dropIfExists('vital_signs');
    }




};
