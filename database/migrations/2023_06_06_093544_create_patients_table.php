<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('age');
            $table->string('gender');
            $table->date('Birthday');
            $table->string('Address');
            $table->string('Contact');
            $table->string('Guardian');
            $table->unsignedBigInteger('room');
            $table->boolean('is_discharged')->default(false);
            $table->timestamps();
            $table->foreign('room')->references('id')->on('rooms');
            $table->date('date_of_admit')->default(now());
        });

        // Schema::table('patients', function (Blueprint $table) {
        //     $table->foreign('room')->references('id')->on('rooms');
        // });
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    
    $patientId = 1;

    // Delete related vital signs
    DB::table('vital_signs')->where('patient_id', '=', $patientId)->delete();

    // Delete related hospital records
    DB::table('hospital_records')->where('patient_id', '=', $patientId)->delete();

    Schema::dropIfExists('patients');
    }

};