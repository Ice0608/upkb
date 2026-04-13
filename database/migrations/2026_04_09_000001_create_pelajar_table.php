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
            $table->string('noreff')->nullable(); // username staff
            $table->enum('program', ['Diploma', 'TVET', 'Sains Kesihatan'])->nullable();
            $table->string('nama_pelajar');
            $table->string('ic_pelajar');
            $table->double('spm_credit')->nullable();
            $table->string('no_tel');
            $table->string('email')->nullable();
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('postcode')->nullable();
            $table->string('kod_institusi')->nullable();
            $table->string('kod_kursus')->nullable();
            $table->string('nama_bapa')->nullable();
            $table->string('ic_bapa')->nullable();
            $table->string('no_tel_bapa')->nullable();
            $table->string('pekerjaan_bapa')->nullable();
            $table->string('pendapatan_bapa')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('ic_ibu')->nullable();
            $table->string('no_tel_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('pendapatan_ibu')->nullable();
            $table->integer('jumlah_tanggungan')->default(0);
            $table->string('pilihan_pertama')->nullable(); // nama kursus
            $table->string('pilihan_kedua')->nullable(); // nama kursus
            $table->string('pilihan_ketiga')->nullable(); // nama kursus
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
