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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->integer('bed_no');
            $table->string('name');
            $table->string('age');
            $table->string('gender');
            $table->string('condition');
            $table->integer('heart_rate');
            $table->integer('respiratory_pressure');
            $table->string('blood_pressure');
            $table->integer('oxygen_level');
            $table->double('temperature');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
