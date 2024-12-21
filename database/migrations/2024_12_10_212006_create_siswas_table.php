<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->integer('no')->nullable();
            $table->string('nama')->nullable();
            $table->bigInteger('nisn')->nullable();
            $table->string('nik')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('tingkat_rombel')->nullable();
            $table->string('umur')->nullable();
            $table->string('status')->nullable();
            $table->string('jenis_kelamin');
            $table->text('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('kebutuhan_khusus')->nullable();
            $table->string('disabilitas')->nullable();
            $table->string('nomor_kip')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('nama_wali')->nullable();
            $table->foreignId('rombel_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
};