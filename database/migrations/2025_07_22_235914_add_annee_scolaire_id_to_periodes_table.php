<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('periodes', function (Blueprint $table) {
            // Ajouter colonne nullable au départ
            $table->foreignId('annee_scolaire_id')->nullable()->after('id');
        });

        // Mettre à jour les valeurs NULL existantes avec une valeur par défaut (ex: 1)
        \DB::table('periodes')->whereNull('annee_scolaire_id')->update(['annee_scolaire_id' => 1]);

        // Modifier la colonne pour la rendre NOT NULL
        Schema::table('periodes', function (Blueprint $table) {
            $table->foreignId('annee_scolaire_id')->nullable(false)->change();
        });

        // Ajouter la contrainte de clé étrangère
        Schema::table('periodes', function (Blueprint $table) {
            $table->foreign('annee_scolaire_id')->references('id')->on('annees_scolaires')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('periodes', function (Blueprint $table) {
            $table->dropForeign(['annee_scolaire_id']);
            $table->dropColumn('annee_scolaire_id');
        });
    }
};

