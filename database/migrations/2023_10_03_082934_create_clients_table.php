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
        Schema::create('clients', function (Blueprint $table) {
            $table->id(); // Colonne ID du client (clé primaire)
            $table->string('nom_client'); // Colonne Nom du client
            $table->string('adresse_client'); // Colonne Adresse du client
            $table->string('telephone_client'); // Colonne Numéro de téléphone du client
            $table->string('email_client')->unique(); // Colonne Adresse e-mail du client avec contrainte d'unicité

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
