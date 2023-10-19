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
        Schema::create('factures', function (Blueprint $table) {
            $table->id(); // Colonne ID de la facture (clé primaire)
            $table->unsignedBigInteger('commande_id'); // Colonne ID de la commande (clé étrangère liée à la table des commandes)
            $table->decimal('montant_total', 10, 2); // Colonne Montant total de la facture (decimal avec 10 chiffres au total et 2 décimales)
            $table->date('date_facture'); // Colonne Date de la facture
            $table->string('statut'); // Colonne Statut de la facture (payée, impayée, en attente de paiement, etc.)

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées

            // Clé étrangère vers la table des commandes
            $table->foreign('commande_id')->references('id')->on('commandes');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
