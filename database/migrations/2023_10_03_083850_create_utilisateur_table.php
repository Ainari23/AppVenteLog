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
        Schema::create('utilisateur', function (Blueprint $table) {
            $table->id(); // Colonne ID de l'utilisateur (clé primaire)
            $table->string('nom_utilisateur')->unique(); // Colonne Nom d'utilisateur avec contrainte d'unicité
            $table->string('mot_de_passe'); // Colonne Mot de passe (haché)
            $table->string('roles'); // Colonne Rôles (peut être une chaîne JSON ou séparée par des virgules)

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateur');
    }
};
