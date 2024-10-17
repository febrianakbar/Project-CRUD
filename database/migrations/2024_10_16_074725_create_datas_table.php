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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('nis');
            $table->enum('kelas', ['X', 'XI', 'XII']);
            $table->enum('jurusan', ['PPLG', 'TJKT', 'dkv', 'hotel', 'kuliner', 'pemasaran', 'mplb']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
