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
        Schema::create('historique_prix', function (Blueprint $table) {
            $table->id(); // Colonne ID de l'historique (clé primaire)
            $table->unsignedBigInteger('produit_id'); // Colonne ID du produit (clé étrangère liée à la table des produits)
            $table->date('date_changement_prix'); // Colonne Date de changement de prix
            $table->decimal('ancien_prix', 10, 2); // Colonne Ancien prix (decimal avec 10 chiffres au total et 2 décimales)
            $table->decimal('nouveau_prix', 10, 2); // Colonne Nouveau prix (decimal avec 10 chiffres au total et 2 décimales)

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées

            // Clé étrangère vers la table des produits
            $table->foreign('produit_id')->references('id')->on('produits');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historique_prix');
    }
};
