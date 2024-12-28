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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_guru');
            $table->bigInteger('nik')->unique();
            $table->string('nuptk')->nullable();
            $table->enum('status_kepegawaian',['PNS','Non PNS']);
            $table->integer('nip')->nullable();
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('no_hp');
            $table->string('email')->unique();
            $table->string('mapel');
            $table->integer('total_jtm');
            $table->enum('status',['Aktif','Tidak Aktif']);
            $table->string('foto')->nullable();
            $table->string('ijazah_sd')->nullable();
            $table->string('ijazah_smp')->nullable();
            $table->string('ijazah_sma')->nullable();
            $table->string('ijazah_s1')->nullable();
            $table->string('ijazah_s2')->nullable();
            $table->foreignId('sk_id')->nullable();
            $table->string('kartukeluarga')->nullable();
            $table->string('ktp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
