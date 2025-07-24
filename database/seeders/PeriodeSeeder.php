<?php

use Illuminate\Database\Seeder;
use App\Models\Periode;

class PeriodeSeeder extends Seeder
{
    public function run()
    {
        Periode::create([
            'nom' => 'Premier trimestre',
            'debut' => '2025-10-01',
            'fin' => '2025-12-20',
        ]);

        Periode::create([
            'nom' => 'Deuxième trimestre',
            'debut' => '2026-01-05',
            'fin' => '2026-03-25',
        ]);
    }
}

