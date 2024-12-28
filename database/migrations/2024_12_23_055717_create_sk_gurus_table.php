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
        Schema::create('sk_gurus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sk_id')->unique();
            $table->integer('tahun');
            $table->foreignId('nik');
            $table->enum('jenis_sk',['SK Yayasan','SK Tugas']);
            $table->string('doc_sk');
            $table->integer('semester')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sk_gurus');
    }
};
