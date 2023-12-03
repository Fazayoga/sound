<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->date('rental_date');
            $table->time('rental_time')->nullable();
            $table->unsignedBigInteger('sound_system_id');
            // Tambahkan kolom lain sesuai kebutuhan
            $table->timestamps();

            $table->foreign('sound_system_id')->references('id')->on('sound_systems')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
