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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('ic_pelajar');
            $table->string('username');
            $table->string('kaedah_pembayaran');
            $table->decimal('jumlah_bayaran', 12, 2);
            $table->decimal('bayaran_semasa', 12, 2)->nullable();
            $table->string('status');
            $table->string('resit')->nullable();
            $table->date('tarikh_pembayaran');
            $table->time('masa_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
