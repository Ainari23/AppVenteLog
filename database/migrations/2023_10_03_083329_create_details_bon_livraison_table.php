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
        Schema::create('details_bon_livraison', function (Blueprint $table) {
            $table->id(); // Colonne ID de la ligne du bon de livraison (clé primaire)
            $table->unsignedBigInteger('bon_de_livraison_id'); // Colonne ID du bon de livraison (clé étrangère)
            $table->unsignedBigInteger('produit_id'); // Colonne ID du produit (clé étrangère)
            $table->integer('quantite_livree'); // Colonne Quantité livrée
            $table->string('numero_suivi')->nullable(); // Colonne Numéro de suivi de la livraison (si applicable)

            // Définition des clés étrangères
            $table->foreign('bon_de_livraison_id')->references('id')->on('bon_livraison');
            $table->foreign('produit_id')->references('id')->on('produits');

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_bon_livraison');
    }
};
