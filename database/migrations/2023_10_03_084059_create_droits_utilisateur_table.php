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
        Schema::create('droits_utilisateur', function (Blueprint $table) {
            $table->id(); // Colonne ID du droit (clé primaire)
            $table->string('nom_droit'); // Colonne Nom du droit
            $table->text('description_droit'); // Colonne Description du droit

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('droits_utilisateur');
    }
};
