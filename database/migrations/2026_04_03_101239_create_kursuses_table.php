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
        Schema::create('kursuses', function (Blueprint $table) {
            $table->id();
            $table->string('kod_kursus');
            $table->string('kod_institusi');
            $table->string('nama_kursus');
            $table->string('jenis_kursus');
            $table->string('mod_pengajian');
            $table->string('tempoh');
            $table->integer('kuota')->nullable();
            $table->date('tarikh_pendaftaran')->nullable();
            $table->text('penerangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kursuses');
    }
};
