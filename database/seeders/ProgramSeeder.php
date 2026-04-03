<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program::create([
            'jenis_program' => 'TVET',
            'info_program' => 'Pendidikan Teknikal dan Latihan Vokasional untuk kerjaya berasaskan kemahiran industri.',
            'icon' => 'fas fa-tools',
        ]);

        Program::create([
            'jenis_program' => 'Diploma',
            'info_program' => 'Program Akademik dan Profesional untuk laluan ke peringkat ijazah dan kerjaya profesional.',
            'icon' => 'fas fa-graduation-cap',
        ]);

        Program::create([
            'jenis_program' => 'Sains Kesihatan',
            'info_program' => 'Program Sains Kesihatan untuk pembangunan kompetensi klinikal dan penyelidikan dalam bidang kesihatan.',
            'icon' => 'fas fa-heartbeat',
        ]);
    }
}
