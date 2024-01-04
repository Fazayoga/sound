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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable();
            $table->date('rental_date');
            $table->time('rental_start_time')->nullable();
            $table->time('rental_end_time')->nullable();
            $table->string('event_name')->nullable();
            $table->string('event_address')->nullable();
            $table->string('name_location')->nullable();
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('sound_system_id');
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
