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
        Schema::create('rooms', function (Blueprint $table) {
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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
