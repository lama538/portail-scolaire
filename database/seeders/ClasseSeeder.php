<?php

use Illuminate\Database\Seeder;
use App\Models\Classe;

class ClasseSeeder extends Seeder
{
    public function run()
    {
        Classe::create([
            'nom' => 'Terminale S',
            'niveau' => 'Terminale',
        ]);

        Classe::create([
            'nom' => 'Première L',
            'niveau' => 'Première',
        ]);
    }
}

