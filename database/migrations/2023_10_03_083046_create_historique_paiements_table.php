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
        Schema::create('historique_paiements', function (Blueprint $table) {
            $table->id(); // Colonne ID de l'historique des paiements (clé primaire)
            $table->unsignedBigInteger('paiement_id'); // Colonne ID du paiement (clé étrangère liée à la table des paiements)
            $table->unsignedBigInteger('commande_id'); // Colonne ID de la commande (clé étrangère liée à la table des commandes)
            $table->decimal('montant_paye', 10, 2); // Colonne Montant payé (decimal avec 10 chiffres au total et 2 décimales)
            $table->date('date_paiement'); // Colonne Date du paiement

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées

            // Clé étrangère vers la table des paiements
            $table->foreign('paiement_id')->references('id')->on('paiements');

            // Clé étrangère vers la table des commandes
            $table->foreign('commande_id')->references('id')->on('commandes');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historique_paiements');
    }
};
