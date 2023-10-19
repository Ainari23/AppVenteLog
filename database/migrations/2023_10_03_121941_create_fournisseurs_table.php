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
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id(); // Colonne ID du fournisseur (clé primaire)
            $table->string('nom'); // Colonne Nom du fournisseur
            $table->string('adresse'); // Colonne Adresse du fournisseur
            $table->string('telephone'); // Colonne Numéro de téléphone du fournisseur
            $table->string('email'); // Colonne Adresse e-mail du fournisseur

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fournisseurs');
    }
};
