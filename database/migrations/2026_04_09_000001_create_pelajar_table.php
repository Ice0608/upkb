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
        Schema::create('pelajar', function (Blueprint $table) {
            $table->id();
            $table->date('tarikh_pendaftaran');
            $table->string('nama_pelajar');
            $table->string('ic_pelajar');
            $table->string('no_tel');
            $table->string('email')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kod_institusi');
            $table->string('kod_kursus');
            $table->string('nama_bapa')->nullable();
            $table->string('ic_bapa')->nullable();
            $table->string('no_tel_bapa')->nullable();
            $table->string('pendapatan_bapa')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('ic_ibu')->nullable();
            $table->string('no_tel_ibu')->nullable();
            $table->string('pendapatan_ibu')->nullable();
            $table->integer('jumlah_tanggungan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelajar');
    }
};
