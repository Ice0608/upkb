<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('silibuses');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // The silibus table and its schema are intentionally removed.
    }
};
