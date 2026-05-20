<?php

namespace App\Observers;

use App\Models\Kursus;
use App\Models\Galeri;
use App\Models\Kerjaya;
use App\Models\SyaratKelayakan;
use App\Models\Elaun;

class KursusObserver
{
    /**
     * Handle the Kursus "updating" event.
     *
     * @param  \App\Models\Kursus  $kursus
     * @return void
     */
    public function updating(Kursus $kursus)
    {
        // Check if kod_kursus has changed
        if ($kursus->isDirty('kod_kursus')) {
            $oldKod = $kursus->getOriginal('kod_kursus');
            $newKod = $kursus->getAttribute('kod_kursus');

            // Update all related galeri records
            Galeri::where('kod_kursus', $oldKod)->update(['kod_kursus' => $newKod]);

            // Update all related kerjaya records
            Kerjaya::where('kod_kursus', $oldKod)->update(['kod_kursus' => $newKod]);

            // Update all related syarat kelayakan records
            SyaratKelayakan::where('kod_kursus', $oldKod)->update(['kod_kursus' => $newKod]);

            // Update all related elaun records
            Elaun::where('kod_kursus', $oldKod)->update(['kod_kursus' => $newKod]);
        }
    }
}
