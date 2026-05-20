<?php

namespace App\Observers;

use App\Models\Institusi;
use App\Models\Kursus;
use App\Models\Galeri;
use App\Models\Kerjaya;
use App\Models\SyaratKelayakan;
use App\Models\Elaun;
use App\Models\YuranPendaftaran;
use App\Models\YuranPilihan;
use App\Models\YuranAsrama;
use App\Models\YuranPengajian;

class InstitusiObserver
{
    /**
     * Handle the Institusi "updating" event.
     *
     * @param  \App\Models\Institusi  $institusi
     * @return void
     */
    public function updating(Institusi $institusi)
    {
        // Check if kod_institusi has changed
        if ($institusi->isDirty('kod_institusi')) {
            $oldKod = $institusi->getOriginal('kod_institusi');
            $newKod = $institusi->getAttribute('kod_institusi');

            // Update all related kursus records
            Kursus::where('kod_institusi', $oldKod)->update(['kod_institusi' => $newKod]);

            // Update all related galeri records
            Galeri::where('kod_institusi', $oldKod)->update(['kod_institusi' => $newKod]);

            // Update all related kerjaya records
            Kerjaya::where('kod_institusi', $oldKod)->update(['kod_institusi' => $newKod]);

            // Update all related syarat kelayakan records
            SyaratKelayakan::where('kod_institusi', $oldKod)->update(['kod_institusi' => $newKod]);

            // Update all related elaun records
            Elaun::where('kod_institusi', $oldKod)->update(['kod_institusi' => $newKod]);

            // Update all related yuran pendaftaran records
            YuranPendaftaran::where('kod_institusi', $oldKod)->update(['kod_institusi' => $newKod]);

            // Update all related yuran pilihan records
            YuranPilihan::where('kod_institusi', $oldKod)->update(['kod_institusi' => $newKod]);

            // Update all related yuran asrama records
            YuranAsrama::where('kod_institusi', $oldKod)->update(['kod_institusi' => $newKod]);

            // Update all related yuran pengajian records
            YuranPengajian::where('kod_institusi', $oldKod)->update(['kod_institusi' => $newKod]);
        }
    }
}
