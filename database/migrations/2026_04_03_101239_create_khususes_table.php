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
        Schema::create('khususes', function (Blueprint $table) {
            $table->id();
            $table->string('kod_khusus');
            $table->string('kod_institusi');
            $table->string('nama_khusus');
            $table->string('jenis_khusus');
            $table->string('mod_pengajian');
            $table->string('tempoh');
            $table->integer('kuota');
            $table->date('tarikh_pendaftaran');
            $table->text('penerangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khususes');
    }
};
