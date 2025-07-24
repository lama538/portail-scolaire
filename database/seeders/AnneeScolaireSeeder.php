<?php

use Illuminate\Database\Seeder;
use App\Models\AnneeScolaire;

class AnneeScolaireSeeder extends Seeder
{
    public function run()
    {
        AnneeScolaire::create([
            'annee_debut' => 2025,
            'annee_fin' => 2026,
        ]);
    }
}

