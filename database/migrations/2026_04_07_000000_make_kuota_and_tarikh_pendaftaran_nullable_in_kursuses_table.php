<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::statement('ALTER TABLE `kursuses` MODIFY `kuota` INT NULL');
        DB::statement('ALTER TABLE `kursuses` MODIFY `tarikh_pendaftaran` DATE NULL');
    }

    public function down()
    {
        DB::statement('ALTER TABLE `kursuses` MODIFY `kuota` INT NOT NULL');
        DB::statement('ALTER TABLE `kursuses` MODIFY `tarikh_pendaftaran` DATE NOT NULL');
    }
};
