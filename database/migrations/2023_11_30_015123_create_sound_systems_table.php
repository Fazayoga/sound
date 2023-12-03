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
        Schema::create('sound_systems', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->string('sound_code')->default('')->nullable();
            $table->string('judul')->nullable();
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 10, 2)->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sound_systems');
    }
};

