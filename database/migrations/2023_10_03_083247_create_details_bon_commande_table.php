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
        Schema::create('details_bon_commande', function (Blueprint $table) {
            $table->id(); // Colonne ID de la ligne du bon de commande (clé primaire)
            $table->unsignedBigInteger('bon_commande_id'); // Colonne ID du bon de commande (clé étrangère)
            $table->unsignedBigInteger('produit_id'); // Colonne ID du produit (clé étrangère)
            $table->integer('quantite_commandee'); // Colonne Quantité commandée
            $table->decimal('prix_unitaire', 10, 2); // Colonne Prix unitaire au moment de la commande
            $table->decimal('montant_total', 10, 2); // Colonne Montant total de la ligne du bon de commande

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées

            // Définition des clés étrangères
            $table->foreign('bon_commande_id')->references('id')->on('bon_commande');
            $table->foreign('produit_id')->references('id')->on('produits');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_bon_commande');
    }
};
