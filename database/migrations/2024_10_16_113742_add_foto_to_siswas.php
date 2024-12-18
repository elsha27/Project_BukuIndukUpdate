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
        Schema::table('siswas', function (Blueprint $table) {
            $table->string('foto')->nullable();
            $table->string('smt1')->nullable();  
            $table->string('smt2')->nullable();  
            $table->string('smt3')->nullable();  
            $table->string('smt4')->nullable();  
            $table->string('smt5')->nullable();  
            $table->string('smt6')->nullable();  
            $table->string('smt7')->nullable();  
            $table->string('smt8')->nullable();  
            $table->string('smt9')->nullable();  
            $table->string('smt10')->nullable();  
            $table->string('smt11')->nullable();  
            $table->string('smt12')->nullable();  
            $table->string('ijazah')->nullable();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->dropColumn('foto');
            $table->dropColumn('smt1');
            $table->dropColumn('smt2');
            $table->dropColumn('smt3');
            $table->dropColumn('smt4');
            $table->dropColumn('smt5');
            $table->dropColumn('smt6');
            $table->dropColumn('smt7');
            $table->dropColumn('smt8');
            $table->dropColumn('smt9');
            $table->dropColumn('smt10');
            $table->dropColumn('smt11');
            $table->dropColumn('smt12');
            $table->dropColumn('ijazah');
        });
    }
};
