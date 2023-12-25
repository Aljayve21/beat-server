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
        $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
        $table->date('date_of_admit');
        $table->date('date_for_discharged');
        $table->string('heart_rate');
        $table->decimal('respiratory_rate', 5, 2);
        $table->string('blood_pressure');
        $table->decimal('temperature', 5, 2);
        $table->integer('spo2');
        $table->dateTime('time');
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
