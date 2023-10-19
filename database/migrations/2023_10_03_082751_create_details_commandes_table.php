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
        Schema::create('details_commandes', function (Blueprint $table) {
            $table->id(); // Colonne ID de la ligne de commande (clé primaire)
            $table->unsignedBigInteger('commande_id'); // Clé étrangère liée à la table des commandes
            $table->unsignedBigInteger('produit_id'); // Clé étrangère liée à la table des produits
            $table->integer('quantite_commandee'); // Colonne Quantité commandée
            $table->decimal('prix_unitaire', 10, 2); // Colonne Prix unitaire au moment de la commande
            $table->decimal('montant_total', 10, 2); // Colonne Montant total de la ligne

            // Définition des clés étrangères
            $table->foreign('commande_id')->references('id')->on('commandes');
            $table->foreign('produit_id')->references('id')->on('produits');

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_commandes');
    }
};
