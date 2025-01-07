<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToGurusTable extends Migration
{
    public function up()
    {
        Schema::table('gurus', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(); // Menambahkan kolom user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Membuat foreign key ke tabel users
        });
    }

    public function down()
    {
        Schema::table('gurus', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
