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
        Schema::create('rombels', function (Blueprint $table) {
            $table->id();
            $table->integer('rombel_id')->unique;
            $table->string('nama_rombel');
            $table->integer('tingkat');
            $table->foreignId('nik');
            $table->string('nama_ruangan');
            $table->string('semester');
            $table->string('tahun_ajaran');
            $table->foreignId('nisn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rombels');
    }
};
