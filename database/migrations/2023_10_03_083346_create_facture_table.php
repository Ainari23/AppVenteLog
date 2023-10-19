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
        Schema::create('facture', function (Blueprint $table) {
            $table->id(); // Colonne ID de la facture (clé primaire)
            $table->date('date_facture'); // Colonne Date de la facture
            $table->unsignedBigInteger('client_id')->nullable(); // Colonne ID du client (clé étrangère, nullable)
            $table->decimal('montant_total', 10, 2); // Colonne Montant total de la facture
            $table->string('etat_facture'); // Colonne État de la facture (payée, impayée, en attente, etc.)

            // Définition de la clé étrangère
            $table->foreign('client_id')->references('id')->on('clients');

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facture');
    }
};
